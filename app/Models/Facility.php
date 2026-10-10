<?php

namespace App\Models;

use App\Support\StorageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::deleting(function (Facility $facility) {
            StorageHelper::delete($facility->image);
        });
    }

    protected $fillable = [
        'location_id',
        'name',
        'icon',
        'description',
        'image',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }
}
