<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VIDALIDAY | Sewa Apartemen Resmi Makassar - Delft CPI & Vida View')</title>
    <meta name="description" content="@yield('meta_description', 'Katalog resmi sewa apartemen harian, mingguan, & bulanan di Makassar: Apartemen Delft CPI & Vida View di bawah naungan PT PERDANA MEGA TRANS.')">
    <meta property="og:title" content="@yield('title', 'VIDALIDAY | Sewa Apartemen Resmi Makassar')">
    <meta property="og:description" content="Sewa apartemen resmi, mewah, dan terpercaya di Makassar. Lokasi Delft CPI & Vida View. Langsung terhubung ke WhatsApp Admin.">
    <meta property="og:type" content="website">

    <!-- Fonts: Plus Jakarta Sans, Cinzel, Playfair Display, & Cursive Great Vibes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Great+Vibes&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-script {
            font-family: 'Great Vibes', cursive;
        }
        .font-luxury-title {
            font-family: 'Cinzel', 'Playfair Display', serif;
        }
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
        /* Custom Text Shadows for Luxury Typography Over Backgrounds */
        .text-shadow-luxury {
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.65), 0 4px 16px rgba(0, 0, 0, 0.4);
        }
        .text-shadow-subtle {
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.5), 0 2px 8px rgba(0, 0, 0, 0.3);
        }
        .text-shadow-white {
            text-shadow: 0 1px 3px rgba(255, 255, 255, 0.9), 0 0 10px rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen relative selection:bg-red-600 selection:text-white overflow-x-hidden">

    <!-- Ambient Glowing Orbs Background (White Glassmorphism with Subtle Red & Rose Tones) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-[32rem] h-[32rem] bg-rose-500/10 rounded-full blur-[130px]"></div>
        <div class="absolute top-1/3 -right-40 w-[36rem] h-[36rem] bg-red-400/15 rounded-full blur-[140px]"></div>
        <div class="absolute top-2/3 left-1/4 w-[30rem] h-[30rem] bg-rose-400/10 rounded-full blur-[130px]"></div>
        <div class="absolute -bottom-40 right-10 w-[28rem] h-[28rem] bg-red-500/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 flex flex-col min-h-screen">
        
        <!-- Luxury Red Brand Accent Hairline at the very top -->
        <div class="h-1 w-full bg-gradient-to-r from-red-600 via-rose-500 to-red-700"></div>

        <!-- Top Info & Trust Bar -->
        <aside aria-label="Informasi Legalitas & Promo" class="bg-white/90 border-b border-red-100 text-xs py-2 px-4 backdrop-blur-md">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 text-center sm:text-left">
                <div class="flex items-center gap-2 text-slate-600">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-red-50 text-red-700 border border-red-200 shadow-2xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span>
                        Resmi & Terverifikasi
                    </span>
                    <span class="hidden md:inline text-slate-500">Dikelola resmi oleh</span>
                    <strong class="text-slate-900 tracking-wide uppercase font-black">{{ $settings['company_legal_name'] ?? 'PT PERDANA MEGA TRANS' }}</strong>
                </div>

                <div class="flex items-center gap-4 text-slate-500 text-[11px]">
                    <span class="text-red-700 font-bold hidden lg:inline">★ Sewa Harian • Mingguan • Bulanan Makassar</span>
                    <a href="{{ route('admin.login') }}" class="text-slate-500 hover:text-red-600 transition flex items-center gap-1 font-semibold">
                        <svg class="w-3 h-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        Portal Admin
                    </a>
                </div>
            </div>
        </aside>

        <!-- Navbar White Glass Header with Red Bottom Border Accent -->
        <header class="sticky top-0 z-40 glass-nav border-b border-red-100/80 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                
                <!-- Brand Logo (Statis Logo Resmi VIDALIDAY dengan Ring Aksen Merah) -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-red-500/30 ring-2 ring-red-500/10 shadow-md group-hover:border-red-600 group-hover:scale-105 transition-all shrink-0 bg-white">
                        <img src="{{ !empty($siteLogo) ? asset('storage/' . $siteLogo) : asset('images/logo_vidaliday.png') }}" 
                             alt="VIDALIDAY Logo" 
                             class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="text-2xl font-black tracking-tight text-slate-900 flex items-center gap-0.5">
                            VIDALIDAY
                            <span class="text-red-600 text-3xl leading-none">.</span>
                        </div>
                        <p class="text-[10px] tracking-widest uppercase text-red-700/85 -mt-1 font-extrabold flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 inline-block"></span>
                            Apartment By Us
                        </p>
                    </div>
                </a>

                <!-- Desktop Nav with Red Interactive Chips & Active Pill -->
                <nav class="hidden md:flex items-center gap-1 lg:gap-2 text-sm font-bold text-slate-600">
                    <a href="{{ route('home') }}#lokasi" class="px-3 py-1.5 rounded-full hover:bg-red-50 hover:text-red-600 transition-all">Pilihan Apartemen</a>
                    <a href="{{ route('home') }}#katalog-kamar" class="px-3 py-1.5 rounded-full hover:bg-red-50 hover:text-red-600 transition-all flex items-center gap-1.5">
                        <span>Kamar & Promo</span>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] font-black bg-red-600 text-white uppercase tracking-wider animate-pulse">Hot</span>
                    </a>
                    <a href="{{ route('home') }}#fasilitas" class="px-3 py-1.5 rounded-full hover:bg-red-50 hover:text-red-600 transition-all">Fasilitas</a>
                    <a href="{{ route('home') }}#jarak" class="px-3 py-1.5 rounded-full hover:bg-red-50 hover:text-red-600 transition-all">Lokasi</a>
                    <a href="{{ route('home') }}#faq" class="px-3 py-1.5 rounded-full hover:bg-red-50 hover:text-red-600 transition-all">FAQ</a>
                    <a href="{{ route('about') }}" class="px-3 py-1.5 rounded-full transition-all {{ request()->routeIs('about') ? 'bg-red-50 text-red-600 font-extrabold ring-1 ring-red-200' : 'hover:bg-red-50 hover:text-red-600' }}">Tentang Kami</a>
                </nav>

                <!-- Action CTA Area with Red Button & WhatsApp -->
                @php
                    $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285711696970');
                    $defaultWaUrl = 'https://wa.me/' . $waClean . '?text=' . urlencode("Halo Admin VIDALIDAY, saya ingin tanya ketersediaan sewa apartemen di Makassar.");
                @endphp
                <div class="flex items-center gap-2.5 sm:gap-3">
                    <!-- Red Accent CTA: Cek Kamar -->
                    <a href="{{ route('home') }}#katalog-kamar" class="hidden lg:inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-black shadow-md shadow-red-500/25 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>Cek Kamar</span>
                    </a>

                    <!-- WhatsApp CTA -->
                    <a href="{{ $defaultWaUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white shadow-md shadow-emerald-500/20 transition-all hover:scale-105 active:scale-95" aria-label="WhatsApp Admin" title="Hubungi WhatsApp">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </a>

                    <!-- Mobile Menu Hamburger with Red Hover -->
                    <button type="button" onclick="toggleMobileNav()" class="md:hidden p-2.5 rounded-xl text-slate-700 hover:text-red-600 hover:bg-red-50 border border-slate-200/90 hover:border-red-200 transition" aria-label="Toggle Menu">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Drawer with Red Accents -->
            <div id="mobile-nav" class="hidden md:hidden px-4 pt-3 pb-6 border-t border-red-100 bg-white/98 backdrop-blur-xl space-y-2 shadow-xl">
                <a href="{{ route('home') }}#lokasi" onclick="toggleMobileNav()" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-red-50 hover:text-red-600 transition">
                    <span>Pilihan Apartemen</span>
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('home') }}#katalog-kamar" onclick="toggleMobileNav()" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-red-50 hover:text-red-600 transition">
                    <span class="flex items-center gap-2">
                        <span>Daftar Kamar & Promo</span>
                        <span class="px-2 py-0.5 rounded-full text-[9px] font-black bg-red-600 text-white uppercase tracking-wider">Hot</span>
                    </span>
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('home') }}#fasilitas" onclick="toggleMobileNav()" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-red-50 hover:text-red-600 transition">
                    <span>Fasilitas Gedung</span>
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('home') }}#jarak" onclick="toggleMobileNav()" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-red-50 hover:text-red-600 transition">
                    <span>Lokasi & Landmark Sekitar</span>
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('home') }}#faq" onclick="toggleMobileNav()" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-red-50 hover:text-red-600 transition">
                    <span>Tanya Jawab (FAQ)</span>
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('about') }}" onclick="toggleMobileNav()" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-bold text-red-600 bg-red-50/70 hover:bg-red-100 transition">
                    <span>Tentang Kami (About Us)</span>
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <div class="pt-2">
                    <a href="{{ route('home') }}#katalog-kamar" onclick="toggleMobileNav()" class="w-full py-3 px-4 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-black flex items-center justify-center gap-2 shadow-md shadow-red-500/25 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>LIHAT DAFTAR UNIT & HARGA</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- White Glassmorphic Footer -->
        <footer class="mt-20 border-t border-slate-200/80 bg-white/80 backdrop-blur-xl relative z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                    
                    <!-- Column 1: Brand & Legal Info -->
                    <div class="md:col-span-2 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-full overflow-hidden border border-slate-200/80 shadow-md shrink-0 bg-white">
                                <img src="{{ !empty($siteLogo) ? asset('storage/' . $siteLogo) : asset('images/logo_vidaliday.png') }}" 
                                     alt="VIDALIDAY Logo" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div>
                                <span class="text-2xl font-black text-slate-900 tracking-tight">VIDALIDAY</span>
                                <span class="text-red-600 text-2xl font-black">.</span>
                                <p class="text-[11px] uppercase tracking-wider text-slate-500 font-bold">Apartment By Us</p>
                            </div>
                        </div>

                        <p class="text-sm text-slate-600 leading-relaxed max-w-md">
                            Katalog digital resmi sewa apartemen harian, mingguan, dan bulanan di Makassar. Menjamin kenyamanan kelas satu, kebersihan terstandarisasi, dan transaksi resmi aman 100%.
                        </p>

                        <!-- Legal Badge Card -->
                        <div class="p-4 rounded-xl glass-card border border-red-200/60 max-w-md">
                            <div class="flex items-start gap-3">
                                <div class="p-2 rounded-lg bg-red-50 text-red-600 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Badan Hukum Resmi</h4>
                                    <p class="text-sm font-bold text-red-700">{{ $settings['company_legal_name'] ?? 'PT PERDANA MEGA TRANS' }}</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Jaminan transaksi aman langsung terkonfirmasi ke WhatsApp admin resmi.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2: Lokasi Apartemen -->
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-4 border-l-2 border-red-600 pl-3">Pilihan Lokasi</h4>
                        <ul class="space-y-2.5 text-sm text-slate-600">
                            <li>
                                <a href="#katalog-kamar" onclick="switchLocation('delft-cpi')" class="hover:text-red-600 transition flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                                    Apartemen Delft CPI (Pantai)
                                </a>
                            </li>
                            <li>
                                <a href="#katalog-kamar" onclick="switchLocation('vida-view')" class="hover:text-red-600 transition flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                                    Apartemen Vida View (Panakkukang)
                                </a>
                            </li>
                            <li><a href="{{ route('home') }}#fasilitas" class="hover:text-red-600 transition">Fasilitas Gedung</a></li>
                            <li><a href="{{ route('home') }}#jarak" class="hover:text-red-600 transition">Akses Lokasi & Landmark</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-red-600 transition font-semibold text-red-700">Tentang VIDALIDAY</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Kontak & Operasional -->
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-4 border-l-2 border-emerald-500 pl-3">Kontak & Layanan</h4>
                        <ul class="space-y-2.5 text-sm text-slate-600">
                            <li class="flex items-center gap-2">
                                <span class="text-emerald-600 font-bold">WA:</span>
                                <a href="{{ $defaultWaUrl }}" target="_blank" class="hover:underline font-mono text-emerald-700 font-bold">{{ $settings['contact_phone'] ?? '+62 857-1169-6970' }}</a>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400">Jam Layanan:</span>
                                <span>{{ $settings['office_hours'] ?? '08.00 - 23.00 WITA' }}</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400">Area:</span>
                                <span>Makassar, Sulawesi Selatan</span>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="mt-12 pt-6 border-t border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                    <p>© {{ date('Y') }} VIDALIDAY — Seluruh Hak Cipta Dilindungi. Naungan {{ $settings['company_legal_name'] ?? 'PT PERDANA MEGA TRANS' }}.</p>
                    <p class="text-slate-500 font-medium">Sewa Apartemen Modern & Tepercaya di Makassar</p>
                </div>
            </div>
        </footer>

        <!-- Mobile Floating Sticky WhatsApp Booking Bar with Red Accent -->
        <div class="fixed bottom-0 inset-x-0 p-3 sm:hidden z-50 glass-nav border-t border-red-100/90 shadow-2xl">
            <div class="flex items-center gap-2 max-w-md mx-auto">
                <a href="#katalog-kamar" class="flex-1 py-3 px-3 text-center rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-black shadow-md shadow-red-500/25 border border-red-600 transition">
                    Pilih Kamar
                </a>
                <a href="{{ $defaultWaUrl }}" target="_blank" rel="noopener noreferrer" class="flex-[2] py-3 px-4 text-center rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-extrabold flex items-center justify-center gap-2 shadow-lg shadow-emerald-500/25 transition">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    Pesan via WhatsApp
                </a>
            </div>
        </div>

    </div>

    <!-- Vanilla JS Functions -->
    <script>
        function toggleMobileNav() {
            const nav = document.getElementById('mobile-nav');
            if (nav) nav.classList.toggle('hidden');
        }

        // Unit Card Multi-Image Slider Functions
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
                // If track has width: total * 100%, shifting by 1 slide means shifting by (100 / total)% of the track
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
                    dot.className = 'slide-dot h-1.5 rounded-full transition-all duration-300 bg-white/40 w-1.5';
                }
            });
        }

        // Swipe Touch Support for Unit Card Sliders
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.group\\/slider').forEach(slider => {
                let startX = 0;
                let startY = 0;
                slider.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                    startY = e.touches[0].clientY;
                }, { passive: true });

                slider.addEventListener('touchend', (e) => {
                    const diffX = e.changedTouches[0].clientX - startX;
                    const diffY = e.changedTouches[0].clientY - startY;
                    const total = slider.querySelectorAll('.slider-track > div').length;
                    if (total <= 1) return;
                    if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 35) {
                        if (diffX < 0) {
                            nextUnitSlide(slider.id, total);
                        } else {
                            prevUnitSlide(slider.id, total);
                        }
                    }
                }, { passive: true });
            });
        });

        function switchLocation(slug) {
            // Update Tab Buttons UI with High-Contrast Active States
            const tabs = document.querySelectorAll('.loc-tab-btn');
            tabs.forEach(btn => {
                const isTarget = btn.getAttribute('data-target') === slug;
                const icon = btn.querySelector('.tab-icon');
                const title = btn.querySelector('.tab-title');
                const desc = btn.querySelector('.tab-desc');
                const badge = btn.querySelector('.tab-badge');

                if (isTarget) {
                    btn.className = 'loc-tab-btn py-3 sm:py-3.5 px-3.5 sm:px-6 rounded-xl text-left transition-all duration-300 relative group flex items-center justify-between gap-2.5 sm:gap-3 bg-red-600 text-white font-black shadow-lg shadow-red-500/30 ring-2 ring-red-600';
                    if (icon) icon.className = 'tab-icon w-8 h-8 rounded-lg bg-white/20 text-white flex items-center justify-center text-sm shrink-0 font-bold';
                    if (title) title.className = 'tab-title block text-xs sm:text-base font-black leading-tight text-white truncate';
                    if (desc) desc.className = 'tab-desc text-[10px] sm:text-[11px] block font-medium opacity-90 text-red-100 truncate';
                    if (badge) badge.className = 'tab-badge px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-black uppercase tracking-wider shrink-0 bg-white text-red-700 shadow-sm';
                } else {
                    btn.className = 'loc-tab-btn py-3 sm:py-3.5 px-3.5 sm:px-6 rounded-xl text-left transition-all duration-300 relative group flex items-center justify-between gap-2.5 sm:gap-3 bg-slate-50 hover:bg-slate-100 text-slate-700 font-bold border border-slate-200/90';
                    if (icon) icon.className = 'tab-icon w-8 h-8 rounded-lg bg-slate-200/80 text-slate-700 flex items-center justify-center text-sm shrink-0 font-bold';
                    if (title) title.className = 'tab-title block text-xs sm:text-base font-bold leading-tight text-slate-800 truncate';
                    if (desc) desc.className = 'tab-desc text-[10px] sm:text-[11px] block font-normal text-slate-500 truncate';
                    if (badge) badge.className = 'tab-badge px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-bold uppercase tracking-wider shrink-0 bg-slate-200 text-slate-600';
                }
            });

            // Toggle Unit Lists
            const delftUnits = document.getElementById('units-delft-cpi');
            const vidaUnits = document.getElementById('units-vida-view');
            const delftFacilities = document.getElementById('facilities-delft-cpi');
            const vidaFacilities = document.getElementById('facilities-vida-view');

            if (slug === 'delft-cpi') {
                if (delftUnits) delftUnits.classList.remove('hidden');
                if (vidaUnits) vidaUnits.classList.add('hidden');
                if (delftFacilities) delftFacilities.classList.remove('hidden');
                if (vidaFacilities) vidaFacilities.classList.add('hidden');
            } else {
                if (delftUnits) delftUnits.classList.add('hidden');
                if (vidaUnits) vidaUnits.classList.remove('hidden');
                if (delftFacilities) delftFacilities.classList.add('hidden');
                if (vidaFacilities) vidaFacilities.classList.remove('hidden');
            }

            if (typeof updateCountIndicator === 'function') {
                updateCountIndicator();
            }
        }
    </script>
    @stack('scripts')
</body>
</html>
