<?php

namespace App\Http\Controllers;

use App\Models\DetailManfaat;
use App\Models\HargaPaket;
use App\Models\ManfaatPaket;
use App\Models\PaketAsuransi;
use App\Models\TipeAsuransi;
use App\Models\TipePelanggan;
use App\Models\TipePerjalanan;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaPaketController extends Controller
{
    //pemesanan asuransi frontend
    public function index()
    {
        $jenis_asuransi_1 = TipeAsuransi::whereJsonContains('tipe_perjalanan_id', ["1"])->get();
        $jenis_asuransi_2 = TipeAsuransi::whereJsonContains('tipe_perjalanan_id', ["2"])->get();
        $wilayahs = Wilayah::all();

        return view('frontend.pages.formpesanan', [
            'jenis_asuransi_1' => $jenis_asuransi_1,
            'jenis_asuransi_2' => $jenis_asuransi_2,
            'wilayahs' => $wilayahs,
        ]);
    }

    public function get_paket_asuransi(Request $request)
    {
        $anak = $request->jlhAnak;
        $dewasa = $request->jlhDewasa;
        $lansia = $request->jlhLansia;
        $jenis_asuransi = $request->jenisAsuransi;
        $wilayah = $request->wilayah;
        $tanggal_keberangkatan = $request->tglKeberangkatan;
        $tanggal_kepulangan = $request->tglKepulangan;
        $tipe_perjalan = $request->tipePerjalanan;

        $tglAwal = strtotime($tanggal_keberangkatan);
        $tglAkhir = strtotime($tanggal_kepulangan);

        $totalHari = $tglAkhir - $tglAwal;
        $hari = floor(($totalHari / (60 * 60 * 24)) + 1);

        if ($hari <= 31) {
            if ($lansia == 0) {
                $paket_asuransi = HargaPaket::rightJoin('wilayahs', 'wilayahs.id', '=', 'harga_pakets.destination_id')
                    ->rightJoin('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
                    ->rightJoin('tipe_asuransis', 'tipe_asuransis.id', '=', 'harga_pakets.insuranceType_id')
                    ->rightJoin('tipe_perjalanans', 'tipe_perjalanans.id', '=', 'harga_pakets.tipePerjalanan_id')
                    ->whereJsonContains('custAge_id', ["1"])
                    ->where(function ($query) use ($hari) {
                        $query->whereRaw('JSON_EXTRACT(duration, "$[0]") <= ? AND JSON_EXTRACT(duration, "$[1]") >= ?', [$hari, $hari]);
                    })
                    ->where('tipe_asuransis.id', $jenis_asuransi)
                    ->where('wilayahs.id', $wilayah)
                    ->where('tipe_perjalanans.id', $tipe_perjalan)
                    ->select(
                        'harga_pakets.id',
                        'harga_pakets.price',
                        'harga_pakets.extra_price',
                        'harga_pakets.product_name',
                        'harga_pakets.cetak_polis',
                        'wilayahs.id as wilayah_id',
                        'wilayahs.name as wilayah',
                        'paket_asuransis.nama_paket',
                        'paket_asuransis.id  as paket_asuransi_id',
                        'tipe_asuransis.name as tipe_asuransi',
                        'tipe_asuransis.id as tipe_asuransi_id',
                        'harga_pakets.duration',
                        'tipe_perjalanans.name as tipe_perjalanan',
                        'tipe_perjalanans.id as tipe_perjalanan_id'
                    )
                    ->get();
            } else {
                $paket_asuransi = HargaPaket::join('wilayahs', 'wilayahs.id', '=', 'harga_pakets.destination_id')
                    ->join('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
                    ->join('tipe_asuransis', 'tipe_asuransis.id', '=', 'harga_pakets.insuranceType_id')
                    ->join('tipe_perjalanans', 'tipe_perjalanans.id', '=', 'harga_pakets.tipePerjalanan_id')
                    ->whereJsonContains('custAge_id', ["3"])
                    ->where(function ($query) use ($hari) {
                        $query->whereRaw('JSON_EXTRACT(duration, "$[0]") <= ? AND JSON_EXTRACT(duration, "$[1]") >= ?', [$hari, $hari]);
                    })
                    ->where('tipe_asuransis.id', $jenis_asuransi)
                    ->where('wilayahs.id', $wilayah)
                    ->where('tipe_perjalanans.id', $tipe_perjalan)
                    ->select(
                        'harga_pakets.id',
                        'harga_pakets.price',
                        'harga_pakets.extra_price',
                        'harga_pakets.product_name',
                        'wilayahs.name as wilayah',
                        'paket_asuransis.nama_paket',
                        'tipe_asuransis.name as tipe_asuransi',
                        'harga_pakets.duration'
                    )
                    ->get();
            }
        } else {
            if ($lansia == 0) {
                $jenisAsuransi = TipeAsuransi::where('id', $jenis_asuransi)->first();
                $tipePerjalanan = TipePerjalanan::where('id', $tipe_perjalan)->first();
                $jenisWilayah = Wilayah::where('id', $wilayah)->first();
                $paketAsuransi = HargaPaket::whereJsonContains('custAge_id', ["1"])
                    ->rightJoin('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
                    ->where('harga_pakets.insuranceType_id', $jenis_asuransi)
                    ->where('harga_pakets.destination_id', $wilayah)
                    ->where('harga_pakets.tipePerjalanan_id', $tipe_perjalan)
                    ->orderByRaw('JSON_EXTRACT(harga_pakets.duration, "$[1]") ASC')
                    ->selectRaw('harga_pakets.package_id, harga_pakets.id, harga_pakets.price, JSON_EXTRACT(harga_pakets.duration, "$[1]") as maxDuration,
                    harga_pakets.duration, harga_pakets.extra_price, harga_pakets.product_name, harga_pakets.cetak_polis, paket_asuransis.nama_paket, paket_asuransis.id as paket_id')
                    ->groupBy('package_id', 'maxDuration', 'price', 'id', 'duration', 'extra_price', 'product_name', 'cetak_polis', 'nama_paket', 'paket_id')
                    ->take(2)
                    ->get();

                $paket_asuransi = [];
                foreach ($paketAsuransi as $asuransi) {
                    $price = ((ceil(($hari - 31) / 7) * $asuransi->extra_price) + $asuransi->price);

                    array_push($paket_asuransi, array(
                        "id" => $asuransi->id,
                        "price" => $price,
                        "extra_price" => $asuransi->extra_price,
                        "product_name" => $asuransi->product_name,
                        "cetak_polis" => $asuransi->cetak_polis,
                        "wilayah_id" => $jenisWilayah->id,
                        "wilayah" => $jenisWilayah->name,
                        "nama_paket" => $asuransi->nama_paket,
                        "paket_asuransi_id" => $asuransi->paket_id,
                        "tipe_asuransi" => $jenisAsuransi->name,
                        "tipe_asuransi_id" => $jenisAsuransi->id,
                        "duration" => array("32", number_format($hari, 0)),
                        "tipe_perjalanan" => $tipePerjalanan->name,
                        "tipe_perjalanan_id" => $tipePerjalanan->id
                    ));
                }
            } else {
                $jenisAsuransi = TipeAsuransi::where('id', $jenis_asuransi)->first();
                $tipePerjalanan = TipePerjalanan::where('id', $tipe_perjalan)->first();
                $jenisWilayah = Wilayah::where('id', $wilayah)->first();
                $paketAsuransi = HargaPaket::whereJsonContains('custAge_id', ["3"])
                    ->rightJoin('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
                    ->where('harga_pakets.insuranceType_id', $jenis_asuransi)
                    ->where('harga_pakets.destination_id', $wilayah)
                    ->where('harga_pakets.tipePerjalanan_id', $tipe_perjalan)
                    ->orderByRaw('JSON_EXTRACT(harga_pakets.duration, "$[1]") ASC')
                    ->selectRaw('harga_pakets.package_id, harga_pakets.id, harga_pakets.price, JSON_EXTRACT(harga_pakets.duration, "$[1]") as maxDuration,
                    harga_pakets.duration, harga_pakets.extra_price, harga_pakets.product_name, harga_pakets.cetak_polis, paket_asuransis.nama_paket, paket_asuransis.id as paket_id')
                    ->groupBy('package_id', 'maxDuration', 'price', 'id', 'duration', 'extra_price', 'product_name', 'cetak_polis', 'nama_paket', 'paket_id')
                    ->take(2)
                    ->get();

                $paket_asuransi = [];
                foreach ($paketAsuransi as $asuransi) {
                    $price = ((ceil(($hari - 31) / 7) * $asuransi->extra_price) + $asuransi->price);

                    array_push($paket_asuransi, array(
                        "id" => $asuransi->id,
                        "price" => $price,
                        "extra_price" => $asuransi->extra_price,
                        "product_name" => $asuransi->product_name,
                        "cetak_polis" => $asuransi->cetak_polis,
                        "wilayah_id" => $jenisWilayah->id,
                        "wilayah" => $jenisWilayah->name,
                        "nama_paket" => $asuransi->nama_paket,
                        "paket_asuransi_id" => $asuransi->paket_id,
                        "tipe_asuransi" => $jenisAsuransi->name,
                        "tipe_asuransi_id" => $jenisAsuransi->id,
                        "duration" => array("32", number_format($hari, 0)),
                        "tipe_perjalanan" => $tipePerjalanan->name,
                        "tipe_perjalanan_id" => $tipePerjalanan->id
                    ));
                }
            }
        }

        $manfaat = ManfaatPaket::all();
        $detail_manfaat = DetailManfaat::rightJoin('opsi_manfaats', 'opsi_manfaats.id', '=', 'detail_manfaats.benefitOption')
            ->whereJsonContains('detail_manfaats.destionation_id', ["$wilayah"])
            ->select(
                'detail_manfaats.*',
                'opsi_manfaats.name as opsi_manfaat',
                'opsi_manfaats.benefits_id'
            )->get();

        return response()->json([
            'paket_asuransi' => $paket_asuransi,
            'manfaat' => $manfaat,
            'detail_manfaat' => $detail_manfaat,
        ]);
    }

    //admin


    public function index_admin()
    {
        $paket_asuransi = HargaPaket::rightJoin('wilayahs', 'wilayahs.id', '=', 'harga_pakets.destination_id')
            ->rightJoin('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
            ->rightJoin('tipe_asuransis', 'tipe_asuransis.id', '=', 'harga_pakets.insuranceType_id')
            ->Join('tipe_perjalanans', 'tipe_perjalanans.id', '=', 'harga_pakets.tipePerjalanan_id')
            ->select(
                'harga_pakets.id',
                'harga_pakets.price',
                'harga_pakets.extra_price',
                'harga_pakets.product_name',
                'harga_pakets.cetak_polis',
                'wilayahs.id as wilayah_id',
                'wilayahs.name as wilayah',
                'paket_asuransis.nama_paket',
                'paket_asuransis.id  as paket_asuransi_id',
                'tipe_asuransis.name as tipe_asuransi',
                'tipe_asuransis.id as tipe_asuransi_id',
                'harga_pakets.duration',
                'tipe_perjalanans.name as tipe_perjalanan',
                'tipe_perjalanans.id as tipe_perjalanan_id'
            )
            ->get();
        return view('admin.pages.data_paket_asuransi.index', [
            'paket_asuransi' => $paket_asuransi
        ]);
    }

    public function create()
    {
        $wilayah = Wilayah::where('status', 'active')->get();
        $tipe_asuransi = TipeAsuransi::all();
        $tipe_pelanggan = TipePelanggan::all();
        $tipe_perjalanan = TipePerjalanan::all();
        $paket_asuransi = PaketAsuransi::all();
        return view('admin.pages.data_paket_asuransi.create', [
            'wilayah' => $wilayah,
            'tipe_asuransi' => $tipe_asuransi,
            'tipe_pelanggan' => $tipe_pelanggan,
            'tipe_perjalanan' => $tipe_perjalanan,
            'paket_asuransi' => $paket_asuransi
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'package_id' => 'required',
            'tipe_asuransi' => 'required',
            'wilayah' => 'required',
            'tipe_perjalanan' => 'required',
            'tipePelanggan_id' => 'required',
            'durasi_min' => 'required',
            'durasi_maks' => 'required',
            'cetak_polis' => 'required',
            'extra_price' => 'required',
            'premi' => 'required',
        ]);

        if ($request->tipe_asuransi != 0 && $request->wilayah != 0 && $request->tipe_perjalanan != 0 && $request->package_id != 0) {

            $arrName = [];

            $durasi = json_encode([$request->durasi_min, $request->durasi_maks]);
            $custAge = json_encode($request->tipePelanggan_id);

            $tambahProduk = new HargaPaket();
            $tambahProduk->destination_id = $request->wilayah;
            $tambahProduk->insuranceType_id = $request->tipe_asuransi;
            $tambahProduk->package_id = $request->package_id;
            $tambahProduk->tipePerjalanan_id = $request->tipe_perjalanan;
            $tambahProduk->duration = $durasi;
            $tambahProduk->cetak_polis = $request->cetak_polis;
            $tambahProduk->extra_price = $request->extra_price;
            $tambahProduk->price = $request->premi;
            $tambahProduk->product_name = $request->product_name;
            $tambahProduk->custAge_id = $custAge;
            if (!$tambahProduk->save()) {
                if (count($arrName) > 1) {
                    foreach ($arrName as $path) {
                        unlink(public_path() . $path);
                    }
                }
            }
            return redirect()->route('kelola.data_produk.index')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $paket_asuransi = HargaPaket::rightJoin('wilayahs', 'wilayahs.id', '=', 'harga_pakets.destination_id')
            ->rightJoin('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
            ->rightJoin('tipe_asuransis', 'tipe_asuransis.id', '=', 'harga_pakets.insuranceType_id')
            ->Join('tipe_perjalanans', 'tipe_perjalanans.id', '=', 'harga_pakets.tipePerjalanan_id')
            ->where('harga_pakets.id', $id)
            ->select(
                'harga_pakets.id',
                'harga_pakets.price',
                'harga_pakets.extra_price',
                'harga_pakets.product_name',
                'harga_pakets.cetak_polis',
                'wilayahs.id as wilayah_id',
                'wilayahs.name as wilayah',
                'paket_asuransis.nama_paket',
                'paket_asuransis.id  as paket_asuransi_id',
                'tipe_asuransis.name as tipe_asuransi',
                'tipe_asuransis.id as tipe_asuransi_id',
                'harga_pakets.duration',
                'tipe_perjalanans.name as tipe_perjalanan',
                'tipe_perjalanans.id as tipe_perjalanan_id',
                'harga_pakets.custAge_id'
            )
            ->first();

        $arrAge = json_decode($paket_asuransi->custAge_id, true);

        $tipe_pelanggan = TipePelanggan::whereIn('id', $arrAge)->get();

        return view('admin.pages.data_paket_asuransi.show', [
            'paket_asuransi' => $paket_asuransi,
            'tipe_pelanggan' => $tipe_pelanggan
        ]);
    }

    public function edit($id)
    {
        $asuransi = HargaPaket::rightJoin('wilayahs', 'wilayahs.id', '=', 'harga_pakets.destination_id')
            ->rightJoin('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
            ->rightJoin('tipe_asuransis', 'tipe_asuransis.id', '=', 'harga_pakets.insuranceType_id')
            ->Join('tipe_perjalanans', 'tipe_perjalanans.id', '=', 'harga_pakets.tipePerjalanan_id')
            ->where('harga_pakets.id', $id)
            ->select(
                'harga_pakets.*',
                'wilayahs.id as wilayah_id',
                'wilayahs.name as wilayah',
                'paket_asuransis.nama_paket',
                'paket_asuransis.id  as paket_asuransi_id',
                'tipe_asuransis.name as tipe_asuransi',
                'tipe_asuransis.id as tipe_asuransi_id',
                'tipe_perjalanans.name as tipe_perjalanan',
                'tipe_perjalanans.id as tipe_perjalanan_id',
            )
            ->first();

        $wilayah = Wilayah::where('status', 'active')->get();
        $tipe_asuransi = TipeAsuransi::all();
        $tipe_pelanggan = TipePelanggan::all();
        $tipe_perjalanan = TipePerjalanan::all();
        $paket_asuransi = PaketAsuransi::all();

        return view('admin.pages.data_paket_asuransi.edit', [
            'wilayah' => $wilayah,
            'tipe_asuransi' => $tipe_asuransi,
            'tipe_pelanggan' => $tipe_pelanggan,
            'tipe_perjalanan' => $tipe_perjalanan,
            'paket_asuransi' => $paket_asuransi,
            'asuransi' => $asuransi
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'tipePelanggan_id' => 'required',
            'durasi_min' => 'required',
            'durasi_maks' => 'required',
            'cetak_polis' => 'required',
            'extra_price' => 'required',
            'premi' => 'required',
        ]);

        $asuransi = HargaPaket::find($id);
        $durasi = json_encode([$request->durasi_min, $request->durasi_maks]);
        $custAge = json_encode($request->tipePelanggan_id);
        if ($request->tipe_asuransi != null) {
            $asuransi->update([
                'insuranceType_id' => $request->tipe_asuransi,
            ]);
        }
        if ($request->wilayah != null) {
            $asuransi->update([
                'destination_id' => $request->wilayah,
            ]);
        }
        if ($request->tipe_perjalanan != null) {
            $asuransi->update([
                'tipePerjalanan_id' => $request->tipe_perjalanan,
            ]);
        }
        if ($request->package_id != null) {
            $asuransi->update([
                'package_id' => $request->package_id,
            ]);
        }
        $asuransi->update([
            'duration' => $durasi,
            'cetak_polis' => $request->cetak_polis,
            'extra_price' => $request->extra_price,
            'price' => $request->premi,
            'product_name' => $request->product_name,
            'custAge_id' => $custAge,
        ]);

        return redirect()->route('kelola.data_produk.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $asuransi = HargaPaket::findOrFail($id);
        $asuransi->delete();

        return redirect()->route('kelola.data_produk.index')->with('success', 'Data berhasil dihapus.');
    }
}
