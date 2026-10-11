# 📖 BUKU PANDUAN PENGGUNAAN PRODUK (USER & ADMIN MANUAL)
## SISTEM KATALOG & CMS VIDALIDAY MAKASSAR
**PT PERDANA MEGA TRANS — Official Apartment Rental System**

---

## 📑 DAFTAR ISI
1. [Tentang Produk & Arsitektur Sistem](#1-tentang-produk--arsitektur-sistem)
2. [Akses Sistem & Kredensial Login](#2-akses-sistem--kredensial-login)
3. [Panduan Halaman Publik (Pengalaman Tamu)](#3-panduan-halaman-publik-pengalaman-tamu)
4. [Panduan Operasional Panel Admin CMS](#4-panduan-operasional-panel-admin-cms)
   - 4.1. [Dashboard & Quick Promo Update](#41-dashboard--quick-promo-update)
   - 4.2. [Kelola Kamar & Upload Foto Unit](#42-kelola-kamar--upload-foto-unit)
   - 4.3. [Kelola Fasilitas Gedung](#43-kelola-fasilitas-gedung)
   - 4.4. [Kelola Akses & Landmark Sekitar](#44-kelola-akses--landmark-sekitar)
   - 4.5. [Kelola Tanya Jawab (FAQ)](#45-kelola-tanya-jawab-faq)
   - 4.6. [Kelola Halaman Tentang Kami (About Us)](#46-kelola-halaman-tentang-kami-about-us)
   - 4.7. [Pengaturan Logo, WhatsApp & Banner Promo](#47-pengaturan-logo-whatsapp--banner-promo)
5. [Alur Pemesanan via WhatsApp (Booking Flow)](#5-alur-pemesanan-via-whatsapp-booking-flow)
6. [Panduan Teknis, Maintenance & Troubleshooting](#6-panduan-teknis-maintenance--troubleshooting)

---

## 1. TENTANG PRODUK & ARSITEKTUR SISTEM

**VIDALIDAY** adalah platform katalog digital dan sistem manajemen konten (*Content Management System / CMS*) berbasis web untuk reservasi sewa apartemen harian, mingguan, dan bulanan di Kota Makassar, yang menaungi dua properti prestisius:
1. **Apartemen Delft CPI** (Kawasan reklamasi *waterfront*, sunset Pantai Losari & Masjid 99 Kubah).
2. **Apartemen Vida View** (Jantung komersial Panakkukang, dekat Mall Panakkukang).

### Keunggulan Sistem:
- **Desain Modern *Glassmorphism* & Aksen Merah Mewah (*Luxury Red*)**: Tampilan bersih, profesional, elegan, dan ramah pengguna di ponsel maupun laptop.
- **Integrasi *Click-to-Chat* WhatsApp Cerdas**: Setiap unit kamar memiliki tautan WhatsApp otomatis dengan rincian nama unit, tipe kamar, tarif sewa, tanggal check-in/out, dan perkiraan total biaya.
- **Multi-Foto Slider & Video Room Tour**: Tamu dapat menggeser foto (*swipe touch* di HP) dan memutar video room tour YouTube langsung di layar tanpa keluar dari website.
- **CMS Lengkap**: Seluruh konten, harga promo coret, galeri foto, FAQ, jarak landmark, narasi profil, hingga logo brand dapat diperbarui langsung dari dashboard admin tanpa perlu coding.

---

## 2. AKSES SISTEM & KREDENSIAL LOGIN

### URL Akses Lokal (Development):
| Halaman | Alamat URL | Keterangan |
| :--- | :--- | :--- |
| **Halaman Utama (Landing Page)** | `http://127.0.0.1:8000/` | Halaman katalog publik yang dilihat oleh tamu/calon penyewa. |
| **Tentang Kami (About Us)** | `http://127.0.0.1:8000/about` | Profil legalitas PT PERDANA MEGA TRANS & komitmen layanan. |
| **Login Panel Admin** | `http://127.0.0.1:8000/admin/login` | Pintu masuk otentikasi pengelola website. |
| **Dashboard Admin** | `http://127.0.0.1:8000/admin` | Pusat kendali data, promo, dan unit kamar. |

### Akun Login Admin Standar:
- **Email:** `admin@vidaliday.com`
- **Password:** `password`
> 💡 *Catatan Keamanan: Anda dapat mengganti password akun admin sewaktu-waktu melalui database atau seeder.*

---

## 3. PANDUAN HALAMAN PUBLIK (PENGALAMAN TAMU)

Halaman utama dirancang untuk memberikan informasi komprehensif dalam satu halaman mengalir (*single-page catalog*):

1. **Top Info Bar**:
   - Menampilkan identitas resmi pengelola: **PT PERDANA MEGA TRANS**.
   - Tautan langsung menuju Portal Admin bagi staf.
2. **Hero Section & Widget Promo**:
   - Background pemandangan gedung nyata beresolusi tinggi.
   - Kotak sorotan tarif sewa termurah dengan badge jaminan harga terbaik (*Best Rate Guarantee*).
   - Akses cepat menuju WhatsApp admin.
3. **Pilihan Lokasi Apartemen (Tab Delft CPI vs Vida View)**:
   - Tamu dapat mengklik salah satu tab lokasi untuk menyaring unit kamar dan fasilitas yang sesuai dengan lokasi yang dipilih.
4. **Katalog Kamar & Filter Urutan**:
   - **Filter Urutan**: Tamu dapat mengurutkan kamar berdasarkan **Termurah**, **Termahal**, atau **Terbaru**.
   - **Kartu Kamar Multi-Foto**:
     - Geser layar di HP atau klik panah kiri/kanan di laptop untuk melihat foto lain.
     - Badge diskon harga dan tarif normal yang dicoret di bawah harga promo.
     - Chip fasilitas kamar (AC, WiFi, Water Heater, dll).
     - Tombol **Video Tur** (membuka modal video YouTube).
     - Tombol **Pesan via WhatsApp** (membuka kalender pilihan tanggal).
5. **Fasilitas Gedung**:
   - Menampilkan kolam renang, gym, jogging track, keamanan 24 jam dengan foto dan penjelasan fasilitas.
6. **Akses & Landmark Makassar**:
   - Format kartu *Transit & Destination Strip* berpenanda ikon dan chip waktu tempuh ke tempat wisata/bandara/mall terdekat.
7. **Embed Google Maps**:
   - Peta interaktif resmi lokasi apartemen untuk mempermudah navigasi tamu.
8. **Tanya Jawab (FAQ)**:
   - Akordeon interaktif yang menjawab pertanyaan umum seputar deposit, jam check-in, dan metode pembayaran resmi.
9. **Sticky WhatsApp Bar (Mobile)**:
   - Tombol mengambang di bawah layar HP yang memudahkan tamu memesan kapan saja saat menggulir halaman.

---

## 4. PANDUAN OPERASIONAL PANEL ADMIN CMS

Setelah login di `/admin/login`, Anda akan masuk ke layout panel pengelola.
> 💡 **Navigasi Sidebar**: Anda dapat menutup atau membuka sidebar kapan saja dengan mengklik tombol **`[ ≡ ]`** di samping judul halaman, atau mengklik tombol **`✕`** di sudut atas sidebar.

---

### 4.1. Dashboard & Quick Promo Update
- **Statistik Sistem**: Melihat total unit kamar terdaftar, unit yang sedang diskon promo, total fasilitas, dan nomor kontak WhatsApp aktif.
- **Hero Unit Favorit**: Memilih 1 unit unggulan yang akan dipajang paling atas pada kotak promo landing page.
- **Widget Quick Promo (Ubah Promo Cepat)**:
  - Anda dapat mengubah harga promo, harga normal, teks badge (contoh: *Weekend Special 20%*), atau mengaktifkan/menonaktifkan promo hanya dengan sekali klik tanpa membuka halaman edit unit secara penuh.

---

### 4.2. Kelola Kamar & Upload Foto Unit
Menu ini digunakan untuk mengatur inventaris kamar apartemen.
- **Alamat Menu**: `admin/units` -> Klik tombol **`+ Tambah Unit Baru`**.

#### Langkah Menambah / Mengedit Unit:
1. **Pilih Lokasi Apartemen**: Pilih *Apartemen Delft CPI (Pantai)* atau *Apartemen Vida View (Panakkukang)*.
2. **Nama Unit**: Masukkan nama yang menarik (contoh: *Studio Deluxe Sunset Sea View*).
3. **Tipe Kamar**: Pilih *Studio*, *1 Bedroom*, *2 Bedroom*, *3 Bedroom*, atau centang *Gunakan Tipe Kustom*.
4. **Maksimal Tamu**: Jumlah orang yang dapat menginap (contoh: *2* atau *4*).
5. **Periode Sewa**: Pilih *Malam*, *Minggu*, atau *Bulan*.
6. **Harga Sewa Normal**: Masukkan angka tanpa titik/koma (contoh: `500000`).
7. **Harga Promo (Opsional)**: Masukkan harga diskon jika sedang ada promo (contoh: `380000`).
8. **Badge Promo**: Tuliskan label promosi singkat (contoh: `Diskon 24%` atau `Flash Sale`).
9. **Status Promo**: Centang kotak *Aktifkan Harga Promo Ini* jika promo ingin langsung tampil.
10. **Link Video Tur YouTube (Opsional)**: Masukkan link YouTube (contoh: `https://www.youtube.com/watch?v=...` atau link pendek `youtu.be/...`). Sistem akan otomatis mengonversi ke format embed pemutar video.
11. **Upload Foto Utama**: Klik tombol upload untuk memilih foto cover terbaik beresolusi tajam (maks. 5 MB).
12. **Upload Galeri Foto Tambahan**: Anda dapat memilih beberapa foto sekaligus untuk slider multi-foto.
13. **Deskripsi Kamar**: Tuliskan keunggulan unit secara ringkas dan informatif.
14. **Fasilitas Kamar**: Tuliskan nama fasilitas dipisahkan dengan koma:
    `Smart TV, AC Dingin, High-Speed WiFi, Water Heater, Dapur, Kulkas`
15. Klik tombol **`SIMPAN UNIT KAMAR`**.

---

### 4.3. Kelola Fasilitas Gedung
Menu untuk mengunggah fasilitas bersama gedung seperti kolam renang, pusat kebugaran, dan keamanan.
- **Alamat Menu**: `admin/facilities`

#### Langkah Pengisian:
1. **Pilih Lokasi**: Delft CPI atau Vida View.
2. **Nama Fasilitas**: Contoh: *Infinity Swimming Pool Sea View*.
3. **Pilih Ikon**: Sesuaikan dengan jenis fasilitas (*Kolam Renang*, *Gym*, *Taman*, dll).
4. **Foto Fasilitas**: Pilih file foto gedung beresolusi baik.
5. **Deskripsi**: Penjelasan singkat fasilitas untuk tamu.
6. Klik **`TAMBAHKAN FASILITAS`**.

---

### 4.4. Kelola Akses & Landmark Sekitar
Menu untuk menampilkan destinasi wisata, mall, rumah sakit, atau bandara terdekat beserta estimasi waktu tempuh.
- **Alamat Menu**: `admin/landmarks`

#### Langkah Pengisian:
1. **Lokasi**: Pilih properti apartemen yang terkait.
2. **Nama Destinasi / Tempat**: Contoh: *Masjid 99 Kubah Asmaul Husna*.
3. **Estimasi Waktu Tempuh**: Contoh: `1 Menit` atau `25 Menit (Tol)`.
4. **Catatan / Kategori**: Contoh: `Ikon Wisata Religi CPI` atau `Pusat Perbelanjaan & Bioskop`.
5. **Urutan Tampil**: Masukkan angka urutan (1, 2, 3, dst).
6. Klik **`SIMPAN AKSES LANDMARK`**.

---

### 4.5. Kelola Tanya Jawab (FAQ)
Menu untuk mengelola pertanyaan yang sering diajukan calon tamu.
- **Alamat Menu**: `admin/faqs`

#### Langkah Pengisian:
1. **Pertanyaan**: Kalimat tanya (contoh: *Bagaimana ketentuan jam check-in dan check-out?*).
2. **Jawaban**: Jawaban lengkap, ramah, dan profesional.
3. **Label / Kategori Badge**: Label ringkas seperti *Check-in*, *Pembayaran*, atau *Kebersihan*.
4. **Urutan**: Nomor urutan tampil di halaman beranda.
5. Klik **`TAMBAHKAN TANYA JAWAB`**.

---

### 4.6. Kelola Halaman Tentang Kami (About Us)
Menu untuk memperbarui halaman profil resmi brand VIDALIDAY.
- **Alamat Menu**: `admin/about`

#### Bagian yang Dikelola:
- **Header & Tagline**: Slogan singkat (*Your Comfort, Our Priority*) dan Headline utama.
- **Narasi Brand (3 Paragraf)**:
  - Paragraf 1: Penjelasan naungan legalitas hukum **PT PERDANA MEGA TRANS**.
  - Paragraf 2: Gambaran pilihan unit Delft CPI dan Vida View.
  - Paragraf 3: Komitmen kebersihan higienis terstandarisasi.
- **Kartu Mengapa Memilih VIDALIDAY (Keunggulan)**:
  - Anda dapat mengklik **`+ Tambah Poin`** untuk menambahkan poin keunggulan baru atau menghapus poin lama secara dinamis.
- **Komitmen & Pesan Penutup**:
  - Judul komitmen, narasi komitmen, serta kutipan/quote slogan penutup.
- Klik **`SIMPAN PERUBAHAN TENTANG KAMI`**.

---

### 4.7. Pengaturan Logo, WhatsApp & Banner Promo
Pusat pengaturan identitas website dan saluran komunikasi resmi.
- **Alamat Menu**: `admin/settings`

#### Fitur Pengaturan:
1. **Upload Logo Brand Baru**:
   - Upload file PNG transparan (atau JPG/WEBP/SVG). Logo ini otomatis menggantikan logo di seluruh navbar, footer, halaman Tentang Kami, dan panel admin.
   - Jika ingin kembali ke logo standar gedung, cukup centang kotak *Gunakan Logo Default*.
2. **Foto Background Hero (Latar Depan)**:
   - Ganti foto lanskap gedung utama yang tampil di belakang widget pencarian beranda.
3. **Integrasi WhatsApp**:
   - **Nomor WhatsApp Admin**: Wajib menggunakan format angka diawali kode negara `62` tanpa tanda `+` atau spasi (contoh: `6285711696970`).
   - **Tampilan No. Telepon di Footer**: Format tampilan cantik (contoh: `+62 857-1169-6970`).
   - **Template Pesan WhatsApp Otomatis**: Mendukung variabel cerdas `{apartment}`, `{unit_name}`, `{room_type}`, `{price}`, dan `{period}`.
4. **Teks Banner Promo Berjalan**:
   - Kalimat berjalan di atas website untuk menyiarkan diskon hari libur atau pengumuman penting.
5. **Legalitas & Jam Kerja**:
   - Nama legalitas resmi PT dan jam operasional admin yang tampil di footer.
6. Klik **`SIMPAN SEMUA PENGATURAN`**.

---

## 5. ALUR PEMESANAN VIA WHATSAPP (BOOKING FLOW)

Sistem dirancang tanpa kerumitan payment gateway pihak ketiga yang membebankan biaya admin tinggi. Alur pemesanan berlangsung langsung, personal, dan aman:

```
[1. Tamu Memilih Unit] 
         ↓
[2. Klik "Pesan via WhatsApp"]
         ↓
[3. Modal Dialog Pemilihan Tanggal Muncul]
    - Tamu memasukkan Tanggal Check-in
    - Tamu memasukkan Tanggal Check-out
    - Tamu memilih Jumlah Tamu
    - Sistem otomatis menghitung total malam dan estimasi biaya sewa
         ↓
[4. Klik "Lanjutkan ke WhatsApp"]
         ↓
[5. Aplikasi WhatsApp Tamu Terbuka Otomatis]
    - Teks format resmi terisi otomatis:
      "Halo Admin VIDALIDAY, saya ingin memesan unit:
       - Lokasi: Apartemen Delft CPI (Pantai)
       - Unit: Studio Deluxe Sunset Sea View (Studio)
       - Periode: 20/10/2026 s/d 22/10/2026 (2 Malam)
       - Jumlah Tamu: 2 Tamu
       - Estimasi Biaya: Rp760.000
       Mohon konfirmasi ketersediaan unit. Terima kasih!"
         ↓
[6. Admin Membalas & Memproses Transfer Rekening Resmi PT PERDANA MEGA TRANS]
```

---

## 6. PANDUAN TEKNIS, MAINTENANCE & TROUBLESHOOTING

### 6.1. Menjalankan Server Lokal di Windows / Laragon
Gunakan terminal PowerShell di direktori proyek:
```powershell
# Jalankan menggunakan PHP 8.2 Laragon
& "C:\laragon\bin\php\php-8.2.34-Win32-vs16-x64\php.exe" artisan serve --port=8000
```
Aplikasi akan aktif di `http://127.0.0.1:8000`.

### 6.2. Menghapus Cache Setelah Ada Perubahan Data
Jika perubahan di panel admin belum terlihat pada browser:
```powershell
& "C:\laragon\bin\php\php-8.2.34-Win32-vs16-x64\php.exe" artisan view:clear
& "C:\laragon\bin\php\php-8.2.34-Win32-vs16-x64\php.exe" artisan cache:clear
```

### 6.3. Mengompilasi Ulang Asset Frontend (CSS / JS)
Jika Anda mengubah file Tailwind CSS atau JavaScript:
```powershell
npm run build
```

### 6.4. Memeriksa Tautan Folder Gambar (Storage Link)
Pastikan folder `public/storage` terhubung ke `storage/app/public`:
```powershell
& "C:\laragon\bin\php\php-8.2.34-Win32-vs16-x64\php.exe" artisan storage:link
```

### 6.5. Menjalankan Uji Coba Otomatis (Automated Test Suite)
Sistem dilengkapi 23 skenario pengujian fitur otomatis (162 assertions):
```powershell
& "C:\laragon\bin\php\php-8.2.34-Win32-vs16-x64\php.exe" artisan test
```

### 6.6. Tips Format & Ukuran Gambar
- **Logo Brand**: Disarankan format PNG transparan dengan resolusi minimal 500x500 piksel.
- **Foto Unit & Fasilitas**: Disarankan foto lanskap horizontal (rasio 4:3 atau 16:9) dengan resolusi 1280x853 hingga 1920x1080 piksel (ukuran file di bawah 3 MB per foto agar waktu muat cepat di ponsel).

---

*Dokumen ini diterbitkan sebagai panduan resmi operasional produk sistem CMS VIDALIDAY.*  
*Hak Cipta © 2026 PT PERDANA MEGA TRANS. Seluruh Hak Cipta Dilindungi.*
