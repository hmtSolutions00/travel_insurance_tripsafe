@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Pengaturan Website </h3>
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
          <h4 class="card-title">Form Pengaturan Website</h4>
          <p class="card-description"> Silakan perbarui informasi website Anda </p>

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

          <form class="forms-sample" action="{{ route('website.configuration.update', $config->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="site_name">Nama Website</label>
              <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror" id="site_name" value="{{ old('site_name', $config->site_name) }}">
              @error('site_name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="logo">Logo Website</label>
              <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo">
              @if ($config->logo)
                <img src="{{ asset($config->logo) }}" width="100" class="mt-2">
              @endif
              @error('logo')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="about_us">Tentang Kami</label>
              <textarea name="about_us" class="form-control @error('about_us') is-invalid @enderror" id="about_us">{{ old('about_us', $config->about_us) }}</textarea>
              @error('about_us')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="url_photo_background">Background Website</label>
              <input type="file" name="url_photo_background" class="form-control @error('url_photo_background') is-invalid @enderror" id="url_photo_background">
              @if ($config->url_photo_background)
                <img src="{{ asset( $config->url_photo_background) }}" width="100" class="mt-2">
              @endif
              @error('url_photo_background')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="title">Judul Website</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $config->title) }}">
              @error('title')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="keywords">Kata Kunci</label>
              <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" id="keywords" value="{{ old('keywords', $config->keywords) }}">
              @error('keywords')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="slogan1">Slogan 1</label>
              <input type="text" name="slogan1" class="form-control @error('slogan1') is-invalid @enderror" id="slogan1" value="{{ old('slogan1', $config->slogan1) }}">
              @error('slogan1')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="slogan2">Slogan 2</label>
              <input type="text" name="slogan2" class="form-control @error('slogan2') is-invalid @enderror" id="slogan2" value="{{ old('slogan2', $config->slogan2) }}">
              @error('slogan2')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
