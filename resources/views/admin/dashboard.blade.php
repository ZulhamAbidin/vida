@extends('admin.layout')

@section('title', 'Dashboard Pengelola')
@section('page_title', 'Ringkasan Sistem VIDALIDAY')

@section('content')

    <!-- 1. Stats Counter Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        
        <div class="p-5 sm:p-6 rounded-2xl glass-card border border-slate-200/80 space-y-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Total Unit Kamar</span>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-black text-slate-900">{{ $totalUnits }}</span>
                <span class="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">Kamar</span>
            </div>
            <p class="text-xs text-slate-500">Delft CPI & Vida View</p>
        </div>

        <div class="p-5 sm:p-6 rounded-2xl glass-card border border-slate-200/80 space-y-2">
            <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider block">Unit Tersedia</span>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-black text-emerald-700">{{ $availableUnits }}</span>
                <span class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold">Siap Sewa</span>
            </div>
            <p class="text-xs text-slate-500">Status aktif di katalog</p>
        </div>

        <div class="p-5 sm:p-6 rounded-2xl glass-card border border-slate-200/80 space-y-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Fasilitas Gedung</span>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-black text-slate-900">{{ $totalFacilities }}</span>
                <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-bold">Fasilitas</span>
            </div>
            <p class="text-xs text-slate-500">Kolam, gym, security, dll.</p>
        </div>

        <div class="p-5 sm:p-6 rounded-2xl glass-card border border-slate-200/80 space-y-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">WhatsApp Reservasi</span>
            <div class="flex items-baseline justify-between">
                <span class="text-base sm:text-lg font-black text-slate-900 font-mono truncate">{{ $whatsappNumber }}</span>
                <span class="px-2 py-0.5 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold">Aktif</span>
            </div>
            <a href="{{ route('admin.settings.index') }}" class="text-xs text-blue-600 hover:underline block font-semibold">Pengaturan Kontak →</a>
        </div>

    </div>

    <!-- 2. Unit "Pilihan Favorit Tamu" di Hero Utama Website -->
    <div class="p-6 rounded-2xl glass-card border border-blue-200/80 mb-8 bg-gradient-to-r from-blue-50/70 via-white to-blue-50/40 shadow-sm">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-bold border border-blue-200">
                    <svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    Unit "Pilihan Favorit Tamu" (Tampil di Hero Utama Web)
                </div>
                <h2 class="text-lg sm:text-xl font-bold text-slate-900">
                    Unit Unggulan yang Dipromosikan Saat Ini
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 max-w-xl">
                    Unit ini ditampilkan di kartu utama sebelah kanan Hero banner pada halaman depan website. Anda dapat mengganti unit pilihan favorit kapan saja melalui menu Kamar.
                </p>
            </div>

            @if($featuredUnit)
                <div class="flex items-center gap-4 p-3.5 rounded-xl bg-white border border-slate-200/90 shadow-sm shrink-0">
                    <img src="{{ $featuredUnit->image_url }}" alt="{{ $featuredUnit->name }}" class="w-16 h-16 rounded-xl object-cover border border-slate-200">
                    <div>
                        <span class="text-[10px] text-blue-600 font-bold uppercase tracking-wider block">{{ $featuredUnit->location->name ?? '-' }}</span>
                        <h4 class="text-sm font-bold text-slate-900">{{ $featuredUnit->name }}</h4>
                        <span class="text-xs font-extrabold text-blue-700">{{ $featuredUnit->formatted_promo_price }}</span>
                        <a href="{{ route('admin.units.index') }}" class="block text-[11px] text-slate-500 hover:text-blue-600 hover:underline mt-1">Ganti Unit Favorit →</a>
                    </div>
                </div>
            @else
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-500">
                    Admin belum menambahkan unit kamar pilihan favorit atau data telah dihapus. <a href="{{ route('admin.units.index') }}" class="text-blue-600 font-bold hover:underline">Pilih unit favorit sekarang →</a>
                </div>
            @endif
        </div>
    </div>

    <!-- 3. Ringkasan Dua Lokasi Apartemen -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        @foreach($locations as $location)
            <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-6 space-y-4 shadow-sm">
                <div class="flex items-start justify-between border-b border-slate-100 pb-3">
                    <div>
                        <span class="text-xs text-blue-600 font-bold uppercase tracking-wider block">Lokasi Apartemen</span>
                        <h3 class="text-lg font-bold text-slate-900">{{ $location->name }}</h3>
                        <p class="text-xs text-slate-500 mt-0.5">{{ $location->tagline }}</p>
                    </div>
                    <span class="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">
                        {{ $location->units_count }} Unit Kamar
                    </span>
                </div>

                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ Str::limit($location->description, 130) }}
                </p>

                <div class="flex items-center justify-between pt-2 text-xs">
                    <span class="text-slate-500">Fasilitas terdaftar: <strong class="text-slate-800">{{ $location->facilities_count }}</strong></span>
                    <a href="{{ route('admin.units.index', ['location_id' => $location->id]) }}" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-blue-50 hover:text-blue-700 font-bold text-slate-700 border border-slate-200 transition">
                        Lihat Unit Lokasi Ini →
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- 4. Quick Action Grid -->
    <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-sm">
        <h3 class="text-base font-bold text-slate-900 mb-4">Navigasi Cepat Pengelolaan</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="{{ route('admin.units.create') }}" class="p-4 rounded-xl bg-slate-50 hover:bg-blue-50 hover:border-blue-200 border border-slate-200/80 transition group space-y-2">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </div>
                <h4 class="text-sm font-bold text-slate-900 group-hover:text-blue-700">Tambah Kamar Baru</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Input unit baru, upload foto kamar asli hingga 5MB, dan atur tarif sewa.</p>
            </a>

            <a href="{{ route('admin.facilities.index') }}" class="p-4 rounded-xl bg-slate-50 hover:bg-blue-50 hover:border-blue-200 border border-slate-200/80 transition group space-y-2">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h4 class="text-sm font-bold text-slate-900 group-hover:text-blue-700">Kelola Fasilitas Gedung</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Perbarui daftar fasilitas kolam renang, gym, dan keamanan gedung.</p>
            </a>

            <a href="{{ route('admin.settings.index') }}" class="p-4 rounded-xl bg-slate-50 hover:bg-blue-50 hover:border-blue-200 border border-slate-200/80 transition group space-y-2">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h4 class="text-sm font-bold text-slate-900 group-hover:text-blue-700">Pengaturan Kontak & WA</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Ubah nomor WhatsApp admin penerima pesan dan template reservasi.</p>
            </a>
        </div>
    </div>

@endsection
