@extends('admin.layouts.admin')

@section('admin')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css') }}" />



    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Data Kode Promo</h3>
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
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="d-grid gap-2">
                                <a href="{{ route('kode.promo.create') }}" class="btn btn-primary btn-lg">
                                    <i class="mdi mdi-plus"></i> Tambah Data Kode Promo
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-promo">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Promo</th>
                                        <th>Kode Promo</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kodePromo as $promo)
                                        <tr>
                                            <td>{{ $loop->iteration }}
                                            </td>
                                            <td>{{ $promo->nama_promo }}</td>
                                            <td>{{ $promo->kode_promo }}</td>
                                            @php
                                                $potongan = number_format($promo->promo, 0, ',', '.');
                                                $tglMulai = date('d M Y', strtotime($promo->tanggal_mulai));
                                                $tglAkhir = date('d M Y', strtotime($promo->tanggal_akhir));
                                            @endphp
                                            <td>{{ $tglMulai }}</td>
                                            <td>{{ $tglAkhir }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('kode.promo.show', $promo->id) }}"
                                                        class="btn btn-sm btn-outline-info" title="Detail">
                                                        <i class="mdi mdi-eye-outline d-block"></i>
                                                    </a>

                                                    <a href="{{ route('kode.promo.edit', $promo->id) }}"
                                                        class="btn btn-sm btn-outline-warning" title="Edit">
                                                        <i class="mdi mdi-pencil-outline d-block"></i>
                                                    </a>
                                                    <form action="{{ route('kode.promo.destroy', $promo->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kode promo ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="mdi mdi-delete-outline d-block mb-1"></i>
                                                        </button>
                                                    </form>
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
        var table = $('#table-promo').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50, 100],
            "order": [
                [0, "asc"]
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
    </script>
@endsection
