<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $delft = \App\Models\Location::where('slug', 'delft-cpi')->first();
        $vida = \App\Models\Location::where('slug', 'vida-view')->first();

        if ($delft) {
            $delftLandmarks = [
                ['name' => 'Masjid 99 Kubah CPI Makassar', 'distance_time' => '1 Menit (Area CPI)', 'notes' => 'Ikon Religi & Sunset', 'sort_order' => 1],
                ['name' => 'Kawasan Pantai Losari & Kuliner Pisang Epe', 'distance_time' => '3 Menit', 'notes' => 'Pusat Wisata Makassar', 'sort_order' => 2],
                ['name' => 'Phinisi Point Mall (PIPO) & Siloam Hospitals', 'distance_time' => '4 Menit', 'notes' => 'Mall & Layanan Medis', 'sort_order' => 3],
                ['name' => 'Benteng Fort Rotterdam Makassar', 'distance_time' => '6 Menit', 'notes' => 'Wisata Sejarah Bersejarah', 'sort_order' => 4],
                ['name' => 'Mall Ratu Indah (MaRi)', 'distance_time' => '8 Menit', 'notes' => 'Shopping Center', 'sort_order' => 5],
                ['name' => 'Trans Studio Mall (TSM) Makassar', 'distance_time' => '10 Menit', 'notes' => 'Pusat Hiburan & Kuliner', 'sort_order' => 6],
                ['name' => 'Pusat Kuliner Seafood Jl. Somba Opu & Oleh-Oleh', 'distance_time' => '7 Menit', 'notes' => 'Belanja Kerajinan & Kuliner', 'sort_order' => 7],
                ['name' => 'Bandara Internasional Sultan Hasanuddin', 'distance_time' => '25 Menit (via Akses Tol)', 'notes' => 'Akses Bandara Cepat', 'sort_order' => 8],
            ];

            foreach ($delftLandmarks as $item) {
                \App\Models\Landmark::updateOrCreate(
                    ['location_id' => $delft->id, 'name' => $item['name']],
                    array_merge($item, ['location_id' => $delft->id, 'is_active' => true])
                );
            }
        }

        if ($vida) {
            $vidaLandmarks = [
                ['name' => 'Mall Panakkukang (MP) & Transmart', 'distance_time' => '1 Menit (Jalan Kaki)', 'notes' => 'Shopping Mall Terbesar', 'sort_order' => 1],
                ['name' => 'Sentra Kuliner & Cafe Topaz Raya - Pengayoman', 'distance_time' => '2 Menit', 'notes' => 'Restoran & Coffee Shop', 'sort_order' => 2],
                ['name' => 'Rumah Sakit Awal Bros (Primaya) & Hermina', 'distance_time' => '5 Menit', 'notes' => 'Fasilitas Kesehatan Lengkap', 'sort_order' => 3],
                ['name' => 'Koridor Bisnis & Perkantoran AP Pettarani', 'distance_time' => '5 Menit', 'notes' => 'Pusat Perbankan & Kantor', 'sort_order' => 4],
                ['name' => 'Gerbang Tol Layang Reformasi', 'distance_time' => '6 Menit', 'notes' => 'Akses Bebas Hambatan Tol', 'sort_order' => 5],
                ['name' => 'Nipah Mall & Universitas Hasanuddin (Unhas)', 'distance_time' => '10 Menit', 'notes' => 'Green Mall & Kampus', 'sort_order' => 6],
                ['name' => 'Universitas Negeri Makassar (UNM Gunungsari)', 'distance_time' => '10 Menit', 'notes' => 'Kawasan Pendidikan Tinggi', 'sort_order' => 7],
                ['name' => 'Bandara Internasional Sultan Hasanuddin', 'distance_time' => '20 Menit (via Tol Layang)', 'notes' => 'Akses Bandara Langsung', 'sort_order' => 8],
            ];

            foreach ($vidaLandmarks as $item) {
                \App\Models\Landmark::updateOrCreate(
                    ['location_id' => $vida->id, 'name' => $item['name']],
                    array_merge($item, ['location_id' => $vida->id, 'is_active' => true])
                );
            }
        }
    }
}
