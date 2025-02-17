@extends('frontend.layout.layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">

    <div class="search-engine">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center position-relative">
                    <h5 class="display-3 fw-bold theme-text-shadow" style="color: #FDC500">
                        TRAVEL INSURANCE
                    </h5>
                    <h2 class="display-3 fw-bold mb-4 theme-text-shadow" style="color: #FDC500">
                        TRAVELPRO ALLIANZ
                    </h2>
                </div>
            </div>
            <div class="row  mt-0">
                <div class="col-12 col-lg-4 mb-2 text-center position-relative">
                    <div class="row m-1">
                        <div class="col-12 col-lg-12 text-center bg-white position-relative mb-3" style="border-radius: 12px">
                            <div class="m-4">
                                <div class="row">
                                    <div class="col-12 col-lg-12 mb-2" style="text-align: left">
                                        <h5>Informasi Asuransi</h5>
                                    </div>

                                    <hr>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Tipe Perjalan</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>Sekali Perjalanan</small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Nama Produk</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>Travel Pro</small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Nama Paket</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>Deluxe</small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Jenis Asuransi</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>Individual</small>
                                    </div>


                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Wilayah Tujuan</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>Greater Asia</small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Tanggal Keberangkatan</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>18 Februari 2025</small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Tanggal Kepulangan</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-3" style="text-align: right">
                                        <small>01 Maret 2025</small>
                                    </div>

                                    <hr>

                                    <div class="col-12 col-lg-12 mb-1" style="text-align: left">
                                        <small class="fw-bold">Jumlah Pelanggan : </small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Anak</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>0 orang</small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Dewasa</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>1 orang</small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Lansia</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-3" style="text-align: right">
                                        <small>0 orang</small>
                                    </div>

                                    <hr>

                                    <div class="col-12 col-lg-12 mb-1" style="text-align: left">
                                        <small class="fw-bold">Harga Total : </small>
                                    </div>

                                    <div class="col-6 col-lg-6 mb-1" style="text-align: left">
                                        <small class="fw-bold">Premi (IDR)</small>
                                    </div>
                                    <div class="col-6 col-lg-6 mb-1" style="text-align: right">
                                        <small>279.000</small>
                                    </div>

                                    <div class="col-8 col-lg-8 mb-1" style="text-align: left">
                                        <small class="fw-bold">Cetak Polis & Materai (IDR)</small>
                                    </div>
                                    <div class="col-4 col-lg-4 mb-1" style="text-align: right">
                                        <small>10.000</small>
                                    </div>

                                    <div class="col-8 col-lg-8 mb-1" style="text-align: left">
                                        <small class="fw-bold">Total Harga (IDR)</small>
                                    </div>
                                    <div class="col-4 col-lg-4 mb-1" style="text-align: right">
                                        <small>289.000</small>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 mb-5 text-center position-relative">
                    <div class="row">
                        <div class="col-12 col-lg-12 text-center bg-white position-relative mb-3" style="border-radius: 12px">
                            <div class="m-4">
                                <ul class="nav nav-tabs d-flex justify-content-center border-0 cust-tab" id="myTab"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-penumpang active fw-bold" id="tab-penumpang-1"
                                            data-bs-toggle="tab" data-bs-target="#penumpang-1-tab" type="button"
                                            role="tab" aria-controls="penumpang-1-tab" aria-selected="true">Pelanggan
                                            1</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-penumpang fw-bold" id="tab-penumpang-2" data-bs-toggle="tab"
                                            data-bs-target="#penumpang-2-tab" type="button" role="tab"
                                            aria-controls="penumpang-2-tab" aria-selected="false">Pelanggan 2</button>
                                    </li>
                                </ul>
                                <form action="#" method="post" id="form-sekali-perjalan">
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="penumpang-1-tab" role="tabpanel"
                                            aria-labelledby="tab-penumpang-1" tabindex="0">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <h5>Informasi Pelanggan - Pemegang Polis</h5>
                                                </div>

                                                <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="namal_1">Nama Lengkap
                                                        sesuai KTP</small>
                                                    <input type="text" name="namal_1" id="namal_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="gender_1">Jenis
                                                        Kelamin</small>
                                                    <select class="form-control form-control-sm" name="gender_1"
                                                        id="gender_1">
                                                        <option value="0" selected disabled>Pilih Jenis Kelamin
                                                        </option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="email_1">Email</small>
                                                    <input type="text" name="email_1" id="email_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="tempat_lahir_1">Tempat
                                                        Lahir</small>
                                                    <input type="text" name="tempat_lahir_1" id="tempat_lahir_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="tamggal_lahir_1">Tamggal
                                                        Lahir</small>
                                                    <input type="date" name="tanggal_lahir_1" id="tanggal_lahir_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="no_passport_1">No.
                                                        Passport</small>
                                                    <input type="text" name="no_passport_1" id="no_passport_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="no_telepon_1">No.
                                                        Telepon</small>
                                                    <input type="text" name="no_telepon_1" id="no_telepon_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="pekerjaan_1">Pekerjaan</small>
                                                    <input type="text" name="pekerjaan_1" id="pekerjaan_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="kode_pos_1">Kode
                                                        Pos</small>
                                                    <input type="text" name="kode_pos_1" id="kode_pos_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="alamat_1">Kota</small>
                                                    <input type="text" name="alamat_1" id="alamat_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="alamat_1">Alamat</small>
                                                    <textarea name="alamat_1" id="alamat_1" class="form-control form-control-sm"></textarea>
                                                </div>

                                                <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="file_ktp_1">Foto
                                                        KTP</small>
                                                    <input type="file" name="file_ktp_1" id="file_ktp_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="file_passport_1">Foto
                                                        Passport</small>
                                                    <input type="file" name="file_passport_1" id="file_passport_1"
                                                        class="form-control form-control-sm">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="penumpang-2-tab" role="tabpanel"
                                            aria-labelledby="tab-penumpang-2" tabindex="0">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <h5>Informasi Pelanggan - 2</h5>
                                                </div>

                                                <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="namal_2">Nama
                                                        Lengkap
                                                        sesuai KTP</small>
                                                    <input type="text" name="namal_2" id="namal_2"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="gender_2">Jenis
                                                        Kelamin</small>
                                                    <select class="form-control form-control-sm" name="gender_2"
                                                        id="gender_2">
                                                        <option value="0" selected disabled>Pilih Jenis Kelamin
                                                        </option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="tempat_lahir_2">Tempat
                                                        Lahir</small>
                                                    <input type="text" name="tempat_lahir_2" id="tempat_lahir_2"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="tamggal_lahir_2">Tanggal
                                                        Lahir</small>
                                                    <input type="date" name="tanggal_lahir_2" id="tanggal_lahir_2"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="no_passport_2">No.
                                                        Passport</small>
                                                    <input type="text" name="no_passport_2" id="no_passport_2"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-3 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="no_telepon_2">No.
                                                        Telepon</small>
                                                    <input type="text" name="no_telepon_2" id="no_telepon_2"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="file_ktp_2">Foto
                                                        KTP</small>
                                                    <input type="file" name="file_ktp_2" id="file_ktp_2"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-12 col-lg-4 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="file_passport_2">Foto
                                                        Passport</small>
                                                    <input type="file" name="file_passport_2" id="file_passport_2"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 text-center bg-white position-relative" style="border-radius: 12px">
                            <div class="m-4">
                                <div class="row">
                                    <div class="col-8 col-lg-12 text-center position-relative mb-2">
                                        <small style="font-style: italic" ><i class="fa-solid fa-triangle-exclamation text-warning"></i> Pastikan informasi pelanggan yang dimasukkan telah sesuai sebelum melanjutkan!</small>
                                    </div>
                                    <div class="col-4 col-lg-12 text-center position-relative">
                                        <button class="btn text-white fw-bold" onclick="SendConfirmation(this)" style="background-color: #0393D2">Kirimkan Penawaran</button>
                                    </div>
                                    <script>
                                        function SendConfirmation(button) {
                                            // var kode = $(button).closest('.action').find('#id_car').val();
                                            Swal.fire({
                                                title: 'Konfirmasi',
                                                text: 'Apakah Anda yakin ingin mengirimkan paket penawaran asuransi ini?',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: 'Ya',
                                                cancelButtonText: 'Batal',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '/last';
                                                }
                                            });
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
