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
                        <div class="m-4">
                            <div class="row">
                                <h5 class="mb-3">Berikut adalah beberapa brosur terkait paket asuransi kami! </h5>
                                @forelse ($brochures as $index => $brosur)
                                    <div class="col-12 col-lg-12 mb-2">
                                        <a href="{{ asset($brosur->url_file) }}"><i
                                                class="fa-solid fa-file-pdf text-danger"></i><span>
                                                {{ $brosur->name }}</span></a>
                                    </div>
                                @empty
                                    <div class="col-12 col-lg-12 mb-2">
                                        <span> Belum ada data brosur disini </span>
                                    </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
