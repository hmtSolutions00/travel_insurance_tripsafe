<?php

namespace App\Http\Controllers;

use App\Models\DetailCustomer;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::orderBy('id', 'desc')->get();


        return view('admin.pages.data_pesanan.index', [
            'pesanan' => $pesanan
        ]);
    }

    public function show($id)
    {
        $pesanan = Pesanan::find($id);

        $detail_polis = DetailCustomer::where('pesanan_id', $pesanan->id)->where('is_polish', true)->first();

        $detail_customer = DetailCustomer::where('pesanan_id', $pesanan->id)->where('id', '!=', $detail_polis->id)->get();

        return view('admin.pages.data_pesanan.detail', [
            'pesanan' => $pesanan,
            'detail_customer' => $detail_customer,
            'detail_polis' => $detail_polis
        ]);
    }

    public function u_belum_diproses($id)
    {
        $pesanan = Pesanan::find($id);

        $pesanan->update([
            'status' => 1
        ]);
        return redirect()->route('admin.data.pesanan_asuransi.index')->with('success', 'Status Berhasil Diubah.');
    }

    public function u_sudah_diproses($id)
    {
        $pesanan = Pesanan::find($id);

        $pesanan->update([
            'status' => 2
        ]);
        return redirect()->route('admin.data.pesanan_asuransi.index')->with('success', 'Status Berhasil Diubah.');
    }

    public function u_butuh_konfirmasi($id)
    {
        $pesanan = Pesanan::find($id);

        $pesanan->update([
            'status' => 3
        ]);
        return redirect()->route('admin.data.pesanan_asuransi.index')->with('success', 'Status Berhasil Diubah.');
    }

    public function u_tidak_valid($id)
    {
        $pesanan = Pesanan::find($id);

        $pesanan->update([
            'status' => 4
        ]);
        return redirect()->route('admin.data.pesanan_asuransi.index')->with('success', 'Status Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $detail_customer = DetailCustomer::where('pesanan_id', $id)->get();

        foreach($detail_customer as $customer){
            if ($customer->url_photoId) {
                $fileId = public_path('ktp-images/' . $customer->url_photoId);

                // Cek apakah file benar-benar ada sebelum menghapusnya
                if (file_exists($fileId)) {
                    unlink($fileId);
                }
            }
            if ($customer->url_photoPassport) {
                $filePass = public_path('passport-images/' . $customer->url_photoPassport);

                // Cek apakah file benar-benar ada sebelum menghapusnya
                if (file_exists($filePass)) {
                    unlink($filePass);
                }
            }

            $customer->delete();
        }

        // Hapus data dari database
        $pesanan->delete();

        return redirect()->route('admin.data.pesanan_asuransi.index')->with('success', 'Status Berhasil Diubah.');
    }
}
