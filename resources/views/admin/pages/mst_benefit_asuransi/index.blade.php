@extends('admin.layouts.admin')

@section('admin')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css') }}" />

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Data Master Manfaat Asuransi</h3>
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
                                <a href="{{ route('admin.benefit_asuransi.create') }}" class="btn btn-primary btn-lg">
                                    <i class="mdi mdi-plus"></i> Tambah Data Manfaat Asuransi
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-benefit1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Manfaat</th>
                                        <th>Sub Manfaat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($manfaatPakets as $index => $manfaat)
                                        @php
                                            $rowspan =
                                                $manfaat->opsiManfaats->count() > 0
                                                    ? $manfaat->opsiManfaats->count()
                                                    : 1;
                                            $subIndex = 0; // Untuk pola warna info dan primary
                                        @endphp

                                        {{-- ✅ Kolom utama (Manfaat) dengan warna success --}}
                                        <tr>
                                            <td rowspan="{{ $rowspan }}" class="table-success">{{ $loop->iteration }}
                                            </td>
                                            <td rowspan="{{ $rowspan }}" class="table-success">{{ $manfaat->name }}
                                            </td>

                                            {{-- Sub Manfaat pertama --}}
                                            @if ($manfaat->opsiManfaats->count() > 0)
                                                @php
                                                    $subClass = $subIndex % 2 == 0 ? 'table-info' : 'table-primary';
                                                    $subIndex++;
                                                @endphp
                                                <td class="{{ $subClass }}">
                                                    {{ $manfaat->opsiManfaats->first()->name }}</td>
                                            @else
                                                <td>-</td>
                                            @endif

                                            {{-- Action (Hanya pada baris utama) --}}
                                            <td rowspan="{{ $rowspan }}" class="table-success">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.benefit_asuransi.edit', $manfaat->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="mdi mdi-pencil-outline d-block mb-1"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('admin.benefit_asuransi.destroy', $manfaat->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="mdi mdi-delete-outline d-block mb-1"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- ✅ Sub Manfaat selanjutnya dengan pola warna berulang --}}
                                        @if ($manfaat->opsiManfaats->count() > 1)
                                            @foreach ($manfaat->opsiManfaats->skip(1) as $opsi)
                                                @php
                                                    $subClass = $subIndex % 2 == 0 ? 'table-info' : 'table-primary';
                                                    $subIndex++;
                                                @endphp
                                                <tr>
                                                    <td class="{{ $subClass }}">{{ $opsi->name }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    {{-- @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data.</td>
                                        </tr> --}}
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js">
    </script>
    <script>
        var table = $('#table-benefit1').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50, 100],
            "order": [
                [1, "desc"]
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
                "dom": 'lrtip'
            }
        });
    </script>
@endsection
