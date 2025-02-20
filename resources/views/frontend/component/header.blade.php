<header class="header" style="background-color: transparent;">
    <div class="container">
        <nav class="navbar navbar-expand-lg py-3 py-lg-0 px-0">
            {{-- <a class="navbar-brand" href="index.html"><img src="{{ asset('/frontend/assets/images/logo.png') }}" alt="Brand Logo" title="Brand Logo" class="img-fluid"></a> --}}
            <a class="navbar-brand" href="/"><h1 class="fw-bold">Logo</h1></a>
            <button class="navbar-toggler px-1 btn rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: right">
                {{-- <ul class="navbar-nav me-auto page-menu" id="nav">
                    <li class="nav-item"><a class="nav-link pe-5 ps-0 ps-lg-5" href="#deals">Deals</a></li>
                    <li class="nav-item"><a class="nav-link pe-5" href="#offers">Offers</a></li>
                    <li class="nav-item"><a class="nav-link pe-5" href="#holidays">Holidays</a></li>
                    <li class="nav-item"><a class="nav-link pe-5" href="#review">Review</a></li>
                </ul> --}}
                <ul class="navbar-nav page-menu mb-3 mb-lg-0">
                    <!-- language list -->
                    {{-- <li class="nav-item dropdown">
                        <a href="#" class="nav-link mein-link dropdown-toggle" id="navbarDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-globe me-2"></i>Eng</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="#">Russian</a></li>
                            <li><a class="dropdown-item" href="#">French</a>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- Currency list -->
                    {{-- <li class="nav-item dropdown">
                        <a href="#" class="nav-link mein-link dropdown-toggle" id="navbarDropdown2" data-bs-toggle="dropdown" aria-expanded="false">INR</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li><a class="dropdown-item" href="#">USD</a></li>
                            <li><a class="dropdown-item" href="#">EUR</a>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- user account  -->
                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link mein-link d-inline-block position-relative">
                            <i class="bi bi-bell"></i>
                            <span class="position-absolute translate-middle p-1 bg-success border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </a>
                    </li> --}}
                    <!-- user account  -->
                    <li class="nav-item dropdown my-auto" style="color: transparent">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown3" data-bs-toggle="dropdown" aria-expanded="false" style="color: transparent"><span class="d-inline-block p-2 theme-bg-white rounded-circle lh-1"><i class="fa-solid fa-bars-staggered text-primary fa-md"></i></span></a>
                        <ul class="dropdown-menu dropdown-menu-end sub-menu text-center" aria-labelledby="navbarDropdown3" style="color:transparent">
                            <li><a class="dropdown-item fw-bold" href="/contact-us">Contact Us</a></li><br>
                            <li><a class="dropdown-item fw-bold" href="#">Menu 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
