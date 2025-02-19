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
        Schema::create('detail_manfaats', function (Blueprint $table) {
            $table->id();
            $table->string('benefitOption'); //ref opsi manfaat
            $table->string('insurance_type_id'); //ref paket asuransi
            $table->json('destionation_id');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_manfaats');
    }
};
