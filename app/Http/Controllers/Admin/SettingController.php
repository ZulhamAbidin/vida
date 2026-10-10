<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_logo' => Setting::get('site_logo'),
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
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            $path = $request->file('site_logo')->store('settings', 'public');
            Setting::set('site_logo', $path);
        }

        // Handle hapus logo bila tombol hapus logo dipilih
        if ($request->has('remove_logo') && $request->input('remove_logo') == '1') {
            $oldLogo = Setting::get('site_logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }
            Setting::set('site_logo', null);
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
