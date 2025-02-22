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
        Schema::create('harga_pakets', function (Blueprint $table) {
            $table->id();
            $table->string("destination_id"); //ref wilayah
            $table->string("package_id");//ref paket asuransi
            $table->string("tipePerjalanan_id");//ref tipe Perjalanan
            $table->json("duration");
            $table->string("price");
            $table->string("insuranceType_id");// ref tipe asuransi
            $table->json("custAge_id");
            $table->string("extra_price");
            $table->string("product_name");
            $table->string("cetak_polis");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_pakets');
    }
};
