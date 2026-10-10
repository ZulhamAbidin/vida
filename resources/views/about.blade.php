@extends('layouts.app')

@section('title', 'Tentang Kami | VIDALIDAY - Sewa Apartemen Nyaman di Makassar')
@section('meta_description', 'Kenali lebih dekat VIDALIDAY, partner terpercaya untuk menginap nyaman di Makassar di bawah naungan PT PERDANA MEGA TRANS. Menghadirkan unit apartemen di Delft CPI & Vida View.')

@section('content')

    <!-- HERO ABOUT US SECTION (WHITE GLASSMORPHISM) -->
    <section class="relative pt-12 pb-16 md:pt-20 md:pb-24 overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Breadcrumb & Top Tagline -->
            <div class="text-center space-y-3">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass-card border border-blue-200/80 text-blue-700 text-xs sm:text-sm font-bold shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    <span>TENTANG VIDALIDAY</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight">
                    {{ $about['hero_title'] ?? 'VIDALIDAY — Partner Terpercaya untuk Menginap Nyaman di Makassar.' }}
                </h1>

                @if(!empty($about['tagline']))
                    <p class="text-lg sm:text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-sky-600 tracking-wide">
                        {{ $about['tagline'] }}
                    </p>
                @endif
            </div>

            <!-- Main Story / Narrative Cards -->
            <div class="glass-card rounded-3xl border border-white/80 p-6 sm:p-10 shadow-xl shadow-slate-200/50 space-y-6 text-slate-700 text-sm sm:text-base leading-relaxed bg-white/80">
                <div class="flex items-start gap-4">
                    @if(!empty($siteLogo))
                        <div class="h-14 max-w-[140px] flex items-center shrink-0">
                            <img src="{{ asset('storage/' . $siteLogo) }}" alt="VIDALIDAY Logo" class="h-full w-auto object-contain max-h-14">
                        </div>
                    @else
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-black shrink-0 border border-blue-200/60 shadow-sm">
                            V
                        </div>
                    @endif
                    <div class="space-y-4">
                        <p class="font-medium text-slate-800">
                            {{ $about['intro_p1'] ?? '' }}
                        </p>
                        @if(!empty($about['intro_p2']))
                            <p>
                                {{ $about['intro_p2'] }}
                            </p>
                        @endif
                        @if(!empty($about['intro_p3']))
                            <p>
                                {{ $about['intro_p3'] }}
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Locations Highlight Bar -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-slate-100">
                    <div class="p-4 rounded-2xl bg-blue-50/50 border border-blue-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-md shadow-blue-500/20">
                            📍
                        </div>
                        <div>
                            <span class="text-[11px] font-bold text-blue-700 uppercase tracking-wider block">Apartemen 1</span>
                            <h4 class="text-sm sm:text-base font-bold text-slate-900">Delft CPI Makassar</h4>
                            <p class="text-xs text-slate-500">Tepi Laut CPI & Sunset Losari</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-sky-50/50 border border-sky-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-sky-600 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-md shadow-sky-500/20">
                            📍
                        </div>
                        <div>
                            <span class="text-[11px] font-bold text-sky-700 uppercase tracking-wider block">Apartemen 2</span>
                            <h4 class="text-sm sm:text-base font-bold text-slate-900">Vida View Makassar</h4>
                            <p class="text-xs text-slate-500">Jantung Komersial Panakkukang</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION: MENGAPA MEMILIH VIDALIDAY? -->
            <div class="space-y-8">
                <div class="text-center space-y-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                        Keunggulan Kami
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-black text-slate-900">
                        MENGAPA MEMILIH VIDALIDAY?
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 max-w-xl mx-auto">
                        Standar pelayanan terbaik untuk setiap momen menginap Anda di Makassar.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @forelse($about['reasons'] as $reason)
                        <div class="glass-card rounded-2xl border border-slate-200/80 p-6 space-y-3 shadow-sm hover:border-blue-300 hover:shadow-md transition group">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition duration-300 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 leading-snug">{{ $reason['title'] }}</h3>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">{{ $reason['desc'] }}</p>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8 text-slate-400 text-xs">
                            Data keunggulan sedang diperbarui.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- SECTION: KOMITMEN KAMI & QUOTE -->
            <div class="relative overflow-hidden glass-card rounded-3xl border border-blue-200/80 p-8 sm:p-12 shadow-xl bg-gradient-to-br from-white via-blue-50/30 to-sky-50/40 text-center space-y-6">
                <div class="max-w-2xl mx-auto space-y-3">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-blue-100/70 text-blue-800 text-xs font-bold uppercase tracking-wider">
                        {{ $about['commit_title'] ?? 'KOMITMEN KAMI' }}
                    </span>
                    <p class="text-sm sm:text-base text-slate-700 leading-relaxed font-medium">
                        {{ $about['commit_text'] ?? '' }}
                    </p>
                </div>

                @if(!empty($about['closing_quote']))
                    <div class="py-4 border-t border-b border-blue-200/60 max-w-xl mx-auto">
                        <blockquote class="text-base sm:text-lg font-black text-slate-900 tracking-tight">
                            "{{ $about['closing_quote'] }}"
                        </blockquote>
                    </div>
                @endif

                @if(!empty($about['closing_cta']))
                    <p class="text-xs sm:text-sm text-slate-600 max-w-lg mx-auto">
                        {{ $about['closing_cta'] }}
                    </p>
                @endif

                <!-- Call to Action Buttons -->
                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('home') }}#katalog-kamar" class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-xs tracking-wider shadow-lg shadow-blue-500/25 transition">
                        LIHAT UNIT KAMAR KAMI
                    </a>
                    @php
                        $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890');
                        $waAboutUrl = "https://wa.me/{$waClean}?text=" . urlencode("Halo Admin VIDALIDAY, saya ingin konsultasi sewa apartemen di Makassar.");
                    @endphp
                    <a href="{{ $waAboutUrl }}" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto px-6 py-3.5 rounded-xl glass-card hover:border-emerald-500 text-slate-800 hover:text-emerald-700 font-bold text-xs flex items-center justify-center gap-2 transition">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection
