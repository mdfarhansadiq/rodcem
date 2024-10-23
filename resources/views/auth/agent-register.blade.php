
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rodcem  Agent Register</title>
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
              <div class="brand-logo text-center">
                <img src="{{asset('assets/rodcem/logo.png')}}" alt="logo">
              </div>
              {{-- <h4>New here?</h4> --}}
              {{-- <h6 class="font-weight-light">Join us today! It takes only few steps</h6> --}} 
            <form method="POST" action="{{ route('agent.register') }}" class="pt-3">
                @csrf
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name">          
                    @error('name')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Phone Number <span class="text-danger">*</span></label>
                    <input type="Number" name="phone_number" class="form-control" value="{{old('phone_number')}}" placeholder="Enter Number">
                    @error('phone_number')
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
                <div class="form-group">
                    <label for="exampleInputUsername1">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control"  placeholder="Enter Confirm Password">
                    @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>

                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                {{-- <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.html" class="text-primary">Login</a>
                </div> --}}
              </form>
            </div>
          </div>
          {{-- assets/rodcem/image.jpg --}}
          <div class="col-lg-6 register-half-bg d-flex flex-row" style="background: url('{{asset('assets/rodcem/image.jpg')}}')">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2023  All rights reserved By rodcem.com</p>
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
