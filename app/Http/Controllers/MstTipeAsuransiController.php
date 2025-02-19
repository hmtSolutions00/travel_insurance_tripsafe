<?php

namespace App\Http\Controllers;

use App\Models\TipeAsuransi;
use App\Models\TipePerjalanan;
use Illuminate\Http\Request;

class MstTipeAsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asuransis = TipeAsuransi::all();

        // Ambil semua ID tipe perjalanan yang unik (pastikan tipe_perjalanan_id sudah berupa array)
        $allTipePerjalananIds = $asuransis->flatMap(function ($asuransi) {
            return $asuransi->tipe_perjalanan_id; // Karena sudah di-cast, ini akan selalu array
        })->unique()->toArray();
    
        $tipePerjalanans = TipePerjalanan::whereIn('id', $allTipePerjalananIds)->get()->keyBy('id');
    
        return view('admin.pages.mst_tipe_asuransi.index', compact('asuransis', 'tipePerjalanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipePerjalanans = TipePerjalanan::all(); // Ambil semua tipe perjalanan
        return view('admin.pages.mst_tipe_asuransi.create', compact('tipePerjalanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tipe_perjalanan_id' => 'required|array',
            'tipe_perjalanan_id.*' => 'exists:tipe_perjalanans,id', // Validasi ID valid
        ]);
    
        TipeAsuransi::create([
            'name' => $request->name,
            'tipe_perjalanan_id' => $request->tipe_perjalanan_id, // Simpan langsung array, tanpa json_encode
        ]);
    
        return redirect()->route('admin.master.tipe_asuransi.index')
            ->with('success', 'Tipe Asuransi berhasil ditambahkan.');
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
            $asuransi = TipeAsuransi::find($id);
            $tipePerjalanans = TipePerjalanan::all();
            return view('admin.pages.mst_tipe_asuransi.edit', compact('asuransi', 'tipePerjalanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tipe_perjalanan_id' => 'required|array',
            'tipe_perjalanan_id.*' => 'exists:tipe_perjalanans,id',
        ]);
    
        $asuransi = TipeAsuransi::find($id);
        $asuransi->update([
            'name' => $request->name,
            'tipe_perjalanan_id' => $request->tipe_perjalanan_id, // Simpan langsung array
        ]);
    
        return redirect()->route('admin.master.tipe_asuransi.index')
            ->with('success', 'Tipe Asuransi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipePerjalanan = TipeAsuransi::findOrFail($id);
        $tipePerjalanan->delete();

        return redirect()->route('admin.master.tipe_asuransi.index')->with('success', 'Tipe Asuransi berhasil dihapus.');
    }
}
