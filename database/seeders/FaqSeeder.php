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
                'answer' => 'Standar check-in mulai pukul 14.00 WITA dan check-out maksimal pukul 12.00 WITA. Anda dapat berkonsultasi jika memerlukan waktu khusus kepada admin terlebih dahulu.',
                'badge' => '14.00 / 12.00 WITA',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah bisa sewa harian, mingguan, atau bulanan?',
                'answer' => 'Tentu saja! Kami melayani sewa harian (mulai 1 malam), mingguan, dan bulanan dengan tarif khusus yang lebih hemat untuk sewa durasi panjang.',
                'badge' => 'Fleksibel',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Bagaimana metode pemesanan dan pembayaran?',
                'answer' => 'Pilih kamar yang Anda inginkan, klik "Pesan via WhatsApp". Admin akan segera mengonfirmasi ketersediaan dan memberikan invoice rekening transfer resmi perusahaan.',
                'badge' => 'Transfer Resmi',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah fasilitas kamar sudah lengkap?',
                'answer' => 'Unit full furnished lengkap dengan kasur empuk, AC dingin, Smart TV, WiFi, air panas (water heater), kulkas, handuk, dan sabun/shampoo.',
                'badge' => 'Full Furnished',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            \App\Models\Faq::firstOrCreate(['question' => $faq['question']], $faq);
        }
    }
}
