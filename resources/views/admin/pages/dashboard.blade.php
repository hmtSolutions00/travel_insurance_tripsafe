@extends('admin.layouts.admin')
@section('admin')

    <div class="content-wrapper pb-0">
      <div class="page-header flex-wrap">
        <div class="header-left">
          <button class="btn btn-primary mb-2 mb-md-0 me-2">Kelola Data Pesanan</button>
          <button class="btn btn-outline-primary bg-white mb-2 mb-md-0">Kelola Paket Travel</button>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
          <div class="d-flex align-items-center">
            <a href="#">
              <p class="m-0 pe-3">Dashboard</p>
            </a>  
          </div>
        </div>
      </div>
    
     
      <!-- last row starts here -->
      <div class="row">
        <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
          <div class="card">
              <div class="card-body">
                  <div class="card-title mb-2"> Data Pesanan Terbaru </div>
                  <h3 class="mb-3">17 Februari 2025</h3>
                  <div class="d-flex border-bottom border-top py-3">
                      <div class="form-check">
                          <label class="form-check-label">
                              <i class="mdi mdi-new-box d-block" style="color: green;"></i>
                          </label>
                      </div>
                      <div class="ps-2">
                          <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
                          <p class="m-0 text-black">Hey I attached some new PSD files…</p>
                      </div>
                  </div>
                  <div class="d-flex border-bottom py-3">
                      <div class="form-check">
                          <label class="form-check-label">
                              <i class="mdi mdi-new-box d-block" style="color: green;"></i>
                          </label>
                      </div>
                      <div class="ps-2">
                          <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
                          <p class="m-0 text-black">Discuss performance with manager</p>
                      </div>
                  </div>
                  <div class="d-flex border-bottom py-3">
                      <div class="form-check">
                          <label class="form-check-label">
                              <i class="mdi mdi-new-box d-block" style="color: green;"></i>
                          </label>
                      </div>
                      <div class="ps-2">
                          <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
                          <p class="m-0 text-black">Meeting with Alisa </p>
                      </div>
                  </div>
                  <div class="d-flex pt-3">
                      <div class="form-check">
                          <label class="form-check-label">
                              <i class="mdi mdi-new-box d-block" style="color: green;"></i>
                          </label>
                      </div>
                      <div class="ps-2">
                          <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
                          <p class="m-0 text-black">Hey I attached some new PSD files…</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="d-flex border-bottom mb-4 pb-2">
                <div class="hexagon">
                  <div class="hex-mid hexagon-warning">
                    <i class="mdi mdi-clock-outline"></i>
                  </div>
                </div>
                <div class="ps-4">
                  <h4 class="fw-bold text-warning mb-0">12.45</h4>
                  <h6 class="text-muted">Schedule Meeting </h6>
                </div>
              </div>
              <div class="d-flex border-bottom mb-4 pb-2">
                <div class="hexagon">
                  <div class="hex-mid hexagon-danger">
                    <i class="mdi mdi-account-outline"></i>
                  </div>
                </div>
                <div class="ps-4">
                  <h4 class="fw-bold text-danger mb-0">34568</h4>
                  <h6 class="text-muted">Profile Visits</h6>
                </div>
              </div>
              <div class="d-flex border-bottom mb-4 pb-2">
                <div class="hexagon">
                  <div class="hex-mid hexagon-success">
                    <i class="mdi mdi-laptop"></i>
                  </div>
                </div>
                <div class="ps-4">
                  <h4 class="fw-bold text-success mb-0">33.50%</h4>
                  <h6 class="text-muted">Bounce Rate</h6>
                </div>
              </div>
              <div class="d-flex border-bottom mb-4 pb-2">
                <div class="hexagon">
                  <div class="hex-mid hexagon-info">
                    <i class="mdi mdi-clock-outline"></i>
                  </div>
                </div>
                <div class="ps-4">
                  <h4 class="fw-bold text-info mb-0">12.45</h4>
                  <h6 class="text-muted">Schedule Meeting</h6>
                </div>
              </div>
              <div class="d-flex">
                <div class="hexagon">
                  <div class="hex-mid hexagon-primary">
                    <i class="mdi mdi-timer-sand"></i>
                  </div>
                </div>
                <div class="ps-4">
                  <h4 class="fw-bold text-primary mb-0">12.45</h4>
                  <h6 class="text-muted mb-0">Browser Usage</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
          <div class="card color-card-wrapper">
            <div class="card-body">
              <img class="img-fluid card-top-img w-100" src="{{url('/admin/assets/images/dashboard/img_5.jpg')}}" alt="">
              <div class="d-flex flex-wrap justify-content-around color-card-outer">
                <div class="col-6 p-0 mb-4">
                  <div class="color-card bg-success m-auto">
                    <i class="mdi mdi-new-box"></i>
                    <p class="fw-semibold mb-0">Data Terbaru</p>
                    <span class="small">15 Data</span>
                  </div>
                </div>
                <div class="col-6 p-0 mb-4">
                  <div class="color-card bg-danger  m-auto">
                    <i class="mdi mdi-clock-time-four-outline"></i>
                    <p class="fw-semibold mb-0">Belum di Proses</p>
                    <span class="small">7 Data</span>
                  </div>
                </div>
                <div class="col-6 p-0">
                  <div class="color-card bg-info m-auto">
                    <i class="mdi mdi-check-circle-outline"></i>
                    <p class="fw-semibold mb-0">Selesai di Proses</p>
                    <span class="small">34 Data</span>
                  </div>
                </div>
                <div class="col-6 p-0">
                  <div class="color-card bg-warning m-auto">
                    <i class="mdi mdi-presentation"></i>
                    <p class="fw-semibold mb-0">Pending</p>
                    <span class="small">72 Support</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    
@endsection
