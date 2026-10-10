<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aboutSettings = [
            'about_tagline' => 'Your Comfort, Our Priority',
            'about_hero_title' => 'VIDALIDAY — Partner Terpercaya untuk Menginap Nyaman di Makassar.',
            'about_intro_p1' => 'VIDALIDAY merupakan brand di bawah naungan PT PERDANA MEGA TRANS, perusahaan yang memiliki legalitas usaha sebagai bagian dari komitmen kami dalam menghadirkan layanan pemesanan apartemen yang profesional, terpercaya, dan mengutamakan kenyamanan pelanggan.',
            'about_intro_p2' => 'Kami menyediakan pilihan unit apartemen di Delft CPI dan Vida View Makassar dengan fasilitas lengkap, harga kompetitif, serta berbagai promo menarik untuk memenuhi kebutuhan menginap Anda, baik untuk liburan, perjalanan bisnis, staycation, maupun kebutuhan hunian sementara.',
            'about_intro_p3' => 'Setiap unit kami dipersiapkan dengan mengutamakan kebersihan, kenyamanan, dan kelengkapan fasilitas agar Anda dapat menikmati pengalaman menginap yang menyenangkan, layaknya berada di rumah sendiri.',
            'about_commit_title' => 'KOMITMEN KAMI',
            'about_commit_text' => 'Kepuasan dan kepercayaan pelanggan adalah prioritas VIDALIDAY. Kami berkomitmen untuk memberikan pelayanan yang ramah, proses pemesanan yang jelas, serta pengalaman menginap yang aman, nyaman, dan berkesan.',
            'about_closing_quote' => 'VIDALIDAY — Menginap Nyaman, Harga Bersahabat, Pilihan Terpercaya.',
            'about_closing_cta' => 'Temukan unit favorit Anda dan nikmati pengalaman menginap yang lebih menyenangkan bersama VIDALIDAY!',
            'about_reasons' => json_encode([
                [
                    'title' => 'Terpercaya & Berlegalitas',
                    'desc' => 'Brand di bawah naungan PT PERDANA MEGA TRANS.',
                    'icon' => 'shield',
                ],
                [
                    'title' => 'Unit Bersih & Nyaman',
                    'desc' => 'Kebersihan dan kenyamanan menjadi prioritas kami.',
                    'icon' => 'sparkles',
                ],
                [
                    'title' => 'Fasilitas Lengkap',
                    'desc' => 'Nikmati fasilitas penunjang untuk pengalaman menginap yang lebih praktis.',
                    'icon' => 'home',
                ],
                [
                    'title' => 'Harga Kompetitif & Promo Menarik',
                    'desc' => 'Pilihan harga yang sesuai dengan kebutuhan dan anggaran Anda.',
                    'icon' => 'tag',
                ],
                [
                    'title' => 'Privasi & Keamanan',
                    'desc' => 'Kami mengutamakan privasi tamu dan kenyamanan selama menginap.',
                    'icon' => 'lock',
                ],
                [
                    'title' => 'Pemesanan Mudah',
                    'desc' => 'Hubungi admin kami melalui WhatsApp untuk mendapatkan informasi unit, harga, dan ketersediaan kamar.',
                    'icon' => 'chat',
                ],
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        ];

        foreach ($aboutSettings as $key => $val) {
            \App\Models\Setting::set($key, $val);
        }
    }
}
