@php
    $waClean = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890');
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
@endphp

<div class="unit-card-item glass-card glass-card-hover rounded-2xl overflow-hidden border border-slate-200/90 flex flex-col justify-between group transition-all duration-300"
     data-price="{{ $effectivePrice }}"
     data-created="{{ $createdTimestamp }}"
     data-unit-id="{{ $unit->id }}">
    
    <div>
        <!-- Image & Badges Container -->
        <div class="relative h-56 sm:h-60 overflow-hidden bg-slate-100">
            <img src="{{ $unit->image_url }}" 
                 alt="{{ $unit->name }}" 
                 loading="lazy"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>

            <!-- Top Badges -->
            <div class="absolute top-3 inset-x-3 flex items-center justify-between gap-2 pointer-events-none">
                <span class="px-2.5 py-1 rounded-lg bg-white/90 backdrop-blur-md text-[11px] font-bold text-slate-800 uppercase tracking-wider shadow-sm border border-white/50">
                    {{ $unit->room_type }}
                </span>

                @if($unit->is_promo_active && !empty($unit->promo_badge))
                    <span class="px-3 py-1 rounded-lg bg-blue-600 text-white text-[11px] font-extrabold tracking-wide shadow-md shadow-blue-500/30">
                        {{ $unit->promo_badge }}
                    </span>
                @endif
            </div>

            <!-- Bottom Left Info on Image -->
            <div class="absolute bottom-3 left-3 flex items-center gap-2 text-xs text-white">
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-slate-900/70 backdrop-blur-md text-[11px] font-medium">
                    <svg class="w-3.5 h-3.5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Maks. {{ $unit->max_guests }} Tamu
                </span>
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-slate-900/70 backdrop-blur-md text-[11px] font-medium">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    Unit Bersih
                </span>
            </div>
        </div>

        <!-- Card Body -->
        <div class="p-5 space-y-3">
            <div>
                <span class="text-[11px] font-bold text-blue-600 uppercase tracking-wider block">{{ $locationName }}</span>
                <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug">
                    {{ $unit->name }}
                </h3>
            </div>

            <p class="text-xs text-slate-600 leading-relaxed line-clamp-2">
                {{ $unit->description }}
            </p>

            <!-- Amenities Chips -->
            @if(!empty($unit->facilities_list))
                <div class="pt-1 flex flex-wrap gap-1.5">
                    @foreach($unit->facilities_list as $facility)
                        <span class="px-2 py-0.5 rounded-md bg-slate-100 border border-slate-200/80 text-[11px] text-slate-700 font-medium">
                            {{ $facility }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Card Footer / Price & WhatsApp CTA -->
    <div class="p-5 pt-0 border-t border-slate-100 mt-2 space-y-4">
        <!-- Price Block -->
        <div class="flex items-baseline justify-between pt-3">
            <div>
                <span class="text-[10px] text-slate-500 block uppercase font-bold tracking-wider">Tarif Sewa</span>
                <div class="flex items-baseline gap-2">
                    @if($unit->is_promo_active && $unit->normal_price > $unit->promo_price)
                        <span class="text-xs font-semibold text-rose-500 line-through">
                            {{ $unit->formatted_normal_price }}
                        </span>
                    @endif
                    <span class="text-xl font-black text-blue-700">
                        {{ $unit->is_promo_active ? $unit->formatted_promo_price : $unit->formatted_normal_price }}
                    </span>
                    <span class="text-xs text-slate-500 font-medium">/ {{ $unit->rental_period }}</span>
                </div>
            </div>

            @if($unit->is_promo_active && $unit->discount_percent > 0)
                <span class="px-2 py-0.5 rounded bg-rose-50 text-rose-600 text-[11px] font-black border border-rose-200">
                    -{{ $unit->discount_percent }}%
                </span>
            @endif
        </div>

        <!-- Booking Dates Pop-up Trigger Button -->
        <button type="button" 
                onclick="openBookingModal('{{ addslashes($unit->name) }}', '{{ addslashes($unit->room_type) }}', '{{ addslashes($locationName) }}', '{{ $priceDisplay }}', '{{ $unit->rental_period }}', '{{ $unit->image_url }}', {{ (int)$unit->max_guests }})" 
                class="w-full py-3 px-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center gap-2 shadow-md shadow-emerald-500/20 group-hover:shadow-emerald-500/30 transition-all duration-300">
            <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
            <span>PESAN VIA WHATSAPP</span>
        </button>
    </div>

</div>
