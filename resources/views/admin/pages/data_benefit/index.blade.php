@extends('admin.layouts.admin')

@section('admin')
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
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('kelola.data_benefit.create') }}" class="btn btn-primary btn-lg">
                            <i class="mdi mdi-plus"></i> Kelola Data Benefit
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Wilayah</th>
                                    <th>Benefit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($groupedManfaats as $index => $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detail->paketAsuransi->nama_paket }}</td>
                                        <td>{{ $detail->wilayahs->pluck('name')->implode(', ') }}</td>
                                        <td>
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($detail->benefits as $benefit)
                                                    <li>- {{ $benefit }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('kelola.data_benefit.show', ['insurance_type_id' => $detail->insurance_type_id, 'destionation_id' => base64_encode(json_encode($detail->destionation_id))]) }}" class="btn btn-sm btn-outline-info" title="Detail">
                                                    <i class="mdi mdi-eye-outline d-block"></i>
                                                </a>

                                                <a href="{{ route('kelola.data_benefit.edit', ['insurance_type_id' => $detail->insurance_type_id, 'destionation_id' => base64_encode(json_encode($detail->destionation_id))]) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                                    <i class="mdi mdi-pencil-outline d-block"></i>
                                                </a>

                                                <form action="{{ route('kelola.data_benefit.destroy', ['insurance_type_id' => $detail->insurance_type_id, 'destionation_id' => base64_encode(json_encode($detail->destionation_id))]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                        <i class="mdi mdi-delete-outline d-block"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data yang tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
