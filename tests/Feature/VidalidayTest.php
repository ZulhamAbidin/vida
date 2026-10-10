<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Unit;
use App\Models\Location;
use App\Models\Facility;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class VidalidayTest extends TestCase
{
    public function test_homepage_loads_successfully_with_glassmorphism_content()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('VIDALIDAY');
        $response->assertSee('PT PERDANA MEGA TRANS');
        $response->assertSee('Delft CPI');
        $response->assertSee('Vida View');
        $response->assertSee('Pesan via WhatsApp');
    }

    public function test_admin_login_page_loads()
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Panel Pengelola');
    }

    public function test_admin_dashboard_requires_authentication()
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/admin/login');
    }

    public function test_authenticated_admin_can_access_dashboard()
    {
        $admin = User::first();
        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Ringkasan Sistem VIDALIDAY');
    }


    public function test_admin_can_update_quick_promo()
    {
        $admin = User::first();
        $unit = Unit::first();

        $response = $this->actingAs($admin)->post('/admin/units/' . $unit->id . '/quick-promo', [
            'normal_price' => 600000,
            'promo_price' => 450000,
            'promo_badge' => 'Flash Sale 25%',
            'is_promo_active' => '1',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('units', [
            'id' => $unit->id,
            'promo_price' => 450000,
            'promo_badge' => 'Flash Sale 25%',
        ]);
    }

    public function test_admin_can_upload_image_for_new_unit()
    {
        Storage::fake('public');

        $admin = User::first();
        $location = Location::first();

        $file = UploadedFile::fake()->image('delft-unit.jpg', 800, 600)->size(1024); // 1MB

        $response = $this->actingAs($admin)->post('/admin/units', [
            'location_id' => $location->id,
            'name' => 'Unit Penthouse Laut Test',
            'room_type' => 'Studio',
            'max_guests' => 2,
            'normal_price' => 800000,
            'promo_price' => 599000,
            'promo_badge' => 'Hemat 25%',
            'rental_period' => 'Malam',
            'description' => 'Unit mewah dengan pemandangan pantai langsung.',
            'facilities_input' => 'AC, Smart TV, WiFi, Water Heater',
            'image' => $file,
            'is_promo_active' => '1',
        ]);

        $response->assertRedirect('/admin/units');

        $createdUnit = Unit::where('name', 'Unit Penthouse Laut Test')->first();
        $this->assertNotNull($createdUnit);
        $this->assertStringStartsWith('units/', $createdUnit->main_image);
        Storage::disk('public')->assertExists($createdUnit->main_image);

        // Bersihkan file uji coba
        Storage::disk('public')->delete($createdUnit->main_image);
        $createdUnit->delete();
    }

    public function test_homepage_gracefully_handles_empty_featured_unit()
    {
        // Save current states
        $originalStates = Unit::all()->mapWithKeys(function ($unit) {
            return [$unit->id => ['is_available' => $unit->is_available, 'is_featured' => $unit->is_featured]];
        });

        // Set all units to not featured
        Unit::query()->update(['is_featured' => false]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Admin belum menambahkan unit kamar pilihan favorit atau data sedang diperbarui.');

        // Restore original states
        foreach ($originalStates as $id => $states) {
            Unit::where('id', $id)->update($states);
        }
    }

    public function test_faq_displayed_on_homepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Pertanyaan Seputar Sewa Apartemen');
        $response->assertSee('Bagaimana jam check-in dan check-out?');
    }

    public function test_admin_can_manage_faq()
    {
        $admin = User::first();
        $response = $this->actingAs($admin)->get('/admin/faqs');
        $response->assertStatus(200);
        $response->assertSee('Kelola Tanya Jawab (FAQ)');

        $testQuestion = 'Apakah diperbolehkan membawa hewan peliharaan? (Uji Coba ' . uniqid() . ')';

        // Test create FAQ
        $createResponse = $this->actingAs($admin)->post('/admin/faqs', [
            'question' => $testQuestion,
            'answer' => 'Mohon maaf, demi kenyamanan bersama seluruh penghuni, hewan peliharaan tidak diperkenankan di dalam unit.',
            'badge' => 'Ketentuan',
            'sort_order' => 10,
            'is_active' => '1',
        ]);

        $createResponse->assertSessionHas('success');
        $this->assertDatabaseHas('faqs', [
            'question' => $testQuestion,
            'badge' => 'Ketentuan',
        ]);

        // Clean up test FAQ so it doesn't pollute user database
        \App\Models\Faq::where('question', $testQuestion)->delete();
    }

    public function test_landmarks_displayed_on_homepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Dekat dengan Berbagai Landmark Makassar');
        $response->assertSee('Masjid 99 Kubah');
        $response->assertSee('Mall Panakkukang (MP)');
    }

    public function test_admin_can_manage_landmarks()
    {
        $admin = User::first();
        $location = Location::first();

        $response = $this->actingAs($admin)->get('/admin/landmarks');
        $response->assertStatus(200);
        $response->assertSee('Kelola Akses & Landmark Makassar');

        $testLandmarkName = 'Benteng Rotterdam Test ' . uniqid();

        // Test create landmark
        $createResponse = $this->actingAs($admin)->post('/admin/landmarks', [
            'location_id' => $location->id,
            'name' => $testLandmarkName,
            'distance_time' => '6 Menit',
            'notes' => 'Wisata Bersejarah',
            'sort_order' => 10,
            'is_active' => '1',
        ]);

        $createResponse->assertSessionHas('success');
        $this->assertDatabaseHas('landmarks', [
            'name' => $testLandmarkName,
            'distance_time' => '6 Menit',
            'location_id' => $location->id,
        ]);

        // Clean up test landmark
        \App\Models\Landmark::where('name', $testLandmarkName)->delete();
    }

    public function test_about_page_loads_and_displays_content()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('TENTANG VIDALIDAY');
        $response->assertSee('Your Comfort, Our Priority');
        $response->assertSee('PT PERDANA MEGA TRANS');
        $response->assertSee('MENGAPA MEMILIH VIDALIDAY?');
        $response->assertSee('KOMITMEN KAMI');
        $response->assertSee('Terpercaya & Berlegalitas');
    }

    public function test_admin_can_update_about_content()
    {
        $admin = User::first();
        $response = $this->actingAs($admin)->get('/admin/about');
        $response->assertStatus(200);
        $response->assertSee('Kelola Konten Tentang Kami (About Us)');

        $updateResponse = $this->actingAs($admin)->post('/admin/about', [
            'about_tagline' => 'Your Comfort, Our Priority (Updated)',
            'about_hero_title' => 'VIDALIDAY — Partner Terpercaya Menginap Nyaman',
            'about_intro_p1' => 'Paragraf 1 narasi uji coba VIDALIDAY dan PT PERDANA MEGA TRANS.',
            'about_intro_p2' => 'Paragraf 2 unit Delft CPI dan Vida View.',
            'about_intro_p3' => 'Paragraf 3 kebersihan standar hotel.',
            'about_commit_title' => 'KOMITMEN KAMI TERBAIK',
            'about_commit_text' => 'Kepuasan dan kepercayaan pelanggan adalah segalanya bagi kami.',
            'about_closing_quote' => 'VIDALIDAY — Pilihan Cerdas di Makassar.',
            'about_closing_cta' => 'Pesan sekarang juga!',
            'reasons_title' => ['Fasilitas Bintang Lima', 'Harga Bersahabat'],
            'reasons_desc' => ['Lengkap dengan AC dan WiFi', 'Tarif terjangkau'],
            'reasons_icon' => ['home', 'tag'],
        ]);

        $updateResponse->assertSessionHas('success');
        $this->assertEquals('Your Comfort, Our Priority (Updated)', \App\Models\Setting::get('about_tagline'));
        $this->assertEquals('KOMITMEN KAMI TERBAIK', \App\Models\Setting::get('about_commit_title'));

        // Restore original full dummy data so admin panel reflects the user's exact text
        (new \Database\Seeders\AboutSeeder)->run();
    }

    public function test_admin_can_upload_and_manage_site_logo()
    {
        // Preserve user existing uploaded logo and settings
        $originalSiteLogo = \App\Models\Setting::get('site_logo');
        $originalWa = \App\Models\Setting::get('whatsapp_number', '6285711696970');
        $originalPhone = \App\Models\Setting::get('contact_phone', '+62 857-1169-6970');

        \Illuminate\Support\Facades\Storage::fake('public');

        $admin = User::first();
        $file = UploadedFile::fake()->image('vidaliday-logo.png', 400, 400)->size(500);

        $response = $this->actingAs($admin)->post('/admin/settings', [
            'site_logo' => $file,
            'whatsapp_number' => '6285711696970',
            'company_legal_name' => 'PT PERDANA MEGA TRANS',
            'contact_phone' => '+62 857-1169-6970',
            'contact_email' => 'info@vidaliday.com',
            'office_hours' => 'Setiap Hari: 08.00 - 23.00 WITA',
            'promo_banner_text' => 'Promo sewa apartemen.',
            'whatsapp_template' => 'Pesan WhatsApp otomatis.',
        ]);

        $response->assertSessionHas('success');
        $uploadedLogoPath = \App\Models\Setting::get('site_logo');
        $this->assertNotNull($uploadedLogoPath);
        \Illuminate\Support\Facades\Storage::disk('public')->assertExists($uploadedLogoPath);

        // Test display on homepage & about page
        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee($uploadedLogoPath);

        $aboutResponse = $this->get('/about');
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee($uploadedLogoPath);

        // Test remove logo back to default
        $removeResponse = $this->actingAs($admin)->post('/admin/settings', [
            'remove_logo' => '1',
            'whatsapp_number' => $originalWa,
            'company_legal_name' => 'PT PERDANA MEGA TRANS',
            'contact_phone' => $originalPhone,
            'contact_email' => 'info@vidaliday.com',
            'office_hours' => 'Setiap Hari: 08.00 - 23.00 WITA',
            'promo_banner_text' => 'Promo sewa apartemen.',
            'whatsapp_template' => 'Pesan WhatsApp otomatis.',
        ]);

        $removeResponse->assertSessionHas('success');
        $this->assertNull(\App\Models\Setting::get('site_logo'));

        // Restore user actual logo and phone numbers so test suite does NOT wipe real user settings
        if ($originalSiteLogo) {
            \App\Models\Setting::set('site_logo', $originalSiteLogo);
        }
        \App\Models\Setting::set('whatsapp_number', $originalWa);
        \App\Models\Setting::set('contact_phone', $originalPhone);
    }

    public function test_homepage_has_unit_sorting_and_limiting()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Filter & Urutan Kamar', false);
        $response->assertSee('Termurah (Harga Terendah)');
        $response->assertSee('Termahal (Kamar Eksklusif)');
        $response->assertSee('Terbaru (Baru Ditambahkan)');
        $response->assertSee('unit-card-item');
    }

    public function test_deleting_unit_deletes_its_image_from_storage()
    {
        \Illuminate\Support\Facades\Storage::fake('public');

        $admin = User::first();
        $location = Location::first();
        $file = UploadedFile::fake()->image('test-unit.jpg', 600, 400);
        $testName = 'Unit For Deletion ' . uniqid();

        $createResponse = $this->actingAs($admin)->post('/admin/units', [
            'location_id' => $location->id,
            'name' => $testName,
            'room_type' => 'Studio',
            'max_guests' => 2,
            'normal_price' => 500000,
            'promo_price' => 350000,
            'promo_badge' => 'Hemat',
            'rental_period' => 'Malam',
            'description' => 'Test Unit Description',
            'image' => $file,
        ]);

        $createResponse->assertRedirect('/admin/units');
        $unit = Unit::where('name', $testName)->first();
        $this->assertNotNull($unit);
        $this->assertTrue(\Illuminate\Support\Facades\Storage::disk('public')->exists($unit->main_image));

        $imagePath = $unit->main_image;

        // Delete the unit
        $deleteResponse = $this->actingAs($admin)->delete('/admin/units/' . $unit->id);
        $deleteResponse->assertRedirect('/admin/units');

        $this->assertDatabaseMissing('units', ['id' => $unit->id]);
        $this->assertFalse(\Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath));
    }

    public function test_updating_unit_image_deletes_old_image_from_storage()
    {
        \Illuminate\Support\Facades\Storage::fake('public');

        $admin = User::first();
        $location = Location::first();
        $file1 = UploadedFile::fake()->image('unit-old.jpg', 600, 400);
        $testName = 'Unit For Update ' . uniqid();

        $res = $this->actingAs($admin)->post('/admin/units', [
            'location_id' => $location->id,
            'name' => $testName,
            'room_type' => 'Studio',
            'max_guests' => 2,
            'normal_price' => 500000,
            'promo_price' => 350000,
            'promo_badge' => 'Hemat',
            'rental_period' => 'Malam',
            'description' => 'Unit for test',
            'image' => $file1,
        ]);
        $res->assertSessionHasNoErrors();

        $unit = Unit::where('name', $testName)->first();
        $this->assertNotNull($unit);
        $oldImagePath = $unit->main_image;
        $this->assertTrue(\Illuminate\Support\Facades\Storage::disk('public')->exists($oldImagePath));

        $file2 = UploadedFile::fake()->image('unit-new.jpg', 600, 400);
        $updateRes = $this->actingAs($admin)->put('/admin/units/' . $unit->id, [
            'location_id' => $location->id,
            'name' => $testName,
            'room_type' => 'Studio',
            'max_guests' => 2,
            'normal_price' => 500000,
            'promo_price' => 350000,
            'promo_badge' => 'Hemat',
            'rental_period' => 'Malam',
            'description' => 'Unit for test',
            'image' => $file2,
        ]);
        $updateRes->assertSessionHasNoErrors();

        $unit->refresh();
        $newImagePath = $unit->main_image;
        $this->assertNotEquals($oldImagePath, $newImagePath);
        $this->assertFalse(\Illuminate\Support\Facades\Storage::disk('public')->exists($oldImagePath));
        $this->assertTrue(\Illuminate\Support\Facades\Storage::disk('public')->exists($newImagePath));

        // Clean up
        $unit->delete();
    }

    public function test_deleting_facility_deletes_its_image_from_storage()
    {
        \Illuminate\Support\Facades\Storage::fake('public');

        $admin = User::first();
        $location = Location::first();
        $file = UploadedFile::fake()->image('facility.jpg', 600, 400);
        $testName = 'Kolam Uji Coba ' . uniqid();

        $res = $this->actingAs($admin)->post('/admin/facilities', [
            'location_id' => $location->id,
            'name' => $testName,
            'icon' => 'swimming-pool',
            'description' => 'Fasilitas uji coba',
            'image' => $file,
        ]);
        $res->assertSessionHasNoErrors();

        $facility = Facility::where('name', $testName)->first();
        $this->assertNotNull($facility);
        $imagePath = $facility->image;
        $this->assertNotNull($imagePath);
        $this->assertTrue(\Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath));

        // Delete facility
        $deleteRes = $this->actingAs($admin)->delete('/admin/facilities/' . $facility->id);
        $deleteRes->assertSessionHas('success');
        $this->assertDatabaseMissing('facilities', ['id' => $facility->id]);
        $this->assertFalse(\Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath));
    }

    public function test_unit_multiple_gallery_images_slider_and_deletion()
    {
        \Illuminate\Support\Facades\Storage::fake('public');

        $admin = User::first();
        $location = Location::first();
        $mainImg = UploadedFile::fake()->image('main.jpg', 600, 400);
        $gallery1 = UploadedFile::fake()->image('gallery1.jpg', 600, 400);
        $gallery2 = UploadedFile::fake()->image('gallery2.jpg', 600, 400);
        $testName = 'Unit Slider Test ' . uniqid();

        // 1. Create with gallery
        $res = $this->actingAs($admin)->post('/admin/units', [
            'location_id' => $location->id,
            'name' => $testName,
            'room_type' => '2 Bedroom',
            'max_guests' => 4,
            'normal_price' => 700000,
            'promo_price' => 500000,
            'rental_period' => 'Malam',
            'promo_badge' => 'Promo',
            'description' => 'Test Desc',
            'image' => $mainImg,
            'gallery_images' => [$gallery1, $gallery2],
        ]);
        $res->assertRedirect('/admin/units');

        $unit = Unit::where('name', $testName)->first();
        $this->assertNotNull($unit);
        $this->assertCount(2, $unit->gallery_images);
        $this->assertCount(3, $unit->all_images);

        $g1Path = $unit->gallery_images[0];
        $g2Path = $unit->gallery_images[1];
        $this->assertTrue(\Illuminate\Support\Facades\Storage::disk('public')->exists($g1Path));
        $this->assertTrue(\Illuminate\Support\Facades\Storage::disk('public')->exists($g2Path));

        // 2. Homepage should show slider counter
        $homeRes = $this->get('/');
        $homeRes->assertStatus(200);
        $homeRes->assertSee('1/3');

        // 3. Update: delete 1 gallery photo
        $updateRes = $this->actingAs($admin)->put('/admin/units/' . $unit->id, [
            'location_id' => $location->id,
            'name' => $testName,
            'room_type' => '2 Bedroom',
            'max_guests' => 4,
            'normal_price' => 700000,
            'promo_price' => 500000,
            'rental_period' => 'Malam',
            'deleted_gallery_images' => [$g1Path],
        ]);
        $updateRes->assertSessionHasNoErrors();

        $unit->refresh();
        $this->assertCount(1, $unit->gallery_images);
        $this->assertFalse(\Illuminate\Support\Facades\Storage::disk('public')->exists($g1Path));
        $this->assertTrue(\Illuminate\Support\Facades\Storage::disk('public')->exists($g2Path));

        // 4. Delete unit completely: should delete all remaining images
        $unit->delete();
        $this->assertFalse(\Illuminate\Support\Facades\Storage::disk('public')->exists($g2Path));
        $this->assertFalse(\Illuminate\Support\Facades\Storage::disk('public')->exists($unit->main_image));
    }
}




