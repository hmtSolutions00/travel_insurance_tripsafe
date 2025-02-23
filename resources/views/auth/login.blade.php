<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Welcome to Ripsafe Dashboard Administrator</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{url('/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{url('/admin/assets/vendors/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{url('/admin/assets/vendors/css/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{url('/admin/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{url('/admin/assets/vendors/jquery-bar-rating/css-stars.css')}}">
        <link rel="stylesheet" href="{{url('/admin/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{url('/admin/assets/css/style.css')}}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{url('/admin/assets/images/favicon.png')}}" />
      </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                  <div class="brand-logo">
                    <img src="{{ asset($websiteConfig->logo) }}">
                  </div>
                  <h4>Hello! Trip SaFe Admin</h4>
                  <h6 class="fw-light">Login Untuk Melanjutkan</h6>
      
                  <form class="pt-3" method="POST" action="{{ route('login') }}">
                    @csrf
      
                    <!-- Email -->
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-lg" required placeholder="Email" value="{{ old('email') }}">
                      @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                      @enderror
                    </div>
      
                    <!-- Password -->
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-lg" required placeholder="Password">
                      @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                      @enderror
                    </div>
      
                    <!-- Remember Me -->
      
                    <!-- Submit Button -->
                    <div class="mt-3 d-grid gap-2">
                      <button type="submit" class="btn btn-block btn-primary btn-lg fw-semibold auth-form-btn">
                        MASUK
                      </button>
                    </div>
      
                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                      <div class="mt-3 text-center">
                        <a href="{{ route('password.request') }}" class="text-muted">Lupa Password?</a>
                      </div>
                    @endif
                  </form>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('/admin/assets/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
    <script src="{{url('/admin/assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{url('/admin/assets/vendors/flot/jquery.flot.js')}}"></script>
    <script src="{{url('/admin/assets/vendors/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{url('/admin/assets/vendors/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{url('/admin/assets/vendors/flot/jquery.flot.fillbetween.js')}}"></script>
    <script src="{{url('/admin/assets/vendors/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{url('/admin/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('/admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{url('/admin/assets/js/misc.js')}}"></script>
    <script src="{{url('/admin/assets/js/settings.js')}}"></script>
    <script src="{{url('admin/assets/js/todolist.js')}}"></script>
    <script src="{{url('admin/assets/js/hoverable-collapse.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{url('/addmin/assets/js/proBanner.js')}}"></script>
    <script src="{{url('/admin/assets/js/dashboard.js')}}"></script>
  </body>
</html>