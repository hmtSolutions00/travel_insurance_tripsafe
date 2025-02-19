@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Tambah Master Data Tipe Asuransi</h3>
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
              <h4 class="card-title">Form Tambah Data Tipe Asuransi</h4>
              <p class="card-description"> Masukkan Data Tipe Asuransi </p>
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
              <form class="forms-sample" action="{{ route('admin.master.tipe_asuransi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="name"><strong>Nama Tipe Asuransi</strong></label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                         id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Tipe Asuransi">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                {{-- Pilihan Tipe Perjalanan dalam bentuk Checkbox --}}
                <div class="form-group">
                  <label><strong>Pilih Tipe Perjalanan</strong></label>
                  <div class="form-check-label d-flex flex-wrap">
                    @foreach ($tipePerjalanans as $tipe)
                      <div class="form-check me-2">
                        <label class="form-check-label" for="tipe_{{ $tipe->id }}">{{ $tipe->name }}<i class="input-helper"></i>
                          <input type="checkbox" class="form-check-input" name="tipe_perjalanan_id[]" 
                          value="{{ $tipe->id }}" id="tipe_{{ $tipe->id }}"
                          {{ in_array($tipe->id, old('tipe_perjalanan_id', [])) ? 'checked' : '' }}>
                        </label>
                      </div>
                    @endforeach
                  </div>
                  @error('tipe_perjalanan_id')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary me-2">Tambahkan</button>
                <a href="{{ route('admin.master.tipe_asuransi.index') }}" class="btn btn-light">Batalkan</a>
              </form>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
