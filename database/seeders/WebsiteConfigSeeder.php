<?php

namespace Database\Seeders;

use App\Models\WebsiteConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah sudah ada data, jika belum maka tambahkan data default
        if (WebsiteConfig::count() == 0) {
            WebsiteConfig::create([
                'site_name' => 'TripSafe',
                'logo' => null, // Default tidak ada logo
                'about_us' => 'Selamat Datang di SafeTrip Kami adalah perusahaan asuransi perjalanan yang berdedikasi untuk memberikan perlindungan dan kenyamanan bagi Anda saat melakukan perjalanan',
                'url_photo_background' => null, // Bisa diisi nanti
                'title' => 'Tripsafe Allianz Agency Travel Pro',
                'keywords' => 'website, bisnis, informasi',
                'slogan1' => 'SHai Tripper, Mau terbang ke mana?',
                'slogan2' => 'Life is short, the world is too wide.'
            ]);
        }
    }
}
