<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class, // Tambahkan ini
        ]);
       
        // \App\Models\User::factory(10)->create();
        \App\Models\TipePerjalanan::insert([
            'name' => 'Sekali Perjalanan',
            'description' => '-',
        ]);

        \App\Models\TipePerjalanan::insert([
            'name' => 'Tahunan',
            'description' => '-',
        ]);

        \App\Models\TipeAsuransi::insert([
            'tipe_perjalanan_id' => '["1","2"]',
            'name' => 'Individual',
        ]);

        \App\Models\TipeAsuransi::insert([
            'tipe_perjalanan_id' => '["1"]',
            'name' => 'Couple',
        ]);

        \App\Models\TipeAsuransi::insert([
            'tipe_perjalanan_id' => '["1"]',
            'name' => 'Family',
        ]);

        \App\Models\TipePelanggan::insert([
            'name' => 'Anak',
            'age' => '["14", "17"]',
            'description' => "-",
        ]);

        \App\Models\TipePelanggan::insert([
            'name' => 'Dewasa',
            'age' => '["18", "69"]',
            'description' => "-",
        ]);

        \App\Models\TipePelanggan::insert([
            'name' => 'Lansia',
            'age' => '["70", "84"]',
            'description' => "-",
        ]);

        \App\Models\Wilayah::insert([
            'name' => 'Greater Asia',
            'exclude' => '-',
            'include' => '-',
        ]);

        \App\Models\Wilayah::insert([
            'name' => 'Pasific Counttry & Schengen',
            'exclude' => '-',
            'include' => '-',
        ]);

        \App\Models\Wilayah::insert([
            'name' => 'Umroh - Saudi Arabia Plus',
            'exclude' => '-',
            'include' => '-',
        ]);

        \App\Models\Wilayah::insert([
            'name' => 'WorldWide Excluding US & Canada',
            'exclude' => '-',
            'include' => '-',
        ]);

        \App\Models\Wilayah::insert([
            'name' => 'WorldWide Including US & Canada',
            'exclude' => '-',
            'include' => '-',
        ]);

        \App\Models\PaketAsuransi::insert([
            'nama_paket' => 'Deluxe',
        ]);

        \App\Models\PaketAsuransi::insert([
            'nama_paket' => 'Superior',
        ]);

        // \App\Models\HargaPaket::insert([
        //     'destination_id' => '1',
        //     'package_id' => '1',
        //     'duration' => '["1","4"]',
        //     'price' => "112000",
        //     'insuranceType_id' => "1",
        //     'custAge_id' => "[1,2]",
        //     "extra_price" => "63000",
        //     'product_name' => "Travel Pro",
        //     'cetak_polis' => '10000',
        //     'tipePerjalanan_id' => '1'
        // ]);

        // \App\Models\HargaPaket::insert([
        //     'destination_id' => '1',
        //     'package_id' => '2',
        //     'duration' => '["1","4"]',
        //     'price' => "94000",
        //     'insuranceType_id' => "1",
        //     'custAge_id' => "[1,2]",
        //     "extra_price" => "57000",
        //     'product_name' => "Travel Pro",
        //     'cetak_polis' => '10000',
        //     'tipePerjalanan_id' => '1'
        // ]);

        // \App\Models\HargaPaket::insert([
        //     'destination_id' => '2',
        //     'package_id' => '1',
        //     'duration' => '["1","4"]',
        //     'price' => "256000",
        //     'insuranceType_id' => "1",
        //     'custAge_id' => "[3]",
        //     "extra_price" => "171000",
        //     'product_name' => "Travel Pro",
        //     'cetak_polis' => '10000',
        //     'tipePerjalanan_id' => '1'
        // ]);

        // \App\Models\HargaPaket::insert([
        //     'destination_id' => '2',
        //     'package_id' => '2',
        //     'duration' => '["1","4"]',
        //     'price' => "239000",
        //     'insuranceType_id' => "1",
        //     'custAge_id' => "[3]",
        //     "extra_price" => "155000",
        //     'product_name' => "Travel Pro",
        //     'cetak_polis' => '10000',
        //     'tipePerjalanan_id' => '1'
        // ]);

        // \App\Models\HargaPaket::insert([
        //     'destination_id' => '1',
        //     'package_id' => '1',
        //     'duration' => '["5","6"]',
        //     'price' => "224000",
        //     'insuranceType_id' => "2",
        //     'custAge_id' => "[1,2]",
        //     "extra_price" => "256000",
        //     'product_name' => "Travel Pro",
        //     'cetak_polis' => '10000',
        //     'tipePerjalanan_id' => '1'
        // ]);

        // \App\Models\HargaPaket::insert([
        //     'destination_id' => '1',
        //     'package_id' => '2',
        //     'duration' => '["5","6"]',
        //     'price' => "205000",
        //     'insuranceType_id' => "2",
        //     'custAge_id' => "[1,2]",
        //     "extra_price" => "222000",
        //     'product_name' => "Travel Pro",
        //     'cetak_polis' => '10000',
        //     'tipePerjalanan_id' => '1'
        // ]);
    }
}
