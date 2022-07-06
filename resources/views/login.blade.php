<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Tahfidzul Quran</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('images/sitaq/sitaqu-icon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo mb-0 text-center">
                <img src="{{asset('images/sitaq/sitaqu-login.png')}}" alt="logo" style="width: 300px;">
              </div>
              <!-- <h3 class="text-center text-bold"> LOGIN PAGE</h3> -->
           
              <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->
              @if ($message = Session::get('passwordsalah'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
              <form class="pt-3" method="POST" action="/login/proses">
                @csrf
                <div class="form-group">
                  @error('username')
                  <small class="alert alert-dabger">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Peringtan</strong> {{ $message }}
                    </div>
                  </small>
                  @enderror
                  <label for="exampleInputPassword1"> <b>Username</b></label>

                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Masukan Username">
                </div>
                <div class="form-group">
                  @error('password')
                  <small class="alert alert-dabger">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Peringtan</strong> {{ $message }}
                    </div>
                  </small>
                  @enderror
                  <label for="exampleInputPassword1"> <b>Password</b></label>
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Masukan Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Tetap masuk
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Lupa password?</a>
                </div>

                <div class="text-center mt-4 font-weight-light">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>