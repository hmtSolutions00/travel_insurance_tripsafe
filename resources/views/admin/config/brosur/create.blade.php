@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Tambah Brosur Baru</h3>
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
              <h4 class="card-title">Form Tambah Brosur Baru</h4>
              <p class="card-description"> Silakan tambahkan brosur baru ke dalam sistem </p>

              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif

              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form class="forms-sample" action="{{ route('daftar.brosur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="name"><strong>Nama Brosur</strong></label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                         id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Brosur">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="file"><strong>Upload File Brosur</strong></label>
                  <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file">
                  @error('file')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary me-2">Tambahkan</button>
                <a href="{{ route('daftar.brosur.index') }}" class="btn btn-light">Batalkan</a>
              </form>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
