@extends('admin.layout')

@section('title', 'Edit Unit Kamar')
@section('page_title', 'Edit Unit & Upload Foto')

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('admin.units.index') }}" class="text-xs text-slate-500 hover:text-blue-600 transition flex items-center gap-1.5 font-semibold">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Kamar
            </a>
        </div>

        <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-8 space-y-6 shadow-sm">
            <div class="border-b border-slate-200/80 pb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">Edit Unit: {{ $unit->name }}</h3>
                    <p class="text-xs text-slate-500 mt-1">Perbarui rincian kamar, upload foto baru, atau sesuaikan harga diskon.</p>
                </div>
                <span class="px-3 py-1 rounded-lg bg-blue-50 text-blue-700 font-bold text-xs border border-blue-200">
                    {{ $unit->location->name ?? '-' }}
                </span>
            </div>

            <!-- Form Edit dengan multipart/form-data untuk upload file gambar -->
            <form method="POST" action="{{ route('admin.units.update', $unit->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Row 1: Lokasi & Nama Unit -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="location_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Lokasi Gedung Apartemen *</label>
                        <select name="location_id" id="location_id" required class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                            @foreach($locations as $loc)
                                <option value="{{ $loc->id }}" {{ old('location_id', $unit->location_id) == $loc->id ? 'selected' : '' }}>
                                    {{ $loc->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Unit Kamar *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $unit->name) }}" required class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                    </div>
                </div>

                <!-- Row 2: Tipe, Kapasitas, & Periode -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- Tipe Kamar (Dinamis + Opsi Tambah Baru) -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="room_type_select" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Tipe Kamar *</label>
                            <button type="button" onclick="toggleCustomType()" id="custom-type-toggle-btn" class="text-[11px] text-blue-600 hover:underline font-bold">
                                + Tipe Baru
                            </button>
                        </div>
                        <select id="room_type_select" onchange="handleRoomTypeChange(this)" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                            @foreach($roomTypes as $type)
                                <option value="{{ $type }}" {{ old('room_type', $unit->room_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                            <option value="__custom__">+ Tambah Tipe Kustom...</option>
                        </select>
                        <input type="text" 
                               name="room_type" 
                               id="room_type_input" 
                               value="{{ old('room_type', $unit->room_type) }}" 
                               required 
                               placeholder="Ketik tipe kamar baru..." 
                               class="w-full px-4 py-3 rounded-xl glass-input text-sm mt-2 hidden border-blue-400">
                    </div>

                    <div>
                        <label for="max_guests" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Maks. Kapasitas (Tamu) *</label>
                        <input type="number" name="max_guests" id="max_guests" value="{{ old('max_guests', $unit->max_guests) }}" min="1" required class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                    </div>

                    <!-- Periode Tarif (Dinamis + Opsi Tambah Baru) -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="rental_period_select" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Periode Tarif *</label>
                            <button type="button" onclick="toggleCustomPeriod()" id="custom-period-toggle-btn" class="text-[11px] text-blue-600 hover:underline font-bold">
                                + Periode Baru
                            </button>
                        </div>
                        <select id="rental_period_select" onchange="handleRentalPeriodChange(this)" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                            @foreach($rentalPeriods as $period)
                                <option value="{{ $period }}" {{ old('rental_period', $unit->rental_period) == $period ? 'selected' : '' }}>Per {{ $period }}</option>
                            @endforeach
                            <option value="__custom__">+ Tambah Periode Kustom...</option>
                        </select>
                        <input type="text" 
                               name="rental_period" 
                               id="rental_period_input" 
                               value="{{ old('rental_period', $unit->rental_period) }}" 
                               required 
                               placeholder="e.g. 3 Hari, Semester, Tahun" 
                               class="w-full px-4 py-3 rounded-xl glass-input text-sm mt-2 hidden border-blue-400">
                    </div>
                </div>

                <!-- Upload File Foto Kamar & Galeri Slider -->
                <div class="p-5 rounded-2xl bg-blue-50/60 border border-blue-200/80 space-y-6">
                    <div class="flex items-center justify-between border-b border-blue-200/60 pb-3">
                        <div>
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Kelola Foto Utama & Galeri Slider Kamar
                            </h4>
                            <span class="text-xs text-slate-500">Maksimal 5MB per file • Format: JPG, JPEG, PNG, HEIC, WEBP</span>
                        </div>
                    </div>

                    <!-- 1. Foto Utama (Sampul Depan) -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            1. Foto Utama (Sampul Depan)
                        </label>
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <!-- Current & Preview Box -->
                            <div class="w-32 h-24 rounded-xl border border-slate-300 bg-white overflow-hidden shrink-0 shadow-sm relative group">
                                <img id="image-preview" src="{{ $unit->image_url }}" alt="Foto Kamar" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-slate-900/40 text-white text-[10px] font-bold flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                    Foto Saat Ini
                                </div>
                            </div>

                            <!-- File Input -->
                            <div class="flex-1 w-full">
                                <input type="file" 
                                       name="image" 
                                       id="image-file" 
                                       accept=".jpg,.jpeg,.png,.heic,.heif,.webp" 
                                       onchange="previewImage(event)" 
                                       class="block w-full text-xs text-slate-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer cursor-pointer border border-slate-300 rounded-xl bg-white p-2">
                                <span class="text-[11px] text-slate-400 mt-1 block">Biarkan kosong jika tidak ingin mengubah foto sampul saat ini.</span>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Foto Galeri Slider Saat Ini & Hapus Foto -->
                    <div class="pt-4 border-t border-blue-200/60 space-y-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                    2. Foto Galeri Slider Saat Ini
                                </label>
                                <span class="text-xs text-slate-500">Foto yang sedang aktif tampil di slider thumbnail kartu kamar.</span>
                            </div>
                            <span class="text-xs font-bold text-blue-700 bg-blue-100/80 px-2.5 py-0.5 rounded-full">
                                {{ is_array($unit->gallery_images) ? count($unit->gallery_images) : 0 }} Foto Galeri
                            </span>
                        </div>

                        @if(is_array($unit->gallery_images) && count($unit->gallery_images) > 0)
                            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3" id="existing-gallery-grid">
                                @foreach($unit->gallery_images as $gIndex => $gPath)
                                    @php
                                        $gUrl = str_starts_with($gPath, 'http') ? $gPath : asset('storage/' . $gPath);
                                    @endphp
                                    <div class="existing-gallery-item relative rounded-xl border border-slate-200 bg-white overflow-hidden shadow-sm group" data-path="{{ $gPath }}">
                                        <div class="aspect-video w-full overflow-hidden">
                                            <img src="{{ $gUrl }}" alt="Galeri #{{ $gIndex + 1 }}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="p-1.5 bg-slate-50 flex items-center justify-between text-[10px]">
                                            <span class="font-bold text-slate-500">#{{ $gIndex + 1 }}</span>
                                            <button type="button" 
                                                    onclick="toggleDeleteGallery(this, '{{ addslashes($gPath) }}')" 
                                                    class="delete-btn text-rose-600 hover:text-rose-800 font-bold hover:underline">
                                                ✕ Hapus
                                            </button>
                                        </div>
                                        <div class="deleted-overlay absolute inset-0 bg-rose-600/85 backdrop-blur-[2px] text-white flex flex-col items-center justify-center p-2 hidden">
                                            <span class="text-[10px] font-extrabold uppercase tracking-wider mb-1">Akan Dihapus</span>
                                            <button type="button" onclick="cancelDeleteGallery(this, '{{ addslashes($gPath) }}')" class="px-2 py-0.5 bg-white text-rose-700 rounded text-[10px] font-bold shadow-sm">
                                                Batal
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Container for hidden deleted_gallery_images inputs -->
                            <div id="deleted-gallery-inputs"></div>
                        @else
                            <p class="text-xs text-slate-400 italic bg-white/70 p-3 rounded-xl border border-dashed border-slate-300 text-center">
                                Belum ada foto galeri tambahan untuk unit ini. Unggah di bawah untuk menambahkan slider.
                            </p>
                        @endif
                    </div>

                    <!-- 3. Unggah Tambahan Foto Galeri Baru -->
                    <div class="pt-4 border-t border-blue-200/60">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            3. Tambah Foto Galeri Baru (Bisa Banyak File)
                        </label>
                        <p class="text-xs text-slate-500 mb-2">
                            Pilih beberapa foto baru sekaligus untuk ditambahkan ke slider. Tekan tombol <kbd class="px-1.5 py-0.5 rounded bg-slate-200 text-slate-700 font-mono text-[10px]">Ctrl</kbd> atau <kbd class="px-1.5 py-0.5 rounded bg-slate-200 text-slate-700 font-mono text-[10px]">Shift</kbd> saat memilih file.
                        </p>

                        <input type="file" 
                               name="gallery_images[]" 
                               id="gallery-files" 
                               multiple 
                               accept=".jpg,.jpeg,.png,.heic,.heif,.webp" 
                               onchange="previewGalleryImages(event)" 
                               class="block w-full text-xs text-slate-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-700 file:text-white hover:file:bg-slate-800 file:cursor-pointer cursor-pointer border border-slate-300 rounded-xl bg-white p-2">

                        <!-- Multi-preview Grid -->
                        <div id="gallery-preview-container" class="mt-3 hidden">
                            <span class="text-xs font-bold text-slate-600 block mb-2" id="gallery-count-text">0 foto galeri baru dipilih:</span>
                            <div id="gallery-preview-grid" class="grid grid-cols-3 sm:grid-cols-6 gap-2"></div>
                        </div>
                    </div>
                </div>

                <!-- Pricing & Promo Section -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                        <h4 class="text-xs font-bold text-blue-700 uppercase tracking-wider">Pengaturan Harga Coret & Diskon</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="normal_price_display" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Harga Normal (Dicoret) *</label>
                            <input type="text" 
                                   id="normal_price_display" 
                                   inputmode="numeric"
                                   placeholder="Rp 0"
                                   required 
                                   class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                            <input type="hidden" name="normal_price" id="normal_price" value="{{ old('normal_price', (int)$unit->normal_price) }}">
                            <span class="text-[10px] text-slate-400 mt-1 block">Akan tampil dicoret merah</span>
                        </div>

                        <div>
                            <label for="promo_price_display" class="block text-xs font-bold text-blue-700 uppercase tracking-wider mb-1.5">Harga Promo (Aktif) *</label>
                            <input type="text" 
                                   id="promo_price_display" 
                                   inputmode="numeric"
                                   placeholder="Rp 0"
                                   required 
                                   class="w-full px-4 py-3 rounded-xl glass-input text-sm font-bold text-blue-700">
                            <input type="hidden" name="promo_price" id="promo_price" value="{{ old('promo_price', (int)$unit->promo_price) }}">
                            <span class="text-[10px] text-blue-600 mt-1 block">Tarif yang dibayarkan tamu</span>
                        </div>

                        <div>
                            <label for="promo_badge" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Label Badge Promo</label>
                            <input type="text" name="promo_badge" id="promo_badge" value="{{ old('promo_badge', $unit->promo_badge) }}" placeholder="e.g. Hemat 30%" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                            <span class="text-[10px] text-slate-400 mt-1 block">Muncul di pojok foto</span>
                        </div>
                    </div>

                    <div class="pt-2 border-t border-slate-200/80 flex flex-wrap gap-4 sm:gap-6">
                        <label class="flex items-center gap-2.5 cursor-pointer">
                            <input type="checkbox" name="is_promo_active" value="1" {{ old('is_promo_active', $unit->is_promo_active) ? 'checked' : '' }} class="rounded bg-white border-slate-300 text-blue-600 focus:ring-0">
                            <span class="text-xs font-bold text-emerald-700">Aktifkan promo harga coret</span>
                        </label>

                        <label class="flex items-center gap-2.5 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $unit->is_featured) ? 'checked' : '' }} class="rounded bg-white border-slate-300 text-amber-500 focus:ring-0">
                            <span class="text-xs font-bold text-amber-800">Jadikan Pilihan Favorit Tamu (Hero Card)</span>
                        </label>

                        <label class="flex items-center gap-2.5 cursor-pointer">
                            <input type="checkbox" name="is_available" value="1" {{ old('is_available', $unit->is_available) ? 'checked' : '' }} class="rounded bg-white border-slate-300 text-blue-600 focus:ring-0">
                            <span class="text-xs font-bold text-slate-700">Kamar Tersedia untuk Disewa</span>
                        </label>
                    </div>
                </div>

                <!-- Fasilitas & Deskripsi -->
                <div class="space-y-4">
                    @php
                        $facilitiesString = is_array($unit->facilities_list) ? implode(', ', $unit->facilities_list) : '';
                    @endphp
                    <div>
                        <label for="facilities_input" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Fasilitas Kamar (Pisahkan dengan koma)</label>
                        <input type="text" name="facilities_input" id="facilities_input" value="{{ old('facilities_input', $facilitiesString) }}" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                    </div>

                    <div>
                        <label for="description" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Deskripsi Kamar</label>
                        <textarea name="description" id="description" rows="3" class="w-full px-4 py-3 rounded-xl glass-input text-sm">{{ old('description', $unit->description) }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200">
                    <a href="{{ route('admin.units.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs tracking-wider shadow-md shadow-blue-500/25 transition">
                        PERBARUI UNIT & FOTO
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const previewImg = document.getElementById('image-preview');
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    function previewGalleryImages(event) {
        const files = event.target.files;
        const container = document.getElementById('gallery-preview-container');
        const grid = document.getElementById('gallery-preview-grid');
        const countText = document.getElementById('gallery-count-text');

        grid.innerHTML = '';
        if (!files || files.length === 0) {
            container.classList.add('hidden');
            return;
        }

        container.classList.remove('hidden');
        countText.textContent = `${files.length} foto baru siap ditambahkan ke galeri:`;

        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const item = document.createElement('div');
                item.className = 'relative rounded-xl border border-slate-200 bg-white overflow-hidden aspect-video shadow-sm';
                item.innerHTML = `
                    <img src="${e.target.result}" alt="Foto Baru ${index + 1}" class="w-full h-full object-cover">
                    <span class="absolute bottom-1 right-1 px-1.5 py-0.5 rounded bg-blue-600 text-[9px] font-bold text-white">+Baru</span>
                `;
                grid.appendChild(item);
            };
            reader.readAsDataURL(file);
        });
    }

    function toggleDeleteGallery(btn, path) {
        const item = btn.closest('.existing-gallery-item');
        const overlay = item.querySelector('.deleted-overlay');
        overlay.classList.remove('hidden');

        const inputsContainer = document.getElementById('deleted-gallery-inputs');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'deleted_gallery_images[]';
        input.value = path;
        input.id = 'del-' + btoa(path).replace(/[^a-zA-Z0-9]/g, '');
        inputsContainer.appendChild(input);
    }

    function cancelDeleteGallery(btn, path) {
        const item = btn.closest('.existing-gallery-item');
        const overlay = item.querySelector('.deleted-overlay');
        overlay.classList.add('hidden');

        const inputId = 'del-' + btoa(path).replace(/[^a-zA-Z0-9]/g, '');
        const input = document.getElementById(inputId);
        if (input) input.remove();
    }

    // Helper Rupiah Formatter
    function formatRupiahString(value) {
        if (!value && value !== 0) return '';
        const numberString = value.toString().replace(/[^0-9]/g, '');
        if (!numberString) return '';
        const sisa = numberString.length % 3;
        let rupiah = numberString.substr(0, sisa);
        const ribuan = numberString.substr(sisa).match(/\d{3}/g);
        
        if (ribuan) {
            const separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return 'Rp ' + rupiah;
    }

    function initRupiahInput(displayId, hiddenId) {
        const displayEl = document.getElementById(displayId);
        const hiddenEl = document.getElementById(hiddenId);
        if (!displayEl || !hiddenEl) return;

        // Inisialisasi awal nilai dari database
        if (hiddenEl.value) {
            displayEl.value = formatRupiahString(hiddenEl.value);
        }

        displayEl.addEventListener('input', function(e) {
            const rawValue = this.value.replace(/[^0-9]/g, '');
            hiddenEl.value = rawValue ? parseInt(rawValue, 10) : '';
            this.value = rawValue ? formatRupiahString(rawValue) : '';
        });

        displayEl.addEventListener('blur', function() {
            if (!this.value.trim()) {
                hiddenEl.value = '0';
                this.value = formatRupiahString('0');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        initRupiahInput('normal_price_display', 'normal_price');
        initRupiahInput('promo_price_display', 'promo_price');
    });

    // Dynamic Room Type Handlers
    function handleRoomTypeChange(selectEl) {
        const inputEl = document.getElementById('room_type_input');
        const toggleBtn = document.getElementById('custom-type-toggle-btn');
        if (selectEl.value === '__custom__') {
            inputEl.classList.remove('hidden');
            inputEl.value = '';
            inputEl.focus();
            toggleBtn.innerText = 'Batal';
        } else {
            inputEl.classList.add('hidden');
            inputEl.value = selectEl.value;
            toggleBtn.innerText = '+ Tipe Baru';
        }
    }

    function toggleCustomType() {
        const selectEl = document.getElementById('room_type_select');
        const inputEl = document.getElementById('room_type_input');
        const toggleBtn = document.getElementById('custom-type-toggle-btn');

        if (inputEl.classList.contains('hidden')) {
            selectEl.value = '__custom__';
            inputEl.classList.remove('hidden');
            inputEl.value = '';
            inputEl.focus();
            toggleBtn.innerText = 'Batal';
        } else {
            selectEl.selectedIndex = 0;
            inputEl.classList.add('hidden');
            inputEl.value = selectEl.value;
            toggleBtn.innerText = '+ Tipe Baru';
        }
    }

    // Dynamic Rental Period Handlers
    function handleRentalPeriodChange(selectEl) {
        const inputEl = document.getElementById('rental_period_input');
        const toggleBtn = document.getElementById('custom-period-toggle-btn');
        if (selectEl.value === '__custom__') {
            inputEl.classList.remove('hidden');
            inputEl.value = '';
            inputEl.focus();
            toggleBtn.innerText = 'Batal';
        } else {
            inputEl.classList.add('hidden');
            inputEl.value = selectEl.value;
            toggleBtn.innerText = '+ Periode Baru';
        }
    }

    function toggleCustomPeriod() {
        const selectEl = document.getElementById('rental_period_select');
        const inputEl = document.getElementById('rental_period_input');
        const toggleBtn = document.getElementById('custom-period-toggle-btn');

        if (inputEl.classList.contains('hidden')) {
            selectEl.value = '__custom__';
            inputEl.classList.remove('hidden');
            inputEl.value = '';
            inputEl.focus();
            toggleBtn.innerText = 'Batal';
        } else {
            selectEl.selectedIndex = 0;
            inputEl.classList.add('hidden');
            inputEl.value = selectEl.value;
            toggleBtn.innerText = '+ Periode Baru';
        }
    }
</script>
@endpush
