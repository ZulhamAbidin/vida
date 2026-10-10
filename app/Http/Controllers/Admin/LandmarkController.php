<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Landmark;
use App\Models\Location;
use Illuminate\Http\Request;

class LandmarkController extends Controller
{
    public function index(Request $request)
    {
        $locations = Location::all();
        $selectedLocationId = $request->query('location_id', $locations->first()?->id);

        $landmarks = Landmark::with('location')
            ->when($selectedLocationId, function ($query, $locId) {
                $query->where('location_id', $locId);
            })
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.landmarks.index', compact('landmarks', 'locations', 'selectedLocationId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
            'distance_time' => 'required|string|max:100',
            'notes' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? (Landmark::where('location_id', $request->location_id)->max('sort_order') + 1);

        Landmark::create($validated);

        return redirect()->route('admin.landmarks.index', ['location_id' => $request->location_id])
            ->with('success', 'Landmark & akses baru berhasil ditambahkan!');
    }

    public function update(Request $request, Landmark $landmark)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
            'distance_time' => 'required|string|max:100',
            'notes' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? $landmark->sort_order;

        $landmark->update($validated);

        return redirect()->route('admin.landmarks.index', ['location_id' => $request->location_id])
            ->with('success', 'Data Landmark berhasil diperbarui!');
    }

    public function destroy(Landmark $landmark)
    {
        $locId = $landmark->location_id;
        $landmark->delete();

        return redirect()->route('admin.landmarks.index', ['location_id' => $locId])
            ->with('success', 'Landmark berhasil dihapus.');
    }
}
