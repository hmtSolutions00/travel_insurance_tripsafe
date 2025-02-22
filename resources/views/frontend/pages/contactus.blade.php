@extends('frontend.layout.layout')

@section('content')
    <div class="search-engine">
        <div class="container">
            <!-- search engine tabs -->
            <div class="row  mt-0" style="place-content: center">
                <div class="col-12 col-lg-8 mb-5 text-center position-relative">
                    <div class="row">
                        <div class="col-12 col-lg-12 mb-2 text-center position-relative" style="border-radius: 12px">
                            <a class="navbar-brand" href="/"><img src="{{ asset('/frontend/assets/images/logo2.png') }}"
                                    alt="Brand Logo" title="Brand Logo" class="img-fluid" style="height: 300px"></a>
                        </div>
                        <div class="col-12 col-lg-12 text-center bg-white position-relative" style="border-radius: 12px">
                            <div class="m-4">
                                <h1 class="fw-bold m-4">Hubungi Kami !</h1>
                                <div class="flex-grow-1">
                                    <i class="fa-brands fa-whatsapp fa-2xl"></i>
                                    <span class="fs-5 theme-text-dark"> +(62) 81234567890</span>
                                </div>
                                <div class="flex-grow-1 mt-4">
                                    <i class="fa-solid fa-envelope fa-2xl"></i>
                                    <span class="fs-5 theme-text-dark"> safetrip@example.com</span>
                                </div>
                                <div class="flex-grow-1 mt-4">
                                    <i class="fa-brands fa-instagram fa-2xl"></i>
                                    <a href="//instagram.com" class="text-dark"><span class="fs-5 theme-text-dark">
                                            safetrip_insurance</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
