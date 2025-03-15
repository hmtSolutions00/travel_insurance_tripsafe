@extends('admin.layouts.admin')

@section('admin')
    <style>
        .nav-tabs .nav-link {
            border: solid 3px;
            border-color: gray;
            color: black;
            border-radius: 0;
        }

        .nav-tabs .nav-link.active {
            background-color: gray;
            color: white;
            border: solid 3px;
            border-color: gray;
        }
    </style>


    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Detail Data Pesanan Asuransi </h3>
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
                <div class="col-12 col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Informasi Asuransi</h4>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <small style="font-weight: bold">Tipe Perjalanan</small>
                                        </div>
                                        <div class="col-12 col-md-6" style="text-align: right">
                                            <small class="fw bold">{{ $pesanan->tipe_perjalanan }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <small style="font-weight: bold">Nama Produk</small>
                                        </div>
                                        <div class="col-12 col-md-6" style="text-align: right">
                                            <small class="fw bold">{{ $pesanan->product_name }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <small style="font-weight: bold">Nama Paket</small>
                                        </div>
                                        <div class="col-12 col-md-6" style="text-align: right">
                                            <small class="fw bold">{{ $pesanan->paket_asuransi }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <small style="font-weight: bold">Jenis Asuransi</small>
                                        </div>
                                        <div class="col-12 col-md-6" style="text-align: right">
                                            <small class="fw bold">{{ $pesanan->tipe_asuransi }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-2">
                                            <small style="font-weight: bold">Premi(IDR)</small>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2" style="text-align: right">
                                            <small class="fw bold">{{ $pesanan->premi }}</small>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <small style="font-weight: bold">Materai & E-Polis(IDR)</small>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2" style="text-align: right">
                                            <small class="fw bold">{{ $pesanan->materai }}</small>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <small style="font-weight: bold">Total Harga</small>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2" style="text-align: right">
                                            <small class="fw bold">{{ $pesanan->total_price }}</small>
                                        </div>
                                        @if ($pesanan->potongan_promo != null)
                                        <hr>
                                        <div class="col-12 col-md-12 mb-2" style="text-align: left">
                                            @if ($pesanan->kode_promo != null)
                                                <small style="font-weight: bold">Kode Promo : {{ $pesanan->kode_promo }}</small>
                                            @else
                                                <small style="font-weight: bold">Kode Promo : -</small>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-12 mb-2" style="text-align: left">
                                                <small class="fw bold">{{ $pesanan->potongan_promo }}</small>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $arrPelanggan = json_decode($pesanan->jumlah_customer);
                    $totalPelanggan = $arrPelanggan[0] + $arrPelanggan[1] + $arrPelanggan[2] + 1;
                    $arrDurasi = json_decode($pesanan->durasi_perjalan);
                @endphp
                <div class="col-12 col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Jumlah Pelanggan</h4>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <small style="font-weight: bold">Anak</small>
                                        </div>
                                        <div class="col-12 col-md-6" style="text-align: right">
                                            <small class="fw bold">{{ $arrPelanggan[0] }} orang</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <small style="font-weight: bold">Dewasa</small>
                                        </div>
                                        <div class="col-12 col-md-6" style="text-align: right">
                                            <small class="fw bold">{{ $arrPelanggan[1] }} orang</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <small style="font-weight: bold">Lansia</small>
                                        </div>
                                        <div class="col-12 col-md-6" style="text-align: right">
                                            <small class="fw bold">{{ $arrPelanggan[2] }} orang</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="card-title">Waktu Perjalanan</h4>
                                <div class="col-12 col-md-12">
                                    <div class="col-12 col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <small style="font-weight: bold">Tanggal Keberangkatan</small>
                                            </div>
                                            <div class="col-12 col-md-6" style="text-align: right">
                                                <small class="fw bold">{{ $arrDurasi[0] }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <small style="font-weight: bold">Tanggal Kepulangan</small>
                                            </div>
                                            <div class="col-12 col-md-6" style="text-align: right">
                                                <small class="fw bold">{{ $arrDurasi[0] }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 mb-3">
                    <ul class="nav nav-tabs d-flex justify-content-center border-0 cust-tab mb-4" id="myTab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-pelanggan-1" data-bs-toggle="tab"
                                data-bs-target="#pelanggan-1-tab" type="button" role="tab"
                                aria-controls="pelanggan-1-tab" aria-selected="true">Pelanggan 1</button>
                        </li>
                        @for ($i = 2; $i < $totalPelanggan; $i++)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-tahunan" data-bs-toggle="tab"
                                    data-bs-target="#pelanggan-{{ $i }}-tab" type="button" role="tab"
                                    aria-controls="pelanggan-{{ $i }}-tab" aria-selected="false">Pelanggan
                                    {{ $i }}</button>
                            </li>
                        @endfor
                    </ul>

                </div>

                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="pelanggan-1-tab" role="tabpanel"
                        aria-labelledby="tab-pelanggan-1" tabindex="0">
                        <div class="row">
                            <div class="col-12 col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <h4 class="mb-3">Informasi Pelanggan 1 -Pemegang Polis</h4>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">Nama Lengkap</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="fullname" id="fullname"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->fullname }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">Jenis Kelamin</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="place_of_birth"
                                                                    id="place_of_birth"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->gender }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">Tempat Lahir</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="place_of_birth"
                                                                    id="place_of_birth"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->place_of_birth }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">Tanggal Lahir</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="date_of_birth"
                                                                    id="date_of_birth"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->date_of_birth }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">No. Passport</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="no_passport" id="no_passport"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->no_passport }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">Pekerjaan</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="pekerjaan" id="pekerjaan"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->pekerjaan }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">Email</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="email" id="email"
                                                                    class="form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->email }}">
                                                                <div class="pelanggan input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">No. Telepon</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="phone_number"
                                                                    id="phone_number"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->phone_number }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">Kode Pos</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="post_code" id="post_code"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->post_code }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-12 col-lg-12 mb-2">-->
                                            <!--    <div class="row">-->
                                            <!--        <div class="col-6 col-lg-6">-->
                                            <!--            <small style="font-weight: bold">Provinsi</small>-->
                                            <!--        </div>-->
                                            <!--        <div class="col-6 col-lg-6" style="text-align:right">-->
                                            <!--            <div class="form-group">-->
                                            <!--                <div class="input-group">-->
                                            <!--                    <input type="text" name="province" id="province"-->
                                            <!--                        class="pelanggan form-control form-control-sm" readonly-->
                                            <!--                        value="{{ $detail_polis->province }}">-->
                                            <!--                    <div class="input-group-append">-->
                                            <!--                        <button class="btn btn-sm text-dark"-->
                                            <!--                            onclick="copyText(this)"-->
                                            <!--                            style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">-->
                                            <!--                            <i class="fa fa-copy fa-2xs"></i>-->
                                            <!--                        </button>-->
                                            <!--                    </div>-->
                                            <!--                </div>-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-lg-6">
                                                        <small style="font-weight: bold">Kota</small>
                                                    </div>
                                                    <div class="col-6 col-lg-6" style="text-align:right">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="kota" id="kota"
                                                                    class="pelanggan form-control form-control-sm" readonly
                                                                    value="{{ $detail_polis->kota }}">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyText(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mb-2">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 mb-3">
                                                        <small style="font-weight: bold">Alamat Lengkap</small>
                                                    </div>
                                                    <div class="col-12 col-lg-12">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <textarea class="form-control form-control-md" name="home_address" id="home_address" readonly>{{ $detail_polis->home_address }}</textarea>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-sm text-dark"
                                                                        onclick="copyTextArea(this)"
                                                                        style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                        <i class="fa fa-copy fa-2xs"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 mb-3 text-center">
                                                <h4>Gambar Foto KTP</h4>
                                            </div>
                                            @if ($detail_polis->url_photoId != null)
                                                <div class="col-12 col-lg-12 mb-5 text-center">
                                                    <img src="/ktp-images/{{ $detail_polis->url_photoId }}"
                                                        alt="Brand Logo" title="Brand Logo"
                                                        class="col-10 col-lg-11 img-fluid">
                                                </div>
                                            @else
                                                <div class="col-12 col-lg-12 mb-5 text-center">
                                                    <span class="mdi mdi-smart-card-off-outline"
                                                        style="font-size: 1500%"></span>

                                                </div>
                                            @endif
                                            <hr class="fs-2 mb-5">
                                            <div class="col-12 col-lg-12 mb-3 text-center">
                                                <h4>Gambar Foto Passport</h4>
                                            </div>
                                            <div class="col-12 col-lg-12 text-center">
                                                <img src="/passport-images/{{ $detail_polis->url_photoPassport }}"
                                                    alt="Brand Logo" title="Brand Logo"
                                                    class="col-10 col-lg-11 img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @for ($i = 2; $i < $totalPelanggan; $i++)
                        @php
                            $j = 0;
                        @endphp
                        <div class="tab-pane fade" id="pelanggan-{{ $i }}-tab" role="tabpanel"
                            aria-labelledby="tab-pelanggan-{{ $i }}" tabindex="0">
                            <div class="row">
                                <div class="col-12 col-lg-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h4 class="mb-3">Informasi Pelanggan {{ $i }}</h4>
                                                <div class="col-12 col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-6 col-lg-6">
                                                            <small style="font-weight: bold">Nama Lengkap</small>
                                                        </div>
                                                        <div class="col-6 col-lg-6" style="text-align:right">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" name="fullname" id="fullname"
                                                                        class="pelanggan form-control form-control-sm"
                                                                        readonly
                                                                        value="{{ $detail_customer[$j]->fullname }}">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-sm text-dark"
                                                                            onclick="copyText(this)"
                                                                            style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                            <i class="fa fa-copy fa-2xs"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-6 col-lg-6">
                                                            <small style="font-weight: bold">Jenis Kelamin</small>
                                                        </div>
                                                        <div class="col-6 col-lg-6" style="text-align:right">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" name="place_of_birth"
                                                                        id="place_of_birth"
                                                                        class="pelanggan form-control form-control-sm"
                                                                        readonly
                                                                        value="{{ $detail_customer[$j]->gender }}">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-sm text-dark"
                                                                            onclick="copyText(this)"
                                                                            style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                            <i class="fa fa-copy fa-2xs"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-6 col-lg-6">
                                                            <small style="font-weight: bold">Tempat Lahir</small>
                                                        </div>
                                                        <div class="col-6 col-lg-6" style="text-align:right">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" name="date_of_birth"
                                                                        id="date_of_birth"
                                                                        class="pelanggan form-control form-control-sm"
                                                                        readonly
                                                                        value="{{ $detail_customer[$j]->place_of_birth }}">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-sm text-dark"
                                                                            onclick="copyText(this)"
                                                                            style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                            <i class="fa fa-copy fa-2xs"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-6 col-lg-6">
                                                            <small style="font-weight: bold">Tanggal Lahir</small>
                                                        </div>
                                                        <div class="col-6 col-lg-6" style="text-align:right">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" name="date_of_birth"
                                                                        id="date_of_birth"
                                                                        class="pelanggan form-control form-control-sm"
                                                                        readonly
                                                                        value="{{ $detail_customer[$j]->date_of_birth }}">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-sm text-dark"
                                                                            onclick="copyText(this)"
                                                                            style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                            <i class="fa fa-copy fa-2xs"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-6 col-lg-6">
                                                            <small style="font-weight: bold">No. Passport</small>
                                                        </div>
                                                        <div class="col-6 col-lg-6" style="text-align:right">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" name="no_passport"
                                                                        id="no_passport"
                                                                        class="pelanggan form-control form-control-sm"
                                                                        readonly
                                                                        value="{{ $detail_customer[$j]->no_passport }}">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-sm text-dark"
                                                                            onclick="copyText(this)"
                                                                            style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                            <i class="fa fa-copy fa-2xs"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-6 col-lg-6">
                                                            <small style="font-weight: bold">No. Telepon</small>
                                                        </div>
                                                        <div class="col-6 col-lg-6" style="text-align:right">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" name="phone_number"
                                                                        id="phone_number"
                                                                        class="pelanggan form-control form-control-sm"
                                                                        readonly
                                                                        value="{{ $detail_customer[$j]->phone_number }}">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-sm text-dark"
                                                                            onclick="copyText(this)"
                                                                            style="border: solid 1px; border-color: #e4e9f0;border-left:transparent">
                                                                            <i class="fa fa-copy fa-2xs"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 mb-3 text-center">
                                                    <h4>Gambar Foto KTP</h4>
                                                </div>
                                                @if ($detail_customer[$j]->url_photoId != null)
                                                    <div class="col-12 col-lg-12 mb-5 text-center">
                                                        <img src="/ktp-images/{{ $detail_customer[$j]->url_photoId }}"
                                                            alt="Brand Logo" title="Brand Logo"
                                                            class="col-10 col-lg-11 img-fluid">
                                                    </div>
                                                @else
                                                    <div class="col-12 col-lg-12 mb-5 text-center">
                                                        <span class="mdi mdi-smart-card-off-outline"
                                                            style="font-size: 1500%"></span>

                                                    </div>
                                                @endif

                                                <hr class="fs-2 mb-5">
                                                <div class="col-12 col-lg-12 mb-3 text-center">
                                                    <h4>Gambar Foto Passport</h4>
                                                </div>
                                                <div class="col-12 col-lg-12 text-center">
                                                    <img src="/passport-images/{{ $detail_customer[$j]->url_photoPassport }}"
                                                        alt="Brand Logo" title="Brand Logo"
                                                        class="col-10 col-lg-11 img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $j++;
                        @endphp
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyText(button) {
            var inputField = $(button).closest('.input-group').find('input');
            var copyText = inputField.val();
            navigator.clipboard.writeText(copyText).then(function() {
                alert("Teks telah dicopy!");
            });
        }

        function copyTextArea(button) {
            var textarea = $(button).closest('.input-group').find('textarea');
            var copyText = textarea.val();
            navigator.clipboard.writeText(copyText).then(function() {
                alert("Teks telah dicopy!");
            });
        }
    </script>
@endsection
