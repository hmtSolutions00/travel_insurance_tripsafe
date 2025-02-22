@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Tambah Master Data Paket Asuransi </h3>
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
          <h4 class="card-title">Form Tambah Data Paket Asuransi</h4>
          <p class="card-description"> Masukkan data yang benar</p>

          {{-- Menampilkan Flash Message Jika Sukses --}}
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
          <form class="forms-sample" action="{{ route('admin.paket_asuransi.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
              <label for="name">Nama Paket Asuransi</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" 
                     id="name" name="nama_paket" 
                     value="{{ old('name') }}" 
                     placeholder="Contoh: Deluxe, dll">
              
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

          

            <button type="submit" class="btn btn-primary me-3">Tambahkan Data</button>
            <a href="{{ route('admin.paket_asuransi.index') }}" class="btn btn-light">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
