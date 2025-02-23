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
        Schema::create('website_configs', function (Blueprint $table) {
            $table->id();
            $table->string('site_name'); // Nama Website
            $table->string('logo')->nullable(); // Logo Website
            $table->text('about_us')->nullable(); // Deskripsi tentang website
            $table->string('url_photo_background')->nullable(); // URL untuk background
            $table->string('title')->nullable(); // Title website
            $table->string('keywords')->nullable(); // Kata kunci untuk SEO
            $table->string('slogan1')->nullable(); // Slogan pertama
            $table->string('slogan2')->nullable(); // Slogan kedua
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_configs');
    }
};
