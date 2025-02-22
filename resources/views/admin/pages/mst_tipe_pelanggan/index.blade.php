@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Data Master Tipe Pelanggan</h3>
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
    @if(session('success'))
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
                            <a href="{{ route('admin.master.tipe_pelanggan.create') }}" class="btn btn-primary btn-lg">
                                <i class="mdi mdi-plus"></i> Tambah Data Tipe Pelanggan
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe Pelanggan</th>
                                    <th>Ketentuan Umur</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelanggans as $index => $pelanggan)
                                    <tr>
                                        <td class="py-1">{{ $loop->iteration }}</td>
                                        <td>{{ $pelanggan->name }}</td>
                                        <td>
                                            @php
                                                $umur = $pelanggan->age;
                                                $min = isset($umur[0]) ? $umur[0] : 'Tidak ada';
                                                $max = isset($umur[1]) ? $umur[1] : 'Tidak ada';
                                            @endphp
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if($pelanggan->age[1] <= 18)
                                                            {{ $pelanggan->age[0] }} Hari
                                                        @else
                                                            {{ $pelanggan->age[0] }} Tahun
                                                        @endif
                                                    </td>
                                                    <td>{{ $pelanggan->age[1] }} Tahun</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>{{ $pelanggan->description }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.master.tipe_pelanggan.edit', $pelanggan->id) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="mdi mdi-pencil-outline d-block mb-1"></i>
                                                </a>
                                                <form action="{{ route('admin.master.tipe_pelanggan.destroy', $pelanggan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="mdi mdi-delete-outline d-block mb-1"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $pelanggans->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
