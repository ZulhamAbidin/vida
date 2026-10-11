@php
    $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285711696970');
    $priceDisplay = $unit->is_promo_active ? $unit->formatted_promo_price : $unit->formatted_normal_price;
    $msg = "Halo Admin VIDALIDAY, saya ingin memesan/tanya ketersediaan unit:\n" .
           "- Lokasi: {$locationName}\n" .
           "- Unit: {$unit->name} ({$unit->room_type})\n" .
           "- Harga: {$priceDisplay} / {$unit->rental_period}\n\n" .
           "Mohon info ketersediaan unit untuk rencana jadwal menginap saya. Terima kasih!";
    $waUrl = 'https://wa.me/' . $waClean . '?text=' . urlencode($msg);
@endphp

@php
    $effectivePrice = $unit->is_promo_active && $unit->promo_price ? (int)$unit->promo_price : (int)$unit->normal_price;
    $createdTimestamp = $unit->created_at ? $unit->created_at->timestamp : $unit->id;
    $cardImages = $unit->all_images;
    $hasMultipleImages = count($cardImages) > 1;
    $sliderId = 'slider-' . $unit->id . '-' . rand(100, 999);
    $hasVideoTour = !empty($unit->youtube_embed_url);
@endphp

<div class="unit-card-item bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group"
     data-price="{{ $effectivePrice }}"
     data-created="{{ $createdTimestamp }}"
     data-unit-id="{{ $unit->id }}">
    
    <div>
        <!-- 1. Header: Gambar Lebar Penuh dengan Slider Multi-Foto Interaktif -->
        <div class="relative h-56 sm:h-60 overflow-hidden bg-slate-900 group/slider select-none" id="{{ $sliderId }}" data-current-index="0">
            <!-- Slides Track -->
            <div class="slider-track flex h-full transition-transform duration-300 ease-out" style="transform: translateX(0%); width: {{ count($cardImages) * 100 }}%;">
                @foreach($cardImages as $idx => $img)
                    <div class="h-full relative overflow-hidden" style="width: {{ 100 / count($cardImages) }}%; flex: 0 0 {{ 100 / count($cardImages) }}%;">
                        <img src="{{ $img }}" 
                             alt="{{ $unit->name }} - Foto {{ $idx + 1 }}" 
                             loading="lazy"
                             class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-transparent to-black/30 pointer-events-none z-10"></div>

            <!-- Badges Atas -->
            <div class="absolute top-2.5 sm:top-3 inset-x-2.5 sm:inset-x-3 flex items-center justify-between gap-1.5 sm:gap-2 pointer-events-none z-20">
                <span class="px-2.5 py-1 rounded-lg bg-white/95 backdrop-blur-md text-[10px] sm:text-[11px] font-bold text-slate-800 uppercase tracking-wider shadow-sm border border-white/60">
                    {{ $unit->room_type }}
                </span>

                <div class="flex items-center gap-1.5">
                    @if($hasMultipleImages)
                        <span class="slide-counter px-2 py-0.5 rounded-md bg-slate-900/80 backdrop-blur-md text-[9px] sm:text-[10px] font-bold text-white tracking-wider border border-white/20 shadow-sm">
                            1/{{ count($cardImages) }} Foto
                        </span>
                    @endif

                    @if($unit->is_promo_active && !empty($unit->promo_badge))
                        <span class="px-2.5 sm:px-3 py-1 rounded-lg bg-blue-600 text-white text-[10px] sm:text-[11px] font-extrabold tracking-wide shadow-md shadow-blue-500/30">
                            {{ $unit->promo_badge }}
                        </span>
                    @elseif($unit->is_promo_active)
                        <span class="px-2.5 sm:px-3 py-1 rounded-lg bg-emerald-500 text-white text-[10px] sm:text-[11px] font-extrabold tracking-wide shadow-md shadow-emerald-500/30">
                            Promo Aktif
                        </span>
                    @endif
                </div>
            </div>

            <!-- Bottom Left Info on Image -->
            <div class="absolute bottom-2.5 sm:bottom-3 left-2.5 sm:left-3 flex items-center gap-1.5 sm:gap-2 text-xs text-white z-20 pointer-events-none">
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 sm:py-1 rounded-md bg-slate-900/75 backdrop-blur-md text-[10px] sm:text-[11px] font-medium">
                    <svg class="w-3.5 h-3.5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Maks. {{ $unit->max_guests }} Tamu
                </span>
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 sm:py-1 rounded-md bg-slate-900/75 backdrop-blur-md text-[10px] sm:text-[11px] font-medium">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    Unit Bersih
                </span>
            </div>

            @if($hasMultipleImages)
                <!-- Navigation Arrows -->
                <button type="button" 
                        onclick="event.stopPropagation(); event.preventDefault(); prevUnitSlide('{{ $sliderId }}', {{ count($cardImages) }});" 
                        aria-label="Foto Sebelumnya"
                        class="absolute left-2.5 top-1/2 -translate-y-1/2 z-30 w-8 h-8 rounded-full bg-slate-900/70 hover:bg-slate-900 text-white flex items-center justify-center backdrop-blur-md shadow-lg transition-all opacity-80 sm:opacity-0 sm:group-hover/slider:opacity-100 focus:opacity-100 active:scale-90 hover:scale-110 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <button type="button" 
                        onclick="event.stopPropagation(); event.preventDefault(); nextUnitSlide('{{ $sliderId }}', {{ count($cardImages) }});" 
                        aria-label="Foto Berikutnya"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 z-30 w-8 h-8 rounded-full bg-slate-900/70 hover:bg-slate-900 text-white flex items-center justify-center backdrop-blur-md shadow-lg transition-all opacity-80 sm:opacity-0 sm:group-hover/slider:opacity-100 focus:opacity-100 active:scale-90 hover:scale-110 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </button>

                <!-- Indicator Dots (Bottom Right) -->
                <div class="absolute bottom-2.5 sm:bottom-3 right-2.5 sm:right-3 z-20 flex items-center gap-1.5 pointer-events-none bg-slate-900/50 backdrop-blur-xs px-2 py-1 rounded-full">
                    @foreach($cardImages as $idx => $img)
                        <span class="slide-dot h-1.5 rounded-full transition-all duration-300 {{ $idx === 0 ? 'bg-white w-3' : 'bg-white/50 w-1.5' }}" data-dot-index="{{ $idx }}"></span>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- 2. Card Body -->
        <div class="p-4 sm:p-5 space-y-3.5">
            <!-- Header Unit & Lokasi -->
            <div>
                <span class="text-[10px] sm:text-xs font-bold text-blue-600 uppercase tracking-wider block">{{ $locationName }}</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mt-0.5">
                    {{ $unit->name }}
                </h3>
                <div class="text-[11px] sm:text-xs text-slate-500 mt-1 flex items-center gap-1.5 flex-wrap">
                    <span>{{ $unit->room_type }} • {{ $unit->rental_period }}</span>
                    <span>• Maks. {{ $unit->max_guests }} Tamu</span>
                </div>
            </div>

            <!-- BOX TARIF SEWA: Harga Coretan Tepat DI BAWAH Harga Promo -->
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100/90 flex items-center justify-between gap-3">
                <div>
                    <span class="text-[10px] text-slate-400 block uppercase font-bold tracking-wider">TARIF SEWA</span>
                    
                    <!-- Harga Promo (Utama) -->
                    <div class="flex items-baseline gap-1 mt-0.5">
                        <span class="text-blue-700 font-black text-lg sm:text-xl">
                            {{ $unit->is_promo_active ? $unit->formatted_promo_price : $unit->formatted_normal_price }}
                        </span>
                        <span class="text-[11px] text-slate-500 font-semibold">/ {{ $unit->rental_period }}</span>
                    </div>

                    <!-- Harga Coretan (Tepat di Bawah Harga Promo) -->
                    @if($unit->is_promo_active && $unit->normal_price > $unit->promo_price)
                        <div class="flex items-center gap-1 text-[11px] text-rose-500 mt-0.5">
                            <span class="text-slate-400 text-[10px]">Normal:</span>
                            <span class="line-through font-semibold">{{ $unit->formatted_normal_price }}</span>
                        </div>
                    @endif
                </div>

                <!-- Promo Badge di Kanan Box -->
                @if($unit->is_promo_active && $unit->discount_percent > 0)
                    <div class="text-right shrink-0">
                        <span class="inline-block px-2.5 sm:px-3 py-1 rounded-xl bg-rose-50 text-rose-600 text-[11px] sm:text-xs font-black border border-rose-200">
                            Hemat {{ $unit->discount_percent }}%
                        </span>
                    </div>
                @elseif($unit->is_promo_active && !empty($unit->promo_badge))
                    <div class="text-right shrink-0">
                        <span class="inline-block px-2.5 sm:px-3 py-1 rounded-xl bg-blue-50 text-blue-700 text-[11px] sm:text-xs font-black border border-blue-200">
                            {{ $unit->promo_badge }}
                        </span>
                    </div>
                @endif
            </div>

            <!-- Box Deskripsi Kamar -->
            @if(!empty($unit->description))
                <div class="text-xs text-slate-600 bg-slate-50/70 p-3 rounded-xl border border-slate-100 line-clamp-2 leading-relaxed">
                    <span class="font-bold text-slate-800 text-[11px] block mb-0.5">Deskripsi:</span>
                    {{ $unit->description }}
                </div>
            @endif

            <!-- Fasilitas Kamar Chips -->
            @if(!empty($unit->facilities_list))
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1.5">FASILITAS KAMAR:</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($unit->facilities_list as $facility)
                            <span class="px-2.5 py-1 rounded-lg bg-blue-50/80 border border-blue-100 text-[10px] sm:text-[11px] text-blue-700 font-medium">
                                {{ $facility }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- 3. Card Footer: Tombol Video YouTube (Room Tour) & Booking WhatsApp -->
    <div class="p-4 sm:p-5 pt-0 border-t border-slate-100 mt-2">
        @if($hasVideoTour)
            <div class="grid grid-cols-2 gap-2 pt-1">
                <!-- Tombol Video Tur YouTube Modal -->
                <button type="button" 
                        onclick="openVideoModal('{{ $unit->youtube_embed_url }}', 'Room Tour {{ addslashes($unit->name) }}')" 
                        class="py-2.5 sm:py-3 px-2 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 font-bold text-xs flex items-center justify-center gap-1.5 border border-red-200 shadow-xs hover:shadow-sm transition active:scale-95 cursor-pointer">
                    <svg class="w-4 h-4 fill-current text-red-600 shrink-0" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    <span>Video Tur</span>
                </button>

                <!-- Tombol Pesan via WhatsApp (Buka Modal Pemilihan Tanggal) -->
                <button type="button" 
                        onclick="openBookingModal('{{ addslashes($unit->name) }}', '{{ addslashes($unit->room_type) }}', '{{ addslashes($locationName) }}', '{{ $priceDisplay }}', '{{ $unit->rental_period }}', '{{ $unit->image_url }}', {{ (int)$unit->max_guests }})" 
                        class="py-2.5 sm:py-3 px-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center gap-1.5 shadow-md shadow-emerald-500/20 hover:shadow-emerald-500/30 transition active:scale-95 cursor-pointer">
                    <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>Pesan WA</span>
                </button>
            </div>
        @else
            <!-- Tombol Pesan via WhatsApp Full Width jika belum ada video YouTube -->
            <div class="pt-1">
                <button type="button" 
                        onclick="openBookingModal('{{ addslashes($unit->name) }}', '{{ addslashes($unit->room_type) }}', '{{ addslashes($locationName) }}', '{{ $priceDisplay }}', '{{ $unit->rental_period }}', '{{ $unit->image_url }}', {{ (int)$unit->max_guests }})" 
                        class="w-full py-2.5 sm:py-3 px-3 sm:px-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold text-[11px] sm:text-xs flex items-center justify-center gap-2 shadow-md shadow-emerald-500/20 group-hover:shadow-emerald-500/30 transition-all duration-300 cursor-pointer">
                    <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>PESAN VIA WHATSAPP</span>
                </button>
            </div>
        @endif
    </div>

</div>
