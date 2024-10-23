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
    <section class="log-in-section otp-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('premium/assets') }}/images/inner-page/otp.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <form action="{{ route('otp') }}" method="post">
                            @csrf
                            <div class="log-in-box">
                                <div class="log-in-title">
                                    <h3 class="text-title">Please enter the one time password to verify your account</h3>
                                    @php
                                        if (Session::get('phone_number')) {
                                            $last_four_digit = substr(Session::get('phone_number'), -4);
                                        }
                                    @endphp
                                    @if (Session::get('phone_number'))
                                        <h5 class="text-content">A code has been sent to
                                            <span>*******{{ $last_four_digit ?? '' }}</span></h5>
                                    @endif
                                    {{-- @if (Session::get('opt'))
                                        <h5 class="text-content">{{Session::get('opt') ?? ''}}</span></h5>
                                    @endif --}}
                                </div>

                                <div id="otp" class="inputs d-flex flex-row justify-content-center">
                                    <input type="text" name="otp" class="form-control" id="password"
                                        placeholder="Enter Valification Code" required>
                                </div>
                                @error('otp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if (Session::has('invalid'))
                                    <span class="text-danger">{{ Session::get('invalid') }}</span>
                                @endif
                                @if (Session::has('expaired'))
                                    <span class="text-danger">{{ Session::get('expaired') }}</span>
                                @endif

                                <div class="send-box pt-4">
                                    <h5>Didn't get the code? <a href="javascript:void(0)" class="theme-color fw-bold">Resend
                                            It</a></h5>
                                </div>

                                <button type="submit" class="btn btn-animation w-100 mt-3" type="submit">Validate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
