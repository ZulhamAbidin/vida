@extends('admin.layout')

@section('title', 'Kelola Tentang Kami (About Us)')
@section('page_title', 'Kelola Konten Tentang Kami (About Us)')

@section('content')

    <div class="max-w-5xl mx-auto space-y-6">
        <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-8 space-y-6 shadow-sm">
            
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-slate-200/80 pb-4">
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">Konten Halaman Tentang VIDALIDAY</h3>
                    <p class="text-xs text-slate-500 mt-1">
                        Perbarui narasi visi, latar belakang legalitas, alasan memilih VIDALIDAY, dan komitmen layanan.
                    </p>
                </div>

                <a href="{{ route('about') }}" target="_blank" class="w-full sm:w-auto justify-center px-4 py-2 rounded-xl bg-red-50 text-red-700 hover:bg-red-100 text-xs font-bold transition flex items-center gap-1.5 border border-red-200 shrink-0">
                    <span>Lihat Halaman</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            </div>

            <form method="POST" action="{{ route('admin.about.update') }}" class="space-y-6">
                @csrf

                <!-- 1. Header & Tagline -->
                <div class="p-5 rounded-2xl bg-red-50/50 border border-red-200/80 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                        <h4 class="text-xs font-bold text-red-800 uppercase tracking-wider">Header & Tagline</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="about_tagline" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Tagline Singkat *</label>
                            <input type="text" name="about_tagline" id="about_tagline" value="{{ old('about_tagline', $about['tagline']) }}" required class="w-full px-4 py-3 rounded-xl glass-input text-sm font-semibold text-red-700">
                            <span class="text-[10px] text-slate-400 mt-1 block">Contoh: Your Comfort, Our Priority</span>
                        </div>

                        <div>
                            <label for="about_hero_title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Judul Utama (Headline) *</label>
                            <input type="text" name="about_hero_title" id="about_hero_title" value="{{ old('about_hero_title', $about['hero_title']) }}" required class="w-full px-4 py-3 rounded-xl glass-input text-sm font-bold text-slate-900">
                        </div>
                    </div>
                </div>

                <!-- 2. Paragraf Narasi / Penjelasan Brand -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider border-l-2 border-red-600 pl-3">Narasi Tentang VIDALIDAY</h4>

                    <div>
                        <label for="about_intro_p1" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Paragraf 1 — Legalitas & Naungan PT *</label>
                        <textarea name="about_intro_p1" id="about_intro_p1" rows="3" required class="w-full px-4 py-3 rounded-xl glass-input text-xs sm:text-sm leading-relaxed">{{ old('about_intro_p1', $about['intro_p1']) }}</textarea>
                    </div>

                    <div>
                        <label for="about_intro_p2" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Paragraf 2 — Pilihan Unit Apartemen & Layanan</label>
                        <textarea name="about_intro_p2" id="about_intro_p2" rows="3" class="w-full px-4 py-3 rounded-xl glass-input text-xs sm:text-sm leading-relaxed">{{ old('about_intro_p2', $about['intro_p2']) }}</textarea>
                    </div>

                    <div>
                        <label for="about_intro_p3" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Paragraf 3 — Standar Kebersihan & Kenyamanan</label>
                        <textarea name="about_intro_p3" id="about_intro_p3" rows="3" class="w-full px-4 py-3 rounded-xl glass-input text-xs sm:text-sm leading-relaxed">{{ old('about_intro_p3', $about['intro_p3']) }}</textarea>
                    </div>
                </div>

                <!-- 3. Mengapa Memilih VIDALIDAY (Daftar Poin Interaktif) -->
                <div class="space-y-4 pt-2 border-t border-slate-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider border-l-2 border-emerald-500 pl-3">
                                Mengapa Memilih VIDALIDAY?
                            </h4>
                            <p class="text-[11px] text-slate-500 mt-0.5">Poin-poin keunggulan yang ditampilkan dalam bentuk kartu grid interaktif</p>
                        </div>

                        <button type="button" onclick="addReasonRow()" class="px-3.5 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white border border-emerald-200 text-xs font-bold transition flex items-center gap-1">
                            <span>+ Tambah Poin</span>
                        </button>
                    </div>

                    <div id="reasons-container" class="space-y-3">
                        @foreach($about['reasons'] as $idx => $r)
                            <div class="reason-row p-4 rounded-xl border border-slate-200 bg-white/70 space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-slate-500">Poin #{{ $idx + 1 }}</span>
                                    <button type="button" onclick="this.closest('.reason-row').remove()" class="p-1 rounded-lg text-rose-500 hover:bg-rose-50 transition text-xs font-bold">
                                        ✕ Hapus
                                    </button>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <div class="sm:col-span-1">
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Judul Poin *</label>
                                        <input type="text" name="reasons_title[]" value="{{ $r['title'] ?? '' }}" required class="w-full px-3 py-2 rounded-lg glass-input text-xs font-bold text-slate-800">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Penjelasan Singkat *</label>
                                        <input type="text" name="reasons_desc[]" value="{{ $r['desc'] ?? '' }}" required class="w-full px-3 py-2 rounded-lg glass-input text-xs text-slate-600">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 4. Komitmen Kami & Penutup -->
                <div class="space-y-4 pt-2 border-t border-slate-200">
                    <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider border-l-2 border-red-600 pl-3">Komitmen & Pesan Penutup</h4>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="about_commit_title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Judul Komitmen *</label>
                            <input type="text" name="about_commit_title" id="about_commit_title" value="{{ old('about_commit_title', $about['commit_title']) }}" required class="w-full px-4 py-3 rounded-xl glass-input text-sm font-bold">
                        </div>

                        <div>
                            <label for="about_closing_quote" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Slogan / Quote Penutup</label>
                            <input type="text" name="about_closing_quote" id="about_closing_quote" value="{{ old('about_closing_quote', $about['closing_quote']) }}" class="w-full px-4 py-3 rounded-xl glass-input text-sm font-semibold text-red-700">
                        </div>
                    </div>

                    <div>
                        <label for="about_commit_text" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Isi Teks Komitmen *</label>
                        <textarea name="about_commit_text" id="about_commit_text" rows="3" required class="w-full px-4 py-3 rounded-xl glass-input text-xs sm:text-sm leading-relaxed">{{ old('about_commit_text', $about['commit_text']) }}</textarea>
                    </div>

                    <div>
                        <label for="about_closing_cta" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Kalimat Ajakan (Call to Action)</label>
                        <input type="text" name="about_closing_cta" id="about_closing_cta" value="{{ old('about_closing_cta', $about['closing_cta']) }}" class="w-full px-4 py-3 rounded-xl glass-input text-sm text-slate-800">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200">
                    <button type="submit" class="w-full sm:w-auto text-center px-7 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs tracking-wider shadow-md shadow-red-500/25 transition">
                        SIMPAN PERUBAHAN TENTANG KAMI
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function addReasonRow() {
        const container = document.getElementById('reasons-container');
        const count = container.querySelectorAll('.reason-row').length + 1;
        
        const row = document.createElement('div');
        row.className = 'reason-row p-4 rounded-xl border border-slate-200 bg-white/70 space-y-3';
        row.innerHTML = `
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500">Poin #${count}</span>
                <button type="button" onclick="this.closest('.reason-row').remove()" class="p-1 rounded-lg text-rose-500 hover:bg-rose-50 transition text-xs font-bold">
                    ✕ Hapus
                </button>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div class="sm:col-span-1">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Judul Poin *</label>
                    <input type="text" name="reasons_title[]" placeholder="Contoh: Unit Bersih & Nyaman" required class="w-full px-3 py-2 rounded-lg glass-input text-xs font-bold text-slate-800">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Penjelasan Singkat *</label>
                    <input type="text" name="reasons_desc[]" placeholder="Penjelasan ringkas..." required class="w-full px-3 py-2 rounded-lg glass-input text-xs text-slate-600">
                </div>
            </div>
        `;
        container.appendChild(row);
    }
</script>
@endpush
