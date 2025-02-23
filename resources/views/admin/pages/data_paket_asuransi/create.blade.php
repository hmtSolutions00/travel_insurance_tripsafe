@extends('admin.layouts.admin')

@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tambah Data Produk Asuransi </h3>
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
                            <form action="{{ route('kelola.data_produk.store') }}" method="post"
                                enctype="multipart/form-data" id="form-tambah-produk">
                                @csrf
                                <div class="row" id="formProduk">
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Nama Produk</label>
                                        <input type="text" id="product_name" name="product_name"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="Contoh: Deluxe, dll" value="{{ old('product_name') }}">
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Jenis Paket</label>
                                        <select name="package_id" id="package_id" class="form-control form-control-lg">
                                            <option value="0" selected disabled>Pilih Jenis Paket</option>
                                            @foreach ($paket_asuransi as $pkt)
                                                <option value="{{ $pkt->id }}">{{ $pkt->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Jenis Asuransi</label>
                                        <select name="tipe_asuransi" id="tipe_asuransi"
                                            class="form-control form-control-lg">
                                            <option value="0" selected disabled>Pilih Jenis Asuransi</option>
                                            @foreach ($tipe_asuransi as $tp)
                                                <option value="{{ $tp->id }}">{{ $tp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Wilayah Tujuan</label>
                                        <select name="wilayah" id="wilayah" class="form-control form-control-lg">
                                            <option value="0" selected disabled>Pilih Wilayah Tujuan</option>
                                            @foreach ($wilayah as $wil)
                                                <option value="{{ $wil->id }}">{{ $wil->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Tipe Perjalanan</label>
                                        <select name="tipe_perjalanan" id="tipe_perjalanan"
                                            class="form-control form-control-lg">
                                            <option value="0" selected disabled>Pilih Tipe Perjalanan</option>
                                            @foreach ($tipe_perjalanan as $tiPer)
                                                <option value="{{ $tiPer->id }}">{{ $tiPer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Tipe Pelanggan</label>
                                        <div class="form-check-label d-flex flex-wrap">
                                            @foreach ($tipe_pelanggan as $tiPel)
                                                <div class="form-check me-2 mt-3">
                                                    <label class="form-check-label"
                                                        for="tipePelanggan_{{ $tiPel->id }}">{{ $tiPel->name }}<i
                                                            class="input-helper"></i>
                                                        <input type="checkbox" class="form-check-input "
                                                            name="tipePelanggan_id[]" value="{{ $tiPel->id }}"
                                                            id="tiPelanggan_{{ $tiPel->id }}"
                                                            {{ in_array($tiPel->id, old('tipePelanggan_id', [])) ? 'checked' : '' }}></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Harga E-Polis dan Materai (IDR)</label>
                                        <input type="number" name="cetak_polis" id="cetak_polis"
                                            placeholder="Contoh: 10000" class="form-control form-control-lg" min="0"
                                            value="{{ old('cetak_polis') }}">
                                    </div>

                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="name" class="mb-2">Premi (IDR)</label>
                                        <input type="number" name="premi" id="premi" placeholder="Contoh: 50000"
                                            class="form-control form-control-lg" min="0">
                                    </div>

                                    <div class="col-12 col-lg-4 mb-3" id="extraPrice">
                                        <label for="name" class="mb-2">Harga Tambahan per Minggu (IDR)</label>
                                        <input type="number" name="extra_price" id="extra_price"
                                            placeholder="Contoh: 50000" class="form-control form-control-lg" min="0"
                                            value="{{ old('extra_price') }}">
                                    </div>
                                    <div class="col-12 col-lg-4 mb-5" id="waktuMin">
                                        <label for="name" class="mb-2">Durasi Minimal Perjalanan</label>
                                        <input type="number" name="durasi_min" id="durasi_min"
                                            placeholder="Minimal 1 & Maksimal 31" class="form-control form-control-lg"
                                            min="1" max="31" value="{{ old('durasi_min') }}">
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3" id="waktuMaks">
                                        <label for="name" class="mb-2">Durasi Maksimal Perjalanan</label>
                                        <input type="number" name="durasi_maks" id="durasi_maks"
                                            placeholder="Minimal 1 & Maksimal 31" class="form-control form-control-lg"
                                            min="1" max="31" value="{{ old('durasi_maks') }}">
                                    </div>


                                    <script>
                                        var tipePerjalanan = document.getElementById('tipe_perjalanan');
                                        tipePerjalanan.addEventListener('change', removeTiper);

                                        function removeTiper() {
                                            console.log("oke");
                                            var tipe_perjalanan = tipePerjalanan.value;
                                            const waktuMin = document.getElementById('waktuMin');
                                            const waktuMaks = document.getElementById('waktuMaks');
                                            const extraPrices= document.getElementById('extraPrice');
                                            const formTambah = document.getElementById('formProduk');
                                            console.log(tipe_perjalanan, waktuMaks, waktuMin)
                                            if (tipe_perjalanan == 2) {
                                                waktuMin.remove();
                                                waktuMaks.remove();
                                                extraPrices.remove();
                                            } else {
                                                if (waktuMin1 == null && waktuMaks1 == null) {
                                                    var waktuMin1 = document.getElementById('waktuMin');
                                                    var waktuMaks1 = document.getElementById('waktuMaks');
                                                    var extraPrice1= document.getElementById('extraPrice');
                                                    console.log(waktuMaks1, waktuMin1,extraPrice1);

                                                    if (waktuMin1 == null && waktuMaks1 == null) {
                                                        var divMin = document.createElement('div');
                                                        divMin.id = 'waktuMin';
                                                        divMin.className = 'col-12 col-lg-4 mb-5';
                                                        divMin.innerHTML = `
                                                                <label for="name" class="mb-2">Durasi Minimal Perjalanan</label>
                                                                <input type="number" name="durasi_min" id="durasi_min"
                                                                    placeholder="Minimal 1 & Maksimal 31" class="form-control form-control-lg"
                                                                    min="1" max="31" value="{{ old('durasi_min') }}">
                                                        `;
                                                        formTambah.appendChild(divMin);


                                                        var divMaks = document.createElement('div');
                                                        divMaks.id = 'waktuMaks';
                                                        divMaks.className = 'col-12 col-lg-4 mb-5';
                                                        divMaks.innerHTML = `
                                                                <label for="name" class="mb-2">Durasi Maksimal Perjalanan</label>
                                                                <input type="number" name="durasi_maks" id="durasi_maks"
                                                                    placeholder="Minimal 1 & Maksimal 31" class="form-control form-control-lg"
                                                                    min="1" max="31" value="{{ old('durasi_maks') }}">
                                                        `;
                                                        formTambah.appendChild(divMaks);


                                                        var extraPrice = document.createElement('div');
                                                        extraPrice.id = 'extraPrice';
                                                        extraPrice.className = 'col-12 col-lg-4 mb-5';
                                                        extraPrice.innerHTML = `
                                                                 <label for="name" class="mb-2">Harga Tambahan per Minggu (IDR)</label>
                                                                <input type="number" name="extra_price" id="extra_price"
                                                                    placeholder="Contoh: 50000" class="form-control form-control-lg" min="0"
                                                                    value="{{ old('extra_price') }}">
                                                        `;
                                                        formTambah.appendChild(extraPrice);
                                                    }
                                                }
                                            }

                                        }
                                    </script>

                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <button type="submit" class="btn btn-primary me-3">Tambahkan Data</button>
                                    <a href="{{ route('admin.paket_asuransi.index') }}" class="btn btn-light">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
