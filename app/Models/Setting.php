<?php

namespace App\Models;

use App\Support\StorageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::deleting(function (Setting $setting) {
            if ($setting->key === 'site_logo' || str_contains($setting->key, 'image') || str_contains($setting->key, 'logo')) {
                StorageHelper::delete($setting->value);
            }
        });
    }

    protected $fillable = ['key', 'value'];

    public static function get(string $key, ?string $default = null): ?string
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public static function set(string $key, ?string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
