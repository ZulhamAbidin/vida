<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

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
