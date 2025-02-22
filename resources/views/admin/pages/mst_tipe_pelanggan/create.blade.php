@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Tambah Master Data Tipe Pelanggan</h3>
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
              <h4 class="card-title">Form Tambah Data Tipe Pelanggan</h4>
              <p class="card-description"> Masukkan Data Tipe Pelanggan </p>
              
              {{-- Flash Message Jika Sukses --}}
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              
              {{-- Menampilkan Error Validasi --}}
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              {{-- Form Tambah Data --}}
              <form class="forms-sample" action="{{ route('admin.master.tipe_pelanggan.store') }}" method="POST">
                @csrf

                {{-- Nama Tipe Pelanggan --}}
                <div class="form-group">
                  <label for="name"><strong>Nama Tipe Pelanggan</strong></label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                         id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Tipe Pelanggan" required>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                {{-- Batas Usia --}}
                <div class="form-group row">
                    <div class="col">
                      <label for="min_age">Batas Usia Minimal</label>
                      <input type="number" name="min_age" class="form-control @error('min_age') is-invalid @enderror"
                             id="min_age" value="{{ old('min_age') }}" placeholder="Usia Minimal" required>
                      @error('min_age')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col">
                      <label for="max_age">Batas Usia Maksimal</label>
                      <input type="number" name="max_age" class="form-control @error('max_age') is-invalid @enderror"
                             id="max_age" value="{{ old('max_age') }}" placeholder="Usia Maksimal" required>
                      @error('max_age')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                </div>

                {{-- Keterangan --}}
                <div class="form-group">
                    <label for="description"><strong>Keterangan</strong></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                              id="description" placeholder="Masukkan Keterangan" required>{{ old('description') }}</textarea>
                    @error('description')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary me-2">Tambahkan</button>
                <a href="{{ route('admin.master.tipe_pelanggan.index') }}" class="btn btn-light">Batalkan</a>
              </form>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
