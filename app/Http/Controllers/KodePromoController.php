<?php

namespace App\Http\Controllers;

use App\Models\KodePromo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class KodePromoController extends Controller
{
    public function index()
    {
        $kodePromo = KodePromo::all(); // Ambil semua data terbaru
        return view('admin.pages.kode_promo.index', compact('kodePromo'));
    }

    public function create()
    {
        $kodePromo = Str::random(10, 'alpha_num_upper');

        return view('admin.pages.kode_promo.create', compact('kodePromo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_promo' => 'required',
            'kode_promo' => 'required',
            'detail' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $checkKodePromo = KodePromo::all();

        foreach ($checkKodePromo as $promo) {
            if ($promo->kode_promo === $request->kode_promo) {
                return redirect()->back()->withInput($request->all())->with('error', 'Kode promo tidak Tersedia! Silahkan gunakan Kode promo lain');
            }
        }

        KodePromo::create([
            'nama_promo' => $request->nama_promo,
            'kode_promo' => $request->kode_promo,
            'detail' => $request->detail,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
        ]);

        return redirect()->route('kode.promo.index')->with('success', 'Data kode promo berhasil ditambahkan');
    }

    public function show($id)
    {
        $kodePromo = KodePromo::find($id);

        return view('admin.pages.kode_promo.show', compact('kodePromo'));
    }

    public function edit($id)
    {
        $kodePromo = KodePromo::find($id);

        return view('admin.pages.kode_promo.edit', compact('kodePromo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_promo' => 'required',
            'kode_promo' => 'required',
            'detail' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $checkKodePromo = KodePromo::where('id', '!=', $id)->get();

        foreach ($checkKodePromo as $promo) {
            if ($promo->kode_promo === $request->kode_promo) {
                return redirect()->back()->withInput($request->all())->with('error', 'Kode promo tidak Tersedia! Silahkan gunakan Kode promo lain');
            }
        }

        $kodePromo = KodePromo::find($id);

        $kodePromo->update([
            'nama_promo' => $request->nama_promo,
            'kode_promo' => $request->kode_promo,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'detail' => $request->detail,
        ]);

        return redirect()->route('kode.promo.index')->with('success', 'Data kode promo berhasil diubah');
    }

    public function destroy($id)
    {
        $kodePromo = KodePromo::findOrFail($id);

        // Hapus data dari database
        $kodePromo->delete();

        return redirect()->route('kode.promo.index')->with('success', 'Data Kode Promo berhasil dihapus!');
    }
}
