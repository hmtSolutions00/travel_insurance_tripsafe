@extends('frontend.layout.layout')

@section('content')
    <div class="search-engine">
        <div class="container">
            <!-- search engine tabs -->
            <div class="row  mt-0" style="place-content: center">
                <div class="col-12 col-lg-8 mb-5 text-center position-relative">
                    <div class="row">
                        <div class="col-12 col-lg-12 mb-4 text-center position-relative" style="border-radius: 12px">
                            <a class="navbar-brand" href="/"><img src="{{ asset('/frontend/assets/images/logo4.jpg') }}"
                                    alt="Brand Logo" title="Brand Logo" class="img-fluid" style="height: 300px"></a>
                        </div>
                        <div class="col-12 col-lg-12 text-center bg-white position-relative" style="border-radius: 12px">
                            <div class="m-4">
                                <h4 class="mb-3">Terimakasih! Pesanan asuransi perjalanan anda berhasil terkirim</h4>
                                <i class="fa-solid fa-circle-info mb-3"></i> Anda akan dihubungi kembali dalam 1x24 jam
                                melalui kontak WhatsApp
                                <br>
                                <a href="/" class="btn text-white mt-3" style="background-color: #0393D2">Kembali ke
                                    Halaman Penawaran</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
