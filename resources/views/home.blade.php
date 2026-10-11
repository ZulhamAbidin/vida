@extends('layouts.app')

@section('title', 'VIDALIDAY | Sewa Apartemen Resmi Makassar - Delft CPI & Vida View')
@section('meta_description', 'Katalog resmi sewa apartemen harian, mingguan, & bulanan di Makassar: Apartemen Delft CPI & Vida View di bawah naungan PT PERDANA MEGA TRANS. Dapatkan harga promo dan pemesanan cepat via WhatsApp.')

@section('content')

    <!-- 1. HERO SECTION WHITE GLASSMORPHISM WITH HIGH-RES BUILDING BACKGROUND -->
    <section class="relative pt-8 pb-16 md:pt-16 md:pb-24 overflow-hidden">
        <!-- Background Foto Gedung Asli Tampak Bersih, Cerah & Alami (Tanpa Efek Gelap) -->
        <div class="absolute inset-0 pointer-events-none -z-10 overflow-hidden">
            <img src="{{ !empty($heroImage) ? asset('storage/' . $heroImage) : asset('images/bg_brentsville_wide.jpg') }}" 
                 alt="Foto Gedung Apartemen VIDALIDAY Makassar" 
                 class="w-full h-full object-cover object-center transition-all duration-700">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Column: Solid White Search / Booking Widget Card (Gaya Traveloka / Booking.com) -->
                <div class="lg:col-span-7">
                    <!-- Elevate Solid White Card -->
                    <div class="relative bg-white rounded-3xl p-4 sm:p-8 shadow-2xl shadow-slate-950/30 border border-slate-100 text-slate-800">
                        
                        <!-- Header Status Tag -->
                        <div class="flex items-center justify-between gap-1.5 border-b border-slate-100 pb-2.5 mb-3">
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-900 text-white text-[10px] sm:text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="text-amber-300 font-bold uppercase tracking-wider text-[9px] sm:text-[11px]">Sewa Apartemen</span>
                                <span class="text-slate-500">•</span>
                                <span class="text-slate-200 text-[9px] sm:text-[11px]">Makassar</span>
                            </div>
                            <span class="text-[9px] sm:text-[11px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full border border-amber-200/60 uppercase tracking-wider">
                                Best Rate Guarantee
                            </span>
                        </div>

                        <!-- Main Headline: Persis Permintaan User -->
                        <div class="space-y-1 mb-3.5">
                            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight leading-snug">
                                Nikmati Hunian Mewah di
                                <span class="block text-amber-600 font-black mt-0.5 text-xl sm:text-2xl md:text-3xl lg:text-4xl">
                                    DELFT CPI & VIDA VIEW
                                </span>
                            </h1>
                            <p class="text-slate-600 text-xs sm:text-sm font-normal leading-relaxed pt-1">
                                Pilihan tepat untuk kenyamanan menginap harian, mingguan, & bulanan dengan fasilitas lengkap, unit higienis, dan pemandangan terbaik kota Makassar.
                            </p>
                        </div>

                        <!-- Booking Widget: Full-Width Prominent PROMO Box (Hanya Tampil Jika Ada Hero Favorit) -->
                        @if($featuredUnit)
                            @php
                                $displayPromoPrice = $featuredUnit->is_promo_active && $featuredUnit->promo_price > 0 
                                    ? $featuredUnit->formatted_promo_price 
                                    : $featuredUnit->formatted_normal_price;
                                $hasStrikePrice = $featuredUnit->is_promo_active && $featuredUnit->normal_price > $featuredUnit->promo_price;
                                $strikePrice = $hasStrikePrice ? $featuredUnit->formatted_normal_price : null;
                                $rentalPeriod = strtolower($featuredUnit->rental_period ?? 'malam');
                                $isPromo = $featuredUnit->is_promo_active && $featuredUnit->promo_price > 0;
                            @endphp
                            <div class="mb-4 p-3 sm:p-4 rounded-2xl bg-gradient-to-r from-amber-50 via-orange-50/80 to-amber-100/60 border-2 border-amber-400/90 shadow-md flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-left">
                                <div class="flex items-center gap-2.5 sm:gap-3 w-full sm:w-auto">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-tr from-amber-500 to-amber-600 text-white flex items-center justify-center shrink-0 shadow-lg shadow-amber-500/30">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-1.5">
                                            @if($isPromo)
                                                <span class="px-1.5 sm:px-2 py-0.5 rounded-md bg-rose-600 text-white text-[9px] sm:text-[11px] font-black uppercase tracking-wider shadow-sm animate-pulse">
                                                    PROMO
                                                </span>
                                            @endif
                                            <span class="text-[9px] sm:text-xs font-bold text-slate-500 uppercase tracking-wider">
                                                {{ $isPromo ? 'HARGA SPESIAL MULAI DARI' : 'TARIF SEWA TERBAIK' }}
                                            </span>
                                        </div>
                                        <div class="flex items-baseline gap-2 mt-1 flex-wrap">
                                            <span class="text-lg sm:text-2xl lg:text-3xl font-black text-slate-950 tracking-tight leading-none">
                                                {{ $displayPromoPrice }}
                                            </span>
                                            @if($hasStrikePrice)
                                                <span class="text-xs sm:text-sm font-semibold text-rose-500 line-through">
                                                    {{ $strikePrice }}
                                                </span>
                                            @endif
                                            <span class="text-[11px] sm:text-sm font-bold text-amber-600"> /{{ $rentalPeriod }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Duration Tags & Guarantee -->
                                <div class="flex items-center gap-2 text-[9px] sm:text-xs font-extrabold uppercase tracking-wider w-full sm:w-auto justify-between sm:justify-end border-t sm:border-t-0 border-amber-200/60 pt-2 sm:pt-0">
                                    <div class="flex items-center gap-1 sm:gap-2 bg-white/80 px-2 sm:px-2.5 py-1 rounded-xl border border-amber-300/60 shadow-xs">
                                        <span class="text-emerald-600 font-black">HARIAN</span>
                                        <span class="text-slate-300">•</span>
                                        <span class="text-slate-700">MINGGUAN</span>
                                        <span class="text-slate-300">•</span>
                                        <span class="text-slate-700">BULANAN</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Tampilan Rapi Ketika Belum Ada Unit Favorit Dipilih Admin -->
                            <div class="mb-4 p-3 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center justify-between gap-2 text-[10px] sm:text-xs font-bold text-slate-600">
                                <span class="flex items-center gap-1.5 text-blue-700">
                                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                                    Pilihan Durasi Sewa:
                                </span>
                                <div class="flex items-center gap-1.5 font-extrabold uppercase tracking-wider">
                                    <span class="text-emerald-600">HARIAN</span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-slate-700">MINGGUAN</span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-slate-700">BULANAN</span>
                                </div>
                            </div>
                        @endif

                        <!-- CTA Action Area -->
                        <div class="flex flex-col sm:flex-row items-center gap-2.5 sm:gap-3">
                            @php
                                $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285711696970');
                                $heroWa = "https://wa.me/{$waClean}?text=" . urlencode("Halo Admin VIDALIDAY, saya ingin reservasi apartemen (Delft CPI / Vida View Makassar). Mohon info ketersediaan kamar. Terima kasih!");
                            @endphp

                            <!-- Button Reservasi WA (Sesuai Permintaan User) -->
                            <a href="{{ $heroWa }}" target="_blank" rel="noopener noreferrer" class="w-full sm:flex-1 py-3 sm:py-3.5 px-4 sm:px-6 rounded-2xl bg-[#05c46b] hover:bg-[#04b060] text-white font-extrabold text-xs sm:text-sm flex items-center justify-center gap-2 transition-all shadow-lg shadow-emerald-500/25 active:scale-95 text-center">
                                <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3 fill-current text-white" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                </div>
                                <span>Reservasi via WhatsApp</span>
                            </a>

                            <!-- Button Lihat Katalog -->
                            <a href="#katalog-kamar" class="w-full sm:w-auto py-2.5 sm:py-3.5 px-4 sm:px-5 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs uppercase tracking-wider transition-all text-center">
                                Lihat Unit
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Card Favorit Putih Elegan / White Glassmorphic Card (Tidak Berwarna Hitam) -->
                <div class="lg:col-span-5 relative">
                    <!-- Subtle Glow Behind -->
                    <div class="absolute -inset-1.5 bg-gradient-to-r from-blue-300/30 via-sky-300/30 to-amber-300/30 rounded-[2.5rem] blur-2xl opacity-75"></div>
                    
                    <!-- Card Favorit Berwarna Putih Elegan dengan Golden Border Halus -->
                    <div class="relative rounded-[2rem] p-4 sm:p-5 bg-white/90 backdrop-blur-xl border border-white/80 shadow-2xl shadow-slate-300/60 space-y-4">
                        
                        @if($featuredUnit)
                        <!-- Top Badge on Building -->
                        <div class="relative h-64 sm:h-80 rounded-2xl overflow-hidden group bg-slate-100 border border-slate-200/80 shadow-inner">
                            <!-- Foto Gedung Brentsville Tower / Unit Featured -->
                            <img src="{{ $featuredUnit->image_url ?? asset('images/bg_brentsville_wide.jpg') }}" 
                                 alt="{{ $featuredUnit->name ?? 'Brentsville Tower Vida View Makassar' }}" 
                                 class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-transparent to-transparent"></div>
                            
                            <!-- Star Best Seller Badge -->
                            <div class="absolute top-3 left-3 px-3 py-1 rounded-full bg-slate-900/85 backdrop-blur-md text-[11px] font-black text-amber-300 flex items-center gap-1.5 shadow-md border border-amber-400/40">
                                <span>⭐</span>
                                <span>Best Seller Panakkukang</span>
                            </div>

                            @if($featuredUnit && $featuredUnit->promo_badge)
                                <div class="absolute top-3 right-3 px-3 py-1 rounded-full bg-rose-600 text-white text-[11px] font-black shadow-md">
                                    {{ $featuredUnit->promo_badge }}
                                </div>
                            @endif
                        </div>

                        <!-- Micro Info -->
                        <div class="grid grid-cols-2 gap-3 text-xs">
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/70 flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div>
                                    <span class="text-slate-400 block text-[10px]">Kapasitas Tamu</span>
                                    <span class="text-slate-800 font-bold">Maks. {{ $featuredUnit->max_guests ?? 2 }} Orang</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/70 flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <div>
                                    <span class="text-slate-400 block text-[10px]">Keamanan Resmi</span>
                                    <span class="text-slate-800 font-bold">100% Bebas Penipuan</span>
                                </div>
                            </div>
                        </div>

                        <!-- Special Price Highlight Card -->
                        @php
                            $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285711696970');
                            $featuredLocName = $featuredUnit->location->name ?? 'Makassar';
                            $featuredPrice = $featuredUnit->is_promo_active ? $featuredUnit->formatted_promo_price : $featuredUnit->formatted_normal_price;
                            $featuredMsg = "Halo Admin VIDALIDAY, saya tertarik memesan unit Pilihan Favorit Tamu:\n- Unit: " . ($featuredUnit->name ?? '') . " (" . ($featuredUnit->room_type ?? '') . ")\n- Lokasi: " . $featuredLocName . "\n- Harga: " . $featuredPrice . " / " . ($featuredUnit->rental_period ?? 'Malam') . "\n\nMohon info ketersediaan kamar. Terima kasih!";
                            $featuredWaUrl = "https://wa.me/{$waClean}?text=" . urlencode($featuredMsg);
                        @endphp
                        <div class="p-3 sm:p-3.5 rounded-xl bg-blue-50/80 border border-blue-200/80 flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
                            <div>
                                <span class="text-[10px] text-slate-500 block uppercase font-bold tracking-wider">Tarif Sewa</span>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base sm:text-lg font-black text-blue-700">
                                        {{ $featuredUnit->is_promo_active ? $featuredUnit->formatted_promo_price : $featuredUnit->formatted_normal_price }}
                                    </span>
                                    @if($featuredUnit->is_promo_active && $featuredUnit->normal_price > $featuredUnit->promo_price)
                                        <span class="text-xs text-slate-400 line-through">{{ $featuredUnit->formatted_normal_price }}</span>
                                    @endif
                                </div>
                            </div>
                            <button type="button" 
                                    onclick="openBookingModal('{{ addslashes($featuredUnit->name) }}', '{{ addslashes($featuredUnit->room_type) }}', '{{ addslashes($featuredLocName) }}', '{{ $featuredPrice }}', '{{ $featuredUnit->rental_period }}', '{{ $featuredUnit->image_url }}', {{ (int)$featuredUnit->max_guests }})" 
                                    class="w-full sm:w-auto px-3.5 py-2.5 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                <span>Pesan Kamar Ini</span>
                            </button>
                        </div>
                        @else
                        <!-- Fallback Ketika Belum Ada Unit / Unit Rujukan Dihapus Admin -->
                        <div class="h-64 sm:h-72 rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50/70 flex flex-col items-center justify-center p-6 text-center space-y-3">
                            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-800">Pilihan Favorit Tamu</h4>
                                <p class="text-xs text-slate-500 mt-1 max-w-xs">
                                    Admin belum menambahkan unit kamar pilihan favorit atau data sedang diperbarui.
                                </p>
                            </div>
                            <a href="#units-section" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition shadow-sm">
                                Lihat Semua Unit
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 2. PROMO BANNER STRIP -->
    @if(!empty($settings['promo_banner_text']))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-4 mb-10">
        <div class="p-4 rounded-2xl bg-white/80 border border-blue-200/80 backdrop-blur-md shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
            <div class="flex items-center gap-3">
                <span class="p-1.5 px-2.5 rounded-lg bg-blue-600 text-white font-black text-xs shrink-0 uppercase tracking-wider shadow-sm">
                    PROMO
                </span>
                <p class="text-sm font-semibold text-slate-800">
                    {{ $settings['promo_banner_text'] }}
                </p>
            </div>
            <a href="#katalog-kamar" class="shrink-0 px-4 py-2 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-700 text-xs font-bold border border-blue-200 transition">
                Lihat Promo
            </a>
        </div>
    </div>
    @endif

    <!-- 3. LOKASI & KATALOG KAMAR SECTION -->
    <section id="katalog-kamar" class="py-12 sm:py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-10 space-y-2 sm:space-y-2.5">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                    Katalog Kamar & Promo
                </span>
                <h2 class="text-xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight">
                    Pilih Lokasi & Unit Kamar Sesuai Kebutuhan Anda
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mx-auto">
                    Seluruh unit dilengkapi ranjang berkualitas, pendingin ruangan (AC), hiburan Smart TV, WiFi kecepatan tinggi, serta perlengkapan mandi bersih.
                </p>
            </div>

            <!-- Location Selector Switcher (Responsive Mobile & Desktop) -->
            <div id="lokasi" class="flex flex-col items-center justify-center mb-8 sm:mb-10 w-full">
                <div class="text-center mb-2.5 sm:mb-3">
                    <span class="text-[10px] sm:text-[11px] font-black uppercase tracking-wider text-slate-500">PILIH KATEGORI LOKASI APARTEMEN:</span>
                </div>
                
                <div class="w-full max-w-2xl px-1">
                    <div class="grid grid-cols-1 sm:grid-cols-2 p-1.5 sm:p-2 rounded-2xl glass-card border border-blue-200/90 shadow-lg shadow-blue-500/10 w-full bg-white/95 gap-2">
                        <!-- Tab Apartemen Delft CPI -->
                        <button type="button" 
                                data-target="delft-cpi" 
                                onclick="switchLocation('delft-cpi')" 
                                class="loc-tab-btn py-3 sm:py-3.5 px-3.5 sm:px-6 rounded-xl text-left transition-all duration-300 relative group flex items-center justify-between gap-2.5 sm:gap-3 bg-blue-600 text-white font-black shadow-lg shadow-blue-500/30 ring-2 ring-blue-600">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="tab-icon w-8 h-8 rounded-lg bg-white/20 text-white flex items-center justify-center text-sm shrink-0 font-bold">
                                    🌊
                                </span>
                                <div class="text-left min-w-0">
                                    <span class="tab-title block text-xs sm:text-base font-black leading-tight text-white truncate">Apartemen Delft CPI</span>
                                    <span class="tab-desc text-[10px] sm:text-[11px] block font-medium opacity-90 text-blue-100 truncate">Pantai Losari & Center Point</span>
                                </div>
                            </div>
                            <span class="tab-badge px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-black uppercase tracking-wider shrink-0 bg-white text-blue-700 shadow-sm">
                                {{ $delft->units->count() ?? 0 }} Unit
                            </span>
                        </button>

                        <!-- Tab Apartemen Vida View -->
                        <button type="button" 
                                data-target="vida-view" 
                                onclick="switchLocation('vida-view')" 
                                class="loc-tab-btn py-3 sm:py-3.5 px-3.5 sm:px-6 rounded-xl text-left transition-all duration-300 relative group flex items-center justify-between gap-2.5 sm:gap-3 bg-slate-50 hover:bg-slate-100 text-slate-700 font-bold border border-slate-200/90">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="tab-icon w-8 h-8 rounded-lg bg-slate-200/80 text-slate-700 flex items-center justify-center text-sm shrink-0 font-bold">
                                    🏙️
                                </span>
                                <div class="text-left min-w-0">
                                    <span class="tab-title block text-xs sm:text-base font-bold leading-tight text-slate-800 truncate">Apartemen Vida View</span>
                                    <span class="tab-desc text-[10px] sm:text-[11px] block font-normal text-slate-500 truncate">Pusat Kota Panakkukang</span>
                                </div>
                            </div>
                            <span class="tab-badge px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-bold uppercase tracking-wider shrink-0 bg-slate-200 text-slate-600">
                                {{ $vida->units->count() ?? 0 }} Unit
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Filter Bar: Sortir & Kontrol Tampilan Unit -->
            <div class="mb-8 p-4 rounded-2xl glass-card border border-slate-200/90 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2.5 text-xs text-slate-600">
                    <span class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    </span>
                    <div>
                        <span class="font-bold text-slate-800 block text-xs sm:text-sm">Filter & Urutan Kamar</span>
                        <span id="unit-count-indicator" class="text-[11px] text-slate-500">Menampilkan 3 kamar rekomendasi terbaik</span>
                    </div>
                </div>

                <!-- Sorting Select / Buttons -->
                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <label for="unit-sort-filter" class="text-xs font-bold text-slate-500 uppercase tracking-wider shrink-0 hidden sm:inline">Urutkan:</label>
                    <div class="relative w-full sm:w-56">
                        <select id="unit-sort-filter" onchange="applyUnitSorting(this.value)" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-bold text-slate-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 cursor-pointer">
                            <option value="featured">Paling Populer & Rekomendasi</option>
                            <option value="terbaru">Terbaru (Baru Ditambahkan)</option>
                            <option value="termurah">Termurah (Harga Terendah)</option>
                            <option value="termahal">Termahal (Kamar Eksklusif)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- GROUP 1: UNITS APARTEMEN DELFT CPI -->
            <div id="units-delft-cpi" class="space-y-8">
                <!-- Location Info Card -->
                <div class="p-4 sm:p-6 rounded-2xl glass-card border border-blue-200/70 flex flex-col md:flex-row items-start md:items-center justify-between gap-3 sm:gap-4">
                    <div>
                        <div class="flex flex-wrap items-center gap-1.5 sm:gap-2">
                            <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-[10px] sm:text-xs font-bold border border-blue-200 shrink-0">Center Point of Indonesia</span>
                            <span class="text-[10px] sm:text-xs text-slate-500 whitespace-nowrap">• Waterfront & Sunset View</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-black text-slate-900 mt-1 leading-snug">{{ $delft->name ?? 'Apartemen Delft CPI' }}</h3>
                        <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mt-1 leading-relaxed">{{ $delft->description ?? '' }}</p>
                    </div>
                    <div class="text-[11px] sm:text-xs text-slate-500 flex items-center gap-1.5 shrink-0 mt-1 md:mt-0">
                        <svg class="w-4 h-4 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        <span>Jl. Metro Tanjung Bunga, Makassar</span>
                    </div>
                </div>

                <!-- Units Grid Delft CPI -->
                <div id="grid-delft-cpi" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @forelse($delft->units ?? [] as $unit)
                        @include('partials.unit-card', ['unit' => $unit, 'locationName' => $delft->name ?? 'Delft CPI'])
                    @empty
                        <div class="col-span-3 text-center py-12 glass-card rounded-2xl">
                            <p class="text-slate-500 text-sm">Unit di Apartemen Delft CPI sedang dipersiapkan oleh admin.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Load More / View All Button Delft CPI -->
                @if(isset($delft->units) && $delft->units->count() > 3)
                    <div class="text-center pt-2">
                        <button type="button" 
                                id="btn-toggle-delft-cpi" 
                                onclick="toggleShowMoreUnits('grid-delft-cpi', 'btn-toggle-delft-cpi', {{ $delft->units->count() }})" 
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white hover:bg-slate-50 text-blue-600 hover:text-blue-700 font-extrabold text-xs sm:text-sm border border-blue-200 shadow-sm hover:shadow transition transform hover:-translate-y-0.5">
                            <span>Tampilkan Lebih Banyak ({{ $delft->units->count() - 3 }} Kamar Lainnya)</span>
                            <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                    </div>
                @endif
            </div>

            <!-- GROUP 2: UNITS APARTEMEN VIDA VIEW -->
            <div id="units-vida-view" class="space-y-8 hidden">
                <!-- Location Info Card -->
                <div class="p-4 sm:p-6 rounded-2xl glass-card border border-blue-200/70 flex flex-col md:flex-row items-start md:items-center justify-between gap-3 sm:gap-4">
                    <div>
                        <div class="flex flex-wrap items-center gap-1.5 sm:gap-2">
                            <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-[10px] sm:text-xs font-bold border border-blue-200 shrink-0">Panakkukang District</span>
                            <span class="text-[10px] sm:text-xs text-slate-500 whitespace-nowrap">• City Skyline & Sebelah Mall</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-black text-slate-900 mt-1 leading-snug">{{ $vida->name ?? 'Apartemen Vida View' }}</h3>
                        <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mt-1 leading-relaxed">{{ $vida->description ?? '' }}</p>
                    </div>
                    <div class="text-[11px] sm:text-xs text-slate-500 flex items-center gap-1.5 shrink-0 mt-1 md:mt-0">
                        <svg class="w-4 h-4 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        <span>Jl. Topaz Raya, Panakkukang, Makassar</span>
                    </div>
                </div>

                <!-- Units Grid Vida View -->
                <div id="grid-vida-view" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @forelse($vida->units ?? [] as $unit)
                        @include('partials.unit-card', ['unit' => $unit, 'locationName' => $vida->name ?? 'Vida View'])
                    @empty
                        <div class="col-span-3 text-center py-12 glass-card rounded-2xl">
                            <p class="text-slate-500 text-sm">Unit di Apartemen Vida View sedang dipersiapkan oleh admin.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Load More / View All Button Vida View -->
                @if(isset($vida->units) && $vida->units->count() > 3)
                    <div class="text-center pt-2">
                        <button type="button" 
                                id="btn-toggle-vida-view" 
                                onclick="toggleShowMoreUnits('grid-vida-view', 'btn-toggle-vida-view', {{ $vida->units->count() }})" 
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white hover:bg-slate-50 text-blue-600 hover:text-blue-700 font-extrabold text-xs sm:text-sm border border-blue-200 shadow-sm hover:shadow transition transform hover:-translate-y-0.5">
                            <span>Tampilkan Lebih Banyak ({{ $vida->units->count() - 3 }} Kamar Lainnya)</span>
                            <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                    </div>
                @endif
            </div>

        </div>
    </section>

    <!-- 4. FASILITAS GEDUNG SHOWCASE -->
    <section id="fasilitas" class="py-12 sm:py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                    Fasilitas Gedung
                </span>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-slate-900">
                    Fasilitas Lengkap untuk Kenyamanan Anda
                </h2>
                <p class="text-xs sm:text-sm text-slate-600">
                    Kenyamanan menginap didukung fasilitas gedung yang siap dinikmati selama waktu sewa Anda.
                </p>
            </div>

            <!-- Facilities for Delft CPI -->
            <div id="facilities-delft-cpi" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7">
                @forelse($delft->facilities ?? [] as $fac)
                    <div class="relative h-80 sm:h-84 rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 group border border-slate-200/90 flex flex-col justify-between">
                        <!-- Background Image or Gradient Background -->
                        @if($fac->image_url)
                            <img src="{{ $fac->image_url }}" alt="{{ $fac->name }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-black/30 pointer-events-none"></div>
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-indigo-950 to-slate-950"></div>
                            <div class="absolute -right-8 -bottom-8 w-44 h-44 rounded-full bg-blue-500/10 blur-2xl pointer-events-none"></div>
                            <div class="absolute left-6 -top-6 w-36 h-36 rounded-full bg-indigo-500/15 blur-xl pointer-events-none"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent pointer-events-none"></div>
                        @endif

                        <!-- Top Header: Badge Gedung & Icon Kaca -->
                        <div class="relative z-10 p-4 sm:p-5 flex items-center justify-between gap-2 pointer-events-none">
                            <span class="px-3 py-1 rounded-xl bg-white/20 backdrop-blur-md text-[10px] sm:text-[11px] font-bold text-white uppercase tracking-wider border border-white/30 shadow-sm">
                                Gedung Delft CPI
                            </span>
                            <span class="w-9 h-9 rounded-2xl bg-white/20 backdrop-blur-md text-white flex items-center justify-center border border-white/30 shadow-sm shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                            </span>
                        </div>

                        <!-- Bottom Content: Tipografi Mewah & Deskripsi -->
                        <div class="relative z-10 p-5 sm:p-6 space-y-2 pointer-events-none">
                            <h4 class="text-lg sm:text-xl font-black text-white leading-snug group-hover:text-blue-300 transition-colors drop-shadow-sm">
                                {{ $fac->name }}
                            </h4>
                            @if(!empty($fac->description))
                                <p class="text-xs sm:text-[13px] text-slate-200 line-clamp-2 leading-relaxed opacity-90 drop-shadow-xs">
                                    {{ $fac->description }}
                                </p>
                            @endif
                            <div class="pt-2.5 flex items-center gap-2 text-[11px] text-blue-200 font-semibold border-t border-white/15">
                                <span class="flex items-center gap-1.5 text-emerald-400">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    Fasilitas Gedung
                                </span>
                                <span class="text-white/40">•</span>
                                <span class="text-white/80">Akses Penghuni & Tamu</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 glass-card rounded-2xl border border-slate-200/80">
                        <p class="text-slate-500 text-sm">Fasilitas di Gedung Delft CPI sedang diperbarui oleh admin.</p>
                    </div>
                @endforelse
            </div>

            <!-- Facilities for Vida View -->
            <div id="facilities-vida-view" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 hidden">
                @forelse($vida->facilities ?? [] as $fac)
                    <div class="relative h-80 sm:h-84 rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 group border border-slate-200/90 flex flex-col justify-between">
                        <!-- Background Image or Gradient Background -->
                        @if($fac->image_url)
                            <img src="{{ $fac->image_url }}" alt="{{ $fac->name }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-black/30 pointer-events-none"></div>
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-indigo-950 to-slate-950"></div>
                            <div class="absolute -right-8 -bottom-8 w-44 h-44 rounded-full bg-blue-500/10 blur-2xl pointer-events-none"></div>
                            <div class="absolute left-6 -top-6 w-36 h-36 rounded-full bg-indigo-500/15 blur-xl pointer-events-none"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent pointer-events-none"></div>
                        @endif

                        <!-- Top Header: Badge Gedung & Icon Kaca -->
                        <div class="relative z-10 p-4 sm:p-5 flex items-center justify-between gap-2 pointer-events-none">
                            <span class="px-3 py-1 rounded-xl bg-white/20 backdrop-blur-md text-[10px] sm:text-[11px] font-bold text-white uppercase tracking-wider border border-white/30 shadow-sm">
                                Vida View Panakkukang
                            </span>
                            <span class="w-9 h-9 rounded-2xl bg-white/20 backdrop-blur-md text-white flex items-center justify-center border border-white/30 shadow-sm shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </span>
                        </div>

                        <!-- Bottom Content: Tipografi Mewah & Deskripsi -->
                        <div class="relative z-10 p-5 sm:p-6 space-y-2 pointer-events-none">
                            <h4 class="text-lg sm:text-xl font-black text-white leading-snug group-hover:text-blue-300 transition-colors drop-shadow-sm">
                                {{ $fac->name }}
                            </h4>
                            @if(!empty($fac->description))
                                <p class="text-xs sm:text-[13px] text-slate-200 line-clamp-2 leading-relaxed opacity-90 drop-shadow-xs">
                                    {{ $fac->description }}
                                </p>
                            @endif
                            <div class="pt-2.5 flex items-center gap-2 text-[11px] text-blue-200 font-semibold border-t border-white/15">
                                <span class="flex items-center gap-1.5 text-emerald-400">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    Fasilitas Gedung
                                </span>
                                <span class="text-white/40">•</span>
                                <span class="text-white/80">Akses Penghuni & Tamu</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 glass-card rounded-2xl border border-slate-200/80">
                        <p class="text-slate-500 text-sm">Fasilitas di Gedung Vida View Panakkukang sedang diperbarui oleh admin.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 5. LOKASI STRATEGIS & AKSES POPULER -->
    <section id="jarak" class="py-12 sm:py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                    Akses Strategis
                </span>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-slate-900">
                    Dekat dengan Berbagai Landmark Makassar
                </h2>
                <p class="text-xs sm:text-sm text-slate-600">
                    Akses mudah ke tempat wisata, kuliner legendaris, dan pusat perbelanjaan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                @foreach($locations as $loc)
                    @php
                        // Bersihkan kata ganda jika nama lokasi sudah diawali dengan kata "Apartemen"
                        $locTitle = preg_replace('/^apartemen\s+/i', '', trim($loc->name));
                        $isDelft = str_contains(strtolower($loc->slug ?? ''), 'delft');
                        $gradientHeader = $isDelft 
                            ? 'from-blue-900 via-indigo-900 to-slate-900' 
                            : 'from-blue-900 via-indigo-900 to-slate-900';
                        $accentColor = $isDelft ? 'text-blue-300' : 'text-blue-300';
                    @endphp
                    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                        <div>
                            <!-- Header Lokasi dengan Mini Banner Berkelas Sesuai Preview Card Opsi 1 -->
                            <div class="p-4 sm:p-6 text-white relative overflow-hidden" style="background: linear-gradient(135deg, #1e3a8a 0%, #312e81 50%, #0f172a 100%);">
                                <div class="relative z-10 flex items-start justify-between gap-2.5 sm:gap-3">
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-1.5 text-blue-300 text-xs font-bold uppercase tracking-wider mb-1">
                                            <svg class="w-4 h-4 text-rose-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                                            <span class="truncate">{{ $isDelft ? 'Lokasi Strategis' : 'Pusat Kota & Bisnis' }}</span>
                                        </div>
                                        <h3 class="text-base sm:text-xl font-black text-white leading-tight">
                                            Dari Apartemen {{ $locTitle }}
                                        </h3>
                                    </div>
                                    <span class="px-2.5 sm:px-3 py-1 rounded-full bg-white/15 backdrop-blur-md text-[10px] sm:text-[11px] font-bold text-white border border-white/25 shrink-0 whitespace-nowrap self-start">
                                        {{ $isDelft ? 'Waterfront Living' : 'Pusat Panakkukang' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Landmark List: Destination Strip Cards -->
                            <div class="p-5 sm:p-6 space-y-2.5">
                                @forelse($loc->landmarks as $landmark)
                                    @php
                                        $nameLower = strtolower($landmark->name ?? '');
                                        
                                        // Deteksi Kategori Ikon & Warna Berdasarkan Nama Landmark
                                        if (str_contains($nameLower, 'bandara') || str_contains($nameLower, 'airport')) {
                                            $iconBg = 'bg-rose-100 text-rose-700';
                                            $chipBg = 'bg-rose-100/90 text-rose-700 border-rose-200';
                                            $iconSvg = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>';
                                        } elseif (str_contains($nameLower, 'mall') || str_contains($nameLower, 'transmart') || str_contains($nameLower, 'tsm') || str_contains($nameLower, 'pipo')) {
                                            $iconBg = 'bg-purple-100 text-purple-700';
                                            $chipBg = 'bg-blue-100/80 text-blue-700 border-blue-200/80';
                                            $iconSvg = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>';
                                        } elseif (str_contains($nameLower, 'kuliner') || str_contains($nameLower, 'cafe') || str_contains($nameLower, 'topaz') || str_contains($nameLower, 'pisang epe') || str_contains($nameLower, 'seafood')) {
                                            $iconBg = 'bg-amber-100 text-amber-700';
                                            $chipBg = 'bg-blue-100/80 text-blue-700 border-blue-200/80';
                                            $iconSvg = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>';
                                        } elseif (str_contains($nameLower, 'pantai') || str_contains($nameLower, 'losari') || str_contains($nameLower, 'masjid') || str_contains($nameLower, 'benteng') || str_contains($nameLower, 'rotterdam') || str_contains($nameLower, 'kubah')) {
                                            $iconBg = 'bg-blue-100 text-blue-700';
                                            $chipBg = 'bg-blue-100/80 text-blue-700 border-blue-200/80';
                                            $iconSvg = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/></svg>';
                                        } elseif (str_contains($nameLower, 'sakit') || str_contains($nameLower, 'hospital') || str_contains($nameLower, 'siloam') || str_contains($nameLower, 'primaya') || str_contains($nameLower, 'hermina')) {
                                            $iconBg = 'bg-emerald-100 text-emerald-700';
                                            $chipBg = 'bg-blue-100/80 text-blue-700 border-blue-200/80';
                                            $iconSvg = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>';
                                        } elseif (str_contains($nameLower, 'tol') || str_contains($nameLower, 'jalan')) {
                                            $iconBg = 'bg-teal-100 text-teal-700';
                                            $chipBg = 'bg-blue-100/80 text-blue-700 border-blue-200/80';
                                            $iconSvg = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>';
                                        } else {
                                            $iconBg = 'bg-slate-100 text-slate-700';
                                            $chipBg = 'bg-blue-100/80 text-blue-700 border-blue-200/80';
                                            $iconSvg = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>';
                                        }
                                    @endphp
                                    <div class="p-3 sm:p-3.5 rounded-2xl bg-slate-50 hover:bg-blue-50/70 border border-slate-100/90 hover:border-blue-200 transition-all duration-200 flex items-center justify-between gap-3 group/item">
                                        <!-- Ikon & Nama Destinasi -->
                                        <div class="flex items-center gap-3 min-w-0">
                                            <span class="w-8 h-8 rounded-xl {{ $iconBg }} flex items-center justify-center shrink-0 shadow-2xs group-hover/item:scale-105 transition-transform">
                                                {!! $iconSvg !!}
                                            </span>
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-xs sm:text-sm font-bold text-slate-800 group-hover/item:text-blue-600 transition-colors truncate">
                                                    {{ $landmark->name }}
                                                </h4>
                                                @if(!empty($landmark->notes))
                                                    <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                                        {{ $landmark->notes }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Chip Waktu Tempuh -->
                                        <span class="px-2.5 py-1 rounded-xl text-xs font-black shrink-0 font-mono border shadow-2xs {{ $chipBg }}">
                                            {{ $landmark->distance_time }}
                                        </span>
                                    </div>
                                @empty
                                    <div class="text-slate-400 text-xs italic py-4 text-center">
                                        Informasi akses landmark untuk lokasi ini sedang diperbarui.
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Footer Akses Cepat -->
                        <div class="p-3.5 sm:p-4 px-4 sm:px-6 bg-slate-50 border-t border-slate-100 flex items-center justify-between gap-2 text-[11px] sm:text-xs text-slate-500">
                            <span class="flex items-center gap-1.5 shrink-0">
                                <svg class="w-3.5 h-3.5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Akses Transportasi Mudah</span>
                            </span>
                            <span class="font-bold text-blue-600 truncate text-right">
                                {{ $isDelft ? 'Grab & Gojek Siaga 24 Jam' : 'Jalan Kaki Langsung ke Mall' }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- EMBED GOOGLE MAPS: APARTEMEN VIDA VIEW BY VIDALIDAY -->
            <div class="mt-16 sm:mt-24 p-4 sm:p-6 rounded-3xl glass-card border border-slate-200/90 shadow-md">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-4 mb-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-500 animate-pulse"></span>
                            <h3 class="text-sm sm:text-lg font-extrabold text-slate-900">
                                Peta Lokasi: APARTEMEN VIDA VIEW BY VIDALIDAY
                            </h3>
                        </div>
                        <p class="text-[11px] sm:text-xs text-slate-500 mt-0.5">
                            Jl. Topaz Raya, Masale, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90231
                        </p>
                    </div>

                    <a href="https://maps.app.goo.gl/fkvUg2jpHedbgXXC9?g_st=ic" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="inline-flex items-center gap-2 px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-md shadow-blue-500/20 transition transform hover:-translate-y-0.5 shrink-0 w-full sm:w-auto justify-center">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                        <span>Buka di Google Maps</span>
                    </a>
                </div>

                <!-- Google Maps Interactive Iframe -->
                <div class="relative w-full h-72 sm:h-96 rounded-2xl overflow-hidden border border-slate-200 shadow-inner bg-slate-100">
                    <iframe 
                        src="https://maps.google.com/maps?q=APARTEMEN+VIDA+VIEW+BY+VIDALIDAY,+Jl.+Topaz+Raya,+Masale,+Kec.+Panakkukang,+Kota+Makassar,+Sulawesi+Selatan+90231&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                        class="w-full h-full border-0" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Peta Lokasi APARTEMEN VIDA VIEW BY VIDALIDAY">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. FAQ & ATURAN MENGINAP -->
    <section id="faq" class="py-12 sm:py-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-10 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                    FAQ
                </span>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-slate-900">
                    Pertanyaan Seputar Sewa Apartemen
                </h2>
                <p class="text-xs sm:text-sm text-slate-600">
                    Ketentuan dan prosedur sewa kamar di VIDALIDAY Makassar.
                </p>
            </div>

            <div class="space-y-3 sm:space-y-3.5" id="faq-list">
                @forelse($faqs as $faq)
                    <div class="p-4 sm:p-5 rounded-2xl glass-card border border-slate-200/80 space-y-1.5 shadow-sm hover:border-blue-200 transition {{ $loop->index >= 3 ? 'faq-extra hidden' : '' }}">
                        <h3 class="text-xs sm:text-base font-bold text-slate-900 flex items-start sm:items-center justify-between gap-2.5">
                            <span>{{ $faq->question }}</span>
                            @if($faq->badge)
                                <span class="text-blue-600 text-[11px] sm:text-sm font-semibold shrink-0">{{ $faq->badge }}</span>
                            @endif
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ $faq->answer }}
                        </p>
                    </div>
                @empty
                    <div class="p-8 rounded-2xl glass-card border border-slate-200 text-center text-slate-400 text-sm">
                        Pertanyaan seputar sewa apartemen sedang dipersiapkan oleh admin.
                    </div>
                @endforelse
            </div>

            @if(isset($faqs) && count($faqs) > 3)
                <div class="text-center pt-6">
                    <button type="button" 
                            id="btn-toggle-faq" 
                            onclick="toggleFaqList()" 
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white hover:bg-slate-50 text-blue-600 hover:text-blue-700 font-extrabold text-xs sm:text-sm border border-blue-200 shadow-sm hover:shadow transition transform hover:-translate-y-0.5 cursor-pointer">
                        <span id="faq-toggle-text">Lihat Semua FAQ ({{ count($faqs) - 3 }} Pertanyaan Lainnya)</span>
                        <svg id="faq-toggle-icon" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                </div>
            @endif
        </div>
    </section>

    <!-- POP-UP MODAL RENCANA TANGGAL PEMESANAN (GLASSMORPHISM) -->
    <div id="booking-modal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-md z-50 flex items-center justify-center p-3 sm:p-4 hidden">
        <div class="glass-card rounded-3xl border border-white/80 p-4 sm:p-7 max-w-lg w-full space-y-4 sm:space-y-5 shadow-2xl bg-white/95 relative transform transition-all animate-fade-in max-h-[92vh] overflow-y-auto">
            
            <!-- Close Button -->
            <button type="button" 
                    onclick="closeBookingModal()" 
                    class="absolute top-4 right-4 sm:top-5 sm:right-5 p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <!-- Modal Header -->
            <div class="flex items-start gap-3 sm:gap-4 pr-7 sm:pr-8">
                <img id="modal-unit-img" src="" alt="Unit" class="w-14 h-14 sm:w-20 sm:h-20 rounded-2xl object-cover border border-slate-200 shrink-0 bg-slate-100 shadow-sm">
                <div>
                    <span id="modal-unit-location" class="text-[10px] sm:text-[11px] font-bold text-blue-600 uppercase tracking-wider block"></span>
                    <h3 id="modal-unit-name" class="text-sm sm:text-lg font-black text-slate-900 leading-tight"></h3>
                    <div class="flex items-center gap-2 mt-1">
                        <span id="modal-unit-room-type" class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[10px] sm:text-[11px] font-semibold"></span>
                        <span id="modal-unit-price" class="text-xs sm:text-sm font-extrabold text-blue-700"></span>
                        <span id="modal-unit-period" class="text-[10px] sm:text-[11px] text-slate-400"></span>
                    </div>
                </div>
            </div>

            <!-- Title & Hint -->
            <div class="border-t border-b border-slate-100 py-2.5 sm:py-3">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-bold text-slate-900">Rencana Jadwal Menginap Anda</h4>
                        <p class="text-[10px] sm:text-[11px] text-slate-500">Tentukan perkiraan tanggal agar admin langsung mengecek ketersediaan unit.</p>
                    </div>
                </div>
            </div>

            <!-- Booking Date Form -->
            <form id="booking-plan-form" onsubmit="submitBookingPlan(event)" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <div>
                        <label for="book-checkin" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Rencana Check-In *
                        </label>
                        <input type="date" 
                               id="book-checkin" 
                               required 
                               onchange="calculateDuration()"
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs text-slate-800 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 shadow-sm">
                    </div>

                    <div>
                        <label for="book-checkout" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                            Rencana Check-Out *
                        </label>
                        <input type="date" 
                               id="book-checkout" 
                               required 
                               onchange="calculateDuration()"
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs text-slate-800 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 shadow-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="book-guests" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Jumlah Tamu
                            </label>
                            <span id="modal-unit-capacity-hint" class="text-[10px] text-blue-600 font-semibold"></span>
                        </div>
                        <select id="book-guests" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs text-slate-800 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 shadow-sm">
                            <option value="1 Orang Tamu">1 Orang Tamu</option>
                            <option value="2 Orang Tamu">2 Orang Tamu</option>
                            <option value="3 Orang Tamu">3 Orang Tamu</option>
                            <option value="4 Orang Tamu">4 Orang Tamu</option>
                            <option value="5 Orang Tamu">5 Orang Tamu</option>
                            <option value="6 Orang Tamu">6 Orang Tamu</option>
                            <option value="7+ Tamu / Rombongan">7+ Tamu / Rombongan</option>
                        </select>
                    </div>

                    <div>
                        <label for="book-duration-info" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Estimasi Durasi
                        </label>
                        <input type="text" 
                               id="book-duration-info" 
                               readonly 
                               value="Pilih tanggal di atas" 
                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-xs text-blue-700 font-bold focus:outline-none shadow-sm cursor-default">
                    </div>
                </div>

                <div>
                    <label for="book-note" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Catatan Khusus (Opsional)
                    </label>
                    <textarea id="book-note" rows="2" placeholder="e.g. Ingin lantai tinggi, butuh parkir mobil, atau ada permintaan khusus..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs text-slate-800 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 shadow-sm"></textarea>
                </div>

                <!-- Action CTA -->
                <div class="pt-2 flex flex-col sm:flex-row items-center gap-3">
                    <button type="button" 
                            onclick="closeBookingModal()" 
                            class="w-full sm:w-auto px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                        Batal
                    </button>
                    <button type="submit" 
                            class="w-full flex-1 py-3 px-5 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center gap-2 shadow-lg shadow-emerald-500/25 transition">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>LANJUTKAN PESAN KE WHATSAPP</span>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- POPUP MODAL YOUTUBE VIDEO PLAYER (ROOM TOUR) -->
    <div id="video-modal" class="fixed inset-0 z-50 bg-slate-950/85 backdrop-blur-md flex items-center justify-center p-4 sm:p-6 hidden">
        <div class="relative w-full max-w-4xl bg-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-white/20">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 sm:p-5 border-b border-slate-800 bg-slate-900/90">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-red-600 animate-pulse"></span>
                    <h3 id="video-modal-title" class="text-white font-extrabold text-sm sm:text-base">Video Room Tour</h3>
                </div>
                <button type="button" onclick="closeVideoModal()" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white flex items-center justify-center transition cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <!-- Video Container 16:9 Responsive -->
            <div class="relative aspect-video w-full bg-black">
                <iframe id="video-iframe" class="w-full h-full" src="" title="Video Room Tour" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

            <!-- Modal Footer -->
            <div class="p-3.5 bg-slate-900 border-t border-slate-800 text-right">
                <button type="button" onclick="closeVideoModal()" class="px-5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs transition cursor-pointer">
                    Tutup Video
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // State Active Unit untuk Modal Booking
    let currentBookingUnit = {
        name: '',
        roomType: '',
        location: '',
        price: '',
        period: '',
        image: '',
        maxGuests: 2
    };

    const waAdminNumber = "{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285711696970') }}";

    function openBookingModal(name, roomType, location, price, period, image, maxGuests) {
        maxGuests = parseInt(maxGuests, 10) || 2;
        currentBookingUnit = { name, roomType, location, price, period, image, maxGuests };

        // Set info kamar pada modal
        document.getElementById('modal-unit-name').innerText = name;
        document.getElementById('modal-unit-room-type').innerText = roomType;
        document.getElementById('modal-unit-location').innerText = location;
        document.getElementById('modal-unit-price').innerText = price;
        document.getElementById('modal-unit-period').innerText = '/ ' + period;
        document.getElementById('modal-unit-img').src = image || 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=800&q=80';

        // 1. OTOMATIS SESUAIKAN JUMLAH TAMU DARI CARD
        const guestsSelect = document.getElementById('book-guests');
        const capacityHint = document.getElementById('modal-unit-capacity-hint');
        if (capacityHint) {
            capacityHint.innerText = `Kapasitas: Maks. ${maxGuests} Tamu`;
        }

        // Set pilihan dropdown otomatis sesuai max_guests card (misal: "5 Orang Tamu")
        let matchingOptionFound = false;
        for (let i = 0; i < guestsSelect.options.length; i++) {
            const optVal = guestsSelect.options[i].value;
            if (optVal.startsWith(maxGuests + ' ')) {
                guestsSelect.selectedIndex = i;
                matchingOptionFound = true;
                break;
            }
        }
        if (!matchingOptionFound) {
            if (maxGuests >= 7) {
                guestsSelect.value = "7+ Tamu / Rombongan";
            } else {
                guestsSelect.value = maxGuests + " Orang Tamu";
            }
        }

        // 2. OTOMATIS SESUAIKAN TANGGAL & DURASI DARI PERIODE CARD (Malam / Minggu / Bulan)
        const today = new Date();
        const checkoutDefault = new Date(today);

        const cleanPeriod = (period || '').toLowerCase();
        let defaultDays = 1; // Default untuk 'Malam' / harian

        if (cleanPeriod.includes('minggu')) {
            defaultDays = 7;
        } else if (cleanPeriod.includes('bulan')) {
            defaultDays = 30;
        }

        checkoutDefault.setDate(today.getDate() + defaultDays);

        const formatDate = (d) => {
            const year = d.getFullYear();
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const day = String(d.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };

        const checkinInput = document.getElementById('book-checkin');
        const checkoutInput = document.getElementById('book-checkout');

        checkinInput.min = formatDate(today);
        checkinInput.value = formatDate(today);

        checkoutInput.min = formatDate(today);
        checkoutInput.value = formatDate(checkoutDefault);

        calculateDuration();

        document.getElementById('booking-modal').classList.remove('hidden');
    }

    function closeBookingModal() {
        document.getElementById('booking-modal').classList.add('hidden');
    }

    // Hitung durasi menginap secara cerdas & user tetap bisa modifikasi
    function calculateDuration() {
        const checkinVal = document.getElementById('book-checkin').value;
        const checkoutVal = document.getElementById('book-checkout').value;
        const durationInfo = document.getElementById('book-duration-info');
        const checkoutInput = document.getElementById('book-checkout');

        if (checkinVal && checkoutVal) {
            const d1 = new Date(checkinVal);
            const d2 = new Date(checkoutVal);

            if (d2 <= d1) {
                // Set checkout minimal 1 hari setelah checkin
                const nextDay = new Date(d1);
                nextDay.setDate(d1.getDate() + 1);
                const year = nextDay.getFullYear();
                const month = String(nextDay.getMonth() + 1).padStart(2, '0');
                const day = String(nextDay.getDate()).padStart(2, '0');
                checkoutInput.value = `${year}-${month}-${day}`;
                durationInfo.value = '1 Malam (1 Hari)';
                return;
            }

            const diffTime = Math.abs(d2 - d1);
            const diffDays = Math.round(diffTime / (1000 * 60 * 60 * 24));

            if (diffDays >= 30) {
                const months = Math.floor(diffDays / 30);
                const remDays = diffDays % 30;
                let text = months + ' Bulan';
                if (remDays > 0) text += ' ' + remDays + ' Hari';
                durationInfo.value = `${text} (${diffDays} Malam)`;
            } else if (diffDays >= 7) {
                const weeks = Math.floor(diffDays / 7);
                const remDays = diffDays % 7;
                let text = weeks + ' Minggu';
                if (remDays > 0) text += ' ' + remDays + ' Hari';
                durationInfo.value = `${text} (${diffDays} Malam)`;
            } else {
                durationInfo.value = `${diffDays} Malam (${diffDays} Hari)`;
            }
        }
    }

    // Submit ke WhatsApp dengan format rapi
    function submitBookingPlan(e) {
        e.preventDefault();

        const checkinVal = document.getElementById('book-checkin').value;
        const checkoutVal = document.getElementById('book-checkout').value;
        const guestsVal = document.getElementById('book-guests').value;
        const durationVal = document.getElementById('book-duration-info').value;
        const noteVal = document.getElementById('book-note').value.trim();

        // Format tanggal Indonesia
        const formatIDDate = (dateStr) => {
            const d = new Date(dateStr);
            return d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
        };

        const checkinText = formatIDDate(checkinVal);
        const checkoutText = formatIDDate(checkoutVal);

        let message = `Halo Admin VIDALIDAY, saya ingin memesan unit apartemen dengan rincian berikut:\n\n` +
                      `📍 Lokasi: ${currentBookingUnit.location}\n` +
                      `🏨 Unit: ${currentBookingUnit.name} (${currentBookingUnit.roomType})\n` +
                      `💰 Tarif: ${currentBookingUnit.price} / ${currentBookingUnit.period}\n\n` +
                      `📅 RENCANA TANGGAL MENGINAP:\n` +
                      `• Check-In: ${checkinText}\n` +
                      `• Check-Out: ${checkoutText}\n` +
                      `• Durasi: ${durationVal}\n` +
                      `• Jumlah Tamu: ${guestsVal}\n`;

        if (noteVal) {
            message += `\n📝 Catatan Tambahan: ${noteVal}\n`;
        }

        message += `\nMohon info ketersediaan unit untuk jadwal tersebut. Terima kasih!`;

        const waUrl = `https://wa.me/${waAdminNumber}?text=${encodeURIComponent(message)}`;

        closeBookingModal();
        window.open(waUrl, '_blank');
    }

    // Close modal on click backdrop
    document.getElementById('booking-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeBookingModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeBookingModal();
        }
    });

    // -------------------------------------------------------------
    // FITUR: MAKSIMAL TAMPIL 3 UNIT + FILTER & TAMPILKAN LEBIH BANYAK
    // -------------------------------------------------------------
    const gridState = {
        'grid-delft-cpi': { expanded: false, currentSort: 'featured' },
        'grid-vida-view': { expanded: false, currentSort: 'featured' }
    };

    function refreshGridDisplay(gridId) {
        const grid = document.getElementById(gridId);
        if (!grid) return;

        const items = Array.from(grid.querySelectorAll('.unit-card-item'));
        const state = gridState[gridId] || { expanded: false, currentSort: 'featured' };

        // 1. Sort items
        items.sort((a, b) => {
            const priceA = parseInt(a.getAttribute('data-price'), 10) || 0;
            const priceB = parseInt(b.getAttribute('data-price'), 10) || 0;
            const createdA = parseInt(a.getAttribute('data-created'), 10) || 0;
            const createdB = parseInt(b.getAttribute('data-created'), 10) || 0;
            const idA = parseInt(a.getAttribute('data-unit-id'), 10) || 0;
            const idB = parseInt(b.getAttribute('data-unit-id'), 10) || 0;

            if (state.currentSort === 'termurah') {
                return priceA - priceB;
            } else if (state.currentSort === 'termahal') {
                return priceB - priceA;
            } else if (state.currentSort === 'terbaru') {
                return createdB - createdA;
            } else {
                // Featured / rekomendasi default (berdasarkan urutan DOM awal)
                return idA - idB;
            }
        });

        // Re-append sorted elements
        items.forEach((item, index) => {
            grid.appendChild(item);
            // Hide items beyond index 2 (item ke-4 dst) jika belum di-expand
            if (!state.expanded && index >= 3) {
                item.classList.add('hidden');
            } else {
                item.classList.remove('hidden');
            }
        });

        // Update Button label
        const btnId = gridId === 'grid-delft-cpi' ? 'btn-toggle-delft-cpi' : 'btn-toggle-vida-view';
        const toggleBtn = document.getElementById(btnId);
        if (toggleBtn) {
            const total = items.length;
            if (state.expanded) {
                toggleBtn.innerHTML = `
                    <span>Tampilkan Lebih Sedikit (Hanya 3 Kamar)</span>
                    <svg class="w-4 h-4 rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                `;
            } else {
                toggleBtn.innerHTML = `
                    <span>Tampilkan Lebih Banyak (${total - 3} Kamar Lainnya)</span>
                    <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                `;
            }
        }
    }

    function toggleShowMoreUnits(gridId, btnId, total) {
        if (!gridState[gridId]) {
            gridState[gridId] = { expanded: false, currentSort: 'featured' };
        }
        gridState[gridId].expanded = !gridState[gridId].expanded;
        refreshGridDisplay(gridId);

        // Update indikator teks
        updateCountIndicator();
    }

    function applyUnitSorting(sortValue) {
        gridState['grid-delft-cpi'].currentSort = sortValue;
        gridState['grid-vida-view'].currentSort = sortValue;

        refreshGridDisplay('grid-delft-cpi');
        refreshGridDisplay('grid-vida-view');

        updateCountIndicator();
    }

    function updateCountIndicator() {
        const indicator = document.getElementById('unit-count-indicator');
        if (!indicator) return;

        const isDelftVisible = !document.getElementById('units-delft-cpi')?.classList.contains('hidden');
        const activeGridId = isDelftVisible ? 'grid-delft-cpi' : 'grid-vida-view';
        const isExpanded = gridState[activeGridId]?.expanded;

        const sortMap = {
            'featured': 'Rekomendasi Favorit',
            'terbaru': 'Terbaru',
            'termurah': 'Tarif Termurah',
            'termahal': 'Tarif Termahal'
        };
        const currentSort = sortMap[gridState[activeGridId]?.currentSort || 'featured'];

        if (isExpanded) {
            indicator.innerText = `Menampilkan semua kamar (${currentSort})`;
        } else {
            indicator.innerText = `Menampilkan 3 kamar teratas (${currentSort})`;
        }
    }

    // -------------------------------------------------------------
    // FITUR: TAMPILKAN 3 FAQ + LIHAT SEMUA / SEMBUNYIKAN
    // -------------------------------------------------------------
    function toggleFaqList() {
        const extraFaqs = document.querySelectorAll('.faq-extra');
        const toggleText = document.getElementById('faq-toggle-text');
        const toggleIcon = document.getElementById('faq-toggle-icon');
        if (!extraFaqs.length) return;

        const isHidden = extraFaqs[0].classList.contains('hidden');

        extraFaqs.forEach(el => {
            if (isHidden) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        });

        if (isHidden) {
            toggleText.innerText = 'Sembunyikan FAQ';
            toggleIcon.classList.add('rotate-180');
        } else {
            toggleText.innerText = `Lihat Semua FAQ (${extraFaqs.length} Pertanyaan Lainnya)`;
            toggleIcon.classList.remove('rotate-180');
        }
    }

    // -------------------------------------------------------------
    // FITUR: MODAL VIDEO YOUTUBE (ROOM TOUR)
    // -------------------------------------------------------------
    function openVideoModal(url, title) {
        const modal = document.getElementById('video-modal');
        const iframe = document.getElementById('video-iframe');
        const titleEl = document.getElementById('video-modal-title');
        
        if (titleEl && title) titleEl.innerText = title;
        if (iframe) iframe.src = url;
        if (modal) modal.classList.remove('hidden');
    }

    function closeVideoModal() {
        const modal = document.getElementById('video-modal');
        const iframe = document.getElementById('video-iframe');
        
        if (iframe) iframe.src = '';
        if (modal) modal.classList.add('hidden');
    }

    // Close video modal on Escape key or backdrop click
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeVideoModal();
    });

    document.getElementById('video-modal')?.addEventListener('click', function(e) {
        if (e.target === this) closeVideoModal();
    });

    // Inisialisasi awal saat load dokumen
    document.addEventListener('DOMContentLoaded', function() {
        refreshGridDisplay('grid-delft-cpi');
        refreshGridDisplay('grid-vida-view');
        updateCountIndicator();
    });
</script>
@endpush
