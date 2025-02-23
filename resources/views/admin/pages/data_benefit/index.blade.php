@extends('admin.layouts.admin')

@section('admin')
<link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css') }}" />


<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Kelola Data Manfaat Asuransi</h3>
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

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-4 mb-5">
                        <a href="{{ route('kelola.data_benefit.create') }}" class="btn btn-primary btn-lg">
                            <i class="mdi mdi-plus"></i> Kelola Data Benefit
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-benefit">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Wilayah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupedData as $index => $group)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $group->first()->paketAsuransi->nama_paket }}</td>
                                        <td>
                                            @foreach ($group->first()->wilayahs as $wilayah)
                                                {{ $wilayah->name }}{{ !$loop->last ? ', ' : '' }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                {{-- Tombol Detail --}}
                                                <a href="{{ route('kelola.data_benefit.show', ['insurance_type_id' => $group->first()->insurance_type_id, 'destionation_id' => base64_encode(json_encode($group->first()->destionation_id))]) }}"
                                                   class="btn btn-sm btn-outline-info" title="Detail">
                                                    <i class="mdi mdi-eye-outline d-block"></i>
                                                </a>

                                                {{-- Tombol Edit (Gunakan base64_encode agar seragam) --}}
                                                <a href="{{ route('kelola.data_benefit.edit', ['insurance_type_id' => $group->first()->insurance_type_id, 'destionation_id' => base64_encode(json_encode($group->first()->destionation_id))]) }}"
                                                   class="btn btn-sm btn-outline-warning" title="Edit">
                                                    <i class="mdi mdi-pencil-outline d-block"></i>
                                                </a>

                                                {{-- Tombol Hapus --}}
                                                <form action="{{ route('kelola.data_benefit.destroy', ['insurance_type_id' => $group->first()->insurance_type_id, 'destionation_id' => base64_encode(json_encode($group->first()->destionation_id))]) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                        <i class="mdi mdi-delete-outline d-block"></i>
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
        var table = $('#table-benefit').DataTable({
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
    </script>
@endsection
