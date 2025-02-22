<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
                <div class="nav-profile-image">
                    <img src="{{ url('/admin/assets/images/faces/face1.jpg') }}" alt="profile">
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                    <span class="fw-semibold mb-1 mt-2 text-center">Admin Tripsafe</span>

                </div>
            </a>
        </li>
        <li class="nav-item pt-3">
            <a class="nav-link d-block" href="index.html">
                <img class="sidebar-brand-logo" src="assets/images/logo.svg" alt="">
                <img class="sidebar-brand-logomini" src="assets/images/logo-mini.svg" alt="">
                <div class="small fw-light pt-1">Tripsafe Dashboard </div>
            </a>
        </li>
        {{-- Menu Utama --}}
        <li class="pt-2 pb-1">
            <span class="nav-item-head">Halaman Utama</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-account-search menu-icon"></i>
                <span class="menu-title">Kelola Data Customer</span>
            </a>
        </li>
        <li class="nav-item {{ $activeSidebar['master_pesanan_asuransi'] ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.data.pesanan_asuransi.index') }}">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Kelola Data Pesanan</span>
            </a>
        </li>
        <li class="nav-item {{ $activeSidebar['kelola_produk'] ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kelola.data_produk.index') }}">
                <i class="mdi mdi-certificate menu-icon"></i>
                <span class="menu-title">Kelola Produk Asuransi</span>
            </a>
        </li>
        <li class="nav-item {{ $activeSidebar['kelola_benefit'] ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kelola.data_benefit.index') }}">
                <i class="mdi mdi-heart-pulse menu-icon"></i>
                <span class="menu-title">Kelola Benefit Asuransi</span>
            </a>
        </li>
        {{-- End Menu Utama --}}

        <li class="pt-2 pb-1">
            <span class="nav-item-head">Data Master</span>

        </li>
        {{-- Menu Master --}}
        {{-- <li class="nav-item {{ request()->routeIs('mstTipePerjalananIndex', 'mstTipePerjalananCreate') ? 'active' : '' }}">
            <a class="nav-link"  href="{{route('mstTipePerjalananIndex')}}" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-airplane menu-icon"></i> <span class="menu-title">Tipe Perjalanan</span>
            </a>
          </li> --}}
        <li class="nav-item {{ $activeSidebar['master_tipe_perjalanan'] ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.master.tipe_perjalanan.index') }}">
                <i class="mdi mdi-airplane menu-icon"></i>
                <span class="menu-title">Tipe Perjalanan</span>
            </a>
        </li>

        <li class="nav-item {{ $activeSidebar['master_wilayah'] ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.master.wilayah.index') }}" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-map-marker menu-icon"></i> <span class="menu-title">Data Wilayah</span>
            </a>
        </li>
        <li class="nav-item {{ $activeSidebar['master_tipe_asuransi'] ? 'active' : '' }}">
            <a class="nav-link" href=" {{ route('admin.master.tipe_asuransi.index') }}" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-shield-outline menu-icon"></i> <span class="menu-title">Tipe Asuransi</span>
            </a>
        </li>
        <li class="nav-item {{ $activeSidebar['master_tipe_pelanggan'] ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.master.tipe_pelanggan.index') }}" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-account-multiple menu-icon"></i> <span class="menu-title">Tipe Pelanggan</span>
            </a>
        </li>
        <li class="nav-item {{ $activeSidebar['paket_asuransi'] ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.paket_asuransi.index') }}" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-file-document-outline menu-icon"></i> <span class="menu-title">Paket Asuransi</span>
            </a>
        </li>
        <li class="nav-item {{ $activeSidebar['benefit_asuransi'] ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.benefit_asuransi.index') }}" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-shield-check menu-icon"></i>
                <span class="menu-title">Benefit Asuransi</span>
            </a>
        </li>

        {{-- End Menu Master --}}
    </ul>
</nav>
<!-- partial navbar -->
