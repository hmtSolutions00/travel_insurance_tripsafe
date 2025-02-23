@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Edit Social Media</h3>
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
              <h4 class="card-title">Form Edit Social Media</h4>
              <p class="card-description"> Perbarui informasi social media </p>

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

              {{-- Form Update Data --}}
              <form class="forms-sample" action="{{ route('social.media.update', $socialMedia->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Social Media --}}
                <div class="form-group">
                  <label for="name"><strong>Nama Social Media</strong></label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                         id="name" value="{{ old('name', $socialMedia->name) }}" placeholder="Masukkan Nama Social Media">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                {{-- Link Social Media --}}
                <div class="form-group">
                  <label for="link"><strong>Link Social Media</strong></label>
                  <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" 
                         id="link" value="{{ old('link', $socialMedia->link) }}" placeholder="Masukkan Link Social Media">
                  @error('link')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                {{-- Icon Social Media (Menampilkan Gambar yang Ada) --}}
                <div class="form-group">
                  <label for="icon"><strong>Icon / Logo</strong></label>
                  <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon">
                  @if ($socialMedia->icon)
                    <div class="mt-2">
                      <img src="{{ asset('/admin/social_media_icons/' . $socialMedia->icon) }}" width="100" alt="Icon {{ $socialMedia->name }}">
                    </div>
                  @endif
                  @error('icon')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                  <label for="status"><strong>Status</strong></label>
                  <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="active" {{ old('status', $socialMedia->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $socialMedia->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                  @error('status')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                <a href="{{ route('social.media.index') }}" class="btn btn-light">Batalkan</a>
              </form>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
