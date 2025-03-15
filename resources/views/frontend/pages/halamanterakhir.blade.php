@extends('frontend.layout.layout')

@section('content')
    <div class="container">
        <!-- search engine tabs -->
        <div class="row  mt-0" style="place-content: center">
            <div class="col-12 col-lg-8 mb-5 text-center position-relative">
                <div class="row">
                    <div class="col-12 col-lg-12 mb-4 text-center position-relative" style="border-radius: 12px">
                        <a class="navbar-brand" href="/"><img src="{{ asset($websiteConfig->logo) }}"
                            alt="Brand Logo" title="Brand Logo" class="img-fluid" style="height: 200px"></a>
                    </div>
                    <div class="col-12 col-lg-12 text-center bg-white position-relative" style="border-radius: 12px">
                        <div class="m-5">
                            <h4 class="mb-3">TERIMAKASIH</h4>
                            <h4 class="mb-3">Pemesanan Berhasil!</h4>
                            <i class="fa-solid fa-circle-info mb-3"></i> Penawaran dan cara bayar akan dikirimkan ke email anda dalam 1x24 jam</br>
                            Apabila dibutuhkan informasi lebih lanjut silahkan menghubungi 0878 8021 5522
                            <br>
                            <a href="/" class="btn text-white mt-3" style="background-color: #0393D2">Kembali ke
                                Halaman Penawaran</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
