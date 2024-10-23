@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | Login
@endsection
@section('content')
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2 class="mb-2">Log In</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Log In</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('premium/assets') }}/images/inner-page/log-in.png" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To {{ config('app.name') }}</h3>
                            <h4>Log In Your Account</h4>
                            @if (session('error'))
                                <h4 class="text-danger pt-2">{{ session('error') }}</h4>
                            @endif
                        </div>

                        <div class="input-box">
                            <form class="row g-4" action="{{ route('login.check') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" name="email_phone" class="form-control" id="email"
                                            value="{{ session('email_phone') ? session('email_phone') : old('email_phone') }}"
                                            placeholder="Phone or Email" required>
                                        <label for="email">Phone Number or Email</label>
                                        @error('email_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if (session('email_not_found'))
                                            <span class="text-danger"> {{ session('email_not_found') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password" required>
                                        <label for="password">Password</label>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                        </div>
                                        <a href="{{ route('forget.password.form') }}" class="forgot-password">Forgot
                                            Password?</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">Log
                                        In</button>
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
                                            class="blur-up lazyloaded" alt=""> Log In with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn google-button w-100">
                                        <img src="{{ asset('premium/assets') }}/images/inner-page/facebook.png"
                                            class="blur-up lazyloaded" alt=""> Log In with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Don't have an account?</h4>
                            <a href="{{ route('register') }}">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
