@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | Become A Expert
@endsection
@section('custom_css')
    <style>
     li {
        display: list-item;
        font-size: 14px;
        }
    </style>
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Become a Expert</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Become a Expert</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Start -->
    <section class="saller-poster-section">
        <div class="container-fluid-lg">
            <div class="row">
                {{-- <div class="col-lg-4 order-lg-2">
                    <div class="poster-box">
                        <div class="poster-image">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/vendor-page/become-saller.svg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-12">
                    <div class="seller-title h-100 d-flex align-items-center">
                        <div>
                            <h2>Become a Expert on Rodcem...</h2>
                            <p>{!! joinWithUs()->become_expert ?? '' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Selling Section Start -->
    <section class="selling-section section-b-space">
        <div class="container-fluid-lg">
            <div class="vendor-title">
                <h5>Register & Earn Money</h5>
                {{-- <p>Fastkart marketplace is India's leading platform for selling online. Be it a manufacturer,
                    vendor or supplier, simply sell your products online on Fastkart and become a top ecommerce
                    player with minimum investment. Through a team of experts offering exclusive seller
                    workshops, training, seller support and convenient seller portal, Fastkart focuses on
                    educating and empowering sellers across India. Selling on Fastkart.com is easy and
                    absolutely free. All you need is to register, list your catalogue and start selling your
                    products.</p> --}}
                @if (session('user_email_exists'))
                    <p class="text-danger pt-2">{{ session('user_email_exists') }}</p>
                @endif
                @if (session('user_phone_exists'))
                    <p class="text-danger pt-2">{{ session('user_phone_exists') }}</p>
                @endif
            </div>
            <form action="{{ route('expert.register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="Full Name" required>
                                <label for="mail">Full Name</label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <select name="designation" class="form-select" aria-label="Default select example" required>
                                    @foreach (expert_categories() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="mail">Designation</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <select name="service_zone" class="form-select" aria-label="Default select example"
                                    required>
                                    @foreach (district() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <label for="service area">Serivce Area</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <input type="number" name="phone_number" class="form-control"
                                    value="{{ old('phone_number') }}" id="Phone" placeholder="Phone Number" required>
                                <label for="Phone_Number">Phone Number</label>
                                @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <input type="email" class="form-control" id="mail" name="email"
                                    value="{{ old('email') }}" placeholder="Email Id" required>
                                <label for="mail">Email Id</label>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <input type="password" class="form-control" name="password" id="pwd"
                                    placeholder="Password" required>
                                <label for="pwd">Password</label>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <input type="password" class="form-control" id="pwd" name="password_confirmation"
                                    placeholder="Confirm Password" required>
                                <label for="pwd">Confirm Password</label>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-md mt-3 theme-bg-color text-white">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Selling Section End -->
@endsection
