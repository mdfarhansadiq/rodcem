@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | Become A Agent
@endsection
@section('custom_css')
    <style>
     li {
        display: list-item;
        font-size: 14px;
        }
        figure {
            text-align: center;
        }
        @media (max-width: 576px) {
            figure img {
    border-style: none;
    width: 100%;
}
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
                        <h2>Become a Agent</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Become a Agent</li>
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
                            <p id="content">{!! joinWithUs()->become_agent ?? '' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section Start -->
    <section class="become-service section-b-space">
        <div class="container-fluid-lg">
            <div class="seller-title mb-5">
                <h2>রডসিমে কেন ব্যাবসা করবেন ?</h2>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="service-box">
                        <div class="service-svg">
                            @if(why_sell() && why_sell()->image_one)
                                <img width="70" src="{{asset('why/sell/'.why_sell()->image_one)}}" alt="">
                            @endif
                        </div>

                        <div class="service-detail">
                            <h4>{{ why_sell()->title_one ?? 'why sell' }}</h4>
                            <p>{{ why_sell()->description_one ?? 'Contrary to popular belief, Lorem Ipsum is not simply random text.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="service-box">
                        <div class="service-svg">
                            @if(why_sell() && why_sell()->image_two)
                                <img width="70" src="{{asset('why/sell/'.why_sell()->image_two)}}" alt="">
                            @endif
                        </div>
                        <div class="service-detail">
                            <h4>{{ why_sell()->title_two ?? 'high growth rate' }}</h4>
                            <p>{{ why_sell()->description_two ?? 'Contrary to popular belief, Lorem Ipsum is not simply random text.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="service-box">
                        <div class="service-svg">
                            @if(why_sell() && why_sell()->image_three)
                                <img width="70" src="{{asset('why/sell/'.why_sell()->image_three)}}" alt="">
                            @endif
                        </div>

                        <div class="service-detail">
                            <h4>{{ why_sell()->title_three ?? 'dedicated pickup' }}</h4>
                            <p>{{ why_sell()->description_three ?? 'Cwhy/sell/ontrary to popular belief, Lorem Ipsum is not simply random text.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="service-box">
                        <div class="service-svg">
                            @if(why_sell() && why_sell()->image_four)
                                <img width="70" src="{{asset('why/sell/'.why_sell()->image_four)}}" alt="">
                            @endif
                        </div>

                        <div class="service-detail">
                            <h4>{{ why_sell()->title_four ?? 'most approachable' }}</h4>
                            <p>{{ why_sell()->description_four ?? 'Contrary to popular belief, Lorem Ipsum is not simply random text.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

    <!-- Business Section Start -->
    <section class="business-section section-b-space">
        <div class="container-fluid-lg">
            <div class="vendor-title mb-5">
                <h5>রডসিমে ব্যাবসা করা খুবই সহজ</h5>
            </div>

            <div class="business-contain">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="business-box">
                            <div>
                                <div class="business-number">
                                    <h2>1</h2>
                                </div>
                                <div class="business-detail">
                                    <h4>{{ business_info()->title_one ?? 'List Your Products & Get Support Service Provider' }}
                                    </h4>
                                    <p>{{ business_info()->description_one ??
                                        "Register your business for free and create a product catalogue. Sell under your
                                                                            own private label or sell an existing brand. Get your documentation & cataloging
                                                                            done with ease from our Professional Services network." }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="business-box">
                            <div>
                                <div class="business-number">
                                    <h2>2</h2>
                                </div>
                                <div class="business-detail">
                                    <h4>{{ business_info()->title_two ?? 'Receive orders & Schedule a pickup' }}</h4>
                                    <p>{{ business_info()->description_two ??
                                        "Once listed, your products will be available to millions of users.Get orders and
                                                                            manage your online business via our Seller Panel and Seller Zone Mobile App." }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="business-box">
                            <div>
                                <div class="business-number">
                                    <h2>3</h2>
                                </div>
                                <div class="business-detail">
                                    <h4>{{ business_info()->title_three ?? 'Receive quick payment & grow your business' }}
                                    </h4>
                                    <p>{{ business_info()->description_three ??
                                        "Receive quick and hassle-free payments in your account once your orders are
                                                                            fulfilled. Expand your business with low interest & collateral-free loans." }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Business Section End -->

    <!-- Selling Section Start -->
    <section class="selling-section section-b-space">
        <div class="container-fluid-lg">
            <div class="vendor-title">
                <h5>রডসিমে এজেন্ট হওয়ার জন্য নিচের র্ফম পূরণ করুন</h5>
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
            <form action="{{ route('agent.register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="Full Name" required>
                                <label for="mail">আপনার নাম</label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <input type="number" name="phone_number" class="form-control"
                                    value="{{ old('phone_number') }}" id="Phone" placeholder="Phone Number"
                                    required>
                                <label for="Phone_Number">মোবাইল নম্বর</label>
                                @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3">
                            <div class="form-floating theme-form-floating-2 search-box">
                                <input type="email" class="form-control" id="mail" name="email"
                                    value="{{ old('email') }}" placeholder="Email Id" required>
                                <label for="mail">ইমেল আইডি</label>
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
                                <label for="pwd">পাসওয়ার্ড</label>
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
                                <label for="pwd">নিশ্চিত পাসওয়ার্ড</label>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-md mt-3 theme-bg-color text-white">রেজিস্টার করুন</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Selling Section End -->
@endsection
