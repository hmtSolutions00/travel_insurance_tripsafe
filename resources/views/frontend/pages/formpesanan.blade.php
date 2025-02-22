@extends('frontend.layout.layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css') }}" />
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>


    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mb-3 text-center position-relative">
                <h1 class="fw-bold theme-text-shadow" style="color: white; font-family: 'Aptos Narrow', sans-serif;">
                    Hai <i>Tripper</i>, Mau terbang ke mana?
                </h1>
                <h3 class="fw-bold mb-4 theme-text-shadow" style="color: white;font-style:italic; font-family: 'Aptos Narrow', sans-serif;">
                    "Life is short, the world is too wide."
                </h3>
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
                                {{-- form pencarian sekali perjalanan --}}
                                @include('frontend.pages.formsekaliperjalanan')

                                {{-- form pencarian tahunan --}}
                                @include('frontend.pages.formtahunan')
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

                                        <th scope="col">Produk</th>
                                        <th scope="col">Paket</th>
                                        <th scope="col">Premi</th>
                                        <th scope="col">EPolis & Materai</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
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

        var table = $('#table-asuransi').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50, 100],
            "language": {
                "lengthMenu": "Menampilkan _MENU_ Data per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada data yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total data)",
                "search": "Cari :",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "",
                    "previous": ""
                },
                "dom": 'lrtip',
                "columnDefs": [{
                        type: 'date',
                        targets: 2
                    } // Sesuaikan dengan indeks kolom tanggal Anda
                ],
            },

        });
    </script>
@endsection
