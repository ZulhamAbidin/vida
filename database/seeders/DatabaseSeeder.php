<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Location;
use App\Models\Facility;
use App\Models\Unit;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin Users
        User::updateOrCreate(
            ['email' => 'ptperdanamegatrans@gmail.com'],
            [
                'name' => 'PT PERDANA MEGA TRANS',
                'password' => Hash::make('Vidaliday-PMT'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'ptperdanamegatransdev@gmail.com'],
            [
                'name' => 'PT PERDANA MEGA TRANS Dev',
                'password' => Hash::make('Vidaliday-PMT'),
            ]
        );

        // 2. Settings
        $settings = [
            'whatsapp_number' => '6285711696970',
            'whatsapp_template' => "Halo Admin VIDALIDAY, saya ingin memesan/tanya ketersediaan unit:\n- Lokasi: {apartment}\n- Unit: {unit_name} ({room_type})\n- Harga: {price} / {period}\n\nMohon info ketersediaan kamar. Terima kasih!",
            'promo_banner_text' => 'FLASH DEAL VIDALIDAY: Nikmati diskon promo hingga 30% untuk pemesanan hari ini! Sewa harian, mingguan, & bulanan.',
            'company_legal_name' => 'PT PERDANA MEGA TRANS',
            'contact_phone' => '+62 857-1169-6970',
            'contact_email' => 'info@vidaliday.com',
            'office_hours' => 'Setiap Hari: 08.00 - 23.00 WITA',
        ];

        foreach ($settings as $key => $val) {
            Setting::set($key, $val);
        }

        // 3. Location 1: Apartemen Delft CPI
        $delft = Location::updateOrCreate(
            ['slug' => 'delft-cpi'],
            [
                'name' => 'Apartemen Delft CPI',
                'tagline' => 'Luxury Waterfront Living di Center Point of Indonesia',
                'description' => 'Apartemen mewah tepi laut di kawasan paling prestisius di Makassar. Menawarkan pemandangan eksotis Pantai Losari dan Masjid 99 Kubah, infinity pool view laut, serta kenyamanan standar hotel bintang lima.',
                'address' => 'Kawasan Center Point of Indonesia (CPI), Jl. Metro Tanjung Bunga, Makassar, Sulawesi Selatan',
                'gmaps_url' => 'https://maps.google.com/?q=Delft+Apartment+CPI+Makassar',
                'hero_image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=1200&q=80',
            ]
        );

        // Facilities Delft CPI
        $delftFacilities = [
            ['name' => 'Infinity Pool View Laut', 'icon' => 'waves', 'description' => 'Kolam renang spektakuler menghadap langsung ke lautan lepas dan sunset Losari'],
            ['name' => 'Sky Gym & Fitness', 'icon' => 'dumbbell', 'description' => 'Peralatan kebugaran modern lengkap dengan panorama kota Makassar'],
            ['name' => 'Waterfront Promenade', 'icon' => 'sun', 'description' => 'Akses jogging track dan area santai tepi laut Center Point of Indonesia'],
            ['name' => 'Keamanan & CCTV 24 Jam', 'icon' => 'shield-check', 'description' => 'Sistem kartu akses lift pribadi dan penjagaan security 24 jam non-stop'],
            ['name' => 'Lobby Mewah & Lounge', 'icon' => 'coffee', 'description' => 'Area resepsionis elegan dan ruang tunggu nyaman untuk tamu'],
        ];

        foreach ($delftFacilities as $f) {
            Facility::updateOrCreate(
                ['location_id' => $delft->id, 'name' => $f['name']],
                ['icon' => $f['icon'], 'description' => $f['description']]
            );
        }

        // Units Delft CPI
        $delftUnits = [
            [
                'name' => 'Studio Deluxe Sea View',
                'slug' => 'delft-studio-deluxe-sea-view',
                'room_type' => 'Studio',
                'max_guests' => 2,
                'normal_price' => 550000,
                'promo_price' => 399000,
                'promo_badge' => 'Hemat 27% (Best Seller)',
                'is_promo_active' => true,
                'rental_period' => 'Malam',
                'description' => 'Unit studio modern dengan balkon pribadi yang menghadap langsung ke panorama sunset laut CPI. Dilengkapi kasur Queen Size empuk, smart TV, dan dapur mini praktis.',
                'facilities_list' => ['Queen Bed Premium', 'AC Dingin', 'Smart TV 43" Netflix', 'Balkon View Laut', 'Water Heater', 'Kulkas & Dispenser', 'WiFi High Speed', 'Kitchen Set Ringan'],
                'main_image' => 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_available' => true,
            ],
            [
                'name' => '1-Bedroom Executive Ocean',
                'slug' => 'delft-1br-executive-ocean',
                'room_type' => '1 Bedroom',
                'max_guests' => 3,
                'normal_price' => 750000,
                'promo_price' => 549000,
                'promo_badge' => 'Promo Eksklusif',
                'is_promo_active' => true,
                'rental_period' => 'Malam',
                'description' => 'Apartemen 1 kamar tidur luas dengan area living room terpisah, sofa bed, dan dapur lengkap. Sangat cocok untuk perjalanan bisnis maupun liburan romantis.',
                'facilities_list' => ['King Bed', 'Living Room Terpisah', 'Sofa Bed Nyaman', '2 Unit AC', 'Smart TV 50"', 'Dapur & Microwave', 'Kulkas 2 Pintu', 'Water Heater', 'Balkon Luas'],
                'main_image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_available' => true,
            ],
            [
                'name' => '2-Bedroom Grand Family Suite',
                'slug' => 'delft-2br-grand-family-suite',
                'room_type' => '2 Bedroom',
                'max_guests' => 5,
                'normal_price' => 1100000,
                'promo_price' => 849000,
                'promo_badge' => 'Spesial Keluarga',
                'is_promo_active' => true,
                'rental_period' => 'Malam',
                'description' => 'Unit 2 kamar tidur paling lega dengan master bedroom king bed dan second room single/twin. Area makan keluarga, dapur modern, dan view laut 180 derajat.',
                'facilities_list' => ['1 King Bed + 1 Queen Bed', 'Kapasitas 4-5 Orang', 'Meja Makan Keluarga', 'Dapur Memasak Lengkap', 'Mesin Cuci', '3 Unit AC', 'Smart TV 55"', 'Balkon Panoramic Ocean View'],
                'main_image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_available' => true,
            ],
        ];

        foreach ($delftUnits as $u) {
            Unit::updateOrCreate(
                ['slug' => $u['slug']],
                array_merge($u, ['location_id' => $delft->id])
            );
        }

        // 4. Location 2: Apartemen Vida View
        $vida = Location::updateOrCreate(
            ['slug' => 'vida-view'],
            [
                'name' => 'Apartemen Vida View',
                'tagline' => 'The Heart of Makassar Business & Leisure District',
                'description' => 'Apartemen modern di jantung pusat kota Panakkukang Makassar. Bersebelahan dengan Mall Panakkukang dan pusat perkantoran, dengan kolam renang tropis yang luas, gym, dan kemudahan akses ke seluruh penjuru kota.',
                'address' => 'Jl. Topaz Raya, Masale, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan',
                'gmaps_url' => 'https://maps.google.com/?q=Vida+View+Apartment+Makassar',
                'hero_image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80',
            ]
        );

        // Facilities Vida View
        $vidaFacilities = [
            ['name' => 'Kolam Renang Tropis Terbesar', 'icon' => 'waves', 'description' => 'Area kolam renang dewasa dan anak yang teduh dengan pepohonan tropis'],
            ['name' => 'Fitness & Gym Center', 'icon' => 'dumbbell', 'description' => 'Pusat latihan kebugaran indoor dengan instruktur dan peralatan lengkap'],
            ['name' => 'Lobby & Commercial Area', 'icon' => 'store', 'description' => 'Minimarket, laundry, cafe, dan ATM center berada tepat di ground floor'],
            ['name' => 'Keamanan & Access Card', 'icon' => 'shield-check', 'description' => 'Akses kartu terintegrasi untuk lift kamar dan pengawasan pos security 24 jam'],
            ['name' => 'Taman Hijau & Jogging', 'icon' => 'trees', 'description' => 'Area santai terbuka hijau di lantai podium untuk relaksasi sore hari'],
        ];

        foreach ($vidaFacilities as $f) {
            Facility::updateOrCreate(
                ['location_id' => $vida->id, 'name' => $f['name']],
                ['icon' => $f['icon'], 'description' => $f['description']]
            );
        }

        // Units Vida View
        $vidaUnits = [
            [
                'name' => 'Studio Cozy City Skyline',
                'slug' => 'vida-studio-cozy-city-skyline',
                'room_type' => 'Studio',
                'max_guests' => 2,
                'normal_price' => 450000,
                'promo_price' => 329000,
                'promo_badge' => 'Best Value Promo',
                'is_promo_active' => true,
                'rental_period' => 'Malam',
                'description' => 'Studio minimalis yang hangat dan estetik dengan pemandangan lampu kota Panakkukang malam hari. Sangat diminati untuk istirahat nyaman setelah beraktivitas di Makassar.',
                'facilities_list' => ['Queen Bed Nyaman', 'AC Dingin Maksimal', 'Smart TV + Netflix', 'Meja Kerja & Belajar', 'Water Heater', 'Kulkas Mini', 'Free High-Speed WiFi'],
                'main_image' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_available' => true,
            ],
            [
                'name' => '1-Bedroom Modern Suite',
                'slug' => 'vida-1br-modern-suite',
                'room_type' => '1 Bedroom',
                'max_guests' => 3,
                'normal_price' => 650000,
                'promo_price' => 479000,
                'promo_badge' => 'Paling Diminati',
                'is_promo_active' => true,
                'rental_period' => 'Malam',
                'description' => 'Kombinasi privasi kamar tidur utama dan ruang keluarga yang lega. Tersedia meja makan mini, sofa santai, dan dapur lengkap untuk memasak.',
                'facilities_list' => ['King Bed', 'Ruang Santai + Sofa', 'Kitchen Set + Kompor Listrik', 'Kulkas', 'Smart TV 43"', '2 Unit AC', 'Water Heater', 'View Kolam Renang'],
                'main_image' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_available' => true,
            ],
            [
                'name' => '2-Bedroom Deluxe Panakkukang',
                'slug' => 'vida-2br-deluxe-panakkukang',
                'room_type' => '2 Bedroom',
                'max_guests' => 4,
                'normal_price' => 950000,
                'promo_price' => 699000,
                'promo_badge' => 'Hemat Rombongan',
                'is_promo_active' => true,
                'rental_period' => 'Malam',
                'description' => 'Pilihan ideal bagi keluarga atau tim kerja yang butuh tempat tinggal strategis. Dua kamar tidur terpisah, ruang keluarga luas, dan view terbuka.',
                'facilities_list' => ['1 King Bed + 1 Single Bed', 'Sofa Bed', 'Ruang Keluarga Luas', 'Dapur Lengkap', 'Meja Makan', 'Water Heater', '3 Unit AC', 'Smart TV 50"'],
                'main_image' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_available' => true,
            ],
        ];

        foreach ($vidaUnits as $u) {
            Unit::updateOrCreate(
                ['slug' => $u['slug']],
                array_merge($u, ['location_id' => $vida->id])
            );
        }

        $this->call([
            FaqSeeder::class,
            LandmarkSeeder::class,
            AboutSeeder::class,
        ]);
    }
}
