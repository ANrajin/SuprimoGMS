<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Suprimo</title>
    <!--favicon-->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon" />
    <!-- Bootstrap core CSS-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{asset('assets/css/app-style.css')}}" rel="stylesheet" />
  </head>

  <body class="bg-theme bg-custom">
    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
      <div class="loader-wrapper-outer">
        <div class="loader-wrapper-inner"><div class="loader"></div></div>
      </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper" style="top: 150px;">
      <div class="loader-wrapper">
        <div class="lds-ring">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <div class="card-login card-authentication1 mx-auto my-5">
        <div class="card-body">
          <div class="card-content p-2">
            <div class="text-center">
              <img src="assets/images/logo-icon.png" alt="logo icon" />
            </div>
            <div class="card-title text-uppercase text-center py-3">
              {{ __('Login') }}
            </div>
            {{-- form --}}
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group">
                <label for="email" class="sr-only"
                  >{{ __('E-Mail Address') }}</label
                >
                <div class="position-relative has-icon-right">
                  <input
                    id="email" 
                    type="email"
                    name="email"
                    class="form-control input-shadow @error('email') is-invalid @enderror"
                    placeholder="Enter Email"
                    value="{{ old('email') }}" 
                    required
                  />
                  <div class="form-control-position">
                    <i class="icon-user"></i>
                  </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password" class="sr-only"
                  >{{ __('Password') }}</label
                >
                <div class="position-relative has-icon-right">
                  <input
                    type="password"
                    type="password"
                    name="password" 
                    class="form-control input-shadow @error('password') is-invalid @enderror"
                    placeholder="Enter Password"
                    required 
                    autocomplete="current-password"
                  />
                  <div class="form-control-position">
                    <i class="icon-lock"></i>
                  </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-row">
                <div class="form-group col-6">
                  <div class="icheck-material-white">
                    <input type="checkbox" id="user-checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                    <label for="user-checkbox">Remember me</label>
                  </div>
                </div>
                @if (Route::has('password.request'))
                  <div class="form-group col-6 text-right">
                      <a href="{{ route('password.request') }}"
                      >{{ __('Forgot Password?') }}</a
                      >
                  </div>
                @endif
              </div>
              <button type="submit" class="btn btn-light btn-block">
                Sign In
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- sidebar-menu js -->
    <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>

    <!-- Custom scripts -->
    <script src="{{asset('assets/js/app-script.js')}}"></script>
  </body>
</html>
