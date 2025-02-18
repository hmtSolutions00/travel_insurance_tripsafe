<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipePerjalanan;

class MstTipePerjalananController extends Controller
{
    /**
     * Menampilkan daftar tipe perjalanan.
     */
    public function index()
    {
        $tipePerjalanan = TipePerjalanan::latest()->get(); // Ambil semua data terbaru
        return view('admin.pages.mst_tipe_perjalanan.index', compact('tipePerjalanan'));
    }

    /**
     * Menampilkan form tambah data.
     */
    public function create()
    {
        return view('admin.pages.mst_tipe_perjalanan.create');
    }

    /**
     * Menyimpan data ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tipe_perjalanans,name',
            'description' => 'nullable|string',
        ]);

        TipePerjalanan::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.master.tipe_perjalanan.index')->with('success', 'Tipe Perjalanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail tipe perjalanan.
     */
    public function show($id)
    {
        $tipePerjalanan = TipePerjalanan::findOrFail($id);
        return view('admin.pages.mst_tipe_perjalanan.detail', compact('tipePerjalanan'));
    }

    /**
     * Menampilkan form edit data.
     */
    public function edit($id)
    {
        $tipePerjalanan = TipePerjalanan::findOrFail($id);
        return view('admin.pages.mst_tipe_perjalanan.edit', compact('tipePerjalanan'));
    }

    /**
     * Mengupdate data di database.
     */
    public function update(Request $request, $id)
    {
        $tipePerjalanan = TipePerjalanan::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:tipe_perjalanans,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $tipePerjalanan->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.master.tipe_perjalanan.index')->with('success', 'Tipe Perjalanan berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy($id)
    {
        $tipePerjalanan = TipePerjalanan::findOrFail($id);
        $tipePerjalanan->delete();

        return redirect()->route('admin.master.tipe_perjalanan.index')->with('success', 'Tipe Perjalanan berhasil dihapus.');
    }
}
