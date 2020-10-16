<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from codervent.com/dashtreme/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jul 2019 14:53:40 GMT -->
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Suprimo- Garments Management System</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />

    {{-- App styles --}}
    @include('assets.styles')
  </head>
    <body class="bg-theme bg-theme1">
    <!-- start loader -->
    {{-- <div id="pageloader-overlay" class="visible incoming">
      <div class="loader-wrapper-outer">
        <div class="loader-wrapper-inner"><div class="loader"></div></div>
      </div>
    </div> --}}
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">
        @include('components.sidebar')
      <!--Start topbar header-->
        @include('components.topbar')
      <!--End topbar header-->

      <div class="clearfix"></div>

      <div class="content-wrapper">
          @yield('content')
        <!-- End container-fluid-->
      </div>
      <!--End content-wrapper-->
      <!--Start Back To Top Button-->
      <a href="javaScript:void();" class="back-to-top"
        ><i class="fa fa-angle-double-up"></i>
      </a>
      <!--End Back To Top Button-->
    </div>
    <!--End wrapper-->

    @include('assets.scripts')
  </body>