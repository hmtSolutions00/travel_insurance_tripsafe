@extends('admin.layouts.admin')

@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Data Tipe Perjalanan</h3>
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
                        @if (count($tipePerjalanan) < 2)
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('admin.master.tipe_perjalanan.create') }}"
                                        class="btn btn-primary btn-lg">
                                        <i class="mdi mdi-plus"></i> Tambah Tipe Perjalanan
                                    </a>
                                </div>
                            </div>
                        @endif


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tipePerjalanan as $index => $item)
                                        <tr>
                                            <td class="py-1">{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.master.tipe_perjalanan.show', $item->id) }}"
                                                        class="btn btn-sm btn-outline-info">
                                                        <i class="mdi mdi-eye d-block mb-1"></i>
                                                    </a>
                                                    <a href="{{ route('admin.master.tipe_perjalanan.edit', $item->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="mdi mdi-pencil-outline d-block mb-1"></i>
                                                    </a>
                                                    {{-- <form
                                                        action="{{ route('admin.master.tipe_perjalanan.destroy', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="mdi mdi-delete-outline d-block mb-1"></i>
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        {{-- <div class="d-flex justify-content-center mt-3">
                        {{ $tipePerjalanan->links() }}
                    </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
