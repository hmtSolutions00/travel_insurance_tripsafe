@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Edit Brosur </h3>
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
              <h4 class="card-title">Form Edit Brosur</h4>
              <p class="card-description"> Silakan edit brosur yang sudah ada </p>

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

              {{-- Form Edit Data --}}
              <form class="forms-sample" action="{{ route('daftar.brosur.update', $brosur->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Brosur --}}
                <div class="form-group">
                  <label for="name"><strong>Nama Brosur</strong></label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                         id="name" value="{{ old('name', $brosur->name) }}" placeholder="Masukkan Nama Brosur">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                {{-- File Brosur --}}
                <div class="form-group">
                  <label for="file"><strong>File Brosur</strong></label>
                  <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file">
                  <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
                  @error('file')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                {{-- Link Brosur Lama --}}
                <div class="form-group">
                  <p>File saat ini: 
                    <a href="{{ asset($brosur->url_file) }}" target="_blank">Lihat Brosur</a>
                  </p>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('daftar.brosur.index') }}" class="btn btn-light">Batalkan</a>
              </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
