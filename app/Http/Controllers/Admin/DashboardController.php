<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Unit;
use App\Models\Facility;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUnits = Unit::count();
        $availableUnits = Unit::where('is_available', true)->count();
        $totalFacilities = Facility::count();
        $locations = Location::withCount(['units', 'facilities'])->get();
        $whatsappNumber = Setting::get('whatsapp_number', '-');
        $companyName = Setting::get('company_legal_name', 'PT PERDANA MEGA TRANS');
        $featuredUnit = Unit::with('location')->where('is_featured', true)->first();

        return view('admin.dashboard', compact(
            'totalUnits',
            'availableUnits',
            'totalFacilities',
            'locations',
            'whatsappNumber',
            'companyName',
            'featuredUnit'
        ));
    }
}
