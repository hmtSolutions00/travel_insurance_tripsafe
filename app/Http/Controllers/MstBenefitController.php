<?php

namespace App\Http\Controllers;

use App\Models\ManfaatPaket;
use App\Models\OpsiManfaat;
use Illuminate\Http\Request;

class MstBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ambil semua manfaat beserta sub manfaatnya
        $manfaatPakets = ManfaatPaket::with('opsiManfaats')->get();

        // dd($manfaatPakets);

        return view ('admin.pages.mst_benefit_asuransi.index', compact('manfaatPakets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.pages.mst_benefit_asuransi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sub_manfaat.*' => 'required|string|max:255'
        ]);

        $manfaat = ManfaatPaket::create(['name' => $request->name]);

        foreach ($request->sub_manfaat as $sub) {
            $manfaat->opsiManfaats()->create(['name' => $sub]);
        }

        return redirect()->route('admin.benefit_asuransi.index')->with('success', 'Data berhasil ditambahkan');
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
                // Ambil data manfaat berdasarkan ID beserta sub-manfaatnya
            $manfaatPaket = ManfaatPaket::with('opsiManfaats')->findOrFail($id);

            return view('admin.pages.mst_benefit_asuransi.edit', compact('manfaatPaket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi Data
        $request->validate([
            'name' => 'required|string|max:255', // Manfaat utama
            'sub_manfaat.*' => 'nullable|string|max:255', // Sub-manfaat (bisa kosong atau dihapus)
        ]);

        // Update Manfaat Utama
        $manfaatPaket = ManfaatPaket::findOrFail($id);
        $manfaatPaket->update(['name' => $request->name]);

        // **Proses Sub-Manfaat**
        $existingIds = $manfaatPaket->opsiManfaats()->pluck('id')->toArray();  // ID sub-manfaat yang sudah ada
        $submittedIds = $request->input('sub_manfaat_id', []);                 // ID sub-manfaat dari form

        // 1. Update atau Tambah Sub-Manfaat
        if ($request->has('sub_manfaat')) {
            foreach ($request->sub_manfaat as $index => $subManfaat) {
                if (!empty($submittedIds[$index])) {
                    // Update Sub-Manfaat yang Sudah Ada
                    OpsiManfaat::where('id', $submittedIds[$index])
                        ->update(['name' => $subManfaat]);
                } else {
                    // Tambah Sub-Manfaat Baru
                    $manfaatPaket->opsiManfaats()->create(['name' => $subManfaat]);
                }
            }
        }

        // 2. Hapus Sub-Manfaat yang Dihapus dari Form
        $toDelete = array_diff($existingIds, $submittedIds);
        OpsiManfaat::whereIn('id', $toDelete)->delete();

        // Redirect dengan Pesan Sukses
        return redirect()->route('admin.benefit_asuransi.index')->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data manfaat berdasarkan ID
    $manfaatPaket = ManfaatPaket::findOrFail($id);

    // Hapus semua sub-manfaat terkait
    $manfaatPaket->opsiManfaats()->delete();

    // Hapus data manfaat utama
    $manfaatPaket->delete();

    // Redirect dengan Pesan Sukses
    return redirect()->route('admin.benefit_asuransi.index')->with('success', 'Data berhasil dihapus!');
    }
}
