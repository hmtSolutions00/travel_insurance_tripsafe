<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plus Admin</title>
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
    <link rel="icon" type="image/png" sizes="80x80" href="{{ asset($websiteConfig->logo) }}">
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.components.sidebar')
        <!-- partial -->
      <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                      <!-- partial:partials/_navbar.html -->
                        @include('admin.components.header')
                     <!-- partial -->
                <!--start main -->
                         @yield('admin')
                <!-- end main-panel ends -->
                @include('admin.components.footer')
      </div>
      </div>


    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    @yield('jseextend')
    <!-- endinject -->
    <!-- Plugin js for this page -->
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
    <!-- End custom js for this page -->
  </body>
</html>
