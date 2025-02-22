<?php

namespace App\Http\Controllers;

use App\Models\TipePelanggan;
use App\Models\TipePerjalanan;
use Illuminate\Http\Request;

class MstTipePelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Ambil semua data tipe pelanggan dengan pagination
    $pelanggans = TipePelanggan::all();
    // Proses data sebelum dikirim ke view
    $pelanggans->transform(function ($pelanggan) {
        $pelanggan->age = json_decode($pelanggan->age, true) ?? ['Tidak ada', 'Tidak ada'];
        return $pelanggan;
    });

    return view('admin.pages.mst_tipe_pelanggan.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipePerjalanans = TipePerjalanan::all(); // Ambil semua tipe perjalanan
        return view('admin.pages.mst_tipe_pelanggan.create',compact('tipePerjalanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'min_age' => 'required|integer|min:0',
            'max_age' => 'required|integer|gte:min_age', // max harus >= min
            'description' => 'required|string',
        ], [
            'max_age.gte' => 'Batas usia maksimal harus lebih besar atau sama dengan batas usia minimal.'
        ]);

        // Simpan Data ke Database
        TipePelanggan::create([
            'name' => $request->name,
            'age' => json_encode([$request->min_age, $request->max_age]), // Simpan sebagai JSON
            'description' => $request->description,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.master.tipe_pelanggan.index')->with('success', 'Tipe pelanggan berhasil ditambahkan!');
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
            $pelanggan = TipePelanggan::findOrFail($id);

            // Pastikan age dalam format array yang benar
            $age = json_decode($pelanggan->age, true);
            $min_age = isset($age[0]) ? $age[0] : null;
            $max_age = isset($age[1]) ? $age[1] : null;

            return view('admin.pages.mst_tipe_pelanggan.edit', compact('pelanggan', 'min_age', 'max_age'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_age' => 'required|integer|min:0',
            'max_age' => 'required|integer|gte:min_age',
            'description' => 'nullable|string',
        ]);

        $pelanggan = TipePelanggan::findOrFail($id);

        // Simpan data dengan format JSON untuk age
        $pelanggan->update([
            'name' => $request->name,
            'age' => json_encode([$request->min_age, $request->max_age]),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.master.tipe_pelanggan.index')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipePelanggan = TipePelanggan::findOrFail($id);
        $tipePelanggan->delete();

        return redirect()->route('admin.master.tipe_pelanggan.index')->with('success', 'Tipe Pelanggan berhasil dihapus.');
    }
}
