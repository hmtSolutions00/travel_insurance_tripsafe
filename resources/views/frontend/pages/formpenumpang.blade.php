@extends('frontend.layout.layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .input-asuransi {
            background-color: transparent;
            border-color: transparent;
            text-align: right;
            color: black;
        }

    </style>

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Tidak Berhasil',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            });
        </script>
    @endif


    <div class="container">

        <form action="/tambah/pesanan/asuransi" method="post" id="form-pesanan-asuransi" enctype="multipart/form-data">
            @csrf
            <div class="row  mt-0">
                <div class="col-12 col-lg-5 mb-2 text-center position-relative">
                    <div class="row g-3">
                      <div class="col-12 col-lg-12 text-center bg-white position-relative mb-3 flex-grow-1" style="border-radius: 12px">

                            <div class="m-4">
                                <div class="row">
                                    <div class="col-12 col-lg-12 mb-2" style="text-align: left">
                                        <h5>Informasi Asuransi</h5>
                                    </div>

                                    <hr>

                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Tipe Perjalan</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $paket_asuransi['tipe_perjalanan'] }}"
                                            class="input-asuransi" id="tipe_perjalanan" name="tipe_perjalanan">

                                    </div>

                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Nama Produk</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $paket_asuransi['product_name'] }}"
                                            class="input-asuransi" id="product_name" name="product_name">
                                    </div>

                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Nama Paket</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $paket_asuransi['nama_paket'] }}"
                                            class="input-asuransi" id="paket_asuransi" name="paket_asuransi">
                                    </div>

                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Jenis Asuransi</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $paket_asuransi['tipe_asuransi'] }}"
                                            class="input-asuransi" id="tipe_asuransi" name="tipe_asuransi">
                                    </div>
                                    <div class="col-12 col-lg-12 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Wilayah Tujuan : </small>
                                    </div>
                                    <div class="col-12 col-lg-12 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $paket_asuransi['wilayah'] }}"
                                            class="col-12" id="wilayah" name="wilayah"
                                            style="background-color: transparent;border-color: transparent;">
                                    </div>
                                    @php
                                        $berangkat = strtotime($paket_asuransi[0]['tanggal_keberangkatan']);
                                        $tglBerangkat = date('d F Y', $berangkat);
                                        $pulang = strtotime($paket_asuransi[0]['tanggal_kepulangan']);
                                        $tglPulang = date('d F Y', $pulang);
                                    @endphp
                                    <hr>
                                    <div class="col-12 col-lg-12 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Durasi Perjalanan : </small>
                                    </div>
                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Keberangkatan</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $tglBerangkat }}" class="input-asuransi"
                                            id="tanggal_keberangkatan" name="tanggal_keberangkatan">
                                    </div>

                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Kepulangan</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-3" style="text-align: right">
                                        <input type="text" readonly value="{{ $tglPulang }}" class="input-asuransi"
                                            id="tanggal_kepulangan" name="tanggal_kepulangan">
                                    </div>

                                    <hr>

                                    <div class="col-12 col-lg-12 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Jumlah Pelanggan : </small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Anak</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $paket_asuransi[0]['anak'] }}"
                                            class="input-asuransi" id="anak" name="anak" style="width: 50px;">
                                        orang
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Dewasa</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $paket_asuransi[0]['dewasa'] }}"
                                            class="input-asuransi" id="dewasa" name="dewasa" style="width: 50px;">
                                        orang
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Lansia</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-3" style="text-align: right">

                                        <input type="text" readonly value="{{ $paket_asuransi[0]['lansia'] }}"
                                            class="input-asuransi" id="lansia" name="lansia" style="width: 50px;">
                                        orang
                                    </div>
                                    <hr>

                                    <div class="col-12 col-lg-12 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Harga Total : </small>
                                    </div>

                                    @php
                                        if($promo != null){
                                            $kodePromo = $promo->kode_promo;
                                        }else{
                                            $kodePromo = "";
                                        }
                                        $nilaiPremi = $paket_asuransi['price'];
                                        $nilaiCetakPolis = $paket_asuransi['cetak_polis'];
                                        $premi = number_format($nilaiPremi, 0, ',', '.');
                                        $cetakPolis = number_format($nilaiCetakPolis, 0, ',', '.');
                                        $nilaiTotal = $nilaiPremi + $nilaiCetakPolis;
                                        $total = number_format($nilaiTotal, 0, ',', '.');

                                    @endphp

                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Premi (IDR)</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $premi }}"
                                            class="input-asuransi" id="premi" name="premi">
                                    </div>

                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Materai(IDR)</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-1" style="text-align: right; align-content: center;">
                                        <input type="text" readonly value="{{ $cetakPolis }}"
                                            class="input-asuransi" id="cetak_polis" name="cetak_polis">
                                    </div>
                                    <div class="col-4 col-lg-4 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Total Harga (IDR)</small>
                                    </div>
                                    <div class="col-8 col-lg-8 mb-1" style="text-align: right">
                                        <input type="text" readonly value="{{ $total }}"
                                            class="input-asuransi" id="total_premi" name="total_premi">
                                    </div>
                                    @if($promo != null)
                                    <div class="col-12 col-lg-12 mb-1" style="text-align: left">
                                        <small class="title-pelanggan fw-bold">Kode Promo : {{ $promo->kode_promo }}</small>
                                    </div>
                                    @endif
                                    <div class="col-12 col-lg-12 mb-2" style="text-align: left">
                                        @if($promo != null)
                                        <textarea name="promo" id="promo" class="form-control" readonly style="background-color: transparent; border-color: transparent;font-size:14px">{{ $promo->detail }} dari {{ $promo->nama_promo }}</textarea>
                                        @else
                                        <input type="hidden" readonly value=""
                                        class="input-asuransi" id="promo" name="promo">
                                        @endif
                                        <input type="hidden" readonly value="{{ $kodePromo  }}"
                                        class="input-asuransi" id="kode_promo" name="kode_promo">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-lg-7 mb-5 text-center">
                    <div class="row g-3">
                      <div class="col-12 col-lg-12 text-center bg-white position-relative mb-3 h-100 d-flex flex-grow-1" style="border-radius: 12px">

                            <div class="m-4">
                                @php
                                    $jlhPelanggan =
                                        $paket_asuransi[0]['anak'] +
                                        $paket_asuransi[0]['dewasa'] +
                                        $paket_asuransi[0]['lansia'];
                                @endphp
                                <ul class="nav nav-tabs d-flex justify-content-center border-0 cust-tab" id="myTab"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-penumpang active fw-bold" id="tab-penumpang-1"
                                            data-bs-toggle="tab" data-bs-target="#penumpang-1-tab" type="button"
                                            role="tab" aria-controls="penumpang-1-tab" aria-selected="true">Pelanggan
                                            1</button>
                                    </li>
                                    @for ($i = 2; $i <= $jlhPelanggan; $i++)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-penumpang fw-bold" id="tab-penumpang-{{ $i }}"
                                                data-bs-toggle="tab" data-bs-target="#penumpang-{{ $i }}-tab"
                                                type="button" role="tab"
                                                aria-controls="penumpang-{{ $i }}-tab"
                                                aria-selected="false">Pelanggan {{ $i }}</button>
                                        </li>
                                    @endfor
                                </ul>
                                <input type="hidden" id="totalAnDesLan" value="{{ $jlhPelanggan }}" disabled>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="penumpang-1-tab" role="tabpanel"
                                        aria-labelledby="tab-penumpang-1" tabindex="0">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                <h5>Informasi Pelanggan - Pemegang Polis</h5>
                                                <input type="hidden" id="indeksTab" value="1" disabled>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="namal_1">Nama
                                                    Lengkap
                                                    sesuai KTP</small>
                                                <input type="text" name="namal_1" id="namal_1"
                                                    class="form-control form-control-sm" value="{{ old('namal_1') }}"
                                                    required>
                                            </div>

                                            <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="gender_1">Jenis
                                                    Kelamin</small>
                                                <select class="form-control form-control-sm" name="gender_1"
                                                    id="gender_1" required>
                                                    <option value="0" selected disabled>Pilih Jenis Kelamin
                                                    </option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="col-12 col-lg-5 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="email_1">Email</small>
                                                <input type="text" name="email_1" id="email_1"
                                                    class="form-control form-control-sm" value="{{ old('email_1') }}"
                                                    required>
                                            </div>

                                            <div class="col-12 col-lg-7 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="tempat_lahir_1">Tempat
                                                    Lahir</small>
                                                <input type="text" name="tempat_lahir_1" id="tempat_lahir_1"
                                                    class="form-control form-control-sm" required
                                                    value="{{ old('tempat_lahir_1') }}">
                                            </div>

                                            <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="tanggal_lahir_1">Tanggal
                                                    Lahir</small>
                                                <input type="date" name="tanggal_lahir_1" id="tanggal_lahir_1"
                                                    class="form-control form-control-sm" required
                                                    value="{{ old('tanggal_lahir_1') }}">
                                            </div>

                                            <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="no_passport_1">No.
                                                    Passport</small>
                                                <input type="text" name="no_passport_1" id="no_passport_1"
                                                    class="form-control form-control-sm" required
                                                    value="{{ old('no_passport_1') }}">
                                            </div>

                                            <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="no_telepon_1">No.
                                                    Telepon</small>
                                                <input type="text" name="no_telepon_1" id="no_telepon_1"
                                                    class="form-control form-control-sm" required
                                                    value="{{ old('no_telepon_1') }}">
                                            </div>

                                            <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold"
                                                    for="pekerjaan_1">Pekerjaan</small>
                                               <select class="form-control form-control-sm" name="pekerjaan_1"
                                                    id="pekerjaan_1" required>
                                                    <option value="0" selected disabled>Pilih Pekerjaan
                                                    </option>
                                                    <option value="Wirausaha">Wirausaha</option>
                                                    <option value="Karyawan">Karyawan</option>
                                                </select>
                                            </div>

                                            <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="kode_pos_1">Kode
                                                    Pos</small>
                                                <input type="text" name="kode_pos_1" id="kode_pos_1"
                                                    class="form-control form-control-sm" required
                                                    value="{{ old('kode_pos_1') }}">
                                            </div>
                                            <div class="col-12 col-lg-5 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="alamat_1">Kota</small>
                                                <input type="text" name="kota_1" id="kota_1"
                                                    class="form-control form-control-sm" required
                                                    value="{{ old('kota_1') }}">
                                            </div>

                                            <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="alamat_1">Alamat</small>
                                                <textarea name="alamat_1" id="alamat_1" class="form-control form-control-sm">{{ old('alamat_1') }}</textarea>
                                            </div>

                                            <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="file_ktp_1">Foto
                                                    KTP</small>
                                                <input type="file" name="file_ktp_1" id="file_ktp_1"
                                                    class="form-control form-control-sm">
                                            </div>

                                            <div class="col-12 col-lg-4 mb-4" style="text-align: left">
                                                <small class="form-check-label mb-5 fw-bold" for="file_passport_1">Foto
                                                    Passport</small>
                                                <input type="file" name="file_passport_1" id="file_passport_1"
                                                    class="form-control form-control-sm" required>
                                            </div>
                                            <hr>
                                            @if ($jlhPelanggan != 1)
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12" style="text-align: right">
                                                            <button class="btn btn-primary btn-md" type="button"
                                                                id="btnNext" onclick="funcNext(this)"> Selanjutnya
                                                                ></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 text-center position-relative mb-2">
                                                        <small style="font-style: italic"><i
                                                                class="fa-solid fa-triangle-exclamation text-warning"></i>
                                                            Pastikan
                                                            informasi pelanggan yang dimasukkan telah sesuai sebelum
                                                            melanjutkan!</small>
                                                    </div>

                                                    <div class="col-12 position-relative text-center">
                                                        <button class="btn text-white fw-bold" type="button"
                                                            onclick="SendConfirmation1(this)"
                                                            style="background-color: #0393D2">Kirimkan
                                                            Penawaran</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @for ($i = 2; $i <= $jlhPelanggan; $i++)
                                        <div class="tab-pane fade" id="penumpang-{{ $i }}-tab"
                                            role="tabpanel" aria-labelledby="tab-penumpang-{{ $i }}"
                                            tabindex="0">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <h5>Informasi Pelanggan - {{ $i }}</h5>
                                                    <input type="hidden" id="indeksTab" value="{{ $i }}"
                                                        disabled>
                                                </div>

                                                <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="namal_{{ $i }}">Nama
                                                        Lengkap
                                                        sesuai KTP</small>
                                                    <input type="text" name="namal_{{ $i }}"
                                                        id="namal_{{ $i }}"
                                                        class="form-control form-control-sm" required
                                                        value="{{ old('namal_' . $i) }}">
                                                </div>

                                                <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="gender_{{ $i }}">Jenis
                                                        Kelamin</small>
                                                    <select class="form-control form-control-sm"
                                                        name="gender_{{ $i }}"
                                                        id="gender_{{ $i }}" required>
                                                        <option value="0" selected disabled>Pilih Jenis Kelamin
                                                        </option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="tempat_lahir_{{ $i }}">Tempat
                                                        Lahir</small>
                                                    <input type="text" name="tempat_lahir_{{ $i }}"
                                                        id="tempat_lahir_{{ $i }}"
                                                        class="form-control form-control-sm" required
                                                        value="{{ old('tempat_lahir_' . $i) }}">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="tanggal_lahir_{{ $i }}">Tanggal
                                                        Lahir</small>
                                                    <input type="date" name="tanggal_lahir_{{ $i }}"
                                                        id="tanggal_lahir_{{ $i }}"
                                                        class="form-control form-control-sm" required
                                                        value="{{ old('tanggal_lahir_' . $i) }}">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="no_passport_{{ $i }}">No.
                                                        Passport</small>
                                                    <input type="text" name="no_passport_{{ $i }}"
                                                        id="no_passport_{{ $i }}s"
                                                        class="form-control form-control-sm" required
                                                        value="{{ old('no_passport_' . $i) }}">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="no_telepon_{{ $i }}">No.
                                                        Telepon</small>
                                                    <input type="text" name="no_telepon_{{ $i }}"
                                                        id="no_telepon_{{ $i }}"
                                                        class="form-control form-control-sm" required
                                                        value="{{ old('no_telepon_' . $i) }}">
                                                </div>

                                                <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="file_ktp_{{ $i }}">Foto
                                                        KTP</small>
                                                    <input type="file" name="file_ktp_{{ $i }}"
                                                        id="file_ktp_{{ $i }}"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-4 mb-5" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="file_passport_{{ $i }}">Foto
                                                        Passport</small>
                                                    <input type="file" name="file_passport_{{ $i }}"
                                                        id="file_passport_{{ $i }}"
                                                        class="form-control form-control-sm" required>
                                                </div>
                                                <hr>
                                                <div class="col-12">
                                                    @if ($i != $jlhPelanggan)
                                                        <div class="row">
                                                            <div class="col-6" style="text-align: left">
                                                                <button class="btn btn-secondary btn-md" type="button"
                                                                    id="btnNext" onclick="funcPrev(this)">
                                                                    < Kembali</button>
                                                            </div>
                                                            <div class="col-6" style="text-align: right">
                                                                <button class="btn btn-primary btn-md" type="button"
                                                                    id="btnNext" onclick="funcNext(this)"> Selanjutnya
                                                                    ></button>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="row">
                                                            <div
                                                                class="col-12 col-lg-12 text-center position-relative mb-2">
                                                                <small style="font-style: italic"><i
                                                                        class="fa-solid fa-triangle-exclamation text-warning"></i>
                                                                    Pastikan
                                                                    informasi pelanggan yang dimasukkan telah sesuai sebelum
                                                                    melanjutkan!</small>
                                                            </div>
                                                            <div class="col-6" style="text-align: left">
                                                                <button class="btn btn-secondary btn-md" type="button"
                                                                    id="btnNext" onclick="funcPrev(this)">
                                                                    < Kembali</button>
                                                            </div>
                                                            <div class="col-6 position-relative"
                                                                style="text-align: right">
                                                                <button class="btn text-white fw-bold" type="button"
                                                                    onclick="SendConfirmation1(this)"
                                                                    style="background-color: #0393D2">Kirimkan
                                                                    Penawaran</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
    <script>
        function funcNext(button) {
            var indeksTab = $(button).closest('.fade').find('#indeksTab').val();
            var pelanggan = document.getElementById('totalAnDesLan');
            var btnNext = document.getElementById('btnNext');
            var indeksNext = parseInt(indeksTab) + 1;
            var tab = document.getElementById('tab-penumpang-' + indeksNext);
            tab.click();
        }

        function funcPrev(button) {
            var indeksTab = $(button).closest('.fade').find('#indeksTab').val();
            var pelanggan = document.getElementById('totalAnDesLan');
            var btnNext = document.getElementById('btnNext');
            var indeksPrev = parseInt(indeksTab) - 1;
            var tab = document.getElementById('tab-penumpang-' + indeksPrev);
            tab.click();
        }

        function SendConfirmation1(button) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengirimkan paket penawaran asuransi ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-pesanan-asuransi').submit();
                }
            });
        }
    </script>
@endsection
