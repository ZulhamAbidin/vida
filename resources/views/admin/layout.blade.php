<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | VIDALIDAY CMS</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen relative overflow-x-clip selection:bg-blue-600 selection:text-white">

    <!-- Ambient Glow Orbs -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-400/10 rounded-full blur-[130px]"></div>
        <div class="absolute top-1/2 -right-40 w-96 h-96 bg-sky-300/10 rounded-full blur-[130px]"></div>
    </div>

    <div class="relative min-h-screen md:flex">
        
        <!-- Mobile Sidebar Overlay (tap outside to close) — no blur, just semi-transparent -->
        <div id="sidebar-overlay" onclick="closeSidebarMobile()" class="fixed inset-0 bg-slate-900/30 z-40 hidden md:hidden"></div>


        <aside id="main-sidebar" class="fixed md:sticky top-0 h-screen h-[100dvh] w-72 max-w-[85vw] md:w-64 bg-white border-r border-slate-200 flex flex-col shrink-0 z-50 transition-transform duration-300 -translate-x-full md:translate-x-0 shadow-2xl md:shadow-none overflow-hidden">
            <!-- Brand Header (Fixed Top) -->
            <div class="shrink-0 p-4 sm:p-5 border-b border-slate-200 flex items-center justify-between bg-white">
                <div class="flex items-center gap-3 sidebar-brand-text min-w-0">
                    <div class="w-10 h-10 rounded-full overflow-hidden border border-slate-200/80 p-0.5 shadow-sm shrink-0 bg-white">
                        <img src="{{ !empty($siteLogo) ? asset('storage/' . $siteLogo) : asset('images/logo_vidaliday.png') }}" 
                             alt="VIDALIDAY Logo" 
                             class="w-full h-full object-cover rounded-full">
                    </div>
                    <div class="sidebar-text truncate">
                        <span class="font-black text-base text-slate-900 tracking-tight">VIDALIDAY</span>
                        <span class="text-blue-600 font-bold">.</span>
                        <p class="text-[10px] text-blue-600 font-bold uppercase tracking-wider">Apartment By Us</p>
                    </div>
                </div>

                <!-- Close button on mobile -->
                <button type="button" onclick="closeSidebarMobile()" class="md:hidden p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition" aria-label="Tutup Sidebar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Navigation Links (Scrollable Middle Area) -->
            <nav class="flex-1 overflow-y-auto min-h-0 p-3 sm:p-3.5 space-y-1 sm:space-y-1.5 text-xs sm:text-sm font-semibold">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 sm:py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="sidebar-text">Dashboard & Promo</span>
                </a>

                <a href="{{ route('admin.units.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 sm:py-3 rounded-xl transition {{ request()->routeIs('admin.units.*') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span class="sidebar-text">Kamar & Upload Foto</span>
                </a>

                <a href="{{ route('admin.facilities.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 sm:py-3 rounded-xl transition {{ request()->routeIs('admin.facilities.*') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    <span class="sidebar-text">Fasilitas Gedung</span>
                </a>

                <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 sm:py-3 rounded-xl transition {{ request()->routeIs('admin.faqs.*') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="sidebar-text">Tanya Jawab (FAQ)</span>
                </a>

                <a href="{{ route('admin.landmarks.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 sm:py-3 rounded-xl transition {{ request()->routeIs('admin.landmarks.*') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="sidebar-text">Akses & Landmark</span>
                </a>

                <a href="{{ route('admin.about.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 sm:py-3 rounded-xl transition {{ request()->routeIs('admin.about.*') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="sidebar-text">Tentang Kami (About)</span>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 sm:py-3 rounded-xl transition {{ request()->routeIs('admin.settings.*') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="sidebar-text">No. WA & Banner</span>
                </a>
            </nav>

            <!-- Footer Sidebar Actions (Docked at Bottom, Always Visible) -->
            <div class="shrink-0 p-3.5 sm:p-4 border-t border-slate-200 bg-white space-y-2 pb-6 md:pb-4 shadow-[0_-4px_12px_rgba(0,0,0,0.03)]">
                <a href="{{ route('home') }}" target="_blank" class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700 border border-slate-200 transition">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    <span class="sidebar-text">Lihat Web Publik</span>
                </a>

                <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-semibold border border-rose-200 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span class="sidebar-text">Keluar (Logout)</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Admin Content Area -->
        <div class="w-full md:flex-1 md:flex md:flex-col md:min-w-0">
            <!-- Topbar Header -->
            <header class="h-16 md:h-20 bg-white border-b border-slate-200 px-3.5 sm:px-6 flex items-center justify-between shrink-0 sticky top-0 z-30 shadow-xs">
                <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
                    <!-- Toggle Sidebar Button (Desktop & Mobile) -->
                    <button type="button" id="sidebar-toggle-btn" onclick="toggleSidebar()" class="w-10 h-10 rounded-xl text-slate-700 hover:bg-slate-100 border border-slate-200 transition flex items-center justify-center shrink-0 shadow-xs" title="Buka/Tutup Sidebar">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    </button>

                    <h1 class="text-sm sm:text-lg font-bold text-slate-900 truncate max-w-[170px] xs:max-w-[220px] sm:max-w-none">@yield('page_title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-2 sm:gap-4 shrink-0">
                    <div class="flex items-center gap-1.5 sm:gap-2 text-xs text-slate-600 font-medium">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="hidden sm:inline">{{ auth()->user()->name ?? 'Admin' }}</span>
                    </div>

                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-1.5 px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-lg bg-blue-50 text-blue-700 text-xs font-semibold hover:bg-blue-100 transition border border-blue-200/60 shadow-xs" title="Lihat Website Publik">
                        <span class="hidden sm:inline">Web Depan</span>
                        <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>
            </header>

            <!-- Page Body -->
            <main class="p-4 sm:p-6 md:p-8 pb-36 sm:pb-28 md:pb-24 w-full md:flex-1">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between shadow-sm">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm space-y-1 shadow-sm">
                        <strong class="font-bold flex items-center gap-1">
                            <svg class="w-4 h-4 text-rose-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            Terjadi kendala input:
                        </strong>
                        <ul class="list-disc list-inside text-xs space-y-0.5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')

                <!-- Admin Footer Spacing & Info -->
                <footer class="mt-12 pt-6 border-t border-slate-200 text-center sm:text-left text-xs text-slate-400 flex flex-col sm:flex-row items-center justify-between gap-2 pb-12 sm:pb-6">
                    <p>&copy; {{ date('Y') }} VIDALIDAY. Apartment By Us. Seluruh hak cipta dilindungi.</p>
                    <p class="text-[11px] text-slate-400">Panel Pengelola Resmi PT PERDANA MEGA TRANS</p>
                </footer>
            </main>
        </div>

    </div>

    <!-- Vanilla JS Sidebar Toggle Controller -->
    <script>
        const sidebar = document.getElementById('main-sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            if (window.innerWidth < 768) {
                // Mobile: slide in/out with overlay
                const isOpen = !sidebar.classList.contains('-translate-x-full');
                if (isOpen) {
                    closeSidebarMobile();
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    overlay.classList.remove('hidden');
                }
            } else {
                // Desktop toggle: collapse sidebar width
                if (sidebar.classList.contains('w-64')) {
                    sidebar.classList.remove('w-64');
                    sidebar.classList.add('w-20');
                    document.querySelectorAll('.sidebar-text').forEach(el => el.classList.add('hidden'));
                } else {
                    sidebar.classList.remove('w-20');
                    sidebar.classList.add('w-64');
                    document.querySelectorAll('.sidebar-text').forEach(el => el.classList.remove('hidden'));
                }
            }
        }

        function closeSidebarMobile() {
            if (window.innerWidth < 768 && sidebar) {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
            }
        }

        // Close on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeSidebarMobile();
            }
        });

        // Close sidebar when a nav link is clicked on mobile
        if (sidebar) {
            sidebar.querySelectorAll('nav a').forEach(function(link) {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 768) {
                        closeSidebarMobile();
                    }
                });
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
