<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('storage:clean-orphaned', function () {
    $disk = \Illuminate\Support\Facades\Storage::disk('public');
    
    // Collect active files from DB
    $activeFiles = collect();

    // Units
    foreach (\App\Models\Unit::all() as $unit) {
        if ($unit->main_image) {
            $activeFiles->push(ltrim(str_replace(['storage/', 'public/'], '', $unit->main_image), '/\\'));
        }
        if (is_array($unit->gallery_images)) {
            foreach ($unit->gallery_images as $img) {
                $activeFiles->push(ltrim(str_replace(['storage/', 'public/'], '', $img), '/\\'));
            }
        }
    }

    // Facilities
    foreach (\App\Models\Facility::all() as $facility) {
        if ($facility->image) {
            $activeFiles->push(ltrim(str_replace(['storage/', 'public/'], '', $facility->image), '/\\'));
        }
    }

    // Settings
    $logo = \App\Models\Setting::get('site_logo');
    if ($logo) {
        $activeFiles->push(ltrim(str_replace(['storage/', 'public/'], '', $logo), '/\\'));
    }

    // Locations
    foreach (\App\Models\Location::all() as $loc) {
        if ($loc->hero_image) {
            $activeFiles->push(ltrim(str_replace(['storage/', 'public/'], '', $loc->hero_image), '/\\'));
        }
    }

    $activeLookup = $activeFiles->map(fn($f) => str_replace('\\', '/', $f))->flip();

    $directories = ['units', 'facilities', 'settings'];
    $deletedCount = 0;
    $freedBytes = 0;

    foreach ($directories as $dir) {
        if (!$disk->exists($dir)) {
            continue;
        }

        $files = $disk->files($dir);
        foreach ($files as $file) {
            $normalizedFile = str_replace('\\', '/', $file);
            if (!$activeLookup->has($normalizedFile)) {
                $size = $disk->size($file);
                $disk->delete($file);
                $freedBytes += $size;
                $deletedCount++;
                $this->line("<comment>Dihapus (file tidak terpakai):</comment> {$normalizedFile} (" . round($size / 1024, 1) . " KB)");
            }
        }
    }

    $freedMB = round($freedBytes / (1024 * 1024), 2);
    $this->info("Pembersihan selesai! {$deletedCount} file yatim (orphaned) berhasil dibersihkan, membebaskan {$freedMB} MB memory/storage.");
})->purpose('Bersihkan file foto lama di storage yang sudah tidak dipakai di database');

