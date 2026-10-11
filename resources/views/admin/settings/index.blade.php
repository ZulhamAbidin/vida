@extends('admin.layout')

@section('title', 'Pengaturan Logo & Kontak Website')
@section('page_title', 'Pengaturan Logo, Kontak & Banner Website')

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="glass-card rounded-2xl border border-slate-200/90 p-5 sm:p-8 space-y-6 shadow-sm">
            <div class="border-b border-slate-200/80 pb-4">
                <h3 class="text-base sm:text-lg font-bold text-slate-900">Identitas Visual, Logo & Kontak Resmi</h3>
                <p class="text-xs text-slate-500 mt-1">
                    Upload logo brand untuk mengganti logo default pada landing page, halaman Tentang Kami, navbar, footer, dan panel admin.
                </p>
            </div>

            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Section: Logo Upload & Visual Identity -->
                <div class="p-5 rounded-2xl bg-blue-50/50 border border-blue-200/80 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                        <h4 class="text-xs font-bold text-blue-800 uppercase tracking-wider">Logo Brand Website</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-5 items-center">
                        <!-- Preview Logo Saat Ini -->
                        <div class="sm:col-span-4 flex flex-col items-center justify-center p-4 rounded-xl bg-white border border-slate-200/80 shadow-sm text-center">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2 block">Logo Aktif Saat Ini</span>
                            
                            <div class="w-24 h-24 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center overflow-hidden p-1 relative shadow-sm">
                                @if(!empty($settings['site_logo']))
                                    <img id="logo-preview" src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Logo VIDALIDAY" class="w-full h-full object-cover rounded-full">
                                @else
                                    <img id="logo-preview" src="{{ asset('images/logo_vidaliday.png') }}" alt="Logo VIDALIDAY" class="w-full h-full object-cover rounded-full">
                                    <div id="logo-default-placeholder" class="hidden"></div>
                                @endif
                            </div>

                            @if(!empty($settings['site_logo']))
                                <div class="mt-3">
                                    <label class="inline-flex items-center gap-1.5 text-xs text-rose-600 hover:text-rose-700 cursor-pointer">
                                        <input type="checkbox" name="remove_logo" value="1" class="rounded border-slate-300 text-rose-600 focus:ring-0">
                                        <span>Gunakan Logo Default</span>
                                    </label>
                                </div>
                            @endif
                        </div>

                        <!-- Upload Input & Petunjuk -->
                        <div class="sm:col-span-8 space-y-3">
                            <div>
                                <label for="site_logo" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    Upload File Logo Baru (PNG / JPG / WEBP / SVG)
                                </label>
                                <input type="file" 
                                       name="site_logo" 
                                       id="site_logo" 
                                       accept="image/png,image/jpeg,image/jpg,image/webp,image/svg+xml"
                                       onchange="previewUploadedLogo(event)"
                                       class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer">
                                <span class="text-[10px] text-slate-500 mt-1.5 block">
                                    Maksimal ukuran file 5 MB. Disarankan menggunakan file PNG transparan (berlatar belakang bening) dengan rasio proporsional persegi (1:1) atau landscape.
                                </span>
                            </div>

                            <div class="p-3 rounded-xl bg-white/70 border border-slate-200 text-[11px] text-slate-600 space-y-1">
                                <strong class="text-slate-800 font-bold block">Di mana logo ini akan tampil?</strong>
                                <ul class="list-disc list-inside space-y-0.5 text-slate-500">
                                    <li>Navbar bagian atas di seluruh halaman (Landing Page & Tentang Kami)</li>
                                    <li>Halaman Tentang Kami (About Us) pada narasi brand</li>
                                    <li>Footer resmi di bagian bawah website</li>
                                    <li>Sidebar navigasi panel pengelola admin</li>
                                    <li>Halaman form login admin</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Hero Background Image Upload -->
                <div class="p-5 rounded-2xl bg-amber-50/50 border border-amber-200/80 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                        <h4 class="text-xs font-bold text-amber-800 uppercase tracking-wider">Foto Background Hero (Halaman Depan)</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-5 items-center">
                        <!-- Preview Hero Saat Ini -->
                        <div class="sm:col-span-5 flex flex-col items-center justify-center p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-sm text-center">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2 block">Background Aktif Saat Ini</span>
                            
                            <div class="w-full h-36 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden relative shadow-inner">
                                <img id="hero-preview" 
                                     src="{{ !empty($settings['hero_image']) ? asset('storage/' . $settings['hero_image']) : asset('images/bg_brentsville_wide.jpg') }}" 
                                     alt="Preview Background Hero" 
                                     class="w-full h-full object-cover">
                            </div>

                            @if(!empty($settings['hero_image']))
                                <div class="mt-3">
                                    <label class="inline-flex items-center gap-1.5 text-xs text-rose-600 hover:text-rose-700 cursor-pointer">
                                        <input type="checkbox" name="remove_hero_image" value="1" class="rounded border-slate-300 text-rose-600 focus:ring-0">
                                        <span>Gunakan Foto Default Gedung</span>
                                    </label>
                                </div>
                            @endif
                        </div>

                        <!-- Upload Input & Petunjuk -->
                        <div class="sm:col-span-7 space-y-3">
                            <div>
                                <label for="hero_image" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    Upload Foto Background Hero Baru (JPG / PNG / WEBP)
                                </label>
                                <input type="file" 
                                       name="hero_image" 
                                       id="hero_image" 
                                       accept="image/jpeg,image/png,image/jpg,image/webp" 
                                       onchange="previewUploadedHero(event)" 
                                       class="w-full px-3.5 py-2.5 rounded-xl glass-input text-xs file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-600 file:text-white hover:file:bg-amber-700 file:cursor-pointer">
                                <span class="text-[10px] text-slate-500 mt-1.5 block">
                                    Maksimal ukuran file 8 MB. Disarankan foto lanskap horizontal beresolusi tinggi (contoh: 1920x1080 atau 2560x1440) agar tampilan tajam di layar desktop & HP.
                                </span>
                            </div>

                            <div class="p-3 rounded-xl bg-white/70 border border-slate-200 text-[11px] text-slate-600 space-y-1">
                                <strong class="text-slate-800 font-bold block">Di mana gambar ini akan tampil?</strong>
                                <p class="text-slate-500">
                                    Foto ini menjadi latar belakang utama (*hero background*) di bagian paling atas Halaman Depan (Landing Page) di belakang widget pencarian dan kartu favorit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: WhatsApp Configuration -->
                <div class="p-5 rounded-2xl bg-emerald-50/70 border border-emerald-200/80 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                        <h4 class="text-xs font-bold text-emerald-800 uppercase tracking-wider">Integrasi WhatsApp Click-to-Chat</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="whatsapp_number" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor WhatsApp Admin (Kode Negara) *</label>
                            <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number']) }}" required placeholder="6281234567890" class="w-full px-4 py-3 rounded-xl glass-input text-sm font-mono font-bold text-emerald-700">
                            <span class="text-[10px] text-slate-500 mt-1 block">Gunakan angka diawali kode negara 62 (contoh: 6281234567890 tanpa tanda + atau spasi).</span>
                        </div>

                        <div>
                            <label for="contact_phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Tampilan No. Telepon di Footer</label>
                            <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" placeholder="+62 812-3456-7890" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="whatsapp_template" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Template Pesan Otomatis WhatsApp</label>
                        <textarea name="whatsapp_template" id="whatsapp_template" rows="4" class="w-full px-4 py-3 rounded-xl glass-input text-sm font-mono text-xs">{{ old('whatsapp_template', $settings['whatsapp_template']) }}</textarea>
                        <p class="text-[10px] text-slate-500 mt-1">Variabel otomatis: <code>{apartment}</code>, <code>{unit_name}</code>, <code>{room_type}</code>, <code>{price}</code>, <code>{period}</code>.</p>
                    </div>
                </div>

                <!-- Section: Promo Banner & Company Legal -->
                <div class="space-y-4">
                    <div>
                        <label for="promo_banner_text" class="block text-xs font-bold text-blue-700 uppercase tracking-wider mb-1.5">Teks Banner Promo Berjalan</label>
                        <textarea name="promo_banner_text" id="promo_banner_text" rows="2" placeholder="Tuliskan pengumuman diskon spesial yang tampil di bagian atas web..." class="w-full px-4 py-3 rounded-xl glass-input text-sm">{{ old('promo_banner_text', $settings['promo_banner_text']) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="company_legal_name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Legalitas Perusahaan</label>
                            <input type="text" name="company_legal_name" id="company_legal_name" value="{{ old('company_legal_name', $settings['company_legal_name']) }}" required class="w-full px-4 py-3 rounded-xl glass-input text-sm font-bold text-slate-800">
                            <span class="text-[10px] text-slate-500 mt-1 block">Tampil di badge legalitas resmi dan footer.</span>
                        </div>

                        <div>
                            <label for="office_hours" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jam Operasional Layanan</label>
                            <input type="text" name="office_hours" id="office_hours" value="{{ old('office_hours', $settings['office_hours']) }}" class="w-full px-4 py-3 rounded-xl glass-input text-sm">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-200">
                    <button type="submit" class="w-full sm:w-auto px-7 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs tracking-wider shadow-md shadow-blue-500/25 transition text-center">
                        SIMPAN SEMUA PENGATURAN
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function previewUploadedLogo(event) {
        const file = event.target.files[0];
        if (file) {
            const previewImg = document.getElementById('logo-preview');
            const placeholder = document.getElementById('logo-default-placeholder');
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                if (placeholder) {
                    placeholder.classList.add('hidden');
                }
            }
            reader.readAsDataURL(file);
        }
    }

    function previewUploadedHero(event) {
        const file = event.target.files[0];
        if (file) {
            const previewImg = document.getElementById('hero-preview');
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
