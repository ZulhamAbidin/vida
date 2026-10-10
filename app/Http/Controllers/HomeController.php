<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Location;
use App\Models\Setting;
use App\Models\Unit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $locations = Location::with(['facilities', 'landmarks' => function ($query) {
            $query->where('is_active', true)->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
        }, 'units' => function ($query) {
            $query->orderBy('is_featured', 'desc')->orderBy('promo_price', 'asc');
        }])->get();

        $delft = $locations->firstWhere('slug', 'delft-cpi');
        $vida = $locations->firstWhere('slug', 'vida-view');

        // Mengambil unit yang dipilih secara dinamis oleh admin sebagai "Pilihan Favorit Tamu"
        $featuredUnit = Unit::with('location')
            ->where('is_featured', true)
            ->where(function ($query) {
                $query->where('is_available', true)->orWhereNull('is_available');
            })
            ->latest('updated_at')
            ->first();

        // Mengambil FAQ dinamis yang aktif
        $faqs = Faq::where('is_active', true)->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();

        $settings = [
            'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
            'whatsapp_template' => Setting::get('whatsapp_template', "Halo Admin VIDALIDAY, saya ingin memesan/tanya ketersediaan unit:\n- Lokasi: {apartment}\n- Unit: {unit_name} ({room_type})\n- Harga: {price} / {period}\n\nMohon info ketersediaan kamar. Terima kasih!"),
            'promo_banner_text' => Setting::get('promo_banner_text', 'PROMO VIDALIDAY: Sewa apartemen harian & bulanan resmi di Makassar.'),
            'company_legal_name' => Setting::get('company_legal_name', 'PT PERDANA MEGA TRANS'),
            'contact_phone' => Setting::get('contact_phone', '+62 812-3456-7890'),
            'contact_email' => Setting::get('contact_email', 'info@vidaliday.com'),
            'office_hours' => Setting::get('office_hours', 'Setiap Hari: 08.00 - 23.00 WITA'),
        ];

        return view('home', compact('locations', 'delft', 'vida', 'featuredUnit', 'settings', 'faqs'));
    }
}
