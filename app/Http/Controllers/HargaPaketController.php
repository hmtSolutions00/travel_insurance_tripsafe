<?php

namespace App\Http\Controllers;

use App\Models\HargaPaket;
use App\Models\PaketAsuransi;
use App\Models\TipeAsuransi;
use App\Models\TipePerjalanan;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaPaketController extends Controller
{
    //pemesanan asuransi
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
                    ->whereJsonContains('custAge_id', [1])
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
                    ->whereJsonContains('custAge_id', [3])
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
                $paketAsuransi = HargaPaket::whereJsonContains('custAge_id', [1])
                    ->rightJoin('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
                    ->where('harga_pakets.insuranceType_id', $jenis_asuransi)
                    ->where('harga_pakets.destination_id', $wilayah)
                    ->where('harga_pakets.tipePerjalanan_id', $tipe_perjalan)
                    ->orderByRaw('JSON_EXTRACT(harga_pakets.duration, "$[1]") ASC')
                    ->selectRaw('harga_pakets.package_id, harga_pakets.id, harga_pakets.price, JSON_EXTRACT(harga_pakets.duration, "$[1]") as maxDuration,
                    harga_pakets.duration, harga_pakets.extra_price, harga_pakets.product_name, harga_pakets.cetak_polis, paket_asuransis.nama_paket, paket_asuransis.id as paket_id')
                    ->groupBy('package_id','maxDuration', 'price', 'id', 'duration', 'extra_price', 'product_name', 'cetak_polis', 'nama_paket', 'paket_id')
                    ->take(2)
                    ->get();

                $paket_asuransi = [];
                foreach($paketAsuransi as $asuransi){
                    $price = ((ceil(($hari - 31)/7) * $asuransi->extra_price) + $asuransi->price );

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
            }else{
                $jenisAsuransi = TipeAsuransi::where('id', $jenis_asuransi)->first();
                $tipePerjalanan = TipePerjalanan::where('id', $tipe_perjalan)->first();
                $jenisWilayah = Wilayah::where('id', $wilayah)->first();
                $paketAsuransi = HargaPaket::whereJsonContains('custAge_id', [3])
                    ->rightJoin('paket_asuransis', 'paket_asuransis.id', '=', 'harga_pakets.package_id')
                    ->where('harga_pakets.insuranceType_id', $jenis_asuransi)
                    ->where('harga_pakets.destination_id', $wilayah)
                    ->where('harga_pakets.tipePerjalanan_id', $tipe_perjalan)
                    ->orderByRaw('JSON_EXTRACT(harga_pakets.duration, "$[1]") ASC')
                    ->selectRaw('harga_pakets.package_id, harga_pakets.id, harga_pakets.price, JSON_EXTRACT(harga_pakets.duration, "$[1]") as maxDuration,
                    harga_pakets.duration, harga_pakets.extra_price, harga_pakets.product_name, harga_pakets.cetak_polis, paket_asuransis.nama_paket, paket_asuransis.id as paket_id')
                    ->groupBy('package_id','maxDuration', 'price', 'id', 'duration', 'extra_price', 'product_name', 'cetak_polis', 'nama_paket', 'paket_id')
                    ->take(2)
                    ->get();

                $paket_asuransi = [];
                foreach($paketAsuransi as $asuransi){
                    $price = ((ceil(($hari - 31)/7) * $asuransi->extra_price) + $asuransi->price );

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
        return response()->json($paket_asuransi);
    }
}
