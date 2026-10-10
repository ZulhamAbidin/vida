<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        $about = [
            'tagline' => Setting::get('about_tagline', 'Your Comfort, Our Priority'),
            'hero_title' => Setting::get('about_hero_title', 'VIDALIDAY — Partner Terpercaya untuk Menginap Nyaman di Makassar.'),
            'intro_p1' => Setting::get('about_intro_p1', 'VIDALIDAY merupakan brand di bawah naungan PT PERDANA MEGA TRANS, perusahaan yang memiliki legalitas usaha sebagai bagian dari komitmen kami dalam menghadirkan layanan pemesanan apartemen yang profesional, terpercaya, dan mengutamakan kenyamanan pelanggan.'),
            'intro_p2' => Setting::get('about_intro_p2', 'Kami menyediakan pilihan unit apartemen di Delft CPI dan Vida View Makassar dengan fasilitas lengkap, harga kompetitif, serta berbagai promo menarik untuk memenuhi kebutuhan menginap Anda, baik untuk liburan, perjalanan bisnis, staycation, maupun kebutuhan hunian sementara.'),
            'intro_p3' => Setting::get('about_intro_p3', 'Setiap unit kami dipersiapkan dengan mengutamakan kebersihan, kenyamanan, dan kelengkapan fasilitas agar Anda dapat menikmati pengalaman menginap yang menyenangkan, layaknya berada di rumah sendiri.'),
            'commit_title' => Setting::get('about_commit_title', 'KOMITMEN KAMI'),
            'commit_text' => Setting::get('about_commit_text', 'Kepuasan dan kepercayaan pelanggan adalah prioritas VIDALIDAY. Kami berkomitmen untuk memberikan pelayanan yang ramah, proses pemesanan yang jelas, serta pengalaman menginap yang aman, nyaman, dan berkesan.'),
            'closing_quote' => Setting::get('about_closing_quote', 'VIDALIDAY — Menginap Nyaman, Harga Bersahabat, Pilihan Terpercaya.'),
            'closing_cta' => Setting::get('about_closing_cta', 'Temukan unit favorit Anda dan nikmati pengalaman menginap yang lebih menyenangkan bersama VIDALIDAY!'),
            'reasons' => json_decode(Setting::get('about_reasons', '[]'), true) ?: [],
        ];

        $settings = [
            'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
            'company_legal_name' => Setting::get('company_legal_name', 'PT PERDANA MEGA TRANS'),
            'contact_phone' => Setting::get('contact_phone', '+62 812-3456-7890'),
            'contact_email' => Setting::get('contact_email', 'info@vidaliday.com'),
            'office_hours' => Setting::get('office_hours', 'Setiap Hari: 08.00 - 23.00 WITA'),
        ];

        return view('about', compact('about', 'settings', 'locations'));
    }
}
