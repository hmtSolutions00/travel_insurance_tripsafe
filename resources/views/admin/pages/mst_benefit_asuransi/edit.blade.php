@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">Edit Master Data Manfaat Asuransi</h3>
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
          <h4 class="card-title">Form Edit Data Manfaat Asuransi</h4>
          <p class="card-description">Perbarui Data Manfaat Asuransi</p>
          
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
          <form class="forms-sample" action="{{ route('admin.benefit_asuransi.update', $manfaatPaket->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Manfaat Utama --}}
            <div class="form-group">
              <label for="name"><strong>Manfaat Utama</strong></label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                     id="name" value="{{ old('name', $manfaatPaket->name) }}" 
                     placeholder="Masukkan Nama Manfaat Utama" required>
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            {{-- Sub-Manfaat Dinamis --}}
            <div class="form-group">
              <label><strong>Sub-Manfaat</strong></label>
              <div id="sub-manfaat-container">
                @foreach ($manfaatPaket->opsiManfaats as $opsi)
                <div class="input-group mb-2 sub-manfaat-item">
                    <input type="hidden" name="sub_manfaat_id[]" value="{{ $opsi->id }}">
                    <input type="text" name="sub_manfaat[]" class="form-control"
                           value="{{ $opsi->name }}" placeholder="Masukkan Sub-Manfaat" required>
                    <button type="button" class="btn btn-danger btn-remove" onclick="removeSubManfaat(this)">X</button>
                </div>
            @endforeach
              </div>
              <button type="button" class="btn btn-primary btn-sm mt-2" id="btn-add-sub-manfaat">+ Tambahkan Sub-Manfaat</button>
            </div>

            <button type="submit" class="btn btn-success me-2">Perbarui</button>
            <a href="{{ route('admin.benefit_asuransi.index') }}" class="btn btn-light">Batalkan</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- Tambahkan script ke dalam section 'jseextend' --}}
@section('jseextend')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('sub-manfaat-container');
        const addButton = document.getElementById('btn-add-sub-manfaat');

        addButton.addEventListener('click', function () {
            const div = document.createElement('div');
            div.classList.add('input-group', 'mb-2', 'sub-manfaat-item');
            div.innerHTML = `
                <input type="text" name="sub_manfaat[]" class="form-control" placeholder="Masukkan Sub-Manfaat" required>
                <button type="button" class="btn btn-danger btn-remove" onclick="removeSubManfaat(this)">X</button>
            `;
            container.appendChild(div);
        });

        window.removeSubManfaat = function (button) {
            button.closest('.sub-manfaat-item').remove();
        };
    });
</script>
@endsection
