<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Unit;
use App\Support\StorageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $locations = Location::all();
        $query = Unit::with('location');

        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }

        $units = $query->orderBy('location_id')->orderBy('promo_price')->get();

        return view('admin.units.index', compact('units', 'locations'));
    }

    public function create()
    {
        $locations = Location::all();
        
        $defaultRoomTypes = ['Studio', '1 Bedroom', '2 Bedroom', 'Penthouse', 'Family Suite', 'VIP Suite'];
        $dbRoomTypes = Unit::pluck('room_type')->filter()->unique()->toArray();
        $roomTypes = array_values(array_unique(array_merge($defaultRoomTypes, $dbRoomTypes)));

        $defaultRentalPeriods = ['Malam', 'Minggu', 'Bulan', 'Tahun'];
        $dbRentalPeriods = Unit::pluck('rental_period')->filter()->unique()->toArray();
        $rentalPeriods = array_values(array_unique(array_merge($defaultRentalPeriods, $dbRentalPeriods)));

        return view('admin.units.create', compact('locations', 'roomTypes', 'rentalPeriods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
            'room_type' => 'required|string|max:100',
            'max_guests' => 'required|integer|min:1',
            'normal_price' => 'required|numeric|min:0',
            'promo_price' => 'required|numeric|min:0',
            'promo_badge' => 'nullable|string|max:100',
            'rental_period' => 'required|string|max:50',
            'description' => 'nullable|string',
            'facilities_input' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,heic,heif,webp|max:5120',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'file|mimes:jpeg,jpg,png,heic,heif,webp|max:5120',
        ], [
            'image.max' => 'Ukuran file foto utama maksimal 5MB.',
            'image.mimes' => 'Format file foto utama harus JPG, JPEG, PNG, WEBP, atau HEIC.',
            'gallery_images.*.max' => 'Ukuran setiap foto galeri maksimal 5MB.',
            'gallery_images.*.mimes' => 'Format file foto galeri harus JPG, JPEG, PNG, WEBP, atau HEIC.',
        ]);

        $facilities = [];
        if ($request->filled('facilities_input')) {
            $facilities = array_values(array_filter(array_map('trim', explode(',', $request->facilities_input))));
        }

        $imagePath = 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=800&q=80';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('units', 'public');
        }

        $galleryPaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $galleryPaths[] = $file->store('units', 'public');
            }
        }

        $slug = Str::slug($request->name . '-' . rand(100, 999));

        Unit::create([
            'location_id' => $validated['location_id'],
            'name' => $validated['name'],
            'slug' => $slug,
            'room_type' => $validated['room_type'],
            'max_guests' => $validated['max_guests'],
            'normal_price' => $validated['normal_price'],
            'promo_price' => $validated['promo_price'],
            'promo_badge' => $validated['promo_badge'],
            'is_promo_active' => $request->has('is_promo_active'),
            'rental_period' => $validated['rental_period'],
            'description' => $validated['description'],
            'facilities_list' => $facilities,
            'main_image' => $imagePath,
            'gallery_images' => $galleryPaths,
            'is_featured' => $request->has('is_featured'),
            'is_available' => $request->has('is_available') ? $request->boolean('is_available') : true,
        ]);

        return redirect()->route('admin.units.index')->with('success', 'Unit kamar dan foto-foto galeri berhasil ditambahkan!');
    }

    public function edit(Unit $unit)
    {
        $locations = Location::all();

        $defaultRoomTypes = ['Studio', '1 Bedroom', '2 Bedroom', 'Penthouse', 'Family Suite', 'VIP Suite'];
        $dbRoomTypes = Unit::pluck('room_type')->filter()->unique()->toArray();
        $roomTypes = array_values(array_unique(array_merge($defaultRoomTypes, $dbRoomTypes, [$unit->room_type])));

        $defaultRentalPeriods = ['Malam', 'Minggu', 'Bulan', 'Tahun'];
        $dbRentalPeriods = Unit::pluck('rental_period')->filter()->unique()->toArray();
        $rentalPeriods = array_values(array_unique(array_merge($defaultRentalPeriods, $dbRentalPeriods, [$unit->rental_period])));

        return view('admin.units.edit', compact('unit', 'locations', 'roomTypes', 'rentalPeriods'));
    }

    public function update(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
            'room_type' => 'required|string|max:100',
            'max_guests' => 'required|integer|min:1',
            'normal_price' => 'required|numeric|min:0',
            'promo_price' => 'required|numeric|min:0',
            'promo_badge' => 'nullable|string|max:100',
            'rental_period' => 'required|string|max:50',
            'description' => 'nullable|string',
            'facilities_input' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,heic,heif,webp|max:5120',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'file|mimes:jpeg,jpg,png,heic,heif,webp|max:5120',
            'deleted_gallery_images' => 'nullable|array',
            'deleted_gallery_images.*' => 'string',
        ], [
            'image.max' => 'Ukuran file foto utama maksimal 5MB.',
            'image.mimes' => 'Format file foto utama harus JPG, JPEG, PNG, WEBP, atau HEIC.',
            'gallery_images.*.max' => 'Ukuran setiap foto galeri maksimal 5MB.',
            'gallery_images.*.mimes' => 'Format file foto galeri harus JPG, JPEG, PNG, WEBP, atau HEIC.',
        ]);

        $facilities = [];
        if ($request->filled('facilities_input')) {
            $facilities = array_values(array_filter(array_map('trim', explode(',', $request->facilities_input))));
        }

        $imagePath = $unit->main_image;
        if ($request->hasFile('image')) {
            // Delete old uploaded image if it was a stored file
            StorageHelper::delete($unit->main_image);
            $imagePath = $request->file('image')->store('units', 'public');
        }

        // Handle Gallery Images
        $currentGallery = is_array($unit->gallery_images) ? $unit->gallery_images : [];

        // Delete requested gallery images from disk & array
        if ($request->has('deleted_gallery_images')) {
            $deletedList = (array) $request->input('deleted_gallery_images', []);
            foreach ($deletedList as $delPath) {
                StorageHelper::delete($delPath);
            }
            $currentGallery = array_values(array_diff($currentGallery, $deletedList));
        }

        // Add newly uploaded gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $currentGallery[] = $file->store('units', 'public');
            }
        }

        $unit->update([
            'location_id' => $validated['location_id'],
            'name' => $validated['name'],
            'room_type' => $validated['room_type'],
            'max_guests' => $validated['max_guests'],
            'normal_price' => $validated['normal_price'],
            'promo_price' => $validated['promo_price'],
            'promo_badge' => $validated['promo_badge'] ?? null,
            'is_promo_active' => $request->has('is_promo_active'),
            'rental_period' => $validated['rental_period'],
            'description' => $validated['description'] ?? null,
            'facilities_list' => $facilities,
            'main_image' => $imagePath,
            'gallery_images' => $currentGallery,
            'is_featured' => $request->has('is_featured') ? $request->boolean('is_featured') : $unit->is_featured,
            'is_available' => $request->has('is_available') ? $request->boolean('is_available') : true,
        ]);

        return redirect()->route('admin.units.index')->with('success', 'Data unit kamar dan foto-foto galeri berhasil diperbarui!');
    }

    public function destroy(Unit $unit)
    {
        StorageHelper::delete($unit->main_image);
        if (is_array($unit->gallery_images)) {
            StorageHelper::deleteMany($unit->gallery_images);
        }

        $unit->delete();
        return redirect()->route('admin.units.index')->with('success', 'Unit kamar dan foto terkait berhasil dihapus dari sistem & storage.');
    }

    // Quick Update Diskon / Promo dari tabel
    public function quickPromoUpdate(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'normal_price' => 'required|numeric|min:0',
            'promo_price' => 'required|numeric|min:0',
            'promo_badge' => 'nullable|string|max:100',
        ]);

        $unit->update([
            'normal_price' => $validated['normal_price'],
            'promo_price' => $validated['promo_price'],
            'promo_badge' => $validated['promo_badge'],
            'is_promo_active' => $request->has('is_promo_active'),
        ]);

        return back()->with('success', "Diskon unit {$unit->name} berhasil diperbarui!");
    }

    // Toggle Unit Favorit Tamu untuk Hero Section di Halaman Depan
    public function toggleFeatured(Unit $unit)
    {
        $unit->is_featured = !$unit->is_featured;
        $unit->save();

        $status = $unit->is_featured ? 'dijadikan Pilihan Favorit Tamu di Hero Website' : 'dihapus dari Pilihan Favorit Tamu';
        return back()->with('success', "Unit '{$unit->name}' berhasil {$status}!");
    }
}

