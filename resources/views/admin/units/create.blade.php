@extends('admin.layout')

@section('title', 'Tambah Unit Kamar')
@section('page_title', 'Tambah Unit Kamar Baru')

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('admin.units.index') }}" class="text-xs text-slate-500 hover:text-blue-600 transition flex items-center gap-1.5 font-semibold">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Kamar
            </a>
        </div>

        <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-8 space-y-6 shadow-sm">
            <div class="border-b border-slate-200/80 pb-4">
                <h3 class="text-base sm:text-lg font-bold text-slate-900">Informasi Unit & Upload Foto</h3>
                <p class="text-xs text-slate-500 mt-1">Lengkapi data kamar, upload file foto asli (maks. 5MB), dan atur harga promo.</p>
            </div>

            <!-- Form dengan multipart/form-data untuk upload file gambar -->
            <form method="POST" action="{{ route('admin.units.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Row 1: Lokasi & Nama Unit -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="location_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Lokasi Gedung Apartemen *</label>
                        <select name="location_id" id="location_id" required class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                            <option value="">Pilih Lokasi Apartemen...</option>
                            @foreach($locations as $loc)
                                <option value="{{ $loc->id }}" {{ old('location_id') == $loc->id ? 'selected' : '' }}>
                                    {{ $loc->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Unit Kamar *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g. Studio Premium Sea View" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
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
                                <option value="{{ $type }}" {{ old('room_type', 'Studio') == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                            <option value="__custom__">+ Tambah Tipe Kustom...</option>
                        </select>
                        <input type="text" 
                               name="room_type" 
                               id="room_type_input" 
                               value="{{ old('room_type', 'Studio') }}" 
                               required 
                               placeholder="Ketik tipe kamar baru..." 
                               class="w-full px-4 py-3 rounded-xl glass-input text-sm mt-2 hidden border-blue-400">
                    </div>

                    <div>
                        <label for="max_guests" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Maks. Kapasitas (Tamu) *</label>
                        <input type="number" name="max_guests" id="max_guests" value="{{ old('max_guests', 2) }}" min="1" required class="w-full px-4 py-3 rounded-xl glass-input text-sm">
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
                                <option value="{{ $period }}" {{ old('rental_period', 'Malam') == $period ? 'selected' : '' }}>Per {{ $period }}</option>
                            @endforeach
                            <option value="__custom__">+ Tambah Periode Kustom...</option>
                        </select>
                        <input type="text" 
                               name="rental_period" 
                               id="rental_period_input" 
                               value="{{ old('rental_period', 'Malam') }}" 
                               required 
                               placeholder="e.g. 3 Hari, Semester, Tahun" 
                               class="w-full px-4 py-3 rounded-xl glass-input text-sm mt-2 hidden border-blue-400">
                    </div>
                </div>

                <!-- Upload Foto Kamar & Galeri Slider -->
                <div class="p-5 rounded-2xl bg-blue-50/60 border border-blue-200/80 space-y-5">
                    <div class="flex items-center justify-between border-b border-blue-200/60 pb-3">
                        <div>
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Foto Utama & Galeri Slider Kamar
                            </h4>
                            <span class="text-xs text-slate-500">Maksimal 5MB per file • Format: JPG, JPEG, PNG, HEIC, WEBP</span>
                        </div>
                    </div>

                    <!-- 1. Foto Utama (Cover) -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            1. Foto Utama (Sampul Depan) *
                        </label>
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <div class="flex-1 w-full">
                                <input type="file" 
                                       name="image" 
                                       id="image-file" 
                                       accept=".jpg,.jpeg,.png,.heic,.heif,.webp" 
                                       onchange="previewImage(event)" 
                                       class="block w-full text-xs text-slate-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer cursor-pointer border border-slate-300 rounded-xl bg-white p-2">
                                <span class="text-[11px] text-slate-400 mt-1 block">Foto ini akan menjadi thumbnail slide pertama di kartu kamar.</span>
                            </div>

                            <!-- Live Preview Box -->
                            <div id="preview-wrapper" class="w-28 h-20 rounded-xl border border-slate-300 bg-white overflow-hidden flex items-center justify-center shrink-0 shadow-sm">
                                <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                                <span id="preview-placeholder" class="text-[10px] text-slate-400 text-center px-1">Preview Sampul</span>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Foto Galeri Tambahan (Slider) -->
                    <div class="pt-3 border-t border-blue-200/60">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            2. Foto Galeri Tambahan (Slider Carousel)
                        </label>
                        <p class="text-xs text-slate-500 mb-2">
                            Pilih beberapa foto sekaligus untuk slider thumbnail kartu kamar. Tekan tombol <kbd class="px-1.5 py-0.5 rounded bg-slate-200 text-slate-700 font-mono text-[10px]">Ctrl</kbd> atau <kbd class="px-1.5 py-0.5 rounded bg-slate-200 text-slate-700 font-mono text-[10px]">Shift</kbd> saat memilih file.
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
                            <span class="text-xs font-bold text-slate-600 block mb-2" id="gallery-count-text">0 foto galeri dipilih:</span>
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
                            <input type="hidden" name="normal_price" id="normal_price" value="{{ old('normal_price', 500000) }}">
                            <span class="text-[10px] text-slate-400 mt-1 block">Akan tampil dicoret merah di website</span>
                        </div>

                        <div>
                            <label for="promo_price_display" class="block text-xs font-bold text-blue-700 uppercase tracking-wider mb-1.5">Harga Promo (Aktif) *</label>
                            <input type="text" 
                                   id="promo_price_display" 
                                   inputmode="numeric"
                                   placeholder="Rp 0"
                                   required 
                                   class="w-full px-4 py-3 rounded-xl glass-input text-sm font-bold text-blue-700">
                            <input type="hidden" name="promo_price" id="promo_price" value="{{ old('promo_price', 350000) }}">
                            <span class="text-[10px] text-blue-600 mt-1 block">Tarif yang dibayarkan tamu</span>
                        </div>

                        <div>
                            <label for="promo_badge" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Label Badge Promo</label>
                            <input type="text" name="promo_badge" id="promo_badge" value="{{ old('promo_badge', 'Promo Spesial') }}" placeholder="e.g. Hemat 30%, Best Seller" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                            <span class="text-[10px] text-slate-400 mt-1 block">Muncul di pojok foto kamar</span>
                        </div>
                    </div>

                    <div class="pt-2 border-t border-slate-200/80 flex flex-wrap gap-4 sm:gap-6">
                        <label class="flex items-center gap-2.5 cursor-pointer">
                            <input type="checkbox" name="is_promo_active" value="1" {{ old('is_promo_active', true) ? 'checked' : '' }} class="rounded bg-white border-slate-300 text-blue-600 focus:ring-0">
                            <span class="text-xs font-bold text-emerald-700">Aktifkan promo harga coret</span>
                        </label>

                        <label class="flex items-center gap-2.5 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded bg-white border-slate-300 text-amber-500 focus:ring-0">
                            <span class="text-xs font-bold text-amber-800">Jadikan Pilihan Favorit Tamu (Hero Card)</span>
                        </label>

                        <label class="flex items-center gap-2.5 cursor-pointer">
                            <input type="checkbox" name="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }} class="rounded bg-white border-slate-300 text-blue-600 focus:ring-0">
                            <span class="text-xs font-bold text-slate-700">Kamar Tersedia untuk Disewa</span>
                        </label>
                    </div>
                </div>

                <!-- Fasilitas & Deskripsi -->
                <div class="space-y-4">
                    <div>
                        <label for="facilities_input" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Fasilitas Kamar (Pisahkan dengan koma)</label>
                        <input type="text" name="facilities_input" id="facilities_input" value="{{ old('facilities_input', 'AC Dingin, Smart TV 43 Netflix, Free WiFi, Water Heater, Balkon, Kitchen Set, Queen Bed') }}" placeholder="AC, Smart TV, WiFi, Water Heater, Kulkas" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                    </div>

                    <div>
                        <label for="description" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Deskripsi Lengkap Kamar</label>
                        <textarea name="description" id="description" rows="3" placeholder="Jelaskan kenyamanan unit, pemandangan luar, dan kelengkapan fasilitas..." class="w-full px-4 py-3 rounded-xl glass-input text-sm">{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200">
                    <a href="{{ route('admin.units.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs tracking-wider shadow-md shadow-blue-500/25 transition">
                        SIMPAN UNIT & FOTO
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
            const placeholder = document.getElementById('preview-placeholder');
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                placeholder.classList.add('hidden');
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
        countText.textContent = `${files.length} foto galeri dipilih untuk slider:`;

        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const item = document.createElement('div');
                item.className = 'relative rounded-xl border border-slate-200 bg-white overflow-hidden aspect-video shadow-sm';
                item.innerHTML = `
                    <img src="${e.target.result}" alt="Galeri ${index + 1}" class="w-full h-full object-cover">
                    <span class="absolute bottom-1 right-1 px-1.5 py-0.5 rounded bg-black/60 text-[9px] font-bold text-white">#${index + 1}</span>
                `;
                grid.appendChild(item);
            };
            reader.readAsDataURL(file);
        });
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

        // Inisialisasi awal nilai
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
