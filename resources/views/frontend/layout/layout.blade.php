<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ThemesLay">
    <title>SafeTrip - Insurance Travel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="80x80" href="{{ asset('/frontend/assets/images/logo4.jpg') }}">
    <!-- Main CSS -->
    <link href="{{ asset('/frontend/assets/css/main.css') }}" rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css') }}"
        crossorigin="anonymous">
</head>

<body>
    <!-- page content area -->
    <div class="pagewrap">

        {{-- header --}}
        @include('frontend.component.header')

        <div class="search-engine">
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
