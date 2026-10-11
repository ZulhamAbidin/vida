@extends('layouts.app')

@section('title', 'Tentang Kami | VIDALIDAY - Sewa Apartemen Nyaman di Makassar')
@section('meta_description', 'Kenali lebih dekat VIDALIDAY, partner terpercaya untuk menginap nyaman di Makassar di bawah naungan PT PERDANA MEGA TRANS. Menghadirkan unit apartemen di Delft CPI & Vida View.')

@section('content')

    <!-- HERO ABOUT US SECTION (WHITE GLASSMORPHISM) -->
    <section class="relative pt-12 pb-16 md:pt-20 md:pb-24 overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Breadcrumb & Top Tagline -->
            <div class="text-center space-y-3">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass-card border border-red-200/80 text-red-700 text-xs sm:text-sm font-bold shadow-sm bg-red-50/50">
                    <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                    <span>TENTANG VIDALIDAY</span>
                </div>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                    {{ $about['hero_title'] ?? 'VIDALIDAY — Partner Terpercaya untuk Menginap Nyaman di Makassar.' }}
                </h1>

                @if(!empty($about['tagline']))
                    <p class="text-base sm:text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-rose-600 to-red-700 tracking-wide">
                        {{ $about['tagline'] }}
                    </p>
                @endif
            </div>

            <!-- Main Story / Narrative Cards -->
            <div class="glass-card rounded-3xl border border-white/80 p-5 sm:p-10 shadow-xl shadow-slate-200/50 space-y-6 text-slate-700 text-sm sm:text-base leading-relaxed bg-white/80">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full overflow-hidden border-2 border-red-500/30 ring-2 ring-red-500/10 shadow-md shrink-0 bg-white">
                        <img src="{{ !empty($siteLogo) ? asset('storage/' . $siteLogo) : asset('images/logo_vidaliday.png') }}" 
                             alt="VIDALIDAY Logo" 
                             class="w-full h-full object-cover">
                    </div>
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
                    <div class="p-4 rounded-2xl bg-red-50/70 border border-red-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-red-600 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-md shadow-red-500/20">
                            📍
                        </div>
                        <div>
                            <span class="text-[10px] sm:text-[11px] font-bold text-red-700 uppercase tracking-wider block">Apartemen 1</span>
                            <h4 class="text-sm sm:text-base font-bold text-slate-900">Delft CPI Makassar</h4>
                            <p class="text-xs text-slate-500">Tepi Laut CPI & Sunset Losari</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-rose-50/70 border border-rose-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-rose-600 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-md shadow-rose-500/20">
                            📍
                        </div>
                        <div>
                            <span class="text-[10px] sm:text-[11px] font-bold text-rose-700 uppercase tracking-wider block">Apartemen 2</span>
                            <h4 class="text-sm sm:text-base font-bold text-slate-900">Vida View Makassar</h4>
                            <p class="text-xs text-slate-500">Jantung Komersial Panakkukang</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION: MENGAPA MEMILIH VIDALIDAY? -->
            <div class="space-y-8">
                <div class="text-center space-y-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-red-700 text-xs font-bold uppercase tracking-wider">
                        Keunggulan Kami
                    </span>
                    <h2 class="text-xl sm:text-3xl lg:text-4xl font-black text-slate-900">
                        MENGAPA MEMILIH VIDALIDAY?
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 max-w-xl mx-auto">
                        Standar pelayanan terbaik untuk setiap momen menginap Anda di Makassar.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @forelse($about['reasons'] as $reason)
                        <div class="glass-card rounded-2xl border border-slate-200/80 p-5 sm:p-6 space-y-3 shadow-sm hover:border-red-300 hover:shadow-md transition group">
                            <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center group-hover:bg-red-600 group-hover:text-white transition duration-300 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <h3 class="text-sm sm:text-base font-bold text-slate-900 leading-snug">{{ $reason['title'] }}</h3>
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
            <div class="relative overflow-hidden glass-card rounded-3xl border border-red-200/80 p-6 sm:p-12 shadow-xl bg-gradient-to-br from-white via-red-50/30 to-rose-50/40 text-center space-y-6">
                <div class="max-w-2xl mx-auto space-y-3">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-red-100/80 text-red-800 text-xs font-bold uppercase tracking-wider">
                        {{ $about['commit_title'] ?? 'KOMITMEN KAMI' }}
                    </span>
                    <p class="text-xs sm:text-base text-slate-700 leading-relaxed font-medium">
                        {{ $about['commit_text'] ?? '' }}
                    </p>
                </div>

                @if(!empty($about['closing_quote']))
                    <div class="py-3 sm:py-4 border-t border-b border-red-200/60 max-w-xl mx-auto">
                        <blockquote class="text-sm sm:text-lg font-black text-slate-900 tracking-tight">
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
                    <a href="{{ route('home') }}#katalog-kamar" class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-red-600 hover:bg-red-700 text-white font-extrabold text-xs tracking-wider shadow-lg shadow-red-500/25 transition">
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
