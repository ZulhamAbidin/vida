<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = [
            'tagline' => Setting::get('about_tagline', 'Your Comfort, Our Priority'),
            'hero_title' => Setting::get('about_hero_title', 'VIDALIDAY — Partner Terpercaya untuk Menginap Nyaman di Makassar.'),
            'intro_p1' => Setting::get('about_intro_p1', ''),
            'intro_p2' => Setting::get('about_intro_p2', ''),
            'intro_p3' => Setting::get('about_intro_p3', ''),
            'commit_title' => Setting::get('about_commit_title', 'KOMITMEN KAMI'),
            'commit_text' => Setting::get('about_commit_text', ''),
            'closing_quote' => Setting::get('about_closing_quote', ''),
            'closing_cta' => Setting::get('about_closing_cta', ''),
            'reasons' => json_decode(Setting::get('about_reasons', '[]'), true) ?: [],
        ];

        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_tagline' => 'required|string|max:255',
            'about_hero_title' => 'required|string|max:255',
            'about_intro_p1' => 'required|string',
            'about_intro_p2' => 'nullable|string',
            'about_intro_p3' => 'nullable|string',
            'about_commit_title' => 'required|string|max:255',
            'about_commit_text' => 'required|string',
            'about_closing_quote' => 'nullable|string|max:255',
            'about_closing_cta' => 'nullable|string|max:255',
            'reasons_title' => 'nullable|array',
            'reasons_desc' => 'nullable|array',
            'reasons_icon' => 'nullable|array',
        ]);

        Setting::set('about_tagline', $request->input('about_tagline'));
        Setting::set('about_hero_title', $request->input('about_hero_title'));
        Setting::set('about_intro_p1', $request->input('about_intro_p1'));
        Setting::set('about_intro_p2', $request->input('about_intro_p2'));
        Setting::set('about_intro_p3', $request->input('about_intro_p3'));
        Setting::set('about_commit_title', $request->input('about_commit_title'));
        Setting::set('about_commit_text', $request->input('about_commit_text'));
        Setting::set('about_closing_quote', $request->input('about_closing_quote'));
        Setting::set('about_closing_cta', $request->input('about_closing_cta'));

        // Handle Dynamic Reasons List
        $titles = $request->input('reasons_title', []);
        $descs = $request->input('reasons_desc', []);
        $icons = $request->input('reasons_icon', []);

        $reasons = [];
        for ($i = 0; $i < count($titles); $i++) {
            if (!empty(trim($titles[$i]))) {
                $reasons[] = [
                    'title' => trim($titles[$i]),
                    'desc' => trim($descs[$i] ?? ''),
                    'icon' => trim($icons[$i] ?? 'shield'),
                ];
            }
        }

        Setting::set('about_reasons', json_encode($reasons, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return back()->with('success', 'Konten halaman Tentang Kami (About Us) berhasil diperbarui!');
    }
}
