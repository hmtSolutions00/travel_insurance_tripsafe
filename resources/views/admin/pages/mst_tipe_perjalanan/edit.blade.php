@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Edit Master Data Tipe Perjalanan </h3>
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
          <h4 class="card-title">Form Edit Data Tipe Perjalanan</h4>
          <p class="card-description"> Perbarui data yang diperlukan</p>

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

          {{-- Form Edit Data --}}
          <form class="forms-sample" action="{{ route('admin.master.tipe_perjalanan.update', $tipePerjalanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
              <label for="name">Nama Tipe Perjalanan</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" 
                     id="name" name="name" 
                     value="{{ old('name', $tipePerjalanan->name) }}" 
                     placeholder="Contoh: Sekali Perjalanan, dll">
              
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="description">Keterangan</label>
              <textarea class="form-control @error('description') is-invalid @enderror" 
                        id="description" name="description" 
                        placeholder="Deskripsi Tipe Perjalanan">{{ old('description', $tipePerjalanan->description) }}</textarea>
              
              @error('description')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary me-3">Update Data</button>
            <a href="{{ route('admin.master.tipe_perjalanan.index') }}" class="btn btn-light">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
