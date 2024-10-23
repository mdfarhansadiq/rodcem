@extends('Premium.layout.frontend.premium')
@section('title')
    {{config('app.name')}} | Login
@endsection
@section('content')
    <section class="log-in-section section-b-space forgot-section">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{asset('premium/assets')}}/images/inner-page/forgot.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">
                            <div class="log-in-title">
                                 <h3>Welcome To {{config('app.name')}}</h3>
                                <h4>Forgot your password</h4>
                            </div>

                            <div class="input-box">
                                <form class="row g-4" action="{{route('forget.password')}}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="number" class="form-control" id="email" name="phone_number" value="{{(session('phone_number')) ? session('phone_number') : old('phone_number')}}" placeholder="Phone Number" required>
                                            <label for="email">Phone Number</label>
                                            @error('phone_number') <span class="text-danger">{{$message}}</span> @enderror
                                            @if (session('not_found'))
                                            <span class="text-danger"> {{session('not_found')}}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-animation w-100" type="submit">Forgot  Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
