@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | Reset Password
@endsection
@section('content')
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2 class="mb-2">Reset Passowrd</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Reset Password</li>
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
                            <h3>Reset your password</h3>
                            {{-- <h4>Log In Your Account</h4> --}}
                            @if (session('error'))
                                <h4 class="text-danger pt-2">{{ session('error') }}</h4>
                            @endif
                        </div>

                        <div class="input-box">
                            <form class="row g-4" action="{{ route('resert.password') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input value="{{ old('password') }}" type="text" name="password"
                                            class="form-control" id="password" placeholder="Password" required>
                                        <label for="password">Password</label>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" name="password_confirmation" class="form-control"
                                            id="password_confirmation" value="{{ old('password_confirmation') }}"
                                            placeholder="Password" required>
                                        <label for="password_confirmation">Confirm Password</label>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">Log
                                        In</button>
                                </div>
                            </form>
                        </div>



                        <div class="sign-up-box">
                            <h4>Remember Password?</h4>
                            <a href="{{ route('login') }}">Log In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
