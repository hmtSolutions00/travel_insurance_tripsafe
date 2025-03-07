@extends('admin.layouts.admin')

@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Ubah Data Produk Asuransi </h3>
            <ol class="breadcrumb">
                @foreach ($breadcrumb as $item)
                    @if ($item['route'])
                        <li class="breadcrumb-item"><a href="{{ $item['route'] }}">{{ $item['name'] }}</a></li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
                    @endif
                @endforeach
            </ol>
        </div>
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12 col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('kelola.data_produk.update', $asuransi->id) }}" method="post"
                                enctype="multipart/form-data" id="form-edit-produk">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Nama Produk</label>
                                        <input type="text" id="product_name" name="product_name"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="Contoh: Deluxe, dll" value="{{ $asuransi->product_name }}">
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Jenis Paket</label>
                                        <select name="package_id" id="package_id" class="form-control form-control-lg">
                                            <option value="{{ $asuransi->package_id }}" selected disabled>
                                                {{ $asuransi->nama_paket }}</option>
                                            @foreach ($paket_asuransi as $pkt)
                                                <option value="{{ $pkt->id }}">{{ $pkt->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Jenis Asuransi</label>
                                        <select name="tipe_asuransi" id="tipe_asuransi"
                                            class="form-control form-control-lg">
                                            <option value="{{ $asuransi->insuranceType_id }}" selected disabled>
                                                {{ $asuransi->tipe_asuransi }}</option>
                                            @foreach ($tipe_asuransi as $tp)
                                                <option value="{{ $tp->id }}">{{ $tp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Wilayah Tujuan</label>
                                        <select name="wilayah" id="wilayah" class="form-control form-control-lg">
                                            <option value="{{ $asuransi->destination_id }}" selected disabled>
                                                {{ $asuransi->wilayah }}</option>
                                            @foreach ($wilayah as $wil)
                                                <option value="{{ $wil->id }}">{{ $wil->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Tipe Perjalanan</label>
                                        <select name="tipe_perjalanan" id="tipe_perjalanan"
                                            class="form-control form-control-lg">
                                            <option value="{{ $asuransi->tipePerjalanan_id }}" selected disabled>
                                                {{ $asuransi->tipe_perjalanan }}</option>
                                            @foreach ($tipe_perjalanan as $tiPer)
                                                <option value="{{ $tiPer->id }}">{{ $tiPer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-5">
                                        <label for="name" class="mb-2">Tipe Pelanggan</label>
                                        <div class="form-check-label d-flex flex-wrap">
                                            @php
                                                $arrPelanggan = json_decode($asuransi->custAge_id, true);
                                            @endphp
                                            @foreach ($tipe_pelanggan as $tiPel)
                                                <div class="form-check me-2 mt-3">
                                                    <label class="form-check-label"
                                                        for="tipePelanggan_{{ $tiPel->id }}">{{ $tiPel->name }}<i
                                                            class="input-helper"></i>
                                                        <input type="checkbox" class="form-check-input "
                                                            name="tipePelanggan_id[]" value="{{ $tiPel->id }}"
                                                            id="tiPelanggan_{{ $tiPel->id }}"
                                                            {{ in_array($tiPel->id, $arrPelanggan) ? 'checked' : '' }}></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @php
                                        $arrDuration = json_decode($asuransi->duration, true);
                                    @endphp
                                    @if ($asuransi->tipePerjalanan_id != 2)
                                        <div class="col-12 col-lg-4 mb-3">
                                            <label for="name" class="mb-2">Durasi Minimal Perjalanan</label>
                                            <input type="number" name="durasi_min" id="durasi_min"
                                                placeholder="Minimal 1 & Maksimal 31" class="form-control form-control-lg"
                                                min="1" max="31" value="{{ $arrDuration[0] }}">
                                        </div>
                                        <div class="col-12 col-lg-4 mb-3">
                                            <label for="name" class="mb-2">Durasi Maksimal Perjalanan</label>
                                            <input type="number" name="durasi_maks" id="durasi_maks"
                                                placeholder="Minimal 1 & Maksimal 31" class="form-control form-control-lg"
                                                min="1" max="31" value="{{ $arrDuration[1] }}">
                                        </div>
                                        <div class="col-12 col-lg-4 mb-3">
                                            <label for="name" class="mb-2">Harga Tambahan per Minggu (IDR)</label>
                                            <input type="number" name="extra_price" id="extra_price"
                                                placeholder="Contoh: 50000" class="form-control form-control-lg"
                                                min="0" value="{{ $asuransi->extra_price }}">
                                        </div>
                                    @endif

                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Harga E-Polis dan Materai (IDR)</label>
                                        <input type="number" name="cetak_polis" id="cetak_polis"
                                            placeholder="Contoh: 10000" class="form-control form-control-lg"
                                            min="0" value="{{ $asuransi->cetak_polis }}">
                                    </div>
                                    <div class="col-12 col-lg-4 mb-5">
                                        <label for="name" class="mb-2">Premi (IDR)</label>
                                        <input type="number" name="premi" id="premi" placeholder="Contoh: 50000"
                                            class="form-control form-control-lg" min="0"
                                            value="{{ $asuransi->price }}">
                                    </div>


                                    </label>
                                    <div class="col-12 col-lg-12 mb-3">
                                        <button type="submit" class="btn btn-primary me-3">Ubah Data</button>
                                        <a href="{{ route('admin.paket_asuransi.index') }}"
                                            class="btn btn-light">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
