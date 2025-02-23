@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Kelola Brosur </h3>
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
                            <a href="{{ route('daftar.brosur.create') }}" class="btn btn-primary btn-lg">
                                <i class="mdi mdi-plus"></i> Tambah Brosur
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Brosur</th>
                                    <th>File Brosur</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brochures as $index => $brosur)
                                    <tr>
                                        <td class="py-1">{{ $loop->iteration }}</td>
                                        <td>{{ $brosur->name }}</td>
                                        <td>
                                            <a href="{{ asset( $brosur->url_file) }}" target="_blank">Lihat Brosur</a>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('daftar.brosur.edit', $brosur->id) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="mdi mdi-pencil-outline d-block mb-1"></i>
                                                </a>
                                                <form action="{{ route('daftar.brosur.destroy', $brosur->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus brosur ini?');">
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
                                        <td colspan="4" class="text-center">Tidak ada data brosur.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="d-flex justify-content-center mt-3">
                        {{ $brosurs->links() }}
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
