# VIDALIDAY — Platform Sewa Apartemen Harian, Mingguan & Bulanan Makassar

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="120" alt="Laravel Logo">
</p>

<p align="center">
  <strong>Your Comfort, Our Priority</strong><br>
  Partner Terpercaya untuk Menginap Nyaman di Makassar.<br>
  Brand resmi di bawah naungan <strong>PT PERDANA MEGA TRANS</strong>.
</p>

---

## 📌 Tentang Proyek

**VIDALIDAY** adalah platform digital berbasis web untuk katalog dan reservasi sewa unit apartemen di Makassar (khususnya **Delft CPI** dan **Vida View Makassar**). Platform ini dirancang untuk mempermudah calon tamu menemukan hunian yang bersih, nyaman, dan terjangkau untuk kebutuhan liburan, perjalanan bisnis, *staycation*, maupun hunian sementara.

Aplikasi ini dilengkapi dengan **Admin Content Management System (CMS)** lengkap yang memungkinkan tim pengelola memperbarui informasi kamar, harga coret/promo, fasilitas gedung, tanya jawab (FAQ), halaman tentang kami (*About Us*), hingga logo dan branding secara mandiri tanpa perlu mengubah kode sumber.

---

## ✨ Fitur Utama

### 1. Sisi Publik (Guest Facing)
- **Desain Modern *Luxury Glassmorphism*:** Antarmuka elegan bertema *frosted glass* putih bersih dengan aksen biru laut yang estetik, ringan, dan responsif di smartphone maupun desktop.
- **Kredibilitas Resmi & Legalitas:** Menampilkan keabsahan hukum di bawah naungan **PT PERDANA MEGA TRANS** untuk membangun rasa aman dan kepercayaan pelanggan.
- **Switcher & Filter Lokasi:** Pilihan cepat antara dua lokasi apartemen unggulan:
  - **Delft CPI Makassar** (Pemandangan laut & ikonik Pantai Losari).
  - **Vida View Makassar** (Pusat bisnis & perbelanjaan Panakkukang).
- **Katalog Kamar Dinamis & Filter Cerdas:**
  - Tampilan awal 3 unit kamar terbaik dengan opsi *Load More* (*Tampilkan Lebih Banyak*).
  - Filter pengurutan instan: **Terbaru**, **Termurah**, dan **Termahal**.
  - Pilihan tipe kamar & periode tarif fleksibel (Harian, Mingguan, Bulanan).
  - Informasi fasilitas kamar, kapasitas tamu, harga coret, serta badge diskon aktif.
- **Direct WhatsApp Booking Engine:** Tombol pemesanan yang otomatis membuka WhatsApp Admin dengan pesan *pre-filled* berisi detail unit yang dipilih.
- **Showcase Fasilitas Gedung:** Galeri fasilitas apartemen (kolam renang infinity, fitness center, area santai, kartu akses keamanan 24 jam).
- **Landmark & Jarak Populer:** Informasi estimasi jarak dan waktu tempuh ke lokasi strategis di Makassar (Pantai Losari, CPI, Mall Panakkukang, Bandara Sultan Hasanuddin, RS Siloam, dll.).
- **FAQ Interaktif:** Tanya jawab umum dengan accordion interaktif yang mudah dibaca tamu.
- **Halaman About Us Dinamis (`/about`):** Mengulas profil VIDALIDAY, komitmen kenyamanan, legalitas, serta poin keunggulan layanan.
- **Floating WhatsApp Button:** Tombol reservasi melayang di pojok layar untuk konversi instan di perangkat seluler.

### 2. Panel Admin (CMS / Admin Dashboard)
- **Autentikasi Aman:** Sistem login admin terproteksi (`/admin/login`) dengan session guard Laravel.
- **Manajemen Kamar & Unit:** Tambah, edit, dan hapus unit apartemen, upload foto interior, pengaturan harga normal, harga promo, badge diskon, tipe kamar kustom, dan periode tarif kustom.
- **Manajemen Fasilitas:** Kelola fasilitas gedung untuk tiap lokasi lengkap dengan ikon dan foto pendukung.
- **Manajemen FAQ Dinamis:** Tambah, ubah, atau hapus pertanyaan dan jawaban seputar sewa apartemen.
- **Manajemen Landmark & Lokasi Strategis:** Kelola destinasi terdekat beserta estimasi jarak tempuh.
- **Manajemen Halaman About Us:** Ubah judul, sub-judul, narasi cerita perusahaan, daftar poin keunggulan, serta foto profil About Us secara real-time.
- **Pengaturan Umum & Logo Situs:**
  - Ganti logo website (Landing Page & About) dengan upload file gambar langsung ke storage persisten.
  - Atur nomor WhatsApp admin reservasi dan format salam pesan.
  - Ubah pengumuman teks berjalan (*running announcement banner*) di bagian atas website.

