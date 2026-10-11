@extends('admin.layout')

@section('title', 'Dashboard Pengelola')
@section('page_title', 'Ringkasan Sistem VIDALIDAY')

@section('content')

    <!-- 1. Stats Counter Cards (2 Kolom di Mobile, 4 di Desktop) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-6 sm:mb-8">
        
        <div class="p-3.5 sm:p-6 rounded-2xl glass-card border border-slate-200/80 space-y-1.5 sm:space-y-2 bg-white">
            <span class="text-[10px] sm:text-xs font-bold text-slate-500 uppercase tracking-wider block truncate">Total Unit Kamar</span>
            <div class="flex items-baseline justify-between gap-1">
                <span class="text-2xl sm:text-3xl font-black text-slate-900">{{ $totalUnits }}</span>
                <span class="px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-lg bg-red-50 text-red-700 text-[10px] sm:text-xs font-bold border border-red-200">Kamar</span>
            </div>
            <p class="text-[10px] sm:text-xs text-slate-500 truncate">Delft CPI & Vida View</p>
        </div>

        <div class="p-3.5 sm:p-6 rounded-2xl glass-card border border-slate-200/80 space-y-1.5 sm:space-y-2 bg-white">
            <span class="text-[10px] sm:text-xs font-bold text-emerald-600 uppercase tracking-wider block truncate">Unit Tersedia</span>
            <div class="flex items-baseline justify-between gap-1">
                <span class="text-2xl sm:text-3xl font-black text-emerald-700">{{ $availableUnits }}</span>
                <span class="px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] sm:text-xs font-bold">Siap Sewa</span>
            </div>
            <p class="text-[10px] sm:text-xs text-slate-500 truncate">Status aktif di web</p>
        </div>

        <div class="p-3.5 sm:p-6 rounded-2xl glass-card border border-slate-200/80 space-y-1.5 sm:space-y-2 bg-white">
            <span class="text-[10px] sm:text-xs font-bold text-slate-500 uppercase tracking-wider block truncate">Fasilitas Gedung</span>
            <div class="flex items-baseline justify-between gap-1">
                <span class="text-2xl sm:text-3xl font-black text-slate-900">{{ $totalFacilities }}</span>
                <span class="px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-lg bg-slate-100 text-slate-700 text-[10px] sm:text-xs font-bold">Fasilitas</span>
            </div>
            <p class="text-[10px] sm:text-xs text-slate-500 truncate">Kolam, gym, security</p>
        </div>

        <div class="p-3.5 sm:p-6 rounded-2xl glass-card border border-slate-200/80 space-y-1.5 sm:space-y-2 bg-white">
            <span class="text-[10px] sm:text-xs font-bold text-slate-500 uppercase tracking-wider block truncate">WhatsApp Kontak</span>
            <div class="flex items-baseline justify-between gap-1">
                <span class="text-xs sm:text-base font-black text-slate-900 font-mono truncate">{{ $whatsappNumber }}</span>
                <span class="px-1.5 py-0.5 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 text-[9px] sm:text-[10px] font-bold">Aktif</span>
            </div>
            <a href="{{ route('admin.settings.index') }}" class="text-[10px] sm:text-xs text-red-600 hover:underline block font-semibold truncate">Atur Kontak →</a>
        </div>

    </div>

    <!-- 2. Unit "Pilihan Favorit Tamu" di Hero Utama Website -->
    <div class="p-4 sm:p-6 rounded-2xl glass-card border border-red-200/80 mb-6 sm:mb-8 bg-gradient-to-r from-red-50/70 via-white to-red-50/40 shadow-sm">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 sm:gap-6">
            <div class="space-y-1.5 sm:space-y-2">
                <div class="inline-flex items-center gap-1.5 sm:gap-2 px-2.5 sm:px-3 py-1 rounded-full bg-red-100 text-red-800 text-[10px] sm:text-xs font-bold border border-red-200">
                    <svg class="w-3.5 h-3.5 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span>Unit "Pilihan Favorit Tamu" (Hero Web)</span>
                </div>
                <h2 class="text-base sm:text-xl font-bold text-slate-900 leading-snug">
                    Unit Unggulan yang Dipromosikan Saat Ini
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 max-w-xl">
                    Unit ini ditampilkan di kartu utama sebelah kanan Hero banner pada halaman depan website. Anda dapat mengganti unit pilihan favorit kapan saja melalui menu Kamar.
                </p>
            </div>

            @if($featuredUnit)
                <div class="w-full sm:w-auto flex items-center gap-3 sm:gap-4 p-3 sm:p-3.5 rounded-xl bg-white border border-slate-200/90 shadow-sm shrink-0">
                    <img src="{{ $featuredUnit->image_url }}" alt="{{ $featuredUnit->name }}" class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl object-cover border border-slate-200 shrink-0">
                    <div class="min-w-0">
                        <span class="text-[10px] text-red-600 font-bold uppercase tracking-wider block truncate">{{ $featuredUnit->location->name ?? '-' }}</span>
                        <h4 class="text-xs sm:text-sm font-bold text-slate-900 truncate">{{ $featuredUnit->name }}</h4>
                        <span class="text-xs font-extrabold text-red-700 block">{{ $featuredUnit->formatted_promo_price }}</span>
                        <a href="{{ route('admin.units.index') }}" class="block text-[11px] text-slate-500 hover:text-red-600 hover:underline mt-0.5">Ganti Unit Favorit →</a>
                    </div>
                </div>
            @else
                <div class="w-full sm:w-auto p-3.5 sm:p-4 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-500">
                    Admin belum menambahkan unit kamar pilihan favorit atau data telah dihapus. <a href="{{ route('admin.units.index') }}" class="text-red-600 font-bold hover:underline block sm:inline mt-1 sm:mt-0">Pilih unit favorit sekarang →</a>
                </div>
            @endif
        </div>
    </div>

    <!-- 3. Ringkasan Dua Lokasi Apartemen -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
        @foreach($locations as $location)
            <div class="glass-card rounded-2xl border border-slate-200/90 p-4 sm:p-6 space-y-3 sm:space-y-4 shadow-sm bg-white">
                <div class="flex items-start justify-between border-b border-slate-100 pb-3 gap-2">
                    <div class="min-w-0">
                        <span class="text-[10px] sm:text-xs text-red-600 font-bold uppercase tracking-wider block">Lokasi Apartemen</span>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 truncate">{{ $location->name }}</h3>
                        <p class="text-[11px] sm:text-xs text-slate-500 mt-0.5 truncate">{{ $location->tagline }}</p>
                    </div>
                    <span class="px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-lg bg-red-50 text-red-700 text-[10px] sm:text-xs font-bold border border-red-200 shrink-0">
                        {{ $location->units_count }} Unit
                    </span>
                </div>

                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ Str::limit($location->description, 130) }}
                </p>

                <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-2 text-xs gap-2">
                    <span class="text-slate-500 text-[11px] sm:text-xs">Fasilitas terdaftar: <strong class="text-slate-800">{{ $location->facilities_count }}</strong></span>
                    <a href="{{ route('admin.units.index', ['location_id' => $location->id]) }}" class="w-full sm:w-auto text-center px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-red-50 hover:text-red-700 font-bold text-slate-700 border border-slate-200 transition text-xs">
                        Lihat Unit Lokasi Ini →
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- 4. Quick Action Grid -->
    <div class="glass-card rounded-2xl border border-slate-200/90 p-4 sm:p-6 shadow-sm bg-white">
        <h3 class="text-sm sm:text-base font-bold text-slate-900 mb-3 sm:mb-4">Navigasi Cepat Pengelolaan</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
            <a href="{{ route('admin.units.create') }}" class="p-3.5 sm:p-4 rounded-xl bg-slate-50 hover:bg-red-50 hover:border-red-200 border border-slate-200/80 transition group space-y-1.5 sm:space-y-2">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </div>
                <h4 class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-red-700">Tambah Kamar Baru</h4>
                <p class="text-[11px] sm:text-xs text-slate-500 leading-relaxed">Input unit baru, upload foto kamar asli hingga 5MB, dan atur tarif sewa.</p>
            </a>

            <a href="{{ route('admin.facilities.index') }}" class="p-3.5 sm:p-4 rounded-xl bg-slate-50 hover:bg-red-50 hover:border-red-200 border border-slate-200/80 transition group space-y-1.5 sm:space-y-2">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h4 class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-red-700">Kelola Fasilitas Gedung</h4>
                <p class="text-[11px] sm:text-xs text-slate-500 leading-relaxed">Perbarui daftar fasilitas kolam renang, gym, dan keamanan gedung.</p>
            </a>

            <a href="{{ route('admin.settings.index') }}" class="p-3.5 sm:p-4 rounded-xl bg-slate-50 hover:bg-red-50 hover:border-red-200 border border-slate-200/80 transition group space-y-1.5 sm:space-y-2">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h4 class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-red-700">Pengaturan Kontak & WA</h4>
                <p class="text-[11px] sm:text-xs text-slate-500 leading-relaxed">Ubah nomor WhatsApp admin penerima pesan dan template reservasi.</p>
            </a>
        </div>
    </div>

@endsection
