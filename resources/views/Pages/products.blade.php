@extends('layouts.companyShop')
@section('custom_css')
	<link rel="stylesheet" href="{{asset('assets/companyShop')}}/css/demo1.min.css">
    <style>
        .add_to_cart{
            position: absolute;
            padding: 0.8rem 1.4rem;
            bottom: 0;
            left: 0;
            /* width: 100%; */
            height: auto;
            color: #fff;
            background-color: #08c;
            font-size: 1.3rem;
            font-weight: 400;
            letter-spacing: 0.025em;
            font-family: Poppins,sans-serif;
            text-transform: uppercase;
            transform: none;
            margin: 0;
            border-radius: 50px;
            line-height: 1.82;
            transition: padding-top 0.2s,padding-bottom 0.2s;
            z-index: 2;
        }
        .product-default figure {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin-bottom: 0;
        }
    </style>
@endsection
@section('content')
<div class="page-wrapper">
    {{-- <div class="top-notice text-white bg-dark">
        <div class="container text-center">
            <h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles</h5>
            <a href="demo1-shop.html" class="category">MEN</a>
            <a href="demo1-shop.html" class="category">WOMEN</a>
            <small>* Limited time only.</small>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
        <!-- End .container -->
    </div> --}}
    <!-- End .top-notice -->
    <main class="main home">
        <div class="container mb-2">
            <div class="row">
                <div class="col-lg-9">
                    <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
                        'loop': false,
                        'dots': true,
                        'nav': false
                    }">
                        <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                            <img class="slide-bg" style="background-color: #2699D0;" src="{{($company->cover) ? asset('company/profile/cover/'.$company->cover) : asset('assets/rodcem/comapnyBanner/homeBanner.jpg')}}" width="880" height="428" alt="home-slider">
                            {{-- <img class="slide-bg" style="background-color: #2699D0;" src="{{asset('company/profile/cover/'.$company->cover)}}" width="880" height="428" alt="home-slider"> --}}
                            <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                {{-- <h4 class="text-white mb-0">Find the Boundaries. Push Through!</h4>
                                <h2 class="text-white mb-0">Summer Sale</h2>
                                <h3 class="text-white text-uppercase m-b-3">70% Off</h3>
                                <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                    Starting At <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em
                                            class="align-text-top">199</em>99</b></h5> --}}
                                {{-- <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Shop Now!</a> --}}
                            </div>
                        {{-- <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                            <img class="slide-bg" style="background-color: #2699D0;" src="{{asset('company/profile/cover/'.$company->cover)}}" width="880" height="428" alt="home-slider">
                            <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                <h4 class="text-white mb-0">Find the Boundaries. Push Through!</h4>
                                <h2 class="text-white mb-0">Summer Sale</h2>
                                <h3 class="text-white text-uppercase m-b-3">70% Off</h3>
                                <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                    Starting At <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em
                                            class="align-text-top">199</em>99</b></h5>
                                <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                            </div> --}}
                            <!-- End .banner-layer -->
                        </div>
                        <!-- End .home-slide -->
{{-- 
                        <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                            <img class="slide-bg" style="background-color: #dadada;" src="{{asset('assets/companyShop')}}/images/demoes/demo1/products/slide-3.png" width="880" height="428" alt="home-slider">
                            <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                <h4 class="m-b-2">Over 200 products with discounts</h4>
                                <h2 class="m-b-3">Great Deals</h2>
                                <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At
                                    <b>$<em>299</em>99</b>
                                </h5>
                                <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                            </div>
                            <!-- End .banner-layer -->
                        </div> --}}
                        <!-- End .home-slide -->

                        {{-- <div class="home-slide home-slide3 banner banner-md-vw banner-sm-vw  d-flex align-items-center">
                            <img class="slide-bg" style="background-color: #e5e4e2;" src="{{asset('assets/companyShop')}}/images/demoes/demo1/products/slide-1.png" width="880" height="428" alt="home-slider" />
                            <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                <h4 class="m-b-2">Up to 70% off</h4>
                                <h2 class="m-b-3">New Arrivals</h2>
                                <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At
                                    <b>$<em>299</em>99</b>
                                </h5>
                                <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                            </div>
                            <!-- End .banner-layer -->
                        </div> --}}
                        <!-- End .home-slide -->
                    </div>
                    <!-- End .home-slider -->

                    <div class="banners-container m-b-2 owl-carousel owl-theme" data-owl-options="{
                        'dots': false,
                        'margin': 20,
                        'loop': false,
                        'responsive': {
                            '480': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            }
                        }
                    }">
                        <div class="banner banner1 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" style="height:160px; background: url({{$banner && $banner->small_banner_one ? asset('company/banner/small_banner_one/'.$banner->small_banner_one) : asset('assets/rodcem/comapnyBanner/brand2.png')}}); background-size:cover">
                        </div>
                        <div class="banner banner1 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" style="height:160px; background: url({{ $banner &&  $banner->small_banner_two ? asset('company/banner/small_banner_two/'.$banner->small_banner_two) : asset('assets/rodcem/comapnyBanner/brand2.png')}}); background-size:cover">
                        </div>
                        <div class="banner banner1 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" style="height:160px; background: url({{ $banner &&  $banner->small_banner_three ? asset('company/banner/small_banner_three/'.$banner->small_banner_three) : asset('assets/rodcem/comapnyBanner/brand2.png')}}); background-size:cover">
                        </div>
                        {{-- <div class="banner banner1 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                            <figure class="w-100">
                                <img src="{{asset('assets/companyShop')}}/images/demoes/demo1/banners/banner-1.jpg" style="background-color: #dadada;" alt="banner">
                            </figure>
                            <div class="banner-layer">
                                <h3 class="m-b-2">Porto Watches</h3>
                                <h4 class="m-b-4 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup></h4>
                                <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div> --}}
                        <!-- End .banner -->
                        {{-- <div class="banner banner2 text-uppercase banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                            <figure class="w-100">
                                <img src="{{asset('assets/companyShop')}}/images/demoes/demo1/products/banner-3.jpg" style="background-color: #dadada;" alt="banner">
                            </figure>
                            <div class="banner-layer text-center">
                                <h3 class="m-b-1 ls-n-20">Deal Promos</h3>
                                <h4 class="text-body">Starting at $99</h4>
                                <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div> --}}
                        <!-- End .banner -->
                        {{-- <div class="banner banner3 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                            <figure class="w-100">
                                <img src="{{asset('assets/companyShop')}}/images/demoes/demo1/banners/banner-3.jpg" style="background-color: #dadada;" alt="banner">
                            </figure>
                            <div class="banner-layer text-right">
                                <h3 class="m-b-2">Handbags</h3>
                                <h4 class="mb-3 text-secondary text-uppercase">Starting at $99</h4>
                                <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div> --}}
                        <!-- End .banner -->
                    </div>

                    <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                        Featured Products</h2>

                        <div class="row">
                            @foreach($company->products as $item)
                                <div class="col-md-3">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure class="img-effect" class="margin-bottom:0px">
                                            <a href="demo1-product.html">
                                                <img src="{{asset('company/products/'.$item->image)}}" width="205" height="205" alt="product">
                                            </a>
            
                                            @if(auth('agent')->check())
                                                {{-- <a href="{{url('add-to-cart/' . $item->id)}}" class="btn-quickview" title="Add Product On Cart">Add To Cart</a> --}}
                                                <a href="{{url('add-to-cart/' . $item->id)}}" class="add_to_cart" title="Add Product On Cart"><i class="fa fa-shopping-cart text-white" aria-hidden="true"></i></a>
                                            @endif
                                            {{-- <div class="product-countdown-container">
                                                <span class="product-countdown-title">offer ends in:</span>
                                                <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                                </div>
                                                <!-- End .product-countdown -->
                                            </div> --}}
                                            <!-- End .product-countdown-container -->
                                        </figure>
                                        <div class="product-details text-white p-4" style="background:#0088CC">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">{{$item->category->name}}</a>
                                                </div>
                                            </div>
                                            <h3 class="product-title"> <a href="demo1-product.html" class="text-white">{{$item->name}}</a> </h3> 
                                            <!-- End .product-container -->
                                            <span class="price"><span class="shopify-Price-amount amount"><span class="money">$299.00</span></span></span>               
                                        </div>                                        
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    {{-- <div class="products-slider  dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
                    </div> --}}
                    {{-- <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
                    </div> --}}
                    <!-- End .featured-proucts -->

                </div>
                <!-- End .col-lg-9 -->

                <div class="sidebar-overlay"></div>
                <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
                    <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
                        <h2 class="side-menu-title bg-gray ls-n-25 text-uppercase">Categories</h2>

                        <nav class="side-nav">
                            <ul class="menu menu-vertical sf-arrows">
                                @foreach ($company->categories as $category )                                    
                                    <li class="active"><a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i>{{$category->name}}</a></li>                                                                                                                                            
                                @endforeach                                
                            </ul>
                        </nav>
                    </div>
                    <!-- End .side-menu-container -->

                    <div class="widget widget-banners px-3 pb-3 text-center" style="height:450px; background: url({{($banner &&  $banner->sidebar_banner) ? asset('company/banner/sidebar/'.$banner->sidebar_banner) : asset('assets/rodcem/comapnyBanner/sidebarBanner.png')}}); background-size:cover">
                        {{-- <div class="owl-carousel owl-theme dots-small">
                            <div class="banner d-flex flex-column align-items-center">
                                <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                    <em>Sale</em>Many Item
                                </h3>

                                <h4 class="sale-text text-uppercase"><small>UP
                                        TO</small>50<sup>%</sup><sub>off</sub></h4>
                                <p>Bags, Clothing, T-Shirts, Shoes, Watches and much more...</p>
                                <a href="demo1-shop.html" class="btn btn-dark btn-md">View Sale</a>
                            </div> --}}
                            <!-- End .banner -->

                            {{-- <div class="banner banner4">
                                <figure>
                                    <img src="{{asset('assets/companyShop')}}/images/demoes/demo1/banners/banner-7.jpg" alt="banner">
                                </figure>

                                <div class="banner-layer">
                                    <div class="coupon-sale-content">
                                        <h4>DRONE + CAMERAS</h4>
                                        <h5 class="coupon-sale-text text-gray ls-n-10 p-0 font1"><i>UP
                                                TO</i><b class="text-white bg-dark font1">$100</b> OFF</h5>
                                        <p class="ls-0">Top Brands and Models!</p>
                                        <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                            SALE</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- End .banner -->

                            {{-- <div class="banner banner5">
                                <h4>HEADPHONES SALE</h4>

                                <figure class="m-b-3">
                                    <img src="{{asset('assets/companyShop')}}/images/demoes/demo1/banners/banner-8.jpg" alt="banner">
                                </figure>

                                <div class="banner-layer">
                                    <div class="coupon-sale-content">
                                        <h5 class="coupon-sale-text ls-n-10 p-0 font1"><i>UP
                                                TO</i><b class="text-white bg-secondary font1">50%</b> OFF</h5>
                                        <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                            SALE</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- End .banner -->
                        {{-- </div> --}}
                        <!-- End .banner-slider -->
                    </div>
                    <!-- End .widget -->
                </aside>
                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </main>
    <!-- End .main -->

</div>

@endsection