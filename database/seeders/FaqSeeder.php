<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Bagaimana jam check-in dan check-out?',
                'answer' => 'Standar check-in mulai pukul 14.00 WITA dan check-out maksimal pukul 12.00 WITA. Apabila Anda memerlukan early check-in atau late check-out, silakan konfirmasi terlebih dahulu kepada admin kami (tergantung ketersediaan unit).',
                'badge' => '14.00 / 12.00 WITA',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah bisa sewa harian, mingguan, atau bulanan?',
                'answer' => 'Tentu saja! Kami melayani fleksibilitas durasi mulai sewa harian (minimal 1 malam), paket mingguan hemat, hingga bulanan dengan harga spesial yang jauh lebih ekonomis.',
                'badge' => 'Durasi Fleksibel',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Bagaimana prosedur pemesanan dan metode pembayaran?',
                'answer' => 'Cukup pilih unit yang diinginkan lalu klik tombol "Pesan via WhatsApp". Admin kami akan segera mengonfirmasi ketersediaan kamar, mengirimkan detail invoice resmi, serta nomor rekening bank perusahaan resmi demi keamanan transaksi 100%.',
                'badge' => 'Transfer Resmi PT',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Fasilitas apa saja yang sudah disediakan di dalam unit kamar?',
                'answer' => 'Seluruh unit berstatus Fully Furnished standar hotel: kasur berkualitas (King/Queen), AC dingin, Smart TV (Netflix/YouTube ready), High-Speed WiFi, water heater (air panas), kulkas, dispenser/teko listrik, serta perlengkapan mandi bersih (handuk & sabun).',
                'badge' => 'Full Furnished',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah fasilitas gedung apartemen (Kolam Renang & Gym) dapat digunakan gratis?',
                'answer' => 'Ya, seluruh tamu yang menyewa unit di VIDALIDAY mendapatkan akses kartu untuk menikmati fasilitas gedung seperti Kolam Renang (Infinity Pool di Delft CPI atau Tropical Pool di Vida View) serta pusat kebugaran (Gym) secara gratis selama masa menginap.',
                'badge' => 'Akses Gratis',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah diperbolehkan memasak di dalam unit?',
                'answer' => 'Sebagian besar unit tipe 1 Bedroom dan 2 Bedroom telah dilengkapi fasilitas kitchen set, kompor listrik/gas portabel, wastafel cuci piring, dan peralatan makan dasar. Untuk unit tipe Studio, disediakan microwave/kettle listrik untuk kebutuhan ringan.',
                'badge' => 'Kitchen Set',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'Bagaimana sistem keamanan dan privasi tamu?',
                'answer' => 'Keamanan dan privasi Anda terjamin 24 jam dengan sistem access card khusus lift dan koridor lantai, pengawasan pos sekuriti gerbang, CCTV 24 jam di area publik, serta pendampingan langsung oleh tim representatif VIDALIDAY saat penyerahan kunci di lobby.',
                'badge' => 'Aman 24 Jam',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah tersedia area parkir kendaraan untuk tamu?',
                'answer' => 'Tersedia gedung parkir bertingkat yang luas dan aman untuk kendaraan roda empat (mobil) maupun roda dua (motor) dengan sistem tiket/kartu parkir gedung apartemen resmi.',
                'badge' => 'Parkir Luas',
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            \App\Models\Faq::updateOrCreate(
                ['question' => $faq['question']],
                $faq
            );
        }
    }
}
