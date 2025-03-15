<?php

namespace App\Http\Controllers;

use App\Models\DetailCustomer;
use App\Models\HargaPaket;
use App\Models\KodePromo;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DetailCustomerController extends Controller
{
    public function index(Request $request)
    {
        $tglKeberangkatan = $request->berangkat;
        $tglKepulangan = $request->pulang;
        $anak = $request->anak;
        $dewasa = $request->dewasa;
        $lansia = $request->lansia;
        $paket_asuransi = json_decode($request->paket);
        $paket_asuransi = (array) $paket_asuransi;
        $promo = KodePromo::where('kode_promo', $request->kodePromo)->first();
        array_push($paket_asuransi, array(
            "tanggal_keberangkatan" => $tglKeberangkatan,
            "tanggal_kepulangan" => $tglKepulangan,
            "anak" => $anak,
            "dewasa" => $dewasa,
            "lansia" => $lansia
        ));

        return view('frontend.pages.formpenumpang', [
            'paket_asuransi' => $paket_asuransi,
            'promo' => $promo,
        ]);
    }

   public function kirim_pesanan_asuransi(Request $request)
    {
        $arrName1 = [];
        $arrName2 = [];
        $arrDuration = [$request->tanggal_keberangkatan, $request->tanggal_kepulangan];
        $duration = json_encode($arrDuration, true);
        $arrJlhPelanggan = [$request->anak, $request->dewasa, $request->lansia];
        $jumlah_customer = json_encode($arrJlhPelanggan, true);
        $jlhPelanggan = $request->anak + $request->dewasa + $request->lansia;

        if($jlhPelanggan == 0){
            return redirect()->back()->with('error', "Data pelanggan masih kosong!");
        }


        for ($i = 1; $i <= $jlhPelanggan; $i++) {
            $validator = Validator::make($request->all(), [
                "namal_$i" => 'required',
                "gender_$i" => 'required',
                "tanggal_lahir_$i" => 'required',
                "tempat_lahir_$i" => 'required',
                "no_passport_$i" => 'required',
                "no_telepon_$i" => 'required',
                "pekerjaan_1" => 'required',
                "alamat_1" => 'required',
                "kota_1" => 'required',
                "kode_pos_1" => 'required',
                "email_1" => 'required',
                "file_passport_$i" => 'required'
            ]);
        }

        if ($validator->fails()) {
            $errorMessages[] = "Data Masih Belum Lengkap!";
            Session::flash('error', implode('\n', $errorMessages));
            return redirect()->back()->withInput($request->all());

        } else {
            //tambah pesanan
            $tambahpesanan = new Pesanan();
            $tambahpesanan->total_price = $request->total_premi;
            $tambahpesanan->durasi_perjalan = $duration;
            $tambahpesanan->jumlah_customer = $jumlah_customer;
            $tambahpesanan->tipe_perjalanan = $request->tipe_perjalanan;
            $tambahpesanan->product_name = $request->product_name;
            $tambahpesanan->paket_asuransi = $request->paket_asuransi;
            $tambahpesanan->tipe_asuransi = $request->tipe_asuransi;
            $tambahpesanan->wilayah = $request->wilayah;
            $tambahpesanan->premi = $request->premi;
            $tambahpesanan->materai = $request->cetak_polis;
            $tambahpesanan->potongan_promo = $request->promo;
            $tambahpesanan->kode_promo = $request->kode_promo;
            if (!$tambahpesanan->save()) {
                if (count($arrName1) > 1) {
                    foreach ($arrName1 as $path) {
                        unlink(public_path() . $path);
                    }
                }
            }

            $pesanan_terbaru = Pesanan::latest()->first();

            //tambah pelanggan
            for ($i = 1; $i <= $jlhPelanggan; $i++) {
                $tambahDetailCustomer = new DetailCustomer();
                $tambahDetailCustomer->pesanan_id = $pesanan_terbaru->id;
                $tambahDetailCustomer->fullname = $request->input("namal_$i");
                $tambahDetailCustomer->gender = $request->input("gender_$i");
                $tambahDetailCustomer->date_of_birth = $request->input("tanggal_lahir_$i");
                $tambahDetailCustomer->place_of_birth = $request->input("tempat_lahir_$i");
                $tambahDetailCustomer->no_passport = $request->input("no_passport_$i");
                $tambahDetailCustomer->pekerjaan = $request->input("pekerjaan_$i");
                $tambahDetailCustomer->home_address = $request->input("alamat_$i");
                $tambahDetailCustomer->kota = $request->input("kota_$i");
                $tambahDetailCustomer->post_code = $request->input("kode_pos_$i");
                $tambahDetailCustomer->email = $request->input("email_$i");
                $tambahDetailCustomer->phone_number = $request->input("no_telepon_$i");
                if ($i == 1) {
                    $tambahDetailCustomer->is_polish = true;
                } else {
                    $tambahDetailCustomer->is_polish = false;
                }

                if ($request->file('file_ktp_' . $i)) {
                    if ($request->hasfile('file_ktp_' . $i)) {
                        $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file_ktp_' . $i)->getClientOriginalName());
                        $request->file('file_ktp_' . $i)->move(public_path('ktp-images'), $filename);
                        $tambahDetailCustomer->url_photoId = $filename;
                    }
                }

                if ($request->file('file_passport_' . $i)) {
                    if ($request->hasfile('file_passport_' . $i)) {
                        $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('file_passport_' . $i)->getClientOriginalName());
                        $request->file('file_passport_' . $i)->move(public_path('passport-images'), $filename);
                        $tambahDetailCustomer->url_photoPassport = $filename;
                    }
                }


                if (!$tambahDetailCustomer->save()) {
                    if (count($arrName2) > 1) {
                        foreach ($arrName2 as $path) {
                            unlink(public_path() . $path);
                        }
                    }
                }
            }

            return redirect()->route("frontend.pages.halamanterakhir")->with('success', 'Data Berhasil Di Tambahkan');
        }
    }

    public function response_pesanan()
    {
        return view('frontend.pages.halamanterakhir');
    }



    public function download_single(){
        $filePath = public_path('file-download/Brosur_TravelPro_Single_Trip.pdf');
        $fileName = 'Brosur_TravelPro _Single_Trip.pdf';

        return response()->download($filePath, $fileName);
    }

    public function download_annual(){
        $filePath = public_path('file-download/Brosur_TravelPro_Annual_Trip.pdf');
        $fileName = 'Brosur_TravelPro _Annual_Trip.pdf';

        return response()->download($filePath, $fileName);
    }

    public function download_religi(){
        $filePath = public_path('file-download/Brosur_TravelPro_Religi.pdf');
        $fileName = 'Brosur_TravelPro _Religi.pdf';

        return response()->download($filePath, $fileName);
    }
}
