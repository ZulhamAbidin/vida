<?php

namespace App\Models;

use App\Support\StorageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::deleting(function (Unit $unit) {
            StorageHelper::delete($unit->main_image);

            if (is_array($unit->gallery_images)) {
                StorageHelper::deleteMany($unit->gallery_images);
            }
        });
    }

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
        'youtube_video_url',
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

    public function getAllImagesAttribute(): array
    {
        $images = [];
        if ($this->main_image) {
            $images[] = $this->getImageUrlAttribute();
        }

        if (is_array($this->gallery_images)) {
            foreach ($this->gallery_images as $img) {
                if ($img) {
                    if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) {
                        $images[] = $img;
                    } else {
                        $images[] = asset('storage/' . $img);
                    }
                }
            }
        }

        if (empty($images)) {
            $images[] = 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=800&q=80';
        }

        return array_values(array_unique($images));
    }

    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        if (empty($this->youtube_video_url)) {
            return null;
        }

        $url = trim($this->youtube_video_url);

        // Pattern 1: https://youtu.be/ID
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1';
        }

        // Pattern 2: https://www.youtube.com/watch?v=ID
        if (preg_match('/[?&]v=([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1';
        }

        // Pattern 3: https://www.youtube.com/embed/ID
        if (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1';
        }

        // Pattern 4: https://www.youtube.com/shorts/ID
        if (preg_match('/youtube\.com\/shorts\/([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1';
        }

        return $url;
    }
}

