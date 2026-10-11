@extends('admin.layout')

@section('title', 'Kelola Kamar & Diskon')
@section('page_title', 'Kelola Unit Kamar')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-4 mb-6">
        <!-- Filter Lokasi -->
        <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto">
            <span class="text-xs text-slate-500 font-semibold">Filter:</span>
            <a href="{{ route('admin.units.index') }}" class="px-3 py-1.5 rounded-xl text-xs {{ !request('location_id') ? 'bg-blue-600 text-white font-bold shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                Semua
            </a>
            @foreach($locations as $loc)
                <a href="{{ route('admin.units.index', ['location_id' => $loc->id]) }}" class="px-3 py-1.5 rounded-xl text-xs {{ request('location_id') == $loc->id ? 'bg-blue-600 text-white font-bold shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                    {{ $loc->name }}
                </a>
            @endforeach
        </div>

        <a href="{{ route('admin.units.create') }}" class="w-full sm:w-auto px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs shadow-md shadow-blue-500/20 transition flex items-center justify-center gap-1.5 shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Unit & Upload Foto
        </a>
    </div>

    <!-- RESPONSIVE CARD GRID (Mobile 1 Kolom, Tablet 2 Kolom, Desktop 3 Kolom) -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-5 mb-8">
        @forelse($units as $unit)
            <div class="bg-white rounded-2xl border border-slate-200/90 p-4 sm:p-5 shadow-sm space-y-3.5 transition hover:border-blue-300 hover:shadow-md flex flex-col justify-between">
                <!-- Top Section: Foto & Identitas Unit -->
                <div class="space-y-3">
                    <div class="flex items-start gap-3.5">
                        <img src="{{ $unit->image_url }}" alt="{{ $unit->name }}" class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl object-cover border border-slate-200 shrink-0 bg-slate-100 shadow-xs">
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between gap-1">
                                <span class="text-[10px] sm:text-xs font-bold text-blue-600 uppercase tracking-wider truncate">{{ $unit->location->name ?? '-' }}</span>
                                @if($unit->is_promo_active)
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] sm:text-xs font-bold shrink-0">Promo Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-[10px] sm:text-xs shrink-0">Normal</span>
                                @endif
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm sm:text-base truncate leading-snug mt-0.5" title="{{ $unit->name }}">{{ $unit->name }}</h4>
                            <div class="text-[11px] sm:text-xs text-slate-500 mt-1 flex items-center gap-1.5 flex-wrap">
                                <span>{{ $unit->room_type }} • {{ $unit->rental_period }}</span>
                                <span>• Maks. {{ $unit->max_guests }} Tamu</span>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Section: Tarif Sewa & Promo Badge -->
                    <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-100">
                        <div>
                            <span class="text-[10px] text-slate-400 block uppercase font-bold tracking-wider">Tarif Sewa</span>
                            <div class="flex items-baseline gap-1.5 mt-0.5">
                                <span class="text-blue-700 font-extrabold text-sm sm:text-base">{{ $unit->formatted_promo_price }}</span>
                                @if($unit->is_promo_active && $unit->normal_price > $unit->promo_price)
                                    <span class="text-[11px] sm:text-xs text-rose-500 line-through">{{ $unit->formatted_normal_price }}</span>
                                @endif
                            </div>
                        </div>
                        @if($unit->promo_badge)
                            <span class="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 text-[10px] sm:text-xs font-bold border border-blue-200 shrink-0">
                                {{ $unit->promo_badge }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Bottom Section: Action Buttons (Hero Favorit, Edit, Hapus) -->
                <div class="flex items-center justify-between gap-2 pt-3 border-t border-slate-100">
                    <!-- Toggle Hero Favorit -->
                    <form method="POST" action="{{ route('admin.units.toggle-featured', $unit->id) }}" class="inline">
                        @csrf
                        <button type="submit" 
                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold transition {{ $unit->is_featured ? 'bg-amber-100 text-amber-800 border border-amber-300 shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 border border-slate-200' }}"
                                title="Klik untuk ubah pilihan favorit tamu di hero">
                            <svg class="w-3.5 h-3.5 {{ $unit->is_featured ? 'text-amber-500 fill-current' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                            <span>{{ $unit->is_featured ? 'Favorit Tamu' : 'Set Favorit' }}</span>
                        </button>
                    </form>

                    <!-- Edit & Delete Buttons -->
                    <div class="flex items-center gap-1.5">
                        <button type="button" 
                                onclick="openEditModal('{{ route('admin.units.edit', $unit->id) }}', '{{ addslashes($unit->name) }}')"
                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white border border-blue-200 transition text-xs font-bold"
                                title="Edit Unit Kamar">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            <span>Edit</span>
                        </button>

                        <button type="button" 
                                onclick="openDeleteModal('delete-form-{{ $unit->id }}', '{{ addslashes($unit->name) }}')"
                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white border border-rose-200 transition text-xs font-bold"
                                title="Hapus Unit Kamar">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            <span>Hapus</span>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl border border-slate-200 p-12 text-center text-slate-400 text-sm">
                Belum ada unit kamar di lokasi ini.
            </div>
        @endforelse
    </div>

    <!-- Hidden Delete Forms for Units -->
    @foreach($units as $unit)
        <form id="delete-form-{{ $unit->id }}" method="POST" action="{{ route('admin.units.destroy', $unit->id) }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    <!-- POPUP MODAL KONFIRMASI EDIT -->
    <div id="edit-modal" class="fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl border border-blue-200 p-6 max-w-sm w-full space-y-4 shadow-2xl">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900">Konfirmasi Edit</h3>
                    <p class="text-xs text-slate-500">Edit data unit kamar</p>
                </div>
            </div>

            <p class="text-xs text-slate-600 leading-relaxed">
                Apakah Anda ingin mengedit data unit kamar <strong id="edit-unit-name" class="text-slate-900 font-bold"></strong>?
            </p>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                    Batal
                </button>
                <a id="edit-confirm-btn" href="#" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition shadow-sm">
                    Lanjutkan Edit
                </a>
            </div>
        </div>
    </div>

    <!-- POPUP MODAL KONFIRMASI HAPUS -->
    <div id="delete-modal" class="fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4 hidden">
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
                Apakah Anda yakin ingin menghapus unit <strong id="delete-unit-name" class="text-slate-900 font-bold"></strong>? Seluruh foto dan data unit ini akan dihapus dari server.
            </p>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                    Batal
                </button>
                <button type="button" id="delete-confirm-btn" class="px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold transition shadow-sm">
                    Ya, Hapus Unit
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Edit Modal Logic
    function openEditModal(url, name) {
        document.getElementById('edit-unit-name').innerText = '"' + name + '"';
        document.getElementById('edit-confirm-btn').href = url;
        document.getElementById('edit-modal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('edit-modal').classList.add('hidden');
    }

    // Delete Modal Logic
    let activeDeleteFormId = null;
    function openDeleteModal(formId, name) {
        activeDeleteFormId = formId;
        document.getElementById('delete-unit-name').innerText = '"' + name + '"';
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('delete-modal').classList.add('hidden');
        activeDeleteFormId = null;
    }

    document.getElementById('delete-confirm-btn').addEventListener('click', function() {
        if (activeDeleteFormId) {
            document.getElementById(activeDeleteFormId).submit();
        }
    });
</script>
@endpush
