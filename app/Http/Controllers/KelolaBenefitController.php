<?php

namespace App\Http\Controllers;

use App\Models\DetailManfaat;
use App\Models\ManfaatPaket;
use App\Models\PaketAsuransi;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class KelolaBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ambil data dan kelompokkan berdasarkan paket dan wilayah
    $groupedManfaats = DetailManfaat::with(['opsiManfaat.manfaatPaket', 'paketAsuransi'])
        ->get()
        ->groupBy(function ($item) {
            return $item->insurance_type_id . '-' . $item->destionation_id;
        })->map(function ($group) {
            $first = $group->first();
            $first->wilayahs = Wilayah::whereIn('id', json_decode($first->destionation_id, true))->get();
            $first->benefits = $group->map(fn($item) => $item->opsiManfaat->manfaatPaket->name)->toArray();
            $first->insurance_type_id = $group->first()->insurance_type_id; // Tambahkan ID paket
            $first->destionation_id = $group->first()->destionation_id; // Tambahkan ID wilayah dalam JSON
            return $first;
        });

    // Kirim data ke view
    return view('admin.pages.data_benefit.index', compact('groupedManfaats'));
        


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wilayahs = Wilayah::all(); // Semua data wilayah
    $paketAsuransis = PaketAsuransi::all(); // Semua paket asuransi
    $manfaatPakets = ManfaatPaket::with('opsiManfaats')->get(); // Manfaat Utama dan Sub Manfaat

    return view('admin.pages.data_benefit.create', compact('wilayahs', 'paketAsuransis', 'manfaatPakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->destionation_id);
        $request->validate([
            'destionation_id' => 'required|array',
            'destionation_id.*' => 'exists:wilayahs,id',
            'insurance_type_id' => 'required|exists:paket_asuransis,id',
            'prices' => 'required|array',
            'prices.*' => 'nullable|string|max:255', // Price sebagai varchar
        ]);
    
        // Simpan harga untuk setiap Sub Manfaat (Opsi Manfaat)
        foreach ($request->prices as $opsi_id => $price) {
            if ($price !== null) {
                DetailManfaat::create([
                    'benefitOption' => $opsi_id, // Memasukkan ID dari benefit option
                    'insurance_type_id' => $request->insurance_type_id,
                    'destionation_id' => json_encode($request->destionation_id),
                    'price' => $price,
                ]);
            }
        }
    
        return redirect()->route('kelola.data_benefit.index')->with('success', 'Data berhasil ditambahkan.');
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
    public function edit($insurance_type_id, $destionation_id){
            // $destionation_id = json_decode($destionation_id,true);
        //    dd($destionation_id);
            $detailManfaats = DetailManfaat::where('insurance_type_id', $insurance_type_id)
                ->where('destionation_id', $destionation_id)
                ->get();
                dd($detailManfaats);

                $detailManfaat = $detailManfaats->first();
                // if (!$detailManfaat) {
                //     return redirect()->route('kelola.data_benefit.index')->with('error', 'Data tidak ditemukan.');
                // }
            $wilayahs = Wilayah::all();
            $paketAsuransis = PaketAsuransi::all();
            $manfaatPakets = ManfaatPaket::with('opsiManfaats')->get();
// dd($detailManfaats);
    return view('admin.pages.data_benefit.edit', compact(
        'detailManfaat', 'detailManfaats', 'wilayahs', 'paketAsuransis', 'manfaatPakets'
    ));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
