@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Pengaturan Pengguna SafeTRip</h3>
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
                            <a href="{{ route('user.management.create') }}" class="btn btn-primary btn-lg">
                                <i class="mdi mdi-plus"></i> Tambah User Baru
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                    <tr>
                                        <td class="py-1">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($user->photo_profile)
                                                    <img src="{{ asset('storage/' . $user->photo_profile) }}" class="rounded-circle me-2" width="40" height="40" alt="Profile">
                                                @else
                                                    <img src="{{ asset('default-avatar.png') }}" class="rounded-circle me-2" width="40" height="40" alt="Profile">
                                                @endif
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span class="badge {{ $user->role === 'admin' ? 'badge-primary' : 'badge-secondary' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $user->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                                {{ ucfirst($user->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('user.management.show', $user->id) }}" class="btn btn-sm btn-outline-info">
                                                    <i class="mdi mdi-eye d-block mb-1"></i>
                                                </a>
                                                <a href="{{ route('user.management.edit', $user->id) }}" class="btn btn-sm btn-outline-warning">
                                                    <i class="mdi mdi-pencil-outline d-block mb-1"></i>
                                                </a>
                                                <form action="{{ route('user.management.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
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
                                        <td colspan="6" class="text-center">Tidak ada data pengguna.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
