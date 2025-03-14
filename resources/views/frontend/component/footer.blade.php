<!-- footer section-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="mb-3 fs-6">Contact Us</h5>
                @foreach ($socialMedias as $social)
                <div class="flex-grow-1">
                    <img src="{{ asset('/admin/social_media_icons/' . $social->icon) }}"
                    alt="{{ $social->name }}" style="width: 20px; height: 20px; object-fit: contain;">
                <a href="//{{ $social->link }}" target="_blank" class="btn theme-text-dark text-dark">
                    {{ $social->name }}
                </a>
                </div>
                <br>
                @endforeach
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex justify-content-lg-center">
                    <h5 class="mb-3 fs-6">Other Services</h5>
                </div>
                <div class="d-flex justify-content-lg-center">
                    <ul class="fl-menu">
                        <li class="nav-item"><a href="/" class="text-dark">Penawaran Asuransi</a></li>
                        <li class="nav-item"><a href="/contact-us" class="text-dark">Contact Us</a></li>
                        <li class="nav-item"><a href="{{route('frontend.pages.halamanfile')}}" class="text-dark">Others</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-6 mb-5 mb-lg-0">
                <h5 class="mb-3 fs-6">About Us</h5>
                <div class="flex-grow-1">
                    <span class="text-sm theme-text-dark"> Selamat Datang di <span class="fw-bold">TripSafe</span><br>
                    {{ $websiteConfig->about_us }}
                        </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="bi bi-chevron-double-up"></i></a>
</footer>
