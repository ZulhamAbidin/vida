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
                ['name' => 'Masjid 99 Kubah Makassar', 'distance_time' => '1 Menit', 'sort_order' => 1],
                ['name' => 'Pantai Losari & Kuliner Pisang Epe', 'distance_time' => '3 Menit', 'sort_order' => 2],
                ['name' => 'Mall Phinisi Point (PIPO) & Siloam Hospital', 'distance_time' => '4 Menit', 'sort_order' => 3],
                ['name' => 'Mall Ratu Indah (MaRi)', 'distance_time' => '8 Menit', 'sort_order' => 4],
                ['name' => 'Bandara Internasional Sultan Hasanuddin', 'distance_time' => '25 Menit (via Tol)', 'sort_order' => 5],
            ];

            foreach ($delftLandmarks as $item) {
                \App\Models\Landmark::firstOrCreate([
                    'location_id' => $delft->id,
                    'name' => $item['name'],
                ], array_merge($item, ['location_id' => $delft->id, 'is_active' => true]));
            }
        }

        if ($vida) {
            $vidaLandmarks = [
                ['name' => 'Mall Panakkukang (MP)', 'distance_time' => '1 Menit (Jalan Kaki)', 'sort_order' => 1],
                ['name' => 'Pusat Kuliner Topaz Raya & Pengayoman', 'distance_time' => '2 Menit', 'sort_order' => 2],
                ['name' => 'Rumah Sakit Awal Bros / Primaya', 'distance_time' => '5 Menit', 'sort_order' => 3],
                ['name' => 'Pusat Perkantoran & Bank Pettarani', 'distance_time' => '5 Menit', 'sort_order' => 4],
                ['name' => 'Pintu Tol Reformasi', 'distance_time' => '7 Menit', 'sort_order' => 5],
            ];

            foreach ($vidaLandmarks as $item) {
                \App\Models\Landmark::firstOrCreate([
                    'location_id' => $vida->id,
                    'name' => $item['name'],
                ], array_merge($item, ['location_id' => $vida->id, 'is_active' => true]));
            }
        }
    }
}
