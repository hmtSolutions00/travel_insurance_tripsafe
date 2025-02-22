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
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo_profile')->nullable()->after('email');
            $table->enum('role', ['admin', 'user', 'editor'])->default('user')->after('photo_profile');
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active')->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['photo_profile', 'role', 'status']);
        });
    }
};
