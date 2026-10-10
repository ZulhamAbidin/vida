<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'name',
        'slug',
        'room_type',
        'max_guests',
        'normal_price',
        'promo_price',
        'promo_badge',
        'is_promo_active',
        'rental_period',
        'description',
        'facilities_list',
        'main_image',
        'gallery_images',
        'is_featured',
        'is_available',
    ];

    protected $casts = [
        'facilities_list' => 'array',
        'gallery_images' => 'array',
        'is_promo_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_available' => 'boolean',
        'normal_price' => 'decimal:2',
        'promo_price' => 'decimal:2',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getFormattedNormalPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->normal_price, 0, ',', '.');
    }

    public function getFormattedPromoPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->promo_price, 0, ',', '.');
    }

    public function getDiscountPercentAttribute(): int
    {
        if ($this->normal_price > 0 && $this->promo_price > 0 && $this->normal_price > $this->promo_price) {
            return (int) round((($this->normal_price - $this->promo_price) / $this->normal_price) * 100);
        }
        return 0;
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->main_image) {
            return 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=800&q=80';
        }
        if (str_starts_with($this->main_image, 'http://') || str_starts_with($this->main_image, 'https://')) {
            return $this->main_image;
        }
        return asset('storage/' . $this->main_image);
    }
}

