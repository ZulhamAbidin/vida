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

        if (Storage::disk($disk)->exists($cleanPath)) {
            return Storage::disk($disk)->delete($cleanPath);
        }

        return false;
    }

    /**
     * Delete multiple files.
     */
    public static function deleteMany(array $paths, string $disk = 'public'): void
    {
        foreach ($paths as $path) {
            if (is_string($path)) {
                static::delete($path, $disk);
            }
        }
    }
}
