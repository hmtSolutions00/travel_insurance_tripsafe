@extends('frontend.layout.layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css') }}" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js">
    </script>


    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mb-3 text-center position-relative">
                <h1 class="fw-bold theme-text-shadow" style="color: white; font-family: 'Aptos Narrow', sans-serif;">
                    Hai <i>Tripper</i>, Mau terbang ke mana?
                </h1>
                <h3 class="fw-bold mb-4 theme-text-shadow"
                    style="color: white;font-style:italic; font-family: 'Aptos Narrow', sans-serif;">
                    "Life is short, the world is too wide."
                </h3>
            </div>
        </div>
        <!-- search engine tabs -->
        <div class="row  mt-0">
            <div class="col-12 col-lg-5 mb-5 text-center position-relative">
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

            <div class="col-12 col-lg-7 mb-5 text-center position-relative">
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
                                    <tr>
                                        <td class="text-white" colspan="6"
                                            style="font-weight: bold;background-color: #025f88;font-size: small">
                                            Detail Wilayah
                                        </td>
                                    </tr>
                                    @foreach ($wilayahs as $wilayah)
                                        <tr id="tr-benefit" style="text-align: left">
                                            <td class="text-white" rowspan="2" colspan="2"
                                                style="align-content: center; background-color: #025f88;font-size:x-small">
                                                {{ $wilayah->name }}</td>
                                            <td class="" style="background-color: #0393D2;font-size: x-small">Termasuk
                                            </td>
                                            <td class="text-sm" colspan="3"
                                                style="background-color: #71d3fd;font-size: x-small">{{ $wilayah->include }}
                                            </td>
                                        </tr>
                                            <tr style="text-align: left">
                                                <td class="" style="background-color: #71d3fd;font-size: x-small">Tidak
                                                    Termasuk</td>
                                                <td class="text-sm" colspan="3"
                                                    style="background-color: #0393D2;font-size: x-small">{{$wilayah->exclude}}</td>
                                            </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div id="benefit-modal">
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
                "infoEmpty": "",
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
