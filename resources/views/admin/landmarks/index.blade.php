@extends('admin.layout')

@section('title', 'Kelola Akses & Landmark')
@section('page_title', 'Kelola Akses & Landmark Makassar')

@section('content')

    <div class="space-y-6">
        <!-- Tab Pemilihan Lokasi Apartemen -->
        <div class="glass-card rounded-2xl border border-slate-200/90 p-4 sm:p-5 flex flex-wrap items-center justify-between gap-4 shadow-sm">
            <div>
                <h2 class="text-sm sm:text-base font-bold text-slate-900">Pilih Lokasi Apartemen</h2>
                <p class="text-xs text-slate-500">Kelola daftar landmark dan estimasi waktu tempuh untuk setiap apartemen</p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                @foreach($locations as $loc)
                    <a href="{{ route('admin.landmarks.index', ['location_id' => $loc->id]) }}" 
                       class="px-3.5 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ $selectedLocationId == $loc->id ? 'bg-red-600 text-white shadow-md shadow-red-500/25' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                        <span>📍</span>
                        <span>{{ $loc->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Form Tambah Landmark Baru (Kiri) -->
            <div class="lg:col-span-1">
                <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-6 space-y-4 shadow-sm lg:sticky lg:top-24">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                        <div class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center font-bold text-sm">
                            +
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Tambah Landmark Baru</h3>
                            <p class="text-[11px] text-slate-500">Tampil di card 'Dekat dengan Berbagai Landmark'</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.landmarks.store') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label for="location_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Lokasi Apartemen *</label>
                            <select name="location_id" id="location_id" required class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs font-medium">
                                @foreach($locations as $loc)
                                    <option value="{{ $loc->id }}" {{ $selectedLocationId == $loc->id ? 'selected' : '' }}>
                                        {{ $loc->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Landmark / Tempat *</label>
                            <input type="text" name="name" id="name" required placeholder="e.g. Masjid 99 Kubah Makassar" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                        </div>

                        <div>
                            <label for="distance_time" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Estimasi Waktu Tempuh *</label>
                            <input type="text" name="distance_time" id="distance_time" required placeholder="e.g. 1 Menit, 25 Menit (via Tol)" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs font-mono font-semibold text-red-600">
                            <span class="text-[10px] text-slate-400 mt-1 block">Teks waktu tempuh yang dicetak tebal</span>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Keterangan Tambahan</label>
                                <input type="text" name="notes" id="notes" placeholder="Opsional" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                            </div>
                            <div>
                                <label for="sort_order" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Urutan Tampil</label>
                                <input type="number" name="sort_order" id="sort_order" value="{{ $landmarks->count() + 1 }}" min="1" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                            </div>
                        </div>

                        <div class="pt-1">
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" checked class="rounded bg-white border-slate-300 text-red-600 focus:ring-0">
                                <span class="text-xs font-bold text-emerald-700">Tampilkan di Homepage</span>
                            </label>
                        </div>

                        <button type="submit" class="w-full py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs shadow-md shadow-red-500/20 transition flex items-center justify-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            SIMPAN LANDMARK
                        </button>
                    </form>
                </div>
            </div>

            <!-- Daftar Landmark Yang Ada (Kanan) -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">
                            Daftar Landmark - {{ $locations->firstWhere('id', $selectedLocationId)?->name ?? 'Semua Lokasi' }} ({{ $landmarks->count() }})
                        </h3>
                        <p class="text-xs text-slate-500">Semua item aktif akan langsung diperbarui pada section akses strategis homepage.</p>
                    </div>
                </div>

                <div class="space-y-3">
                    @forelse($landmarks as $item)
                        <div class="glass-card rounded-2xl border border-slate-200/90 p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4 shadow-sm hover:border-red-200 transition">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="w-6 h-6 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-[11px] font-bold shrink-0">
                                    #{{ $item->sort_order }}
                                </span>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h4 class="text-sm font-bold text-slate-900 truncate">{{ $item->name }}</h4>
                                        <span class="px-2.5 py-0.5 rounded-md bg-red-50 text-red-700 text-xs font-mono font-bold border border-red-200/80">
                                            {{ $item->distance_time }}
                                        </span>
                                    </div>
                                    <p class="text-[11px] text-slate-400 mt-0.5 flex items-center gap-2">
                                        <span>Lokasi: <strong class="text-slate-600">{{ $item->location->name }}</strong></span>
                                        @if($item->notes)
                                            <span>• {{ $item->notes }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Icon-Only Action Buttons & Status -->
                            <div class="flex items-center gap-1.5 shrink-0">
                                @if($item->is_active)
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold border border-emerald-200">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-[10px]">Nonaktif</span>
                                @endif

                                <!-- Icon-Only Edit Button -->
                                <button type="button" 
                                        onclick="openEditLandmarkModal({{ json_encode($item) }})"
                                        class="p-2 rounded-xl bg-red-50 text-red-700 hover:bg-red-600 hover:text-white border border-red-200 transition shadow-sm inline-flex items-center justify-center"
                                        title="Edit Landmark">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>

                                <!-- Icon-Only Delete Button -->
                                <button type="button" 
                                        onclick="openDeleteLandmarkModal({{ $item->id }}, '{{ addslashes($item->name) }}')"
                                        class="p-2 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white border border-rose-200 transition shadow-sm inline-flex items-center justify-center"
                                        title="Hapus Landmark">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>

                                <form id="delete-landmark-form-{{ $item->id }}" method="POST" action="{{ route('admin.landmarks.destroy', $item->id) }}" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="glass-card rounded-2xl border border-slate-200 p-8 text-center text-slate-400">
                            Belum ada landmark untuk lokasi ini. Gunakan formulir di sebelah kiri untuk menambahkan.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- POPUP MODAL EDIT LANDMARK -->
    <div id="edit-landmark-modal" class="fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl border border-red-200 w-full max-w-lg max-h-[90vh] flex flex-col shadow-2xl">
            <div class="flex items-center justify-between px-6 pt-5 pb-3 border-b border-slate-100 shrink-0">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center font-bold text-sm">
                        ✎
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Edit Akses & Landmark</h3>
                        <p class="text-xs text-slate-500">Perbarui nama tempat & estimasi waktu</p>
                    </div>
                </div>
                <button type="button" onclick="closeEditLandmarkModal()" class="text-slate-400 hover:text-slate-700">✕</button>
            </div>

            <form id="edit-landmark-form" method="POST" action="" class="overflow-y-auto flex-1 px-6 py-4 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="edit-location-id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Lokasi Apartemen *</label>
                    <select name="location_id" id="edit-location-id" required class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs font-medium">
                        @foreach($locations as $loc)
                            <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="edit-name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Landmark *</label>
                    <input type="text" name="name" id="edit-name" required class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                </div>

                <div>
                    <label for="edit-distance-time" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Estimasi Waktu Tempuh *</label>
                    <input type="text" name="distance_time" id="edit-distance-time" required class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs font-mono font-semibold text-red-600">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="edit-notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Keterangan Tambahan</label>
                        <input type="text" name="notes" id="edit-notes" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                    </div>
                    <div>
                        <label for="edit-sort-order" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Urutan Tampil</label>
                        <input type="number" name="sort_order" id="edit-sort-order" min="1" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                    </div>
                </div>

                <div class="pt-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" id="edit-is-active" value="1" class="rounded bg-white border-slate-300 text-red-600 focus:ring-0">
                        <span class="text-xs font-bold text-emerald-700">Tampilkan di Homepage</span>
                    </label>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <button type="button" onclick="closeEditLandmarkModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold transition shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- POPUP MODAL HAPUS LANDMARK -->
    <div id="delete-landmark-modal" class="fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl border border-rose-200 p-6 max-w-sm w-full space-y-4 shadow-2xl">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 border border-rose-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">Konfirmasi Hapus</h3>
                    <p class="text-xs text-slate-500">Tindakan ini permanen</p>
                </div>
            </div>

            <p class="text-xs text-slate-600 leading-relaxed">
                Apakah Anda yakin ingin menghapus landmark <strong id="delete-landmark-name" class="text-slate-900 font-bold"></strong>?
            </p>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeDeleteLandmarkModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                    Batal
                </button>
                <button type="button" id="delete-landmark-confirm-btn" class="px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold transition shadow-sm">
                    Ya, Hapus Landmark
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function openEditLandmarkModal(item) {
        document.getElementById('edit-landmark-form').action = `/admin/landmarks/${item.id}`;
        document.getElementById('edit-location-id').value = item.location_id;
        document.getElementById('edit-name').value = item.name;
        document.getElementById('edit-distance-time').value = item.distance_time;
        document.getElementById('edit-notes').value = item.notes || '';
        document.getElementById('edit-sort-order').value = item.sort_order || 1;
        document.getElementById('edit-is-active').checked = item.is_active;
        document.getElementById('edit-landmark-modal').classList.remove('hidden');
    }

    function closeEditLandmarkModal() {
        document.getElementById('edit-landmark-modal').classList.add('hidden');
    }

    let activeDeleteLandmarkId = null;
    function openDeleteLandmarkModal(id, name) {
        activeDeleteLandmarkId = id;
        document.getElementById('delete-landmark-name').innerText = '"' + name + '"';
        document.getElementById('delete-landmark-modal').classList.remove('hidden');
    }

    function closeDeleteLandmarkModal() {
        document.getElementById('delete-landmark-modal').classList.add('hidden');
        activeDeleteLandmarkId = null;
    }

    document.getElementById('delete-landmark-confirm-btn').addEventListener('click', function() {
        if (activeDeleteLandmarkId) {
            document.getElementById('delete-landmark-form-' + activeDeleteLandmarkId).submit();
        }
    });
</script>
@endpush
