<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@example.com'], // Cek jika email sudah ada
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@tripsafe.id',
                'password' => Hash::make('TravelPro@Safe'), // Ganti dengan password yang lebih aman
                'photo_profile' => 'default.png', // Bisa diganti dengan path foto default
                'role' => 'admin', // Role superadmin, atau bisa dibuat lebih spesifik
                'status' => 'active',
            ]
        );
    }
}
