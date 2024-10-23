@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | Register
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Sign In</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Sign In</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('premium/assets') }}/images/inner-page/sign-up.png" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To {{ config('app.name') }}</h3>
                            <h4>Create New Account</h4>
                            @if (session('user_email_exists'))
                                <p class="text-danger pt-2">{{ session('user_email_exists') }}</p>
                            @endif
                            @if (session('user_phone_exists'))
                                <p class="text-danger pt-2">{{ session('user_phone_exists') }}</p>
                            @endif
                        </div>

                        <div class="input-box">
                            <form class="row g-4" action="{{ route('register.store') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="fullname" name="name"
                                            value="{{ old('name') }}" placeholder="Full Name" required>
                                        <label for="fullname">Full Name</label>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="number" class="form-control" min="11" id="phone_number"
                                            name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number"
                                            required>
                                        <label for="phone_number">Phone Number</label>
                                        @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{ old('email') }}" placeholder="Email Address" required>
                                        <label for="email">Email Address</label>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password" required>
                                        <label for="password">Password</label>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control" id="password"
                                            name="password_confirmation" placeholder="Confirm Password" required>
                                        <label for="password">Confirm Password</label>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" name="agree" type="checkbox"
                                                required id="flexCheckDefault"> <span><a href="">Terms &
                                                    Condation</a></span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">Sign Up</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="#" class="btn google-button w-100">
                                        <img src="{{ asset('premium/assets') }}/images/inner-page/google.png"
                                            class="blur-up lazyload" alt="">
                                        Sign up with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn google-button w-100">
                                        <img src="{{ asset('premium/assets') }}/images/inner-page/facebook.png"
                                            class="blur-up lazyload" alt=""> Sign up with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Already have an account?</h4>
                            <a href="{{ route('login') }}">Log In</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- log in section end --
@endsection
