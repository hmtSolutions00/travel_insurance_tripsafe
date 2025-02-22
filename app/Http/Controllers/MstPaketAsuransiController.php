<?php

namespace App\Http\Controllers;

use App\Models\PaketAsuransi;
use Illuminate\Http\Request;

class MstPaketAsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketAsuransi = PaketAsuransi::latest()->get(); // Ambil semua data terbaru
        return view('admin.pages.mst_paket_asuransi.index', compact('paketAsuransi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.mst_paket_asuransi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255|unique:paket_asuransis,nama_paket',
        ]);

        PaketAsuransi::create([
            'nama_paket' => $request->nama_paket
        ]);
        return redirect()->route('admin.paket_asuransi.index')->with('success', 'Paket Asuransi berhasil ditambahkan.');
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
        $paketAsuransi = PaketAsuransi::findOrFail($id);
        return view('admin.pages.mst_paket_asuransi.edit', compact('paketAsuransi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paketAsuransi = PaketAsuransi::findOrFail($id);
        $request->validate([
            'nama_paket' => 'required|string|max:255|unique:paket_asuransis,nama_paket',
        ]);

        $paketAsuransi->update([
            'nama_paket' => $request->nama_paket
        ]);
        return redirect()->route('admin.paket_asuransi.index')->with('success', 'Paket Asuransi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paketAsuransi = PaketAsuransi::findOrFail($id);
        $paketAsuransi->delete();

        return redirect()->route('admin.paket_asuransi.index')->with('success', 'Paket Asuransi berhasil dihapus.');
    }
}
