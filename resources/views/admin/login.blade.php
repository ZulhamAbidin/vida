<!DOCTYPE html>
<html lang="id" class="min-h-full overflow-y-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengelola | VIDALIDAY</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col p-4 sm:p-6 overflow-y-auto relative selection:bg-red-200 selection:text-slate-900">

    <!-- Ambient Glowing Orbs Background -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-rose-500/15 rounded-full blur-[140px]"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-red-400/15 rounded-full blur-[140px]"></div>
    </div>

    <div class="relative z-10 w-full max-w-md m-auto py-6 sm:py-8">
        
        <!-- White Glassmorphic Login Card -->
        <div class="glass-card rounded-3xl p-6 sm:p-8 border border-white/80 shadow-xl space-y-5 sm:space-y-6 bg-white/95">

            
            <!-- Header Brand -->
            <div class="text-center space-y-2">
                <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-slate-200/80 shadow-md mx-auto p-0.5 bg-white flex items-center justify-center">
                    <img src="{{ !empty($siteLogo) ? asset('storage/' . $siteLogo) : asset('images/logo_vidaliday.png') }}" 
                         alt="VIDALIDAY Logo" 
                         class="w-full h-full object-cover rounded-full">
                </div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight flex items-center justify-center gap-1">
                    VIDALIDAY
                    <span class="text-red-600 text-3xl leading-none">.</span>
                </h1>
                <p class="text-xs text-slate-500">Apartment By Us • Panel Pengelola Unit & Promo Resmi</p>
            </div>

            <!-- Error Notification -->
            @if($errors->any())
                <div class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            @if(session('success'))
                <div class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Email Pengelola</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="email" 
                           class="w-full px-4 py-3 rounded-xl glass-input text-sm"
                           placeholder="Masukkan email pengelola">
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Kata Sandi</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           class="w-full px-4 py-3 rounded-xl glass-input text-sm"
                           placeholder="Masukkan kata sandi">
                </div>

                <div class="flex items-center justify-between text-xs text-slate-500 pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded bg-white border-slate-300 text-red-600 focus:ring-0">
                        <span>Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-extrabold text-sm tracking-wide shadow-md shadow-red-500/25 transition-all">
                    MASUK KE PANEL PENGELOLA
                </button>
            </form>

            <div class="text-center pt-2">
                <a href="{{ route('home') }}" class="text-xs text-slate-500 hover:text-red-600 transition flex items-center justify-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Halaman Depan
                </a>
            </div>

        </div>

        <p class="text-center text-[11px] text-slate-400 mt-6">
            Dikelola di bawah naungan PT PERDANA MEGA TRANS
        </p>

    </div>

</body>
</html>
