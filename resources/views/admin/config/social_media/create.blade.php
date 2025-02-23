@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Tambah Social Media Baru</h3>
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
              <h4 class="card-title">Form Tambah Social Media Baru</h4>
              <p class="card-description"> Apabila TripSafe Mempunyai Social Media Baru </p>

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
              <form class="forms-sample" action="{{ route('admin.master.wilayah.store') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="name"><strong>Nama Wilayah</strong></label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                         id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Wilayah">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="include"><strong>Termasuk</strong></label>
                  <textarea class="form-control @error('include') is-invalid @enderror" 
                            id="include" name="include" 
                            placeholder="Daftar Wilayah Yang Termasuk">{{ old('include') }}</textarea>
                  @error('include')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exclude"><strong>Tidak Termasuk</strong></label>
                  <textarea class="form-control @error('exclude') is-invalid @enderror" 
                            id="exclude" name="exclude" 
                            placeholder="Daftar Wilayah Yang Tidak Termasuk">{{ old('exclude') }}</textarea>
                  @error('exclude')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="status"><strong>Status</strong></label>
                  <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Non Active" {{ old('status') == 'Non Active' ? 'selected' : '' }}>Non Active</option>
                  </select>
                  @error('status')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary me-2">Tambahkan</button>
                <a href="{{ route('admin.master.wilayah.index') }}" class="btn btn-light">Batalkan</a>
              </form>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
