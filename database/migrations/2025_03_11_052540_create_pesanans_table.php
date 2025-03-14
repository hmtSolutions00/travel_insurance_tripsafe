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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('total_price');
            $table->json('durasi_perjalan');
            $table->json('jumlah_customer');
            $table->string('tipe_perjalanan');
            $table->string('product_name');
            $table->string('paket_asuransi');
            $table->string('tipe_asuransi');
            $table->string('wilayah');
            $table->string('potongan_promo')->nullable();
            $table->string('kode_promo')->nullable();
            $table->string("premi");
            $table->string('materai');
            $table->enum('status', [1,2,3,4])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
