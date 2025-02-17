@extends('frontend.layout.layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">


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
            <!-- search engine tabs -->
            <div class="row  mt-0">
                <div class="col-12 col-lg-4 mb-5 text-center position-relative">
                    <div class="row">
                        <div class="col-12 col-lg-12 text-center bg-white position-relative" style="border-radius: 12px">
                            <div class="m-4">
                                <ul class="nav nav-tabs d-flex justify-content-center border-0 cust-tab" id="myTab"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="tab-sekali-perjalan" data-bs-toggle="tab"
                                            data-bs-target="#sekali-perjalanan-tab" type="button" role="tab"
                                            aria-controls="sekali-perjalanan-tab" aria-selected="true">Sekali
                                            Perjalanan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="tab-tahunan" data-bs-toggle="tab"
                                            data-bs-target="#tahunan-tab" type="button" role="tab"
                                            aria-controls="tahunan-tab" aria-selected="false">Tahunan</button>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3" id="myTabContent">
                                    <!-- sekali perjalanan tab -->
                                    <div class="tab-pane fade show active" id="sekali-perjalanan-tab" role="tabpanel"
                                        aria-labelledby="tab-sekali-perjalanan" tabindex="0">
                                        <form action="#" method="post" id="form-sekali-perjalan">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <input checked type="radio" id="pulang_pergi" name="pulang_pergi"
                                                        value="Pulang Pergi" class="text-dark form-check-input">
                                                    Pulang Pergi
                                                </div>
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold" for="jenis_Asuransi">Jenis
                                                        Asuransi</small>
                                                    <select class="form-control form-control-sm" name="jenis_asuransi"
                                                        id="jenis_asuransi">
                                                        <option value="0" selected disabled>Pilih Jenis Asuransi
                                                        </option>
                                                        <option value="asuransi1">Individual</option>
                                                        <option value="asuransi2">Couple</option>
                                                        <option value="asuransi3">Family</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="wilayah">Wilayah</small>
                                                    <select class="form-control form-control-sm" aria-label="Pilihan"
                                                        name="wilayah" id="wilayah">
                                                        <option value="0" selected disabled>Pilih Wilayah</option>
                                                        <option value="Wilayah1">Wilayah 1</option>
                                                        <option value="Wilayah2">Wilayah 2</option>
                                                        <option value="Wilayah3">Wilayah 3</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="tanggal_keberangkatan">Tanggal
                                                        Keberangkatan</small>
                                                    <input type="date" class="form-control form-control-sm"
                                                        id="tanggal_keberangkatan" name="tanggal_keberangkatan"
                                                        min="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                                <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="tanggal_kepulangan">Tanggal
                                                        Kepulangan</small>
                                                    <input type="date" class="form-control form-control-sm"
                                                        id="tanggal_kepulangan" name="tanggal_kepulangan"
                                                        min="<?php echo date('Y-m-d'); ?>">
                                                </div>

                                                <script>
                                                    const tanggalKeberangkatan = document.getElementById('tanggal_keberangkatan');
                                                    const tanggalKepulangan = document.getElementById('tanggal_kepulangan');

                                                    tanggalKeberangkatan.addEventListener('change', hitungJumlahHari);
                                                    tanggalKepulangan.addEventListener('change', hitungJumlahHari);

                                                    function hitungJumlahHari() {
                                                        const tanggalKeberangkatanValue = new Date(tanggalKeberangkatan.value);
                                                        const tanggalKepulanganValue = new Date(tanggalKepulangan.value);

                                                        if (tanggalKeberangkatanValue && tanggalKepulanganValue) {
                                                            const jumlahHariValue = Math.round((tanggalKepulanganValue - tanggalKeberangkatanValue) / (1000 * 3600 *
                                                                24)) + 1;

                                                            if (!document.getElementById('jumlah_hari')) {
                                                                const jumlahHariElement = document.createElement('div');
                                                                jumlahHariElement.id = 'jumlah_hari';
                                                                jumlahHariElement.className = 'col-12 col-lg-12 mb-3 mt-1';
                                                                jumlahHariElement.style.textAlign = 'left';
                                                                jumlahHariElement.innerHTML = `
                                                                <i class="fa-solid fa-clock fa-sm"></i>
                                                                <small class="form-check-label mb-1" style="font-style:italic">Total hari 0 hari</small>
                                                                `;

                                                                tanggalKeberangkatan.parentNode.appendChild(jumlahHariElement);
                                                            } else {
                                                                document.getElementById('jumlah_hari').querySelectorAll('small')[0].innerText =
                                                                    `Total hari ${jumlahHariValue} hari`;
                                                            }
                                                        }
                                                    }
                                                </script>

                                                <div class="col-6 col-lg-4 mb-3 text-center">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="anak">Anak</small>
                                                    <div class="input-group justify-content-center">
                                                        <button class="btn btn-outline-primary minus"
                                                            type="button">-</button>
                                                        <input type="text" class="form-control text-center"
                                                            id="anak" name="anak" value="0" readonly
                                                            style="max-width: 50px;">
                                                        <button class="btn btn-outline-primary plus"
                                                            type="button">+</button>
                                                    </div>
                                                    <small class="text-muted">&lt;18 tahun</small>
                                                </div>

                                                <div class="col-6 col-lg-4 mb-3 text-center">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="dewasa">Dewasa</small>
                                                    <div class="input-group justify-content-center">
                                                        <button class="btn btn-outline-primary minus"
                                                            type="button">-</button>
                                                        <input type="text" class="form-control text-center"
                                                            id="dewasa" name="dewasa" value="0" readonly
                                                            style="max-width: 50px;">
                                                        <button class="btn btn-outline-primary plus"
                                                            type="button">+</button>
                                                    </div>
                                                    <small class="text-muted">18-69 tahun</small>
                                                </div>

                                                <div class="col-6 col-lg-4 mb-5 text-center">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="lansia">Lansia</small>
                                                    <div class="input-group justify-content-center">
                                                        <button class="btn btn-outline-primary minus"
                                                            type="button">-</button>
                                                        <input type="text" class="form-control text-center"
                                                            id="lansia" name="lansia" value="0" readonly
                                                            style="max-width: 50px;">
                                                        <button class="btn btn-outline-primary plus"
                                                            type="button">+</button>
                                                    </div>
                                                    <small class="text-muted">70-84 tahun</small>
                                                </div>

                                                <div class="col-12 col-lg-12 mb-3 text-center">
                                                    <div class="col-12 d-grid">
                                                        <button type="button" class="w-100 btn text-white"
                                                            style="background-color: #0393D2"> BUAT PENAWARAN</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    <!-- tahunan tab -->
                                    <div class="tab-pane fade" id="tahunan-tab" role="tabpanel"
                                        aria-labelledby="tab-tahunan" tabindex="0">
                                        <form action="#" method="post" id="form-sekali-perjalan">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <input checked type="radio" id="pulang_pergi_t"
                                                        name="pulang_pergi_t" value="Pulang Pergi"
                                                        class="text-dark form-check-input">
                                                    Pulang Pergi
                                                </div>
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-5 fw-bold"
                                                        for="jenis_asuransi_t">Jenis
                                                        Asuransi</small>
                                                    <select class="form-control form-control-sm" name="jenis_asuransi_t"
                                                        id="jenis_asuransi_t">
                                                        <option value="0" selected disabled>Pilih Jenis Asuransi
                                                        </option>
                                                        <option value="asuransi1">Individual</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-12 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="wilayah_t">Wilayah</small>
                                                    <select class="form-control form-control-sm" aria-label="Pilihan"
                                                        name="wilayah_t" id="wilayah_t">
                                                        <option value="0" selected disabled>Pilih Wilayah</option>
                                                        <option value="Wilayah1">Wilayah 1</option>
                                                        <option value="Wilayah2">Wilayah 2</option>
                                                        <option value="Wilayah3">Wilayah 3</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="tanggal_keberangkatan_t">Tanggal
                                                        Keberangkatan</small>
                                                    <input type="date" class="form-control form-control-sm"
                                                        id="tanggal_keberangkatan_t" name="tanggal_keberangkatan_t"
                                                        min="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                                <div class="col-12 col-lg-6 mb-3" style="text-align: left">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="tanggal_kepulangan_t">Tanggal
                                                        Kepulangan</small>
                                                    <input type="date" class="form-control form-control-sm"
                                                        id="tanggal_kepulangan_t" name="tanggal_kepulangan_t"
                                                        min="<?php echo date('Y-m-d'); ?>">
                                                </div>

                                                <script>
                                                    const tanggalKeberangkatan_t = document.getElementById('tanggal_keberangkatan_t');
                                                    const tanggalKepulangan_t = document.getElementById('tanggal_kepulangan_t');

                                                    tanggalKeberangkatan_t.addEventListener('change', hitungJumlahHari_t);
                                                    tanggalKepulangan_t.addEventListener('change', hitungJumlahHari_t);

                                                    function hitungJumlahHari_t() {
                                                        const tanggalKeberangkatanValue_t = new Date(tanggalKeberangkatan_t.value);
                                                        const tanggalKepulanganValue_t = new Date(tanggalKepulangan_t.value);

                                                        if (tanggalKeberangkatanValue_t && tanggalKepulanganValue_t) {
                                                            const jumlahHariValue_t = Math.round((tanggalKepulanganValue_t - tanggalKeberangkatanValue_t) / (1000 *
                                                                3600 *
                                                                24)) + 1;

                                                            if (!document.getElementById('jumlah_hari_t')) {
                                                                const jumlahHariElement = document.createElement('div');
                                                                jumlahHariElement.id = 'jumlah_hari_t';
                                                                jumlahHariElement.className = 'col-12 col-lg-12 mb-3 mt-1';
                                                                jumlahHariElement.style.textAlign = 'left';
                                                                jumlahHariElement.innerHTML = `
                                                                <i class="fa-solid fa-clock fa-sm"></i>
                                                                <small class="form-check-label mb-1" style="font-style:italic">Total hari 0 hari</small>
                                                                `;

                                                                tanggalKeberangkatan_t.parentNode.appendChild(jumlahHariElement);
                                                            } else {
                                                                document.getElementById('jumlah_hari_t').querySelectorAll('small')[0].innerText =
                                                                    `Total hari ${jumlahHariValue_t} hari`;
                                                            }
                                                        }
                                                    }
                                                </script>

                                                <div class="col-6 col-lg-4 mb-3 text-center">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="anak_t">Anak</small>
                                                    <div class="input-group justify-content-center">
                                                        <button class="btn btn-outline-primary minus"
                                                            type="button">-</button>
                                                        <input type="text" class="form-control text-center"
                                                            id="anak_t" name="anak_t" value="0" readonly
                                                            style="max-width: 50px;">
                                                        <button class="btn btn-outline-primary plus"
                                                            type="button">+</button>
                                                    </div>
                                                    <small class="text-muted">&lt;18 tahun</small>
                                                </div>

                                                <div class="col-6 col-lg-4 mb-3 text-center">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="dewasa_t">Dewasa</small>
                                                    <div class="input-group justify-content-center">
                                                        <button class="btn btn-outline-primary minus"
                                                            type="button">-</button>
                                                        <input type="text" class="form-control text-center"
                                                            id="dewasa_t" name="dewasa_t" value="0" readonly
                                                            style="max-width: 50px;">
                                                        <button class="btn btn-outline-primary plus"
                                                            type="button">+</button>
                                                    </div>
                                                    <small class="text-muted">18-69 tahun</small>
                                                </div>

                                                <div class="col-6 col-lg-4 mb-5 text-center">
                                                    <small class="form-check-label mb-1 fw-bold"
                                                        for="lansia">Lansia</small>
                                                    <div class="input-group justify-content-center">
                                                        <button class="btn btn-outline-primary minus"
                                                            type="button">-</button>
                                                        <input type="text" class="form-control text-center"
                                                            id="lansia_t" name="lansia_t" value="0" readonly
                                                            style="max-width: 50px;">
                                                        <button class="btn btn-outline-primary plus"
                                                            type="button">+</button>
                                                    </div>
                                                    <small class="text-muted">70-84 tahun</small>
                                                </div>

                                                <div class="col-12 col-lg-12 mb-3 text-center">
                                                    <div class="col-12 d-grid">
                                                        <button type="button" class="w-100 btn text-white"
                                                            style="background-color: #0393D2"> BUAT PENAWARAN</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 mb-5 text-center position-relative">
                    <div class="col-12 col-lg-12 text-center bg-white position-relative h-100 d-flex"
                        style="border-radius: 12px;">
                        <div class="col-12 col-lg-12 p-4">
                            <div class="table-responsive">
                                <table class="col-12 col-lg-12 table datatables" id="table-asuransi">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">No</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Paket</th>
                                            <th scope="col">Premi</th>
                                            <th scope="col">Cetak Polis & Materai</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tr>
                                            <td>
                                                <button class="btn text-white fw-bold"
                                                    onclick="ContinueConfirmation(this)" style="background-color:#0393D2">
                                                    <small>Pilih</small></button>
                                            </td>
                                            <td style="place-content: center">1</td>
                                            <td style="place-content: center">Travel Pro</td>
                                            <td style="place-content: center">Deluxe</td>
                                            <td style="place-content: center">IDR 279.000</td>
                                            <td style="place-content: center">IDR 10.000</td>
                                            <script>
                                                function ContinueConfirmation(button) {
                                                    // var kode = $(button).closest('.action').find('#id_car').val();
                                                    Swal.fire({
                                                        title: 'Konfirmasi',
                                                        text: 'Apakah Anda yakin ingin memilih paket asuransi ini?',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Ya',
                                                        cancelButtonText: 'Batal',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href = '/data/penumpang';
                                                        }
                                                    });
                                                }
                                            </script>
                                            <td style="place-content: center; color: #0393D2;"><button class="btn"
                                                    data-bs-toggle="modal" data-bs-target="#modal-detail-asuransi"
                                                    style="background: transparent; border-color: transparent;">
                                                    <i class="fa-solid fa-circle-info fa-md text-secondary fs-5"></i>
                                                </button></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class="modal fade modal-xl" id="modal-detail-asuransi" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content p-3">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Asuransi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: left">
                                            <small>Berikut adalah detail benefit dari paket asuransi :</small>
                                            <table class="table table-bordered m-1">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="fw-bold"><small>A. Perlindungan Bagasi
                                                                dan Barang pribadi</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Kerugian Barang Bagasi Pribadi</small></td>
                                                        <td class="text-center"><small>Rp. 21.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Penundaan Bagasi</small></td>
                                                        <td class="text-center"><small>Rp 500.000,- / 4 jam, Maks Rp
                                                                3.500.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Kehilangan Dokumen dan Uang Pribadi</small></td>
                                                        <td class="text-center"><small>Rp 14.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Penyalahgunaan Kartu Kredit</small></td>
                                                        <td class="text-center"><small>Rp 15.000.000,-</small></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" class="fw-bold"><small>B. Pembatalan dan
                                                                Perubahan Perjalanan</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Pembatalan dan Perubahan Perjalanan – Termasuk
                                                                Pandemic</small></td>
                                                        <td class="text-center"><small>Rp 45.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Penundaan Perjalanan (Delay)</small></td>
                                                        <td class="text-center"><small>Rp 500.000,-/ 4 Jam, Maksimal Rp
                                                                3.500.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Kepulangan Lebih Awal karena Kedukaan</small></td>
                                                        <td class="text-center"><small>Rp 35.000.000,-</small></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" class="fw-bold"><small>C.Layanan
                                                                Darurat</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Evaluasi dan Repatriasi Medis Darurat</small></td>
                                                        <td class="text-center"><small>Biaya Aktual</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Orang yang Mendampingi</small></td>
                                                        <td class="text-center"><small>Rp 30.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Perlindungan Anak</small></td>
                                                        <td class="text-center"><small>Rp 25.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Biaya Pemakaian Telepon Darurat</small></td>
                                                        <td class="text-center"><small>Rp 2.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Pemulangan Jenazah atau Biaya Pemakaman di Luar
                                                                Negeri</small></td>
                                                        <td class="text-center"><small>Biaya Aktual</small></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" class="fw-bold"><small>D.Pelayanan Medis di
                                                                Luar Negeri</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Biaya Medis di Luar Negeri (Sampai dengan umur 69
                                                                tahun)</small></td>
                                                        <td class="text-center"><small>Rp 2.800.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Biaya Medis di Luar Negeri (Di Atas Umur 70
                                                                tahun)</small></td>
                                                        <td class="text-center"><small>Rp 1.400.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Biaya Pengobatan Lanjutan di Indonesia</small></td>
                                                        <td class="text-center"><small>Rp 21.000.000,-</small></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" class="fw-bold"><small>E. Kecelakaan
                                                                Diri</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Kematian Akibat Kecelakaan (Umur 14 hari – 17
                                                                Tahun)</small></td>
                                                        <td class="text-center"><small>Rp 350.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Kecelakaan Cacat Tetap (Umur 14 hari – 17 Tahun)</small>
                                                        </td>
                                                        <td class="text-center"><small>Rp 1.050.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Kematian Akibat Kecelakaan dan Cacat Tetap (Umur 18 – 69
                                                                Tahun)</small></td>
                                                        <td class="text-center"><small>Rp 1.050.000.000,-Rp
                                                                21.000.000,-</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Kematian Akibat Kecelakaan dan Cacat Tetap (14 Hari
                                                                sampai 17 Tahun)</small></td>
                                                        <td class="text-center"><small>Rp. 350.000.000,-</small></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" class="fw-bold"><small>F.Tanggung Jawab Pribadi
                                                            </small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Tanggung Jawab Pribadi </small></td>
                                                        <td class="text-center"><small>Rp 2.800.000.000,-</small></td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
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
    <script>
        $(document).ready(function() {
            $(".plus").click(function() {
                let input = $(this).siblings("input");
                let value = parseInt(input.val());
                input.val(value + 1);
            });

            $(".minus").click(function() {
                let input = $(this).siblings("input");
                let value = parseInt(input.val());
                if (value > 0) {
                    input.val(value - 1);
                }
            });
        });
    </script>
@endsection
