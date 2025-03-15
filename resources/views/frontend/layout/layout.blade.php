<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $websiteConfig->about_us }}">
    <meta name="keywords" content="{{ $websiteConfig->keywords }}">
    <title>{{ $websiteConfig->title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="80x80" href="{{ asset($websiteConfig->logo) }}">
    <!-- Main CSS -->
    <link href="{{ asset('/frontend/assets/css/main.css') }}" rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css') }}"
        crossorigin="anonymous">

    <style>
        .cust-tab li .nav-link {
            background-color: transparent;
            border: 0px solid transparent;
            position: relative;
            color: #0393D2;
            min-width: 100px;
            border: 2px solid;
            border-top-left-radius: 0%;
            border-top-right-radius: 0%;
            border-color: #0393D2;
            font-size: x-small;
        }

        .cust-tab li .nav-link.active {
            background-color: #0393D2;
            border: 0px solid transparent;
            position: relative;
            color: white;
            min-width: 100px;
            border: 2px solid;
            border-top-left-radius: 0%;
            border-top-right-radius: 0%;
            border-color: #0393D2;
        }
    </style>
</head>

<body>
    <!-- page content area -->
    <div class="pagewrap">

        {{-- header --}}
        @include('frontend.component.header')

        <div class="search-engine"
            style="background: url('{{ asset($websiteConfig->url_photo_background) }}');background-size: cover;background-position: center;height: 100%; background-attachment: scroll;">
            @yield('content')
        </div>

        {{-- footer --}}
        @include('frontend.component.footer')
    </div>


    <!-- js file -->
    <script src="{{ asset('/frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}"></script>
    <script>
        // Scroll Top
        $(document).ready(function() {
            var ScrollTop = $(".scrollToTop");
            $(window).on('scroll', function() {
                if ($(this).scrollTop() < 500) {
                    ScrollTop.removeClass("active");
                } else {
                    ScrollTop.addClass("active");
                }
            });
            $('.scrollToTop').on('click', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
                return false;
            });
        });

        function formatRupiah(angka) {
            return 'IDR ' + angka.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }
    </script>
</body>

</html>
