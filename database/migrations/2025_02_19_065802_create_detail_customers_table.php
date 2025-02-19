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
        Schema::create('detail_customers', function (Blueprint $table) {
            $table->id();
            $table->string('pesanan_id'); //ref pesanan
            $table->string('fullname');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->date('date_od_birth');
            $table->string('place_of_birth');
            $table->string('no_passport');
            $table->string('pekerjaan')->nullable();
            $table->string('home_address')->nullable();
            $table->string('province')->nullable();
            $table->string('kota')->nullable();
            $table->string('post_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->string('url_photoId');
            $table->string('url_photoPassport')->nullable();
            $table->string('is_polish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_customers');
    }
};
