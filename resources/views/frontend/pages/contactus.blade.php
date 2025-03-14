@extends('frontend.layout.layout')

@section('content')
    <div class="container">
        <div class="row mt-0" style="place-content: center">
            <div class="col-12 col-lg-8 mb-5 text-center position-relative">
                <div class="row">
                    <div class="col-12 col-lg-12 mb-2 text-center position-relative" style="border-radius: 12px">
                        <a class="navbar-brand" href="/"><img src="{{ asset($websiteConfig->logo) }}"
                            alt="Brand Logo" title="Brand Logo" class="img-fluid" style="height: 200px"></a>
                    </div>
                    <div class="col-12 col-lg-12 text-center bg-white position-relative" style="border-radius: 12px">
                        <div class="m-4">
                            <h1 class="fw-bold m-4">Hubungi Kami!</h1>

                            @foreach ($socialMedias as $social)
                                <div class="flex-grow-1 mt-4">
                                    <img src="{{ asset('/admin/social_media_icons/' . $social->icon) }}"
                                        alt="{{ $social->name }}" style="width: 30px; height: 30px; object-fit: contain;">
                                    <a href="{{ $social->link }}" target="_blank" class="fs-5 theme-text-dark text-dark">
                                        {{ $social->name }}
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
