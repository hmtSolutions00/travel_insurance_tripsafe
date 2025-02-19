@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Edit Master Data Wilayah / Destination</h3>
    <ol class="breadcrumb">
        @foreach ($breadcrumb as $item)
          @if ($item['route'])
              <li class="breadcrumb-item"><a href="{{ $item['route'] }}">{{ $item['name'] }}</a></li>
          @else
              <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
          @endif
      @endforeach
    </ol>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Informasi Detail Wilayah</h4>
              <p class="card-description"> Berikut adalah informasi lengkap dari wilayah yang dipilih </p>

              {{-- Tabel Detail Wilayah --}}
              <table class="table table-bordered">
                <tr>
                  <th width="20%">Nama Wilayah</th>
                  <td>{{ $wilayah->name }}</td>
                </tr>
                <tr>
                  <th>Termasuk</th>
                  <td>{{ $wilayah->include ?: 'Tidak Ada Wilayah Yang Termasuk' }}</td>
                </tr>
                <tr>
                  <th>Tidak Termasuk</th>
                  <td>{{ $wilayah->exclude ?: 'Tidak Ada Wilayah Yang Termasuk' }}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
                    @if($wilayah->status == 'active')
                      <span class="badge bg-success">Active</span>
                    @else
                      <span class="badge bg-danger">Non Active</span>
                    @endif
                  </td>
                </tr>
              </table>
              {{-- Tombol Aksi --}}
              <div class="mt-4">
                <a href="{{ route('admin.master.tipe_perjalanan.index') }}" class="btn btn-secondary">
                  <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.master.wilayah.edit', $wilayah->id) }}" class="btn btn-warning">
                  <i class="mdi mdi-pencil"></i> Edit
                </a>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
