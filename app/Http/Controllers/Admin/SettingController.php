<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\StorageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $siteLogo = Setting::get('site_logo');
        if ($siteLogo && !Storage::disk('public')->exists($siteLogo)) {
            $siteLogo = null;
        }

        $heroImage = Setting::get('hero_image');
        if ($heroImage && !Storage::disk('public')->exists($heroImage)) {
            $heroImage = null;
        }

        $settings = [
            'site_logo' => $siteLogo,
            'hero_image' => $heroImage,
            'whatsapp_number' => Setting::get('whatsapp_number', '6281234567890'),
            'whatsapp_template' => Setting::get('whatsapp_template', ''),
            'promo_banner_text' => Setting::get('promo_banner_text', ''),
            'company_legal_name' => Setting::get('company_legal_name', 'PT PERDANA MEGA TRANS'),
            'contact_phone' => Setting::get('contact_phone', ''),
            'contact_email' => Setting::get('contact_email', ''),
            'office_hours' => Setting::get('office_hours', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:8192',
            'whatsapp_number' => 'required|string|max:30',
            'company_legal_name' => 'required|string|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|string|max:100',
            'office_hours' => 'nullable|string|max:100',
            'promo_banner_text' => 'nullable|string',
            'whatsapp_template' => 'nullable|string',
        ]);

        // Handle upload logo baru
        if ($request->hasFile('site_logo')) {
            $oldLogo = Setting::get('site_logo');
            StorageHelper::delete($oldLogo);

            $path = $request->file('site_logo')->store('settings', 'public');
            Setting::set('site_logo', $path);
        } elseif ($request->has('remove_logo') && $request->input('remove_logo') == '1') {
            // Handle hapus logo bila tombol hapus logo dipilih
            $oldLogo = Setting::get('site_logo');
            StorageHelper::delete($oldLogo);
            Setting::set('site_logo', null);
        }

        // Handle upload hero background baru
        if ($request->hasFile('hero_image')) {
            $oldHero = Setting::get('hero_image');
            StorageHelper::delete($oldHero);

            $path = $request->file('hero_image')->store('settings', 'public');
            Setting::set('hero_image', $path);
        } elseif ($request->has('remove_hero_image') && $request->input('remove_hero_image') == '1') {
            // Handle hapus background hero kustom bila dipilih
            $oldHero = Setting::get('hero_image');
            StorageHelper::delete($oldHero);
            Setting::set('hero_image', null);
        }

        $fields = [
            'whatsapp_number',
            'whatsapp_template',
            'promo_banner_text',
            'company_legal_name',
            'contact_phone',
            'contact_email',
            'office_hours',
        ];

        foreach ($fields as $field) {
            Setting::set($field, $request->input($field));
        }

        return back()->with('success', 'Pengaturan identitas logo, kontak WhatsApp, dan banner promo berhasil disimpan!');
    }
}
