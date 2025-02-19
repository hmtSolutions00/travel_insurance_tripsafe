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
        Schema::create('tipe_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json("age");
            $table->text("description");
            $table->string("tipe_perjalan_id"); //ref tipe_perjalanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_pelanggans');
    }
};
