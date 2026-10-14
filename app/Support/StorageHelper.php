<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StorageHelper
{
    /**
     * Delete a file from public storage safely.
     * Handles relative paths (units/xyz.jpg), URL prefixes (storage/units/xyz.jpg, /storage/...),
     * and ignores null or external URLs.
     */
    public static function delete(?string $path, string $disk = 'public'): bool
    {
        if (empty($path)) {
            return false;
        }

        // Ignore external HTTP/HTTPS URLs (e.g., Unsplash)
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return false;
        }

        // Normalize path
        $cleanPath = ltrim($path, '/\\');

        if (str_starts_with($cleanPath, 'storage/')) {
            $cleanPath = substr($cleanPath, 8);
        } elseif (str_starts_with($cleanPath, 'storage\\')) {
            $cleanPath = substr($cleanPath, 8);
        }

        if (str_starts_with($cleanPath, 'public/')) {
            $cleanPath = substr($cleanPath, 7);
        } elseif (str_starts_with($cleanPath, 'public\\')) {
            $cleanPath = substr($cleanPath, 7);
        }

        $deleted = false;

        // Delete from Laravel storage disk
        if (Storage::disk($disk)->exists($cleanPath)) {
            $deleted = Storage::disk($disk)->delete($cleanPath);
        }

        // Also check if public/storage contains direct copy (useful on shared hosting where files might be copied)
        $publicFilePath = public_path('storage/' . $cleanPath);
        if (File::exists($publicFilePath) && !is_dir($publicFilePath)) {
            @File::delete($publicFilePath);
            $deleted = true;
        }

        return $deleted;
    }

    /**
     * Delete multiple files safely. Accepts array, json string, or iterable.
     */
    public static function deleteMany(iterable|string|null $paths, string $disk = 'public'): void
    {
        if (empty($paths)) {
            return;
        }

        if (is_string($paths)) {
            $decoded = json_decode($paths, true);
            $paths = is_array($decoded) ? $decoded : [$paths];
        }

        if (is_iterable($paths)) {
            foreach ($paths as $path) {
                if (is_string($path)) {
                    static::delete($path, $disk);
                }
            }
        }
    }
}
