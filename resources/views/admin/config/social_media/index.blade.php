@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Pengaturan Website Link Social Media</h3>
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
                            <a href="{{ route('social-media.create') }}" class="btn btn-primary btn-lg">
                                <i class="mdi mdi-plus"></i> Tambah Social Media
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Social Media</th>
                                    <th>Link</th>
                                    <th>Icon Social Media</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($socialMedias as $index => $socialMedia)
                                    <tr>
                                        <td class="py-1">{{ $loop->iteration }}</td>
                                        <td>{{ $socialMedia->name }}</td>
                                        <td><a href="{{ $socialMedia->link }}" target="_blank">{{ $socialMedia->link }}</a></td>
                                        <td>
                                            @if($socialMedia->icon)
                                                <img src="{{ asset('storage/' . $socialMedia->icon) }}" alt="Icon" width="50">
                                            @else
                                                <span class="text-muted">Tidak ada icon</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge {{ $socialMedia->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                                {{ ucfirst($socialMedia->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('social-media.show', $socialMedia->id) }}" class="btn btn-sm btn-outline-info">
                                                    <i class="mdi mdi-eye d-block mb-1"></i>
                                                </a>
                                                <a href="{{ route('social-media.edit', $socialMedia->id) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="mdi mdi-pencil-outline d-block mb-1"></i>
                                                </a>
                                                <form action="{{ route('social-media.destroy', $socialMedia->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                                        <td colspan="6" class="text-center">Tidak ada data social media.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $socialMedias->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
