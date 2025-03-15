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
        Schema::create('kode_promos', function (Blueprint $table) {
            $table->id();
            $table->string('kode_promo');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('nama_promo')->nullable();
            $table->text('detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kode_promos');
    }
};