---

## 🛠️ Arsitektur & Teknologi

| Komponen | Teknologi |
|---|---|
| **Framework Backend** | [Laravel 11.x](https://laravel.com) (PHP 8.2+) |
| **Database** | MySQL / MariaDB |
| **Frontend Styling** | [Tailwind CSS](https://tailwindcss.com) (White Frosted Glass Theme) |
| **Interaktivitas UI** | Vanilla JavaScript murni (ringan & cepat tanpa overhead framework berat) |
| **Storage Asset** | Laravel Public Storage Driver (`storage/app/public`) |
| **Template Engine** | Laravel Blade Engine |

---

## 🚀 Panduan Instalasi & Menjalankan Proyek

### 1. Kebutuhan Sistem
- PHP >= 8.2 (dengan ekstensi `pdo_mysql`, `mbstring`, `fileinfo`, `gd`/`imagick`)
- Composer >= 2.x
- Node.js & NPM (opsional untuk *build assets*)
- Database MySQL / Laragon

### 2. Langkah Instalasi

1. **Clone repositori:**
   ```bash
   git clone https://github.com/ZulhamAbidin/vida.git
   cd vida
   ```

2. **Install dependensi Composer:**
   ```bash
   composer install
   ```

3. **Salin file environment:**
   ```bash
   cp .env.example .env
   ```

4. **Konfigurasi Database di file `.env`:**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=vida
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Jalankan Migrasi & Seeder Database:**
   ```bash
   php artisan migrate --seed
   ```

7. **Buat Symlink Storage (Penting untuk upload foto & logo):**
   ```bash
   php artisan storage:link
   ```

8. **Build Aset Frontend (Jika diperlukan compile Tailwind):**
   ```bash
   npm install
   npm run build
   ```

9. **Jalankan Server Lokal:**
   ```bash
   php artisan serve
   ```
   Akses website melalui browser di `http://127.0.0.1:8000`.

---

## 🔐 Akun Akses Default Admin

- **URL Login Admin:** `http://127.0.0.1:8000/admin/login`
- **Email:** `admin@vidaliday.com`
- **Password:** `admin123` *(Segera perbarui password setelah setup produksi)*

---

## 📁 Struktur Direktori Utama

```
vida/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php          # Logika katalog utama, filter kamar, FAQ
│   │   ├── AboutController.php         # Tampilan halaman About Us publik
│   │   └── Admin/                      # Seluruh Controller CMS Admin (Unit, Faq, Setting, About, dll)
│   └── Models/                         # Eloquent Model: Unit, Location, Facility, Faq, Landmark, Setting
├── database/
│   ├── migrations/                     # Skema tabel database
│   └── seeders/                        # Data awal unit, fasilitas, FAQ, landmark, dan about
├── resources/
│   ├── css/ & js/                      # Asset script & Tailwind styling
│   └── views/
│       ├── layouts/app.blade.php       # Layout publik (Navbar, Footer, Modal)
│       ├── home.blade.php              # Halaman beranda (Hero, Katalog, Fasilitas, FAQ)
│       ├── about.blade.php             # Halaman About Us
│       ├── partials/unit-card.blade.php# Kartu unit kamar interaktif
│       └── admin/                      # Template Blade panel CMS
├── routes/
│   └── web.php                         # Definisi rute publik dan admin
└── storage/app/public/                 # Penyimpanan upload gambar unit, fasilitas, logo, dll.
```

---

## 📄 Lisensi & Hak Cipta

Proyek ini dikembangkan khusus untuk **VIDALIDAY** di bawah naungan **PT PERDANA MEGA TRANS**. Seluruh hak cipta dilindungi.
