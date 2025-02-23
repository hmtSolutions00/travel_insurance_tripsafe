   <!-- partial:partials/_navbar.html -->
   <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-chevron-double-left"></span>
      </button>
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../../assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item dropdown ms-3">
          <a class="nav-link" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="mdi mdi-account d-block mb-1"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <h6 class="px-3 py-3 fw-semibold mb-0">Profile</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                        <i class="mdi mdi-account"></i> </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject fw-normal mb-0">Profil Anda</h6>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                        <i class="mdi mdi-account-edit"></i> </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject fw-normal mb-0">Ubah Profil</h6>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
          <a class="dropdown-item preview-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                      <i class="mdi mdi-logout"></i>
                  </div>
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject fw-normal mb-0">Keluar</h6>
              </div>
          </a>
          
            <div class="dropdown-divider"></div>
        </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-logout d-none d-md-block me-3">
        <li class="nav-item nav-logout d-none d-lg-block">
          <a class="nav-link" href="index.html">
            <i class="mdi mdi-home-circle"></i>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>