@extends('admin.layouts.admin')

@section('admin')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css') }}" />



    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Data Pesanan Asuransi</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach ($breadcrumb as $item)
                        @if ($item['route'])
                            <li class="breadcrumb-item"><a href="{{ $item['route'] }}">{{ $item['name'] }}</a></li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-pesanan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemegang Polis</th>
                                        <th>Jenis Asuransi</th>
                                        <th>Jenis Paket</th>
                                        <th>Tujuan</th>
                                        {{-- <th>Waktu Perjalanan</th> --}}
                                        <th>Total Harga(IDR)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $order)
                                        @php
                                            $pemegang_polis = App\Models\DetailCustomer::where('pesanan_id', $order->id)
                                                ->where('is_polish', true)
                                                ->first();
                                            $arrDurasi = json_decode($order->durasi_perjalan);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pemegang_polis->fullname }}</td>
                                            <td>{{ $order->tipe_asuransi }}</td>
                                            <td>{{ $order->paket_asuransi }}</td>
                                            <td>{{ $order->wilayah }}</td>
                                            {{-- <td>{{ $arrDurasi[0] }} - {{ $arrDurasi[1] }}</td> --}}
                                            <td style="text-align: right">{{ $order->total_price }}</td>
                                            <td>
                                                @if ($order->status == 1)
                                                    <span class="badge badge-info">
                                                        Belum Diproses
                                                    </span>
                                                @elseif($order->status == 2)
                                                    <span class="badge badge-success">
                                                        Sudah Diproses
                                                    </span>
                                                @elseif($order->status == 3)
                                                    <span class="badge badge-warning">
                                                        Butuh Konfirmasi
                                                    </span>
                                                @elseif($order->status == 4)
                                                    <span class="badge badge-danger">
                                                        Tidak Valid
                                                    </span>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('admin.data.pesanan_asuransi.show', $order->id) }}"
                                                    class="btn btn-sm btn-outline-info">
                                                    <i class="mdi mdi-eye d-block mb-1"></i>
                                                </a>
                                                <a class="btn btn-sm btn-outline-warning more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                    title="Ubah Status">
                                                    <i class="mdi mdi-pencil-box-multiple d-block mb-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right "
                                                    style="max-width: fit-content;">
                                                    @if ($order->status != 1)
                                                        <a href="{{ route('admin.data.pesanan_asuransi.belum.diproses', $order->id) }}"
                                                            class="dropdown-item">Belum
                                                            Diproses</a>
                                                        <hr
                                                            style="margin-top: 5px;margin-right: 0px;margin-bottom: 5px;margin-left: 0px">
                                                    @endif
                                                    @if ($order->status != 2)
                                                        <a href="{{ route('admin.data.pesanan_asuransi.sudah.diproses', $order->id) }}"
                                                            class="dropdown-item">Sudah
                                                            Diproses</a>
                                                        <hr
                                                            style="margin-top: 5px;margin-right: 0px;margin-bottom: 5px;margin-left: 0px">
                                                    @endif
                                                    <button onclick="konfSudah(this)" class="btn">Ubah Status</button>
                                                    @if ($order->status != 3)
                                                        <a href="{{ route('admin.data.pesanan_asuransi.butuh.konfirmasi', $order->id) }}"
                                                            class="dropdown-item">Butuh Konfirmasi</a>
                                                        <hr
                                                            style="margin-top: 5px;margin-right: 0px;margin-bottom: 5px;margin-left: 0px">
                                                    @endif
                                                    @if ($order->status != 4)
                                                        <a href="{{ route('admin.data.pesanan_asuransi.tidak.valid', $order->id) }}"
                                                            class="dropdown-item">Tidak Valid</a>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        var table = $('#table-pesanan').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50, 100],
            "order": [
                [3, "desc"]
            ],
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
                        targets: 5
                    } // Sesuaikan dengan indeks kolom tanggal Anda
                ]
            },

        });

        // function konfBelum(button) {
        //     Swal.fire({
        //         title: 'Konfirmasi',
        //         text: 'Apakah Anda yakin ingin mengubah status menjadi Belum Diproses?',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Ya',
        //         cancelButtonText: 'Batal',
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             window.location.href = 'master/pesanan/asuransi/' + $order->id +'/belum-diproses';
        //         }
        //     });
        // }

        function konfSudah(button) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengubah status menjadi Sudah Diproses?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'master/pesanan/asuransi/sudah-diproses';
                }
            });
        }
        // function konfButuh(button) {
        //     Swal.fire({
        //         title: 'Konfirmasi',
        //         text: 'Apakah Anda yakin ingin mengubah status menjadi Butuh Konfirmasi?',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Ya',
        //         cancelButtonText: 'Batal',
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             window.location.href = 'master/pesanan/asuransi/' + $order->id +'/butuh-konfirmasi';
        //         }
        //     });
        // }
        // function konfTidak(button) {
        //     Swal.fire({
        //         title: 'Konfirmasi',
        //         text: 'Apakah Anda yakin ingin mengubah status menjadi Tidak Valid?',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Ya',
        //         cancelButtonText: 'Batal',
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             window.location.href = 'master/pesanan/asuransi/' + $order->id +'/tidak-valid';
        //         }
        //     });
        // }
    </script>
@endsection
