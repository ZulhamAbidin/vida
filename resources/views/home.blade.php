@extends('layouts.app')

@section('title', 'VIDALIDAY | Sewa Apartemen Resmi Makassar - Delft CPI & Vida View')
@section('meta_description', 'Katalog resmi sewa apartemen harian, mingguan, & bulanan di Makassar: Apartemen Delft CPI & Vida View di bawah naungan PT PERDANA MEGA TRANS. Dapatkan harga promo dan pemesanan cepat via WhatsApp.')

@section('content')

    <!-- 1. HERO SECTION WHITE GLASSMORPHISM -->
    <section class="relative pt-8 pb-16 md:pt-16 md:pb-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Column: Copywriting & Trust Badges -->
                <div class="lg:col-span-7 space-y-5 text-center lg:text-left">
                    
                    <!-- Company Legal Pill -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-card border border-blue-200/80 text-blue-800 text-xs sm:text-sm font-semibold shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        <span>Legalitas Resmi Terpercaya • <strong>{{ $settings['company_legal_name'] ?? 'PT PERDANA MEGA TRANS' }}</strong></span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-[1.18]">
                        Sewa Apartemen <br class="hidden sm:inline">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-sky-600">
                            Mewah & Resmi
                        </span>
                        di Makassar
                    </h1>

                    <p class="text-sm sm:text-base text-slate-600 font-normal leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Kenyamanan standar hotel berbintang dengan keleluasaan unit privat. Siap melayani sewa <strong>harian, mingguan, dan bulanan</strong> di dua lokasi terbaik: <strong>Apartemen Delft CPI</strong> dan <strong>Apartemen Vida View</strong>.
                    </p>

                    <!-- Quick Location Badges -->
                    <div class="grid grid-cols-2 gap-3 pt-1 max-w-md mx-auto lg:mx-0">
                        <div onclick="switchLocation('delft-cpi'); document.getElementById('katalog-kamar').scrollIntoView({behavior: 'smooth'});" class="p-3.5 rounded-2xl glass-card hover:border-blue-300 hover:shadow-md cursor-pointer transition text-left group">
                            <span class="text-[11px] font-bold text-blue-600 uppercase tracking-wider block">Lokasi 1</span>
                            <h2 class="text-sm sm:text-base font-bold text-slate-900 group-hover:text-blue-600 transition">Delft CPI</h2>
                            <p class="text-xs text-slate-500">Waterfront & Sunset Losari</p>
                        </div>
                        <div onclick="switchLocation('vida-view'); document.getElementById('katalog-kamar').scrollIntoView({behavior: 'smooth'});" class="p-3.5 rounded-2xl glass-card hover:border-blue-300 hover:shadow-md cursor-pointer transition text-left group">
                            <span class="text-[11px] font-bold text-blue-600 uppercase tracking-wider block">Lokasi 2</span>
                            <h2 class="text-sm sm:text-base font-bold text-slate-900 group-hover:text-blue-600 transition">Vida View</h2>
                            <p class="text-xs text-slate-500">Pusat Kota Panakkukang</p>
                        </div>
                    </div>

                    <!-- CTAs -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3.5 pt-3">
                        <a href="#katalog-kamar" class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-sm tracking-wide shadow-lg shadow-blue-500/25 transition-all transform hover:-translate-y-0.5 text-center">
                            LIHAT PILIHAN KAMAR & PROMO
                        </a>
                        @php
                            $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890');
                            $heroWa = "https://wa.me/{$waClean}?text=" . urlencode("Halo Admin VIDALIDAY, saya ingin konsultasi ketersediaan sewa apartemen di Makassar.");
                        @endphp
                        <a href="{{ $heroWa }}" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto px-6 py-3.5 rounded-xl glass-card hover:border-emerald-500 text-slate-800 hover:text-emerald-700 font-bold text-sm flex items-center justify-center gap-2.5 transition-all text-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            Konsultasi via WhatsApp
                        </a>
                    </div>

                    <!-- Mini Highlights -->
                    <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-5 text-xs text-slate-500 font-medium">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            Unit Terawat & Bersih
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            Check-in Mudah di Lobby
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            Jaminan Tanpa Penipuan
                        </div>
                    </div>
                </div>

                <!-- Right Column: White Glassmorphic Showcase Card (Dinamis Berdasarkan Pilihan Admin) -->
                <div class="lg:col-span-5 relative">
                    <!-- Subtle Glow Behind -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-400/20 to-sky-400/20 rounded-3xl blur-2xl opacity-70"></div>
                    
                    <div class="relative glass-card rounded-3xl p-5 sm:p-6 border border-white/80 space-y-4 shadow-xl shadow-slate-200/50">
                        @if($featuredUnit)
                        <div class="relative h-60 sm:h-72 rounded-2xl overflow-hidden group bg-slate-100">
                            <img src="{{ $featuredUnit->image_url ?? 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $featuredUnit->name ?? 'Apartemen Makassar' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-transparent to-transparent"></div>
                            
                            <div class="absolute top-3 left-3 px-3 py-1 rounded-full bg-white/90 backdrop-blur-md text-[11px] font-bold text-slate-800 flex items-center gap-1.5 shadow-sm border border-white/50">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                Pilihan Favorit Tamu
                            </div>

                            @if($featuredUnit && $featuredUnit->promo_badge)
                                <div class="absolute top-3 right-3 px-3 py-1 rounded-full bg-blue-600 text-white text-[11px] font-black shadow-md shadow-blue-500/30">
                                    {{ $featuredUnit->promo_badge }}
                                </div>
                            @endif

                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <span class="text-[11px] uppercase font-bold tracking-wider text-blue-300">{{ $featuredUnit->location->name ?? 'Makassar' }}</span>
                                <h3 class="text-lg sm:text-xl font-bold">{{ $featuredUnit->name ?? 'Delft CPI & Vida View' }}</h3>
                                <p class="text-xs text-slate-200 mt-0.5 line-clamp-1">
                                    {{ $featuredUnit->description ? Str::limit($featuredUnit->description, 65) : 'Full Furnished • AC Dingin • WiFi Kencang' }}
                                </p>
                            </div>
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
                            $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890');
                            $featuredLocName = $featuredUnit->location->name ?? 'Makassar';
                            $featuredPrice = $featuredUnit->is_promo_active ? $featuredUnit->formatted_promo_price : $featuredUnit->formatted_normal_price;
                            $featuredMsg = "Halo Admin VIDALIDAY, saya tertarik memesan unit Pilihan Favorit Tamu:\n- Unit: " . ($featuredUnit->name ?? '') . " (" . ($featuredUnit->room_type ?? '') . ")\n- Lokasi: " . $featuredLocName . "\n- Harga: " . $featuredPrice . " / " . ($featuredUnit->rental_period ?? 'Malam') . "\n\nMohon info ketersediaan kamar. Terima kasih!";
                            $featuredWaUrl = "https://wa.me/{$waClean}?text=" . urlencode($featuredMsg);
                        @endphp
                        <div class="p-3.5 rounded-xl bg-blue-50/80 border border-blue-200/80 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-slate-500 block uppercase font-bold tracking-wider">Tarif Sewa</span>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-lg font-black text-blue-700">
                                        {{ $featuredUnit->is_promo_active ? $featuredUnit->formatted_promo_price : $featuredUnit->formatted_normal_price }}
                                    </span>
                                    @if($featuredUnit->is_promo_active && $featuredUnit->normal_price > $featuredUnit->promo_price)
                                        <span class="text-xs text-slate-400 line-through">{{ $featuredUnit->formatted_normal_price }}</span>
                                    @endif
                                </div>
                            </div>
                            <button type="button" 
                                    onclick="openBookingModal('{{ addslashes($featuredUnit->name) }}', '{{ addslashes($featuredUnit->room_type) }}', '{{ addslashes($featuredLocName) }}', '{{ $featuredPrice }}', '{{ $featuredUnit->rental_period }}', '{{ $featuredUnit->image_url }}', {{ (int)$featuredUnit->max_guests }})" 
                                    class="px-3.5 py-2 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold transition shadow-sm flex items-center gap-1.5 cursor-pointer">
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
            <div class="text-center max-w-3xl mx-auto mb-10 space-y-2.5">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                    Katalog Kamar & Promo
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-slate-900 tracking-tight">
                    Pilih Lokasi & Unit Kamar Sesuai Kebutuhan Anda
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mx-auto">
                    Seluruh unit dilengkapi ranjang berkualitas, pendingin ruangan (AC), hiburan Smart TV, WiFi kecepatan tinggi, serta perlengkapan mandi bersih.
                </p>
            </div>

            <!-- Location Selector Switcher (Kategori Lokasi Apartemen Jelas & Menonjol) -->
            <div id="lokasi" class="flex flex-col items-center justify-center mb-10">
                <div class="text-center mb-3">
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-500">PILIH KATEGORI LOKASI APARTEMEN:</span>
                </div>
                
                <div class="inline-flex p-2 rounded-2xl glass-card border border-blue-200/90 shadow-lg shadow-blue-500/10 max-w-2xl w-full bg-white/95 gap-2">
                    <!-- Tab Apartemen Delft CPI -->
                    <button type="button" 
                            data-target="delft-cpi" 
                            onclick="switchLocation('delft-cpi')" 
                            class="loc-tab-btn flex-1 py-3.5 px-4 sm:px-6 rounded-xl text-left sm:text-center transition-all duration-300 relative group flex items-center justify-between sm:justify-center gap-3 bg-blue-600 text-white font-black shadow-lg shadow-blue-500/30 ring-2 ring-blue-600">
                        <div class="flex items-center gap-2.5">
                            <span class="tab-icon w-8 h-8 rounded-lg bg-white/20 text-white flex items-center justify-center text-sm shrink-0 font-bold">
                                🌊
                            </span>
                            <div class="text-left">
                                <span class="tab-title block text-sm sm:text-base font-black leading-tight text-white">Apartemen Delft CPI</span>
                                <span class="tab-desc text-[11px] block font-medium opacity-90 text-blue-100">Pantai Losari & Center Point</span>
                            </div>
                        </div>
                        <span class="tab-badge px-2 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider shrink-0 bg-white text-blue-700 shadow-sm">
                            {{ $delft->units->count() ?? 0 }} Unit
                        </span>
                    </button>

                    <!-- Tab Apartemen Vida View -->
                    <button type="button" 
                            data-target="vida-view" 
                            onclick="switchLocation('vida-view')" 
                            class="loc-tab-btn flex-1 py-3.5 px-4 sm:px-6 rounded-xl text-left sm:text-center transition-all duration-300 relative group flex items-center justify-between sm:justify-center gap-3 bg-slate-50 hover:bg-slate-100 text-slate-700 font-bold border border-slate-200/90">
                        <div class="flex items-center gap-2.5">
                            <span class="tab-icon w-8 h-8 rounded-lg bg-slate-200/80 text-slate-700 flex items-center justify-center text-sm shrink-0 font-bold">
                                🏙️
                            </span>
                            <div class="text-left">
                                <span class="tab-title block text-sm sm:text-base font-bold leading-tight text-slate-800">Apartemen Vida View</span>
                                <span class="tab-desc text-[11px] block font-normal text-slate-500">Pusat Kota Panakkukang</span>
                            </div>
                        </div>
                        <span class="tab-badge px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider shrink-0 bg-slate-200 text-slate-600">
                            {{ $vida->units->count() ?? 0 }} Unit
                        </span>
                    </button>
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
                <div class="p-5 sm:p-6 rounded-2xl glass-card border border-blue-200/70 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">Center Point of Indonesia</span>
                            <span class="text-xs text-slate-500">• Waterfront & Sunset View</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">{{ $delft->name ?? 'Apartemen Delft CPI' }}</h3>
                        <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mt-1 leading-relaxed">{{ $delft->description ?? '' }}</p>
                    </div>
                    <div class="text-xs text-slate-500 flex items-center gap-1.5 shrink-0">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
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
                <div class="p-5 sm:p-6 rounded-2xl glass-card border border-blue-200/70 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">Panakkukang District</span>
                            <span class="text-xs text-slate-500">• City Skyline & Sebelah Mall</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">{{ $vida->name ?? 'Apartemen Vida View' }}</h3>
                        <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mt-1 leading-relaxed">{{ $vida->description ?? '' }}</p>
                    </div>
                    <div class="text-xs text-slate-500 flex items-center gap-1.5 shrink-0">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
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
            <div class="text-center max-w-2xl mx-auto mb-10 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                    Fasilitas Gedung
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900">
                    Fasilitas Lengkap untuk Kenyamanan Anda
                </h2>
                <p class="text-xs sm:text-sm text-slate-600">
                    Kenyamanan menginap didukung fasilitas gedung yang siap dinikmati selama waktu sewa Anda.
                </p>
            </div>

            <!-- Facilities for Delft CPI -->
            <div id="facilities-delft-cpi" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($delft->facilities ?? [] as $fac)
                    <div class="p-5 rounded-2xl glass-card glass-card-hover border border-slate-200/80 space-y-2.5">
                        @if($fac->image_url)
                            <div class="h-32 w-full rounded-xl overflow-hidden border border-slate-200 bg-slate-100 mb-2">
                                <img src="{{ $fac->image_url }}" alt="{{ $fac->name }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-11 h-11 rounded-xl bg-blue-50 border border-blue-200 text-blue-600 flex items-center justify-center font-bold">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            </div>
                        @endif
                        <h4 class="text-base font-bold text-slate-900">{{ $fac->name }}</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">{{ $fac->description }}</p>
                        <span class="text-[11px] text-blue-600 font-semibold block pt-0.5">Gedung Delft CPI</span>
                    </div>
                @endforeach
            </div>

            <!-- Facilities for Vida View -->
            <div id="facilities-vida-view" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 hidden">
                @foreach($vida->facilities ?? [] as $fac)
                    <div class="p-5 rounded-2xl glass-card glass-card-hover border border-slate-200/80 space-y-2.5">
                        @if($fac->image_url)
                            <div class="h-32 w-full rounded-xl overflow-hidden border border-slate-200 bg-slate-100 mb-2">
                                <img src="{{ $fac->image_url }}" alt="{{ $fac->name }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-11 h-11 rounded-xl bg-blue-50 border border-blue-200 text-blue-600 flex items-center justify-center font-bold">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                        @endif
                        <h4 class="text-base font-bold text-slate-900">{{ $fac->name }}</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">{{ $fac->description }}</p>
                        <span class="text-[11px] text-blue-600 font-semibold block pt-0.5">Gedung Vida View Panakkukang</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. LEGALITAS & TRUST BANNER -->
    <section id="legalitas" class="py-12 sm:py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-6 sm:p-10 rounded-3xl glass-card border border-blue-200/80 relative overflow-hidden shadow-lg shadow-slate-200/40">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <div class="lg:col-span-8 space-y-4">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">
                            Keamanan Transaksi & Legalitas
                        </span>
                        <h3 class="text-2xl sm:text-3xl font-black text-slate-900">
                            Mengapa Tamu Memilih Sewa di VIDALIDAY?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Bebas cemas dari maraknya penipuan sewa apartemen. VIDALIDAY beroperasi secara resmi dan profesional di bawah naungan <strong>{{ $settings['company_legal_name'] ?? 'PT PERDANA MEGA TRANS' }}</strong> dengan staff standby di lokasi.
                        </p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 pt-2 text-xs">
                            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/70">
                                <span class="font-bold text-blue-700 block mb-1">Badan Usaha Resmi PT</span>
                                <span class="text-slate-600">Berbadan hukum resmi terdaftar dengan manajemen terpercaya.</span>
                            </div>
                            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/70">
                                <span class="font-bold text-blue-700 block mb-1">Staff Standby di Lokasi</span>
                                <span class="text-slate-600">Penyerahan kunci & pendampingan check-in langsung di lobby.</span>
                            </div>
                            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/70">
                                <span class="font-bold text-blue-700 block mb-1">Garansi Unit Real</span>
                                <span class="text-slate-600">Foto kamar asli sesuai unit fisik yang akan ditempati.</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 text-center lg:text-right space-y-4">
                        <div class="p-5 rounded-2xl bg-white border border-slate-200/90 text-left space-y-3 shadow-sm">
                            <div class="text-[11px] font-bold text-blue-600 uppercase tracking-widest">Konsultasi Gratis</div>
                            <div class="text-base font-bold text-slate-900">Butuh Rekomendasi Unit?</div>
                            <p class="text-xs text-slate-500">Sampaikan rencana tanggal sewa Anda dan admin kami siap membantu mencarikan unit terbaik.</p>
                            @php
                                $waAsk = "https://wa.me/{$waClean}?text=" . urlencode("Halo Admin VIDALIDAY, saya ingin tanya ketersediaan unit untuk rencana tanggal sewa saya.");
                            @endphp
                            <a href="{{ $waAsk }}" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold shadow-md shadow-emerald-500/20 transition">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                Hubungi Admin
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 6. LOKASI STRATEGIS & AKSES POPULER -->
    <section id="jarak" class="py-12 sm:py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                    Akses Strategis
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900">
                    Dekat dengan Berbagai Landmark Makassar
                </h2>
                <p class="text-xs sm:text-sm text-slate-600">
                    Akses mudah ke tempat wisata, kuliner legendaris, dan pusat perbelanjaan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                @foreach($locations as $loc)
                    <div class="p-6 rounded-2xl glass-card border border-slate-200/80 space-y-3.5 shadow-sm">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <h4 class="text-base sm:text-lg font-bold text-slate-900">Dari Apartemen {{ $loc->name }}</h4>
                            @if($loc->tagline)
                                <span class="text-xs px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 font-semibold border border-blue-200">{{ $loc->tagline }}</span>
                            @endif
                        </div>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-slate-600">
                            @forelse($loc->landmarks as $landmark)
                                <li class="flex items-center justify-between gap-3">
                                    <span class="truncate">{{ $landmark->name }}</span>
                                    <strong class="text-blue-600 font-mono shrink-0">{{ $landmark->distance_time }}</strong>
                                </li>
                            @empty
                                <li class="text-slate-400 text-xs italic py-2 text-center">
                                    Informasi akses landmark untuk lokasi ini sedang diperbarui.
                                </li>
                            @endforelse
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 7. FAQ & ATURAN MENGINAP -->
    <section id="faq" class="py-12 sm:py-16 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full glass-badge text-blue-700 text-xs font-bold uppercase tracking-wider">
                    FAQ
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900">
                    Pertanyaan Seputar Sewa Apartemen
                </h2>
                <p class="text-xs sm:text-sm text-slate-600">
                    Ketentuan dan prosedur sewa kamar di VIDALIDAY Makassar.
                </p>
            </div>

            <div class="space-y-3.5">
                @forelse($faqs as $faq)
                    <div class="p-5 rounded-2xl glass-card border border-slate-200/80 space-y-1.5 shadow-sm hover:border-blue-200 transition">
                        <h3 class="text-sm sm:text-base font-bold text-slate-900 flex items-center justify-between gap-3">
                            <span>{{ $faq->question }}</span>
                            @if($faq->badge)
                                <span class="text-blue-600 text-xs sm:text-sm font-semibold shrink-0">{{ $faq->badge }}</span>
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
        </div>
    </section>

    <!-- POP-UP MODAL RENCANA TANGGAL PEMESANAN (GLASSMORPHISM) -->
    <div id="booking-modal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-md z-50 flex items-center justify-center p-4 hidden">
        <div class="glass-card rounded-3xl border border-white/80 p-6 sm:p-7 max-w-lg w-full space-y-5 shadow-2xl bg-white/95 relative transform transition-all animate-fade-in max-h-[92vh] overflow-y-auto">
            
            <!-- Close Button -->
            <button type="button" 
                    onclick="closeBookingModal()" 
                    class="absolute top-5 right-5 p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <!-- Modal Header -->
            <div class="flex items-start gap-4 pr-8">
                <img id="modal-unit-img" src="" alt="Unit" class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl object-cover border border-slate-200 shrink-0 bg-slate-100 shadow-sm">
                <div>
                    <span id="modal-unit-location" class="text-[11px] font-bold text-blue-600 uppercase tracking-wider block"></span>
                    <h3 id="modal-unit-name" class="text-base sm:text-lg font-black text-slate-900 leading-tight"></h3>
                    <div class="flex items-center gap-2 mt-1">
                        <span id="modal-unit-room-type" class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[11px] font-semibold"></span>
                        <span id="modal-unit-price" class="text-xs sm:text-sm font-extrabold text-blue-700"></span>
                        <span id="modal-unit-period" class="text-[11px] text-slate-400"></span>
                    </div>
                </div>
            </div>

            <!-- Title & Hint -->
            <div class="border-t border-b border-slate-100 py-3">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-bold text-slate-900">Rencana Jadwal Menginap Anda</h4>
                        <p class="text-[11px] text-slate-500">Tentukan perkiraan tanggal agar admin langsung mengecek ketersediaan unit.</p>
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

    const waAdminNumber = "{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890') }}";

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

    // Inisialisasi awal saat load dokumen
    document.addEventListener('DOMContentLoaded', function() {
        refreshGridDisplay('grid-delft-cpi');
        refreshGridDisplay('grid-vida-view');
        updateCountIndicator();
    });
</script>
@endpush
