<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Desain Client: Luxury Navy Gold | VIDALIDAY</title>
    <meta name="description" content="Halaman Pratinjau Desain Rekomendasi Client untuk VIDALIDAY Makassar. Tema Luxury Navy Gold, Dual Hero Showcase Gedung, dan Emas Mengkilap.">

    <!-- Fonts: Plus Jakarta Sans, Playfair Display (Serif), & Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;800;900&family=Montserrat:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Great+Vibes&family=Alex+Brush&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-script {
            font-family: 'Great Vibes', 'Alex Brush', cursive;
        }
        .font-luxury-title {
            font-family: 'Cinzel', 'Playfair Display', serif;
        }
        
        /* Gold gradient text & backgrounds */
        .text-gold-gradient {
            background: linear-gradient(135deg, #fce99f 0%, #d4af37 50%, #aa771c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .bg-gold-gradient {
            background: linear-gradient(135deg, #fde48b 0%, #e5b946 50%, #b8860b 100%);
        }
        .bg-gold-glow {
            box-shadow: 0 10px 30px -5px rgba(212, 175, 55, 0.4);
        }
        .border-gold {
            border-color: rgba(212, 175, 55, 0.6);
        }

        /* 3D Gold Ribbon for Promo */
        .ribbon-gold {
            background: linear-gradient(135deg, #ffef9f 0%, #e6be44 45%, #b58814 100%);
            box-shadow: 0 12px 28px -5px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(255, 255, 255, 0.6);
        }

        /* Curved Gold Wave Border */
        .gold-wave-bottom {
            background: radial-gradient(ellipse at 50% -20%, rgba(212, 175, 55, 0.25) 0%, transparent 70%);
        }

        /* Diagonal Building Cutouts */
        .building-mask {
            border-radius: 28px;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased min-h-screen relative overflow-x-hidden selection:bg-amber-400 selection:text-slate-900">

    <!-- TOP FLOATING BAR: PREVIEW MODE NOTIFICATION -->
    <div class="sticky top-0 z-50 bg-gradient-to-r from-amber-500 via-yellow-400 to-amber-600 text-slate-950 px-4 py-2 text-xs font-bold shadow-lg flex items-center justify-between">
        <div class="flex items-center gap-2 max-w-7xl mx-auto w-full justify-between">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-red-600 animate-ping"></span>
                <span class="tracking-wide">🔴 LIVE PREVIEW: Desain Rekomendasi Client (Luxury Navy Gold)</span>
                <span class="hidden md:inline text-[11px] font-normal opacity-90">• Halaman ini khusus untuk evaluasi dan tidak menggantikan halaman utama</span>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="px-3 py-1 rounded-lg bg-slate-950 text-amber-300 text-xs font-extrabold hover:bg-slate-800 transition shadow">
                    ← Kembali ke Desain Asli
                </a>
            </div>
        </div>
    </div>

    <!-- ======================================================== -->
    <!-- HERO & BANNER LUXURY NAVY GOLD (PIXEL-PERFECT CLEAN LAYOUT) -->
    <!-- ======================================================== -->
    <section class="relative bg-[#07162c] border-b border-amber-500/30 overflow-hidden pt-4 pb-12">
        
        <!-- Background Foto Gedung Asli (Jumbotron Background) dengan Overlay Mewah Navy & Gold -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <!-- Foto Gedung Aerial Vida View & Panorama Background -->
            <img src="{{ asset('images/hero_aerial_vida_view.jpg') }}" 
                 alt="Background Gedung Apartemen Makassar" 
                 class="w-full h-full object-cover object-center opacity-25 mix-blend-luminosity filter blur-[1px] scale-105">
            
            <!-- Gradient Overlay Luxury Navy agar Teks & Konten Sangat Tajam dan Terbaca -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#07162c] via-[#07162c]/90 to-[#07162c]/75"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#07162c] via-transparent to-[#07162c]/80"></div>

            <!-- Tropical Leaves Top Left -->
            <div class="absolute -top-16 -left-16 w-80 h-80 opacity-20">
                <svg viewBox="0 0 200 200" fill="currentColor" class="w-full h-full text-emerald-800">
                    <path d="M45,20 C80,30 90,80 70,120 C50,160 20,150 10,110 C0,70 10,10 45,20 Z" />
                    <path d="M85,10 C120,40 110,90 90,130 C70,170 30,160 20,120 C10,80 50,-20 85,10 Z" opacity="0.6"/>
                </svg>
            </div>
            <!-- Tropical Leaves Bottom Right -->
            <div class="absolute -bottom-16 -right-16 w-80 h-80 opacity-20">
                <svg viewBox="0 0 200 200" fill="currentColor" class="w-full h-full text-emerald-800 rotate-180">
                    <path d="M45,20 C80,30 90,80 70,120 C50,160 20,150 10,110 C0,70 10,10 45,20 Z" />
                </svg>
            </div>

            <!-- Seamless Glowing Gold Ribbons -->
            <svg class="absolute inset-0 w-full h-full pointer-events-none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1200 600">
                <path d="M-100,60 C250,120 380,-30 460,220 C540,430 400,520 600,650" fill="none" stroke="url(#goldLine1)" stroke-width="3" opacity="0.75"/>
                <path d="M-80,80 C230,140 360,-10 440,240 C520,450 380,540 580,670" fill="none" stroke="url(#goldLine1)" stroke-width="1.2" opacity="0.45"/>
                <path d="M0,530 C350,510 650,570 1250,470" fill="none" stroke="url(#goldLine1)" stroke-width="2.5" opacity="0.6"/>
                <defs>
                    <linearGradient id="goldLine1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#ffe680"/>
                        <stop offset="50%" stop-color="#d4af37"/>
                        <stop offset="100%" stop-color="#996515"/>
                    </linearGradient>
                </defs>
            </svg>
            <div class="absolute top-1/3 left-1/4 w-72 h-72 bg-blue-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-1/3 w-80 h-80 bg-amber-500/15 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- 1. NAVBAR DUAL BRAND (VIDALIDAY & PT PERDANA MEGA TRANS) -->
            <header class="py-3.5 border-b border-amber-400/20 flex flex-wrap items-center justify-between gap-4">
                
                <!-- Left: Dual Brand Logo -->
                <div class="flex items-center gap-3 sm:gap-5">
                    <!-- Logo Bulat VIDALIDAY -->
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full p-0.5 bg-gradient-to-tr from-amber-300 via-yellow-500 to-amber-700 shadow-lg shadow-amber-500/20 shrink-0">
                            <div class="w-full h-full rounded-full bg-[#07172b] flex flex-col items-center justify-center p-1 border border-amber-300/40">
                                <span class="text-[13px] font-black text-amber-300 tracking-tighter">VIDA</span>
                                <span class="text-[7px] text-slate-300 -mt-1 font-semibold">LIDAY</span>
                            </div>
                        </div>
                        <div>
                            <div class="text-xl sm:text-2xl font-black tracking-tight text-white leading-none">
                                VIDALIDAY
                            </div>
                            <span class="text-[9px] tracking-[0.25em] uppercase text-amber-300/90 font-bold block mt-1">
                                — APARTMENT BY US
                            </span>
                        </div>
                    </div>

                    <!-- Separator line -->
                    <div class="h-9 w-px bg-amber-400/40 hidden sm:block"></div>

                    <!-- Logo PT PERDANA MEGA TRANS -->
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-amber-500 via-rose-500 to-blue-500 p-0.5 shadow-md flex items-center justify-center font-black text-white text-base">
                            <span class="font-black text-white text-xs tracking-tighter">PMT</span>
                        </div>
                        <div class="leading-tight">
                            <span class="text-xs sm:text-sm font-extrabold text-white block">PT PERDANA</span>
                            <span class="text-[10px] sm:text-xs font-bold text-amber-300/90 block">MEGA TRANS</span>
                        </div>
                    </div>
                </div>

                <!-- Center: Navigation Menu Pills -->
                <nav class="hidden lg:flex items-center gap-1.5 text-xs font-bold">
                    <a href="#hero" class="px-4 py-1.5 rounded-full bg-gold-gradient text-slate-950 font-black shadow-md shadow-amber-500/20">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="px-3.5 py-1.5 rounded-full text-slate-200 hover:text-amber-300 hover:bg-white/5 transition">
                        Tentang Kami
                    </a>
                    <a href="#katalog-kamar" class="px-3.5 py-1.5 rounded-full text-slate-200 hover:text-amber-300 hover:bg-white/5 transition">
                        Unit
                    </a>
                    <a href="#fasilitas" class="px-3.5 py-1.5 rounded-full text-slate-200 hover:text-amber-300 hover:bg-white/5 transition">
                        Fasilitas
                    </a>
                    <a href="#lokasi" class="px-3.5 py-1.5 rounded-full text-slate-200 hover:text-amber-300 hover:bg-white/5 transition">
                        Lokasi
                    </a>
                    <a href="#kontak" class="px-3.5 py-1.5 rounded-full text-slate-200 hover:text-amber-300 hover:bg-white/5 transition">
                        Kontak
                    </a>
                </nav>

                <!-- Right: Location Badge -->
                <div class="flex items-center gap-3">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-xs font-bold text-white backdrop-blur-md">
                        <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <span>Makassar</span>
                        <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
            </header>

            <!-- 2. MAIN HERO SECTION (KIRI COPY + PROMO | KANAN BACKGROUND GEDUNG BERBINGKAI ELEGAN) -->
            <div id="hero" class="py-8 lg:py-12 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                
                <!-- KOLOM KIRI: TITLE & 3D PROMO BADGE (5 COLS) -->
                <div class="lg:col-span-5 space-y-5 text-center lg:text-left z-20">
                    
                    <!-- Script Kursif -->
                    <div class="font-script text-3xl sm:text-4xl text-amber-300 tracking-wide drop-shadow-md">
                        Sewa Apartemen
                    </div>

                    <!-- Main Serif Title -->
                    <h1 class="font-luxury-title text-3xl sm:text-4xl xl:text-5xl font-black text-gold-gradient tracking-wider uppercase leading-tight drop-shadow-lg">
                        DELFT & VIDA VIEW
                        <span class="block text-white text-2xl sm:text-3xl xl:text-4xl font-extrabold tracking-widest mt-1">
                            MAKASSAR
                        </span>
                    </h1>

                    <!-- Pill Slogan -->
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-950/70 backdrop-blur-md border border-amber-400/50 text-xs sm:text-sm font-semibold text-amber-200 shadow-md">
                        <span>Unit Nyaman</span>
                        <span class="text-amber-400">•</span>
                        <span>Bersih</span>
                        <span class="text-amber-400">•</span>
                        <span>Lengkap</span>
                    </div>

                    <!-- 3D PROMO BANNER BOX (PERSIS SEPERTI GAMBAR REFERENSI CLIENT) -->
                    <div class="pt-2 max-w-md mx-auto lg:mx-0">
                        <div class="relative ribbon-gold rounded-2xl p-4 sm:p-5 text-slate-950 border-2 border-amber-200 shadow-2xl transform hover:scale-[1.02] transition-transform">
                            
                            <!-- Header Promo -->
                            <div class="flex items-center justify-between gap-2 border-b border-slate-900/15 pb-2">
                                <span class="text-xs sm:text-sm font-black uppercase tracking-widest text-slate-900">
                                    PROMO
                                </span>
                                <div class="text-3xl sm:text-4xl font-black text-red-600 tracking-tight drop-shadow-sm flex items-center">
                                    280K<span class="text-2xl text-red-700 animate-pulse">!!</span>
                                </div>
                            </div>

                            <!-- Black Curved Banner Strip -->
                            <div class="my-2.5 py-1.5 px-3 rounded-lg bg-slate-950 text-white text-center shadow-inner">
                                <span class="text-[11px] sm:text-xs font-extrabold uppercase tracking-widest text-amber-300">
                                    SUDAH BISA NGINEP DI APARTEMEN
                                </span>
                            </div>

                            <!-- Duration Tags -->
                            <div class="flex items-center justify-center gap-2 text-[11px] sm:text-xs font-black text-slate-900 tracking-wider">
                                <span>HARIAN</span>
                                <span>•</span>
                                <span>MINGGUAN</span>
                                <span>•</span>
                                <span>BULANAN</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: DUA GEDUNG DENGAN PENATAAN BERSIH, RAPI & SESUAI REFERENSI (7 COLS) -->
                <div class="lg:col-span-7 z-20">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 items-end">
                        
                        <!-- GEDUNG 1: Apartemen Vida View Makassar (Tengah/Kiri Kanan) -->
                        <div class="relative group rounded-3xl overflow-hidden border-2 border-amber-400/50 shadow-2xl bg-slate-950 transform hover:-translate-y-1 transition duration-500">
                            <!-- Foto Bersih Gedung Vida View -->
                            <div class="h-64 sm:h-80 w-full overflow-hidden bg-slate-900">
                                <img src="{{ asset('images/hero_aerial_vida_view.jpg') }}" 
                                     alt="Apartemen Vida View Makassar" 
                                     class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-700">
                            </div>

                            <!-- Bottom Location Pointer (Persis Referensi Client) -->
                            <div class="absolute bottom-3 inset-x-3 p-3 rounded-xl bg-slate-950/90 backdrop-blur-md border border-amber-400/40 shadow-xl"
                                 onclick="switchLocation('vida-view'); document.getElementById('katalog-kamar').scrollIntoView({behavior: 'smooth'});">
                                <div class="flex items-start gap-2.5">
                                    <div class="w-6 h-6 rounded-full bg-amber-400/20 text-amber-300 flex items-center justify-center text-xs shrink-0 mt-0.5">
                                        📍
                                    </div>
                                    <div class="text-left">
                                        <h4 class="text-xs sm:text-sm font-black text-white leading-tight">
                                            Apartemen Vida View Makassar
                                        </h4>
                                        <p class="text-[10px] text-amber-200/90 leading-tight mt-0.5 line-clamp-1">
                                            Jl. Topaz Raya, dekat Mall Panakkukang
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- GEDUNG 2: Apartemen Delft CPI (Kanan) -->
                        <div class="relative group rounded-3xl overflow-hidden border-2 border-amber-400/50 shadow-2xl bg-slate-950 transform hover:-translate-y-1 transition duration-500">
                            <!-- Foto Bersih Gedung Delft CPI -->
                            <div class="h-64 sm:h-80 w-full overflow-hidden bg-slate-900">
                                <img src="{{ asset('images/hero_delft_cpi_entrance.jpg') }}" 
                                     alt="Apartemen Delft CPI Makassar" 
                                     class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-700">
                            </div>

                            <!-- Bottom Location Pointer (Persis Referensi Client) -->
                            <div class="absolute bottom-3 inset-x-3 p-3 rounded-xl bg-slate-950/90 backdrop-blur-md border border-amber-400/40 shadow-xl"
                                 onclick="switchLocation('delft-cpi'); document.getElementById('katalog-kamar').scrollIntoView({behavior: 'smooth'});">
                                <div class="flex items-start gap-2.5">
                                    <div class="w-6 h-6 rounded-full bg-amber-400/20 text-amber-300 flex items-center justify-center text-xs shrink-0 mt-0.5">
                                        📍
                                    </div>
                                    <div class="text-left">
                                        <h4 class="text-xs sm:text-sm font-black text-white leading-tight">
                                            Apartemen Delft CPI
                                        </h4>
                                        <p class="text-[10px] text-amber-200/90 leading-tight mt-0.5 line-clamp-1">
                                            Kawasan Citraland CPI Kota Makassar
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- 3. BOTTOM HIGHLIGHT BAR (4 FITUR UTAMA & TOMBOL WHATSAPP EMAS PERSIS GAMBAR) -->
            <div class="pt-6 pb-2 border-t border-amber-400/30 flex flex-col lg:flex-row items-center justify-between gap-6 z-20">
                
                <!-- Left: Handwritten Slogan Quote -->
                <div class="font-script text-2xl sm:text-3xl text-amber-300 tracking-wide text-center lg:text-left shrink-0 drop-shadow">
                    Pilihan Tepat untuk Hunian Anda
                </div>

                <!-- Center: 4 Circle Facility Highlights -->
                <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 text-center">
                    
                    <!-- Facility 1: WiFi -->
                    <div class="flex flex-col items-center gap-1.5 group">
                        <div class="w-11 h-11 rounded-full bg-slate-950/90 border-2 border-amber-400 text-amber-300 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide">WiFi</span>
                    </div>

                    <!-- Facility 2: Netflix Premium -->
                    <div class="flex flex-col items-center gap-1.5 group">
                        <div class="w-11 h-11 rounded-full bg-slate-950/90 border-2 border-amber-400 text-red-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform font-black text-xl">
                            N
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide leading-tight">Netflix<br><span class="text-[9px] text-amber-300">Premium</span></span>
                    </div>

                    <!-- Facility 3: Perlengkapan Masak & Makan -->
                    <div class="flex flex-col items-center gap-1.5 group">
                        <div class="w-11 h-11 rounded-full bg-slate-950/90 border-2 border-amber-400 text-amber-300 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide leading-tight">Perlengkapan<br><span class="text-[9px] text-amber-300">Masak & Makan</span></span>
                    </div>

                    <!-- Facility 4: Akses Gym & Kolam Renang -->
                    <div class="flex flex-col items-center gap-1.5 group">
                        <div class="w-11 h-11 rounded-full bg-slate-950/90 border-2 border-amber-400 text-amber-300 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M3 12h18M3 18h18"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-white tracking-wide leading-tight">Akses<br><span class="text-[9px] text-amber-300">Gym & Kolam</span></span>
                    </div>

                </div>

                <!-- Right: Golden WhatsApp CTA Button (Persis Desain Client) -->
                @php
                    $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285711696970');
                    $waHeroUrl = "https://wa.me/{$waClean}?text=" . urlencode("Halo Admin VIDALIDAY, saya tertarik promo sewa apartemen 280K di Makassar. Mohon info ketersediaan kamar. Terima kasih!");
                @endphp
                <div class="shrink-0 w-full sm:w-auto">
                    <a href="{{ $waHeroUrl }}" target="_blank" rel="noopener noreferrer" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-7 py-3.5 rounded-full bg-gold-gradient text-slate-950 font-black text-sm tracking-wider uppercase shadow-xl bg-gold-glow hover:scale-105 active:scale-95 transition-all">
                        <!-- WhatsApp Official Green Icon Circle -->
                        <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0 shadow-md">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </div>
                        <div class="text-left leading-tight">
                            <span class="block text-xs font-black text-slate-900">PESAN SEKARANG</span>
                            <span class="block text-[10px] font-bold text-slate-800">VIA WHATSAPP</span>
                        </div>
                        <svg class="w-4 h-4 text-slate-900 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>

            </div>

        </div>
    </section>



    <!-- ======================================================== -->
    <!-- KATALOG KAMAR & FASILITAS (TETAP TERHUBUNG KE DATABASE NYATA) -->
    <!-- ======================================================== -->
    <main class="bg-slate-950 py-12 text-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div id="katalog-kamar" class="pt-6">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-10 space-y-2.5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/30 text-amber-300 text-xs font-bold uppercase tracking-wider">
                        Katalog Kamar & Promo Realtime
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight">
                        Pilihan Unit Kamar di Dua Lokasi Makassar
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-400 max-w-2xl mx-auto">
                        Di bawah ini adalah data unit kamar aktif dari database VIDALIDAY dengan slider multi-foto.
                    </p>
                </div>

                <!-- Location Selector Switcher -->
                <div id="lokasi" class="flex flex-col items-center justify-center mb-10">
                    <div class="inline-flex p-2 rounded-2xl bg-slate-900 border border-amber-400/30 shadow-lg max-w-2xl w-full gap-2">
                        <!-- Tab Delft CPI -->
                        <button type="button" 
                                data-target="delft-cpi" 
                                onclick="switchLocation('delft-cpi')" 
                                class="loc-tab-btn flex-1 py-3 px-4 rounded-xl text-center transition-all bg-gold-gradient text-slate-950 font-black shadow-md">
                            🌊 Apartemen Delft CPI ({{ $delft->units->count() ?? 0 }} Unit)
                        </button>
                        <!-- Tab Vida View -->
                        <button type="button" 
                                data-target="vida-view" 
                                onclick="switchLocation('vida-view')" 
                                class="loc-tab-btn flex-1 py-3 px-4 rounded-xl text-center transition-all bg-slate-800 text-slate-300 hover:text-white font-bold">
                            🏙️ Apartemen Vida View ({{ $vida->units->count() ?? 0 }} Unit)
                        </button>
                    </div>
                </div>

                <!-- UNITS DELFT CPI -->
                <div id="units-delft-cpi" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                        @forelse($delft->units ?? [] as $unit)
                            @include('partials.unit-card', ['unit' => $unit, 'locationName' => $delft->name ?? 'Delft CPI'])
                        @empty
                            <div class="col-span-3 text-center py-12 bg-slate-900 rounded-2xl border border-slate-800">
                                <p class="text-slate-400 text-sm">Unit di Apartemen Delft CPI sedang dipersiapkan oleh admin.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- UNITS VIDA VIEW -->
                <div id="units-vida-view" class="space-y-8 hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                        @forelse($vida->units ?? [] as $unit)
                            @include('partials.unit-card', ['unit' => $unit, 'locationName' => $vida->name ?? 'Vida View'])
                        @empty
                            <div class="col-span-3 text-center py-12 bg-slate-900 rounded-2xl border border-slate-800">
                                <p class="text-slate-400 text-sm">Unit di Apartemen Vida View sedang dipersiapkan oleh admin.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- FOOTER NAVY GOLD -->
    <footer id="kontak" class="bg-[#030a14] border-t border-amber-500/20 py-12 text-xs text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="font-luxury-title text-xl font-black text-gold-gradient">
                VIDALIDAY APARTMENT BY US
            </div>
            <p class="max-w-xl mx-auto text-slate-400">
                Dikelola resmi oleh <strong class="text-white">PT PERDANA MEGA TRANS</strong>. Sewa Apartemen Modern, Nyaman, dan Terpercaya di Makassar (Delft CPI & Vida View).
            </p>
            <div class="pt-4 border-t border-slate-800/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-slate-500">
                <p>© {{ date('Y') }} VIDALIDAY. Seluruh Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-4 text-amber-300/80 font-bold">
                    <a href="{{ route('home') }}" class="hover:underline">Lihat Desain Asli Website</a>
                    <span>•</span>
                    <a href="{{ $waHeroUrl }}" target="_blank" class="hover:underline">WhatsApp Admin: {{ $settings['contact_phone'] ?? '+62 857-1169-6970' }}</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Slider & Location JavaScript -->
    <script>
        function switchLocation(slug) {
            const tabs = document.querySelectorAll('.loc-tab-btn');
            tabs.forEach(btn => {
                const isTarget = btn.getAttribute('data-target') === slug;
                if (isTarget) {
                    btn.className = 'loc-tab-btn flex-1 py-3 px-4 rounded-xl text-center transition-all bg-gold-gradient text-slate-950 font-black shadow-md';
                } else {
                    btn.className = 'loc-tab-btn flex-1 py-3 px-4 rounded-xl text-center transition-all bg-slate-800 text-slate-300 hover:text-white font-bold';
                }
            });

            if (slug === 'delft-cpi') {
                document.getElementById('units-delft-cpi')?.classList.remove('hidden');
                document.getElementById('units-vida-view')?.classList.add('hidden');
            } else {
                document.getElementById('units-delft-cpi')?.classList.add('hidden');
                document.getElementById('units-vida-view')?.classList.remove('hidden');
            }
        }

        // Multi-image slider functions
        function nextUnitSlide(sliderId, total) {
            const slider = document.getElementById(sliderId);
            if (!slider || total <= 1) return;
            let current = parseInt(slider.getAttribute('data-current-index') || '0', 10);
            current = (current + 1) % total;
            updateUnitSlider(slider, current, total);
        }

        function prevUnitSlide(sliderId, total) {
            const slider = document.getElementById(sliderId);
            if (!slider || total <= 1) return;
            let current = parseInt(slider.getAttribute('data-current-index') || '0', 10);
            current = (current - 1 + total) % total;
            updateUnitSlider(slider, current, total);
        }

        function updateUnitSlider(slider, current, total) {
            slider.setAttribute('data-current-index', current);
            const track = slider.querySelector('.slider-track');
            if (track) {
                const percent = (current * 100) / total;
                track.style.transform = `translateX(-${percent}%)`;
            }
            const counter = slider.querySelector('.slide-counter');
            if (counter) {
                counter.textContent = `${current + 1}/${total}`;
            }
            const dots = slider.querySelectorAll('.slide-dot');
            dots.forEach((dot, idx) => {
                if (idx === current) {
                    dot.className = 'slide-dot h-1.5 rounded-full transition-all duration-300 bg-white w-3';
                } else {
                    dot.className = 'slide-dot h-1.5 rounded-full transition-all duration-300 bg-white/50 w-1.5';
                }
            });
        }
    </script>
</body>
</html>
