<?php

namespace App\Models;

use App\Support\StorageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::deleting(function (Location $location) {
            StorageHelper::delete($location->hero_image);

            foreach ($location->units as $unit) {
                $unit->delete();
            }

            foreach ($location->facilities as $facility) {
                $facility->delete();
            }
        });
    }

    protected $fillable = [
        'slug',
        'name',
        'tagline',
        'description',
        'address',
        'gmaps_url',
        'hero_image',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function landmarks()
    {
        return $this->hasMany(Landmark::class)->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
    }
}
