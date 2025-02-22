@extends('admin.layouts.admin')

@section('admin')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">Detail Manfaat Asuransi</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('kelola.data_benefit.index') }}">Kelola Benefit</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Informasi Detail Manfaat</h4>
              <p class="card-description"> Berikut adalah informasi lengkap dari benefit yang dipilih </p>

              {{-- Tambahkan wrapper agar tabel bisa di-scroll saat data banyak --}}
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tr>
                    <th width="20%">Nama Paket</th>
                    <td>{{ $paketAsuransi->nama_paket }}</td>
                  </tr>
                  <tr>
                    <th>Tujuan Destinasi</th>
                    <td>
                      @foreach ($wilayahs as $wilayah)
                        {{ $wilayah->name }}{{ !$loop->last ? ', ' : '' }}
                      @endforeach
                    </td>
                  </tr>
                </table>
              </div>

              {{-- Tambahkan wrapper untuk tabel manfaat agar lebih responsif --}}
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="table-dark">
                    <tr>
                      <th><Strong>Manfaat</Strong></th>
                      <th><strong>Sub Manfaat</strong></th>
                      <th><strong>Harga</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($manfaatPakets as $manfaat)
                      @php
                        $opsiCount = $manfaat->opsiManfaats->count(); // Hitung jumlah sub-manfaat
                      @endphp
                      
                      @foreach ($manfaat->opsiManfaats as $index => $opsi)
                        @php
                          $detail = $detailManfaat->where('benefitOption', $opsi->id)->first();
                        @endphp
                        <tr>
                          {{-- Jika ini adalah opsi pertama, gunakan rowspan --}}
                          @if ($index === 0)
                            <td rowspan="{{ $opsiCount }}">{{ $manfaat->name }}</td>
                          @endif
                          <td>{{ $opsi->name }}</td>
                          <td>{{ $detail ? $detail->price : '-' }}</td>
                        </tr>
                      @endforeach
                    @endforeach
                  </tbody>
                </table>
              </div>

              {{-- Tombol Aksi --}}
              <div class="mt-4">
                <a href="{{ route('kelola.data_benefit.index') }}" class="btn btn-secondary">
                  <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('kelola.data_benefit.edit', ['insurance_type_id' => $detailManfaat->insurance_type_id, 'destionation_id' => base64_encode(json_encode($decodedDestinationId))]) }}" class="btn btn-warning">
                  <i class="mdi mdi-pencil"></i> Edit
                </a>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
