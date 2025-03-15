@extends('admin.layouts.admin')

@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tambah Data Kode Promo </h3>
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
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12 col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('kode.promo.store') }}" method="post" enctype="multipart/form-data"
                                id="form-tambah-produk">
                                @csrf
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <span class="mdi mdi-alert"></span>
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="row" id="formProduk">
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Nama Promo<span class="text-danger">*</span></label>
                                        <input type="text" id="nama_promo" name="nama_promo"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="Contoh: Promo Tahun Baru" value="{{ old('nama_promo') }}" required>
                                    </div>

                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Kode Promo<span class="text-danger">*</span></label>
                                        <input type="text" name="kode_promo" id="kode_promo"
                                            placeholder="Contoh: NEWYEAR2025" class="form-control form-control-lg"
                                            min="0" value="{{ old('kode_promo') }}" required>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Tanggal Mulai Berlaku<span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                            class="form-control form-control-lg" value="{{ old('tanggal_mulai') }}"
                                            required>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Tanggal Berakhir<span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                            class="form-control form-control-lg" value="{{ old('tanggal_akhir') }}"
                                            required>
                                    </div>
                                    <div class="col-12 col-lg-12 mb-5">
                                        <label for="name" class="mb-2">Detail Kode Promo<span class="text-danger">*</span></label>
                                        <textarea name="detail" id="detail" class="form-control form-control-lg" placeholder="Ex: Selamat! Anda mendapat Cashback Saldo Gopay Rp. 10.000">{{ old('detail') }}</textarea>
                                    </div>

                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <button type="submit" class="btn btn-primary me-3">Tambahkan Data</button>
                                    <a href="{{ route('kode.promo.index') }}" class="btn btn-light">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
