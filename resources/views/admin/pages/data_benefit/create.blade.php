@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Tambah Data Kelola Benefit</h3>
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
                    <h4 class="card-title">Form Tambah Data Kelola Benefit</h4>
                    <p class="card-description">Pilih Paket, Wilayah, dan Input Harga Benefit</p>

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
                    <form class="forms-sample" action="{{ route('kelola.data_benefit.store') }}" method="POST">
                        @csrf

                        {{-- Pilih Wilayah --}}
                        <div class="form-group">
                            <label><strong>Pilih Wilayah</strong></label>
                            <div class="form-check-label d-flex flex-wrap">
                                @foreach ($wilayahs as $wilayah)
                                    <div class="form-check me-2">
                                        <label class="form-check-label" for="wilayah_{{ $wilayah->id }}">{{ $wilayah->name }}<i class="input-helper"></i>
                                            <input type="checkbox" class="form-check-input" name="destionation_id[]" 
                                            value="{{ $wilayah->id }}" id="wilayah_{{ $wilayah->id }}"
                                            {{ in_array($wilayah->id, old('destionation_id', [])) ? 'checked' : '' }}>
                                        </label>
                                      
                                        
                                    </div>
                                @endforeach
                            </div>
                            @error('destionation_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- Pilih Paket Asuransi --}}
                        <div class="form-group">
                            <label for="insurance_type_id"><strong>Pilih Paket Asuransi</strong></label>
                            <select class="form-select @error('insurance_type_id') is-invalid @enderror" id="insurance_type_id" name="insurance_type_id" required>
                                <option value="" disabled selected>Pilih Paket</option>
                                @foreach ($paketAsuransis as $paket)
                                    <option class="text-primary" value="{{ $paket->id }}" {{ old('insurance_type_id') == $paket->id ? 'selected' : '' }}>
                                        {{ $paket->nama_paket }}
                                    </option>
                                @endforeach
                            </select>
                            @error('insurance_type_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Pilih Benefit (Manfaat Utama dan Sub Manfaat) --}}
                        <div class="form-group">
                            <label><strong>Harga Benefit</strong></label>
                            @foreach ($manfaatPakets as $manfaat)
                                <div class="mb-3 border rounded p-3">
                                    {{-- Manfaat Utama --}}
                                    <h6 class="text-primary">{{ $manfaat->name }}</h6>

                                    {{-- Sub Manfaat --}}
                                    <div class="row">
                                        @foreach ($manfaat->opsiManfaats as $opsi)
                                            <div class="col-md-6 mb-2">
                                                <label>{{ $opsi->name }}</label>
                                                <input type="text" name="prices[{{ $opsi->id }}]" 
                                                       value="{{ old("prices.$opsi->id") }}" 
                                                       class="form-control @error("prices.$opsi->id") is-invalid @enderror"
                                                       placeholder="Masukkan harga atau detail dari benefit">
                                                @error("prices.$opsi->id")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Tombol Submit --}}
                        <button type="submit" class="btn btn-primary me-2">Tambahkan</button>
                        <a href="{{ route('kelola.data_benefit.index') }}" class="btn btn-light">Batalkan</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
