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
                return $item->insurance_type_id . '-' . json_encode($item->destionation_id, true);
            })->map(function ($group) {
                $first = $group->first();
                $first->wilayahs = Wilayah::whereIn('id', $first->destionation_id)->get();
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
                    'destionation_id' => $request->destionation_id,
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
    public function edit($insurance_type_id, $destionation_id)
    {
        // Dekode destionation_id dari base64 dan JSON
        $decodedDestinationId = json_decode(base64_decode($destionation_id), true);

        // Ambil data DetailManfaat berdasarkan insurance_type_id dan destionation_id
        $detailManfaat = DetailManfaat::where('insurance_type_id', $insurance_type_id)
            ->whereJsonContains('destionation_id', $decodedDestinationId)
            ->firstOrFail();

        // Ubah destionation_id ke dalam array agar bisa digunakan dalam view
        // $detailManfaat->destionation_id = json_decode($detailManfaat->destionation_id, true);

        // Ambil data wilayah, paket asuransi, dan manfaat paket beserta opsi manfaatnya
        $wilayahs = Wilayah::all();
        $paketAsuransis = PaketAsuransi::all();
        $manfaatPakets = ManfaatPaket::with('opsiManfaats')->get();

        return view('admin.pages.data_benefit.edit', compact('detailManfaat', 'wilayahs', 'paketAsuransis', 'manfaatPakets'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $insurance_type_id, $destionation_id)
    {
        // Decode destionation_id agar sesuai dengan format JSON
        $decodedDestinationId = json_decode(base64_decode($destionation_id), true);

        // Validasi request
        $request->validate([
            'destionation_id' => 'required|array',
            'destionation_id.*' => 'exists:wilayahs,id',
            'insurance_type_id' => 'required|exists:paket_asuransis,id',
            'prices' => 'required|array',
            'prices.*.id' => 'required|exists:detail_manfaats,id', // Pastikan ID valid
            'prices.*.price' => 'nullable|string|max:255',
        ]);

        // *1. Update data yang sudah ada berdasarkan ID di tabel detail_manfaat*
        foreach ($request->prices as $data) {
            DetailManfaat::where('id', $data['id'])->update([
                'insurance_type_id' => $request->insurance_type_id,

                'destionation_id' => json_encode($request->destionation_id, true),
                'price' => $data['price'],
            ]);
        }

        return redirect()->route('kelola.data_benefit.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
