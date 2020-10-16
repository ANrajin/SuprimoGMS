@extends('layouts.app')
@section('content')
            <div class="container-fluid">
          <!--Start Dashboard Content-->

          <div class="card mt-3">
            <div class="card-content">
              <div class="row row-group m-0">
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                  <div class="card-body">
                    <h5 class="text-white mb-0">
                      9526
                      <span class="float-right"
                        ><i class="fa fa-shopping-cart"></i
                      ></span>
                    </h5>
                    <div class="progress my-3" style="height: 3px;">
                      <div class="progress-bar" style="width: 55%;"></div>
                    </div>
                    <p class="mb-0 text-white small-font">
                      Total Orders
                      <span class="float-right"
                        >+4.2% <i class="zmdi zmdi-long-arrow-up"></i
                      ></span>
                    </p>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                  <div class="card-body">
                    <h5 class="text-white mb-0">
                      8323
                      <span class="float-right"><i class="fa fa-usd"></i></span>
                    </h5>
                    <div class="progress my-3" style="height: 3px;">
                      <div class="progress-bar" style="width: 55%;"></div>
                    </div>
                    <p class="mb-0 text-white small-font">
                      Total Revenue
                      <span class="float-right"
                        >+1.2% <i class="zmdi zmdi-long-arrow-up"></i
                      ></span>
                    </p>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                  <div class="card-body">
                    <h5 class="text-white mb-0">
                      6200
                      <span class="float-right"><i class="fa fa-eye"></i></span>
                    </h5>
                    <div class="progress my-3" style="height: 3px;">
                      <div class="progress-bar" style="width: 55%;"></div>
                    </div>
                    <p class="mb-0 text-white small-font">
                      Visitors
                      <span class="float-right"
                        >+5.2% <i class="zmdi zmdi-long-arrow-up"></i
                      ></span>
                    </p>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3 border-light">
                  <div class="card-body">
                    <h5 class="text-white mb-0">
                      5630
                      <span class="float-right"
                        ><i class="fa fa-envira"></i
                      ></span>
                    </h5>
                    <div class="progress my-3" style="height: 3px;">
                      <div class="progress-bar" style="width: 55%;"></div>
                    </div>
                    <p class="mb-0 text-white small-font">
                      Messages
                      <span class="float-right"
                        >+2.2% <i class="zmdi zmdi-long-arrow-up"></i
                      ></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="alert alert-warning text-center p-2">
            <span>Project is under development process</span>
          </div>
          <!--End Dashboard Content-->
        </div>
@endsection
@push('scripts')
    <!-- loader scripts -->
    <script src="{{asset('assets/js/jquery.loading-indicator.html')}}"></script>
    <!-- Chart js -->

    <script src="{{asset('assets/plugins/Chart.js/Chart.min.js')}}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- Easy Pie Chart JS -->
    <script src="{{asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <!-- Sparkline JS -->
    <script src="{{asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-knob/excanvas.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

    <script>
      $(function () {
        $(".knob").knob();
      });
    </script>
@endpush