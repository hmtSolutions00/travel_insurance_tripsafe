@extends('admin.layouts.admin')

@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Detail Produk Asuransi </h3>
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
                            <form action="{{ route('kelola.data_produk.store') }}" method="post"
                                enctype="multipart/form-data" id="form-tambah-produk">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Nama Produk</label>
                                        <input type="text" id="product_name" name="product_name"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="Contoh: Deluxe, dll" value="{{ $paket_asuransi->product_name }}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Jenis Paket</label>
                                        <input type="text" name="cetak_polis" id="cetak_polis"
                                            placeholder="Contoh: 10000" class="form-control form-control-lg" min="0"
                                            value="{{ $paket_asuransi->nama_paket}}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Jenis Asuransi</label>
                                        <input type="text" name="cetak_polis" id="cetak_polis"
                                            placeholder="Contoh: 10000" class="form-control form-control-lg" min="0"
                                            value="{{ $paket_asuransi->tipe_asuransi}}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Wilayah Tujuan</label>
                                        <input type="text" name="cetak_polis" id="cetak_polis"
                                            placeholder="Contoh: 10000" class="form-control form-control-lg" min="0"
                                            value="{{ $paket_asuransi->wilayah}}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Tipe Perjalanan</label>
                                        <input type="text" name="cetak_polis" id="cetak_polis"
                                            placeholder="Contoh: 10000" class="form-control form-control-lg" min="0"
                                            value="{{ $paket_asuransi->tipe_perjalanan}}" readonly>
                                    </div>
                                    @php
                                        $arrDuration = json_decode($paket_asuransi->duration, true);
                                    @endphp
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Durasi Minimal Perjalanan</label>
                                        <input type="number" name="durasi_min" id="durasi_min"
                                            placeholder="Minimal 1 & Maksimal 31" class="form-control form-control-lg"
                                            min="1" max="31" value="{{ $arrDuration[0] }}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Durasi Maksimal Perjalanan</label>
                                        <input type="number" name="durasi_maks" id="durasi_maks"
                                            placeholder="Minimal 1 & Maksimal 31" class="form-control form-control-lg"
                                            min="1" max="31" value="{{ $arrDuration[1] }}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Harga E-Polis dan Materai (IDR)</label>
                                        <input type="number" name="cetak_polis" id="cetak_polis"
                                            placeholder="Contoh: 10000" class="form-control form-control-lg" min="0"
                                            value="{{ $paket_asuransi->cetak_polis}}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Harga Tambahan per Minggu (IDR)</label>
                                        <input type="number" name="extra_price" id="extra_price"
                                            placeholder="Contoh: 50000" class="form-control form-control-lg" min="0"
                                            value="{{ $paket_asuransi->extra_price}}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-5">
                                        <label for="name" class="mb-2">Premi (IDR)</label>
                                        <input type="number" name="premi" id="premi" placeholder="Contoh: 50000"
                                            class="form-control form-control-lg" min="0" value="{{ $paket_asuransi->price}}" readonly>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-5">
                                        <label for="name" class="mb-2">Tipe Pelanggan</label>
                                        <div class="form-check-label d-flex flex-wrap">
                                            @php
                                                $arrAge = json_decode($paket_asuransi->custAge_id, true);
                                            @endphp
                                            @foreach ($tipe_pelanggan as $tiPel)
                                                <div class="form-check me-2 mt-3">
                                                    <label class="form-check-label"
                                                        for="tipePelanggan_{{ $tiPel->id }}">{{ $tiPel->name}}<i
                                                            class="input-helper"></i>
                                                        <input disabled type="checkbox" class="form-check-input "
                                                            name="tipePelanggan_id[]" value="{{ $tiPel->name }}"
                                                            id="tiPelanggan_{{ $tiPel->id }}"
                                                            {{ in_array($tiPel->id, $arrAge) ? 'checked' : '' }}></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    </label>
                                    <div class="col-12 col-lg-12 mb-3">
                                        <a href="{{ route('kelola.data_produk.index') }}"
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
