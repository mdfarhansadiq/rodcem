
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wpocean.com/html/tf/themart/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Feb 2023 15:00:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ asset('Frontend/uploads/favicon.png') }}">
    <title>Rodcem  Register</title>
    <link href="{{asset('theme/assets')}}/css/themify-icons.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/flaticon_ecommerce.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/owl.theme.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/slick.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/slick-theme.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/swiper.min.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/owl.transitions.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/jquery.fancybox.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/odometer-theme-default.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/sass/style.css" rel="stylesheet">
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="{{asset('theme/assets')}}/images/preloader.png" alt="">
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <div class="wpo-login-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="wpo-accountWrapper" action="{{route('register')}}" method="post">                           
                           @csrf
                            <div class="wpo-accountInfo">
                                <div class="wpo-accountInfoHeader">
                                    <a href="{{route('front')}}"><img width="100" src="{{asset('assets/rodcem/whiteLogo.png')}}" alt=""></a>
                                                         
                                    <div class="btn-grop" role="group" aria-label="Basic example">
                                        <a href="{{route('company.login')}}" class="btn btn-secondary">Company</a>
                                        <a href="{{route('agent.login')}}" class="btn btn-secondary">Agent</a>
                                        <a href="{{route('expert.login')}}" class="btn btn-secondary">Expert</a>
                                    </div>
                                
                                </div>
                                <div class="image">
                                    <img src="{{asset('theme/assets')}}/images/login.svg" alt="">
                                </div>
                                <div class="back-home">
                                    <a class="wpo-accountBtn" href="{{route('front')}}">
                                        <span class="">Back To Home</span>
                                    </a>
                                </div>
                            </div>                          
                            <div class="wpo-accountForm form-style">
                                <div class="fromTitle">
                                    <h2>Signup</h2>
                                    <p>Signup into your pages account</p>       
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label>Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter your name.." value="{{old('name')}}">
                                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label>Phone Number</label>
                                        <input type="number" id="phone_number" name="phone_number" placeholder="Enter your name.." value="{{old('phone_number')}}">
                                        @error('phone_number') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label>Email</label>
                                        <input type="text" id="email" name="email" placeholder="Enter email address" value="{{old('email')}}">
                                        @error('email') <span class="text-danger">{{$message}}</span>  @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="pwd6" type="password" placeholder="Enter Password"  name="password">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default reveal6" type="button"><i class="ti-eye"></i></button>
                                            </span>
                                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="pwd6" type="password" placeholder="Enter Confirm Password"  name="password_confirmation">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default reveal6" type="button"><i class="ti-eye"></i></button>
                                            </span>
                                            @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        {{-- <div class="check-box-wrap">
                                            <div class="input-box">
                                                <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">
                                                <label for="fruit4">Remember Me</label>
                                            </div>
                                            <div class="forget-btn">
                                                <a href="forgot.html">Forgot Password?</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <button type="submit" class="wpo-accountBtn">Signup</button>
                                    </div>
                                </div>
                                <h4 class="or"><span>OR</span></h4>
                                {{-- <ul class="wpo-socialLoginBtn">
                                    <li><button class="facebook" tabindex="0" type="button"><span><i
                                                    class="ti-facebook"></i></span></button></li>
                                    <li><button class="twitter" tabindex="0" type="button"><span><i
                                                    class="ti-twitter"></i></span></button></li>
                                    <li><button class="linkedin" tabindex="0" type="button"><span><i
                                                    class="ti-linkedin"></i></span></button></li>
                                </ul> --}}
                                <p class="subText">Already have an account? <a href="{{route('login')}}">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{asset('theme/assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('theme/assets')}}/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="{{asset('theme/assets')}}/js/modernizr.custom.js"></script>
    <script src="{{asset('theme/assets')}}/js/jquery.dlmenu.js"></script>
    <script src="{{asset('theme/assets')}}/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="{{asset('theme/assets')}}/js/script.js"></script>
</body>


<!-- Mirrored from wpocean.com/html/tf/themart/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Feb 2023 15:00:28 GMT -->
</html>