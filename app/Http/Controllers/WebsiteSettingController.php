<?php

namespace App\Http\Controllers;

use App\Models\WebsiteConfig;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data pertama dari tabel website_configs
        $config = WebsiteConfig::first();

        // Jika belum ada data, buat data default agar tidak error
        if (!$config) {
            $config = WebsiteConfig::create([
                'site_name' => 'Nama Website Default',
                'logo' => null,
                'about_us' => 'Deskripsi website.',
                'url_photo_background' => null,
                'title' => 'Judul Website',
                'keywords' => 'keyword1, keyword2, keyword3',
            ]);
        }

        return view('admin.config.web.index', compact('config'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Ambil satu-satunya data di database
        $config = WebsiteConfig::first();

        // Jika data tidak ditemukan, buat data default terlebih dahulu
        if (!$config) {
            $config = WebsiteConfig::create([
                'site_name' => 'Nama Website Default',
                'logo' => null,
                'about_us' => 'Deskripsi tentang website.',
                'url_photo_background' => null,
                'title' => 'Judul Default',
                'keywords' => 'kata kunci, default',
            ]);
        }

        return view('admin.config.web.settings', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_us' => 'required|string',
            'url_photo_background' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string|max:255',
            'keywords' => 'required|string',
        ]);

        // Ambil data konfigurasi website yang ada
        $config = WebsiteConfig::first();

        if (!$config) {
            return redirect()->route('admin.website.config.edit')->with('error', 'Data konfigurasi tidak ditemukan!');
        }

        // Update field yang bisa diubah
        $config->site_name = $request->site_name;
        $config->about_us = $request->about_us;
        $config->title = $request->title;
        $config->keywords = $request->keywords;

        // Proses upload logo jika ada file baru
        if ($request->hasFile('logo')) {
            $logoPath = 'admin/website_config/';
            $logoName = time() . '-' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path($logoPath), $logoName);
            $config->logo = $logoPath . $logoName;
        }

        // Proses upload background jika ada file baru
        if ($request->hasFile('url_photo_background')) {
            $bgPath = 'admin/website_config/';
            $bgName = time() . '-' . $request->file('url_photo_background')->getClientOriginalName();
            $request->file('url_photo_background')->move(public_path($bgPath), $bgName);
            $config->url_photo_background = $bgPath . $bgName;
        }

        // Simpan perubahan
        $config->save();

        return redirect()->route('website.configuration.index')->with('success', 'Konfigurasi website berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
