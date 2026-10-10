<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Location;
use App\Support\StorageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
    {
        $locations = Location::with('facilities')->get();
        return view('admin.facilities.index', compact('locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,heic,heif,webp|max:5120',
        ], [
            'image.max' => 'Ukuran file gambar maksimal 5MB.',
            'image.mimes' => 'Format file gambar harus JPG, JPEG, PNG, WEBP, atau HEIC.',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('facilities', 'public');
        }

        Facility::create($validated);

        return back()->with('success', 'Fasilitas gedung berhasil ditambahkan!');
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,heic,heif,webp|max:5120',
        ], [
            'image.max' => 'Ukuran file gambar maksimal 5MB.',
            'image.mimes' => 'Format file gambar harus JPG, JPEG, PNG, WEBP, atau HEIC.',
        ]);

        if ($request->hasFile('image')) {
            StorageHelper::delete($facility->image);
            $validated['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($validated);

        return back()->with('success', 'Fasilitas gedung berhasil diperbarui!');
    }

    public function destroy(Facility $facility)
    {
        StorageHelper::delete($facility->image);
        $facility->delete();
        return back()->with('success', 'Fasilitas gedung dan gambar terkait berhasil dihapus dari sistem & storage!');
    }
}
