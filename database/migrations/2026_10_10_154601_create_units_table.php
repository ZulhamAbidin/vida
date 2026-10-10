<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('room_type'); // Studio, 1 Bedroom, 2 Bedroom, Penthouse
            $table->integer('max_guests')->default(2);
            $table->decimal('normal_price', 12, 2)->default(0); // Harga coret
            $table->decimal('promo_price', 12, 2)->default(0);  // Harga diskon aktif
            $table->string('promo_badge')->nullable(); // e.g. "Hemat 25%", "Best Deal"
            $table->boolean('is_promo_active')->default(true);
            $table->string('rental_period')->default('Harian'); // Harian, Mingguan, Bulanan
            $table->text('description')->nullable();
            $table->json('facilities_list')->nullable(); // array string e.g. ["AC", "Smart TV", "WiFi", "Water Heater", "Kitchen Set"]
            $table->string('main_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
