
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{config('app.name')}} | Company Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('assets')}}/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets')}}/css/style.css">
  <!-- endinject -->
  <link href="{{asset('assets/rodcem')}}/favicon.png" rel="shortcut icon" type="image/png">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{asset('assets/rodcem/logo.png')}}" alt="logo">
              </div>
              <h4>Welcome back!</h4>

              <h6 class="font-weight-light">Happy to see you again!</h6>

              @if (session('deactive'))
                  <p class="text-danger mt-1">{{session('deactive')}}</p>
              @endif 
              
              @if (session('error'))                  
                <p class="text-danger mt-1">{{session('error')}}</p>
              @endif

              <form action="{{route('company.login.submit')}}" method="post" class="pt-3">
                @csrf
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control"  placeholder="Enter Password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                  </div>
    
                {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div> --}}

                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="{{route('company.register')}}" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row" style="background: url('{{asset('assets/rodcem/image.jpg')}}')">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets')}}/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('assets')}}/js/off-canvas.js"></script>
  <script src="{{ asset('assets')}}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('assets')}}/js/template.js"></script>
  <script src="{{ asset('assets')}}/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
