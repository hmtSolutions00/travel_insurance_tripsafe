<header class="header" style="background-color: white;">
    <div class="container">
        <nav class="navbar navbar-expand-lg py-3 py-lg-0 px-0">
            <a class="navbar-brand" href="/"><img src="{{ asset('/frontend/assets/images/logo4.jpg') }}" alt="Brand Logo" title="Brand Logo" class="img-fluid" style="height: 50px"></a>
            <a class="navbar-brand" href="/"><span class="fw-bold fs-1" style="color:#0033c4; font-family: 'Aptos Narrow', sans-serif;">TRIP</span><span class="fw-bold fs-1" style="color:#0393D2; font-family: 'Aptos Narrow', sans-serif;">SAFE</span></a>
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
                            <li class="mb-2 mt-1"><a class="dropdown-item fw-bold" href="/contact-us">Contact Us</a></li><br>
                            <li class="mb-2"><a class="dropdown-item fw-bold" href="/brosur/file">Brosur</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
