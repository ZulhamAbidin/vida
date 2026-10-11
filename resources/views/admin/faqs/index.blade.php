@extends('admin.layout')

@section('title', 'Kelola Tanya Jawab (FAQ)')
@section('page_title', 'Kelola Tanya Jawab (FAQ)')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Form Tambah FAQ Baru (Kiri) -->
        <div class="lg:col-span-1">
            <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-6 space-y-4 shadow-sm lg:sticky lg:top-24">
                <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-sm">
                        +
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Tambah Pertanyaan Baru</h3>
                        <p class="text-[11px] text-slate-500">FAQ akan tampil di halaman utama</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.faqs.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="question" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Pertanyaan *</label>
                        <input type="text" name="question" id="question" required placeholder="e.g. Bagaimana jam check-in & check-out?" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                    </div>

                    <div>
                        <label for="answer" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jawaban Lengkap *</label>
                        <textarea name="answer" id="answer" rows="4" required placeholder="Jelaskan jawaban secara ramah dan informatif..." class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="badge" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Badge Ringkas</label>
                            <input type="text" name="badge" id="badge" placeholder="e.g. Fleksibel, 14.00 WITA" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                            <span class="text-[10px] text-slate-400 mt-1 block">Muncul di samping judul</span>
                        </div>
                        <div>
                            <label for="sort_order" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Urutan Tampil</label>
                            <input type="number" name="sort_order" id="sort_order" value="{{ $faqs->count() + 1 }}" min="1" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                            <span class="text-[10px] text-slate-400 mt-1 block">Angka lebih kecil tampil awal</span>
                        </div>
                    </div>

                    <div class="pt-1">
                        <label class="flex items-center gap-2.5 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="rounded bg-white border-slate-300 text-blue-600 focus:ring-0">
                            <span class="text-xs font-bold text-emerald-700">Tampilkan FAQ di Website</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs shadow-md shadow-blue-500/20 transition flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        SIMPAN PERTANYAAN
                    </button>
                </form>
            </div>
        </div>

        <!-- Daftar FAQ Yang Ada (Kanan) -->
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Daftar Pertanyaan & Jawaban ({{ $faqs->count() }})</h3>
                    <p class="text-xs text-slate-500">Pertanyaan aktif akan ditampilkan secara dinamis di section FAQ homepage.</p>
                </div>
            </div>

            <div class="space-y-3">
                @forelse($faqs as $faq)
                    <div class="glass-card rounded-2xl border border-slate-200/90 p-4 sm:p-5 space-y-3 shadow-sm hover:border-blue-200 transition">
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-md bg-slate-100 text-slate-600 flex items-center justify-center text-[10px] font-bold">
                                        #{{ $faq->sort_order }}
                                    </span>
                                    <h4 class="text-sm font-bold text-slate-900">{{ $faq->question }}</h4>
                                    @if($faq->badge)
                                        <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[10px] font-bold border border-blue-200">
                                            {{ $faq->badge }}
                                        </span>
                                    @endif
                                </div>
                                <p class="text-xs text-slate-600 leading-relaxed pt-1">
                                    {{ $faq->answer }}
                                </p>
                            </div>

                            <!-- Icon-Only Action Buttons -->
                            <div class="flex items-center gap-1.5 shrink-0">
                                @if($faq->is_active)
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold border border-emerald-200">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 text-[10px]">Nonaktif</span>
                                @endif

                                <!-- Icon-Only Edit Button -->
                                <button type="button" 
                                        onclick="openEditFaqModal({{ json_encode($faq) }})"
                                        class="p-2 rounded-xl bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white border border-blue-200 transition shadow-sm inline-flex items-center justify-center"
                                        title="Edit FAQ">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>

                                <!-- Icon-Only Delete Button -->
                                <button type="button" 
                                        onclick="openDeleteFaqModal({{ $faq->id }}, '{{ addslashes($faq->question) }}')"
                                        class="p-2 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white border border-rose-200 transition shadow-sm inline-flex items-center justify-center"
                                        title="Hapus FAQ">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>

                                <form id="delete-faq-form-{{ $faq->id }}" method="POST" action="{{ route('admin.faqs.destroy', $faq->id) }}" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="glass-card rounded-2xl border border-slate-200 p-8 text-center text-slate-400">
                        Belum ada pertanyaan FAQ yang ditambahkan. Gunakan formulir di sebelah kiri untuk menambah.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- POPUP MODAL EDIT FAQ -->
    <div id="edit-faq-modal" class="fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl border border-blue-200 w-full max-w-lg max-h-[90vh] flex flex-col shadow-2xl">
            <div class="flex items-center justify-between px-6 pt-5 pb-3 border-b border-slate-100 shrink-0">

                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-sm">
                        ✎
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Edit Tanya Jawab (FAQ)</h3>
                        <p class="text-xs text-slate-500">Perbarui pertanyaan & jawaban</p>
                    </div>
                </div>
                <button type="button" onclick="closeEditFaqModal()" class="text-slate-400 hover:text-slate-700">✕</button>
            </div>

            <form id="edit-faq-form" method="POST" action="" class="overflow-y-auto flex-1 px-6 py-4 space-y-4">
                @csrf
                @method('PUT')


                <div>
                    <label for="edit-question" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Pertanyaan *</label>
                    <input type="text" name="question" id="edit-question" required class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                </div>

                <div>
                    <label for="edit-answer" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jawaban Lengkap *</label>
                    <textarea name="answer" id="edit-answer" rows="4" required class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="edit-badge" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Badge Ringkas</label>
                        <input type="text" name="badge" id="edit-badge" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                    </div>
                    <div>
                        <label for="edit-sort-order" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Urutan Tampil</label>
                        <input type="number" name="sort_order" id="edit-sort-order" min="1" class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs">
                    </div>
                </div>

                <div class="pt-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" id="edit-is-active" value="1" class="rounded bg-white border-slate-300 text-blue-600 focus:ring-0">
                        <span class="text-xs font-bold text-emerald-700">Tampilkan FAQ di Website</span>
                    </label>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <button type="button" onclick="closeEditFaqModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- POPUP MODAL HAPUS FAQ -->
    <div id="delete-faq-modal" class="fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4 hidden">
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
                Apakah Anda yakin ingin menghapus pertanyaan FAQ <strong id="delete-faq-question" class="text-slate-900 font-bold"></strong>?
            </p>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="closeDeleteFaqModal()" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                    Batal
                </button>
                <button type="button" id="delete-faq-confirm-btn" class="px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold transition shadow-sm">
                    Ya, Hapus FAQ
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function openEditFaqModal(faq) {
        document.getElementById('edit-faq-form').action = `/admin/faqs/${faq.id}`;
        document.getElementById('edit-question').value = faq.question;
        document.getElementById('edit-answer').value = faq.answer;
        document.getElementById('edit-badge').value = faq.badge || '';
        document.getElementById('edit-sort-order').value = faq.sort_order || 1;
        document.getElementById('edit-is-active').checked = faq.is_active;
        document.getElementById('edit-faq-modal').classList.remove('hidden');
    }

    function closeEditFaqModal() {
        document.getElementById('edit-faq-modal').classList.add('hidden');
    }

    let activeDeleteFaqId = null;
    function openDeleteFaqModal(id, question) {
        activeDeleteFaqId = id;
        document.getElementById('delete-faq-question').innerText = '"' + question + '"';
        document.getElementById('delete-faq-modal').classList.remove('hidden');
    }

    function closeDeleteFaqModal() {
        document.getElementById('delete-faq-modal').classList.add('hidden');
        activeDeleteFaqId = null;
    }

    document.getElementById('delete-faq-confirm-btn').addEventListener('click', function() {
        if (activeDeleteFaqId) {
            document.getElementById('delete-faq-form-' + activeDeleteFaqId).submit();
        }
    });
</script>
@endpush
