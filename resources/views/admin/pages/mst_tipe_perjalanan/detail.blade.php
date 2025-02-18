@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Detail Master Data Tipe Perjalanan </h3>
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
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Detail Data Tipe Perjalanan</h4>
          <p class="card-description">Informasi detail tipe perjalanan</p>

          {{-- Menampilkan Flash Message Jika Sukses --}}
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          <div class="form-group">
            <strong><label for="name">Nama Tipe Perjalanan</label></strong>
            <input type="text" class="form-control" 
                   id="name" name="name" 
                   value="{{ $tipePerjalanan->name }}" 
                   disabled>
          </div>

          <div class="form-group">
            <strong><label for="description">Keterangan</label></strong>
            <textarea class="form-control" id="description" name="description" disabled>{{ $tipePerjalanan->description }}</textarea>
          </div>

          <a href="{{ route('admin.master.tipe_perjalanan.index') }}" class="btn btn-light">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
