@extends('admin.layout')

@section('title', 'Kelola Fasilitas Gedung')
@section('page_title', 'Fasilitas Gedung Apartemen')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8">
        
        <!-- Form Tambah Fasilitas (Left) -->
        <div class="lg:col-span-4">
            <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-6 space-y-4 lg:sticky lg:top-24 shadow-sm bg-white">
                <div class="border-b border-slate-200/80 pb-3">
                    <h3 class="text-base font-bold text-slate-900">+ Tambah Fasilitas Baru</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Lengkapi fasilitas gedung beserta foto opsional.</p>
                </div>

                <form method="POST" action="{{ route('admin.facilities.store') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label for="location_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Pilih Gedung Apartemen *</label>
                        <select name="location_id" id="location_id" required class="w-full px-4 py-2.5 rounded-xl glass-input text-sm">
                            @foreach($locations as $loc)
                                <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Fasilitas *</label>
                        <input type="text" name="name" id="name" placeholder="e.g. Infinity Ocean Pool" required class="w-full px-4 py-2.5 rounded-xl glass-input text-sm">
                    </div>

                    <div>
                        <label for="description" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Keterangan Singkat</label>
                        <textarea name="description" id="description" rows="2" placeholder="Jelaskan fasilitas ini secara menarik..." class="w-full px-4 py-2.5 rounded-xl glass-input text-sm"></textarea>
                    </div>

                    <!-- Input Upload Foto Fasilitas (Opsional Sesuai Permintaan User) -->
                    <div class="p-3.5 rounded-xl bg-red-50/50 border border-red-200/70 space-y-2">
                        <label class="block text-xs font-bold text-slate-800 uppercase tracking-wider">
                            Upload Foto Fasilitas (Opsional)
                        </label>
                        <span class="text-[11px] text-slate-500 block">Maksimal 5MB (JPG, JPEG, PNG, WEBP, HEIC)</span>
                        
                        <input type="file" 
                               name="image" 
                               id="fac-image" 
                               accept=".jpg,.jpeg,.png,.heic,.heif,.webp" 
                               onchange="previewFacilityImage(event)" 
                               class="block w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-red-600 file:text-white hover:file:bg-red-700 file:cursor-pointer cursor-pointer border border-slate-300 rounded-xl bg-white p-1.5">
                        
                        <!-- Preview Box -->
                        <div id="fac-preview-box" class="h-24 w-full rounded-lg border border-slate-300 bg-white overflow-hidden hidden">
                            <img id="fac-preview-img" src="#" alt="Preview Foto Fasilitas" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs tracking-wider shadow-md shadow-red-500/20 transition">
                        SIMPAN FASILITAS
                    </button>
                </form>
            </div>
        </div>

        <!-- Daftar Fasilitas (Right) -->
        <div class="lg:col-span-8 space-y-6">
            @foreach($locations as $loc)
                <div class="glass-card rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm bg-white">
                    <div class="p-4 sm:p-5 border-b border-slate-200/80 flex items-center justify-between">
                        <div>
                            <h3 class="text-base font-bold text-slate-900">{{ $loc->name }}</h3>
                            <span class="text-xs text-red-600">{{ $loc->tagline }}</span>
                        </div>
                        <span class="px-2.5 py-1 rounded-lg bg-red-50 text-red-700 text-xs font-bold border border-red-200">
                            {{ $loc->facilities->count() }} Fasilitas
                        </span>
                    </div>

                    <div class="p-4 grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                        @forelse($loc->facilities as $facility)
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70 flex flex-col justify-between gap-3">
                                <div class="space-y-2">
                                    <!-- Jika fasilitas memiliki gambar upload -->
                                    @if($facility->image_url)
                                        <div class="h-32 w-full rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                                            <img src="{{ $facility->image_url }}" alt="{{ $facility->name }}" class="w-full h-full object-cover">
                                        </div>
                                    @endif

                                    <div>
                                        <h4 class="font-bold text-slate-900 text-sm">{{ $facility->name }}</h4>
                                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">{{ $facility->description }}</p>
                                    </div>
                                </div>
                                
                                <!-- Icon-Only Action Buttons with Popup Modal -->
                                <div class="flex items-center justify-end gap-1.5 pt-2 border-t border-slate-200/60">
                                    <!-- Icon-Only Delete Button -->
                                    <button type="button" 
                                            onclick="openDeleteFacilityModal('del-fac-{{ $facility->id }}', '{{ addslashes($facility->name) }}')"
                                            class="p-2 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white border border-rose-200 transition shadow-sm inline-flex items-center justify-center" 
                                            title="Hapus Fasilitas">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>

                                    <form id="del-fac-{{ $facility->id }}" method="POST" action="{{ route('admin.facilities.destroy', $facility->id) }}" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-2 text-center py-6 text-slate-400 text-xs">
                                Belum ada fasilitas terdaftar di lokasi ini.
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <!-- POPUP MODAL KONFIRMASI HAPUS FASILITAS -->
    <div id="delete-facility-modal" class="fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl border border-rose-200 p-6 max-w-sm w-full space-y-4 shadow-2xl">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 border border-rose-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">Hapus Fasilitas</h3>
                    <p class="text-xs text-slate-500">Konfirmasi tindakan</p>
                </div>
            </div>

            <p class="text-xs text-slate-600 leading-relaxed">
                Apakah Anda yakin ingin menghapus fasilitas <strong id="delete-fac-name" class="text-slate-900 font-bold"></strong>?
            </p>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeDeleteFacilityModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                    Batal
                </button>
                <button type="button" id="confirm-del-fac-btn" class="px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold transition shadow-sm">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Live Preview Image for Facility
    function previewFacilityImage(event) {
        const file = event.target.files[0];
        if (file) {
            const previewBox = document.getElementById('fac-preview-box');
            const previewImg = document.getElementById('fac-preview-img');
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewBox.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    // Modal Delete Facility
    let activeFacFormId = null;
    function openDeleteFacilityModal(formId, name) {
        activeFacFormId = formId;
        document.getElementById('delete-fac-name').innerText = '"' + name + '"';
        document.getElementById('delete-facility-modal').classList.remove('hidden');
    }

    function closeDeleteFacilityModal() {
        document.getElementById('delete-facility-modal').classList.add('hidden');
        activeFacFormId = null;
    }

    document.getElementById('confirm-del-fac-btn').addEventListener('click', function() {
        if (activeFacFormId) {
            document.getElementById(activeFacFormId).submit();
        }
    });
</script>
@endpush
