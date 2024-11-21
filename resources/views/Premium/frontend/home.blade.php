@extends('Premium.layout.frontend.premium')
@section('title')
    {{config('app.name')}} | Home
@endsection
@section('content')
 <!-- Home Section Start -->
    <section class="home-section pt-2">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xl-8 ratio_65">
                    <div class="home-contain h-100">
                        <div class="h-100">
                            @if (home_page_image() && home_page_image()->ad)
                                <img src="{{asset('imageSetting/joinUs/'.home_page_image()->ad)}}" class="bg-img blur-up lazyload" alt="">
                            @else
                                <img src="{{asset('premium/assets')}}/images/vegetable/banner/1.jpg" class="bg-img blur-up lazyload" alt="">
                            @endif
                        </div>
                        <div class="home-detail p-center-left w-75">
                            <div>
                                {{-- <h6>Exclusive offer <span>30% Off</span></h6> --}}
                                <h1 class="text-uppercase">নির্মাণের সহজ সমাধান <span class="daily" style="font-size:20px">নির্মাণ বিশেষায়িত এ্যাপ</span></h1>
                                <p class="w-75 d-none d-sm-block">We are an online platform. We have been working with an online construction business for the last 3 years..</p>
                                <button onclick="location.href = '{{route('shop')}}'"
                                    class="btn btn-animation mt-xxl-4 mt-2 home-button mend-auto">Shop Now <i
                                        class="fa-solid fa-right-long icon"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 ratio_65">
                    <div class="row g-4">
                        <div class="col-xl-12 col-md-6">
                            <div class="home-contain">
                                @if (home_page_image() && home_page_image()->agent)
                                    <img src="{{asset('imageSetting/joinUs/'.home_page_image()->agent)}}" class="bg-img blur-up lazyload" alt="">
                                @else
                                    <img src="{{asset('premium/assets')}}/images/vegetable/banner/2.jpg" class="bg-img blur-up lazyload" alt="">
                                @endif
                                <div class="home-detail p-center-left home-p-sm w-75">
                                    <div>
                                        {{-- <h2 class="mt-0 text-danger">45% <span class="discount text-title">OFF</span> --}}
                                        </h2>
                                        <h3 class="theme-color">Agent Regisration</h3>
                                        <p class="w-75" style="-webkit-line-clamp:3">সারাদেশে ইউনিয়ন পর্যায়ে ১ জন  করে এজেন্ট নিয়োগ চলছে ।</p>
                                        <a href="{{route('agent.register')}}" class="shop-button">Register Now <i class="fa-solid fa-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-6">
                            <div class="home-contain">
                                @if (home_page_image() && home_page_image()->expert)
                                    <img src="{{asset('imageSetting/joinUs/'.home_page_image()->expert)}}" class="bg-img blur-up lazyload" alt="">
                                @else
                                    <img src="{{asset('premium/assets')}}/images/vegetable/banner/3.jpg" class="bg-img blur-up lazyload" alt="">
                                @endif
                                <div class="home-detail p-center-left home-p-sm w-75">
                                    <div>
                                        <h3 class="mt-0 theme-color fw-bold">Expert Registration</h3>
                                        {{-- <h4 class="text-danger">Organic Market</h4> --}}
                                        <p class="organic">Give consultancy and get money!</p>
                                        <a href="{{route('expert.register')}}" class="shop-button">Register Now <i  class="fa-solid fa-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- Banner Section Start -->
    <section class="banner-section ratio_60 wow fadeInUp">
        <div class="container-fluid-lg">
            @if(total_slider_banner_ad() == 0)
                <div class="banner-slider">
                    <div>
                        <div class="banner-contain hover-effect">
                            <img src="{{asset('premium/assets')}}/images/vegetable/banner/4.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details">
                                <div class="banner-box">
                                    {{-- <h6 class="text-danger">5% OFF</h6> --}}
                                    <h5>Buy More & Save More</h5>
                                    <h6 class="text-content">Delivered to Your Home</h6>
                                </div>
                                <a href="{{route('shop')}}" class="banner-button text-white">Shop Now <i  class="fa-solid fa-right-long ms-2"></i></a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="banner-contain hover-effect">
                            <img src="{{asset('premium/assets')}}/images/vegetable/banner/5.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details">
                                <div class="banner-box">
                                    {{-- <h6 class="text-danger">5% OFF</h6> --}}
                                    <h5>Buy More & Save More</h5>
                                    <h6 class="text-content">Delivered to Your Home</h6>
                                </div>
                                <a href="{{route('shop')}}" class="banner-button text-white">Shop Now <i
                                        class="fa-solid fa-right-long ms-2"></i></a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="banner-contain hover-effect">
                            <img src="{{asset('premium/assets')}}/images/vegetable/banner/6.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details">
                                <div class="banner-box">
                                    {{-- <h6 class="text-danger">5% OFF</h6> --}}
                                    <h5>Buy More & Save More</h5>
                                    <h6 class="text-content">Delivered to Your Home</h6>
                                </div>
                                <a href="{{route('shop')}}" class="banner-button text-white">Shop Now <i class="fa-solid fa-right-long ms-2"></i></a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="banner-contain hover-effect">
                            <img src="{{asset('premium/assets')}}/images/vegetable/banner/7.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details">
                                <div class="banner-box">
                                    {{-- <h6 class="text-danger">5% OFF</h6> --}}
                                    <h5>Buy More & Save More</h5>
                                    <h6 class="text-content">Delivered to Your Home</h6>
                                </div>
                                <a href="{{route('shop')}}" class="banner-button text-white">Shop Now <i
                                        class="fa-solid fa-right-long ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="banner-slider">
                    @foreach (slider_banner_ad() as $item)
                        <div>
                            <div class="banner-contain hover-effect">
                                <img src="{{ asset('ad/slider/banner/'.$item->image) }}" class="bg-img blur-up lazyload" alt="">
                                <div class="banner-details">
                                    <div class="banner-box">
                                        {{-- <h6 class="text-danger">5% OFF</h6> --}}
                                        <h5>{{$item->title_one ?? 'Buy More & Save More'}}</h5>
                                        <h6 class="text-content">{{$item->title_two ?? 'Delivery To Your Home'}}</h6>
                                    </div>
                                    @if ($item->link)
                                        <a href="{{$item->link}}" class="banner-button text-white">Shop Now <i  class="fa-solid fa-right-long ms-2"></i></a>
                                    @else
                                        <a href="{{route('shop')}}" class="banner-button text-white">Shop Now <i  class="fa-solid fa-right-long ms-2"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                    <div class="p-sticky">
                        <div class="category-menu">
                            <h3>Category</h3>
                            <ul>
                                @foreach (product_categories() as $item)
                                    <li>
                                        <div class="category-list">
                                            <img src="{{ asset('product/category/' . $item->image) }}" class="blur-up lazyload" alt="">
                                            <h5>
                                                <a href="#">{{$item->name}}</a>
                                            </h5>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="ratio_156 section-t-space">
                            <div class="home-contain hover-effect">
                                @if (first_left_ad() && first_left_ad()->image)
                                    <img src="{{asset('ad/first/left/banner/'.first_left_ad()->image)}}" class="bg-img blur-up lazyload" alt="">
                                @else
                                    <img src="{{asset('premium/assets')}}/images/vegetable/banner/8.jpg" class="bg-img blur-up lazyload" alt="">
                                @endif
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h6 class="text-yellow home-banner">{{first_left_ad()->title_one ?? 'Anwar Ispat'}}</h6>
                                        <h3 class="text-uppercase fw-normal"><span class="theme-color fw-bold">{{first_left_ad()->title_tow ?? 'Construction'}}</span> {{first_left_ad()->title_tow ?? "Products"}}</h3>
                                        {{-- <h3 class="fw-light">every hour</h3> --}}
                                        @if(first_left_ad() && first_left_ad()->link)
                                            <button onclick="location.href = '{{first_left_ad()->link}}';" class="btn btn-animation btn-md mend-auto">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                        @else
                                            <button onclick="location.href = '{{route('shop')}}';" class="btn btn-animation btn-md mend-auto">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ratio_medium section-t-space">
                            <div class="home-contain hover-effect">
                                @if (second_left_ad() && second_left_ad()->image)
                                    <img src="{{asset('ad/second/left/banner/'.second_left_ad()->image)}}" class="img-fluid blur-up lazyload" alt="">
                                @else
                                    <img src="{{asset('premium/assets')}}/images/vegetable/banner/11.jpg" class="img-fluid blur-up lazyload" alt="">
                                @endif
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h4 class="text-yellow text-exo home-banner">Ceramic</h4>
                                        <h2 class="text-uppercase fw-normal mb-0 text-russo theme-color">Best</h2>
                                        <h2 class="text-uppercase fw-normal text-title">Ceramic</h2>
                                        <p class="mb-3">Best Ceramic In Bangladesh</p>
                                        <button onclick="location.href = '{{route('shop')}}';" class="btn btn-animation btn-md mend-auto">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-t-space">
                            <div class="category-menu">
                                <h3>Trending Products</h3>

                                <ul class="product-list border-0 p-0 d-block">
                                    @foreach (trending_products() as $item )
                                        <li>
                                            <div class="offer-product">
                                                <a href="{{ route('product.details', $item->slug) }}" class="offer-image">
                                                    <img src="{{ asset('company/products/' . $item->image) }}" class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="{{ route('product.details', $item->slug) }}" class="text-title">
                                                            <h6 class="name">{{$item->name}}</h6>
                                                        </a>
                                                        <span>{{$item->porduct_category->name}}</span>
                                                        <h6 class="price theme-color">
                                                            <i class="fa fa-turkish-lira"></i>
                                                            @if (view_action() == 'view_right')
                                                                {{ $item->price }}
                                                            @else
                                                                <span class="theme-color" data-bs-toggle="tooltip" data-bs-placement="top" title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i class="fa fa-info-circle"></i></span>
                                                            @endif
                                                                <span class="offer theme-color">per {{ $item->unit->name }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="section-t-space">
                            <div class="category-menu">
                                <h3>Customer Comment</h3>

                                <div class="review-box">
                                    <div class="review-contain">
                                        <h5 class="w-75">{{customer_comment()->title ?? 'We Care About Our Customer Experience'}}</h5>
                                        <p>{{customer_comment()->title ?? 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly
                                            used to demonstrate the visual form of a document or a typeface without
                                            relying on meaningful content.'}}</p>
                                    </div>

                                    <div class="review-profile">
                                        <div class="review-image">
                                            @if (customer_comment() && customer_comment()->image)
                                                <img src="{{asset('ad/customer/comment/'.customer_comment()->image)}}" class="img-fluid blur-up lazyload" alt="">
                                            @else
                                                <img src="{{asset('premium/assets')}}/images/vegetable/review/1.jpg" class="img-fluid blur-up lazyload" alt="">
                                            @endif
                                        </div>
                                        <div class="review-detail">
                                            <h5>{{customer_comment()->name ?? 'Atikur Rahaman'}}</h5>
                                            <h6>{{customer_comment()->designation ?? 'Sale Manager'}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8">
                    <div class="title title-flex">
                        <div>
                            <h2>Latest Products</h2>
                            <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                            {{-- <p>Don't miss this opportunity at a special discount just for this week.</p> --}}
                        </div>
                    </div>

                    <div class="section-b-space">
                        <div class="product-border border-row overflow-hidden">
                            <div class="product-box-slider no-arrow">
                                @foreach ($six_products->chunk(2)  as $product )
                                    <div>
                                        <div class="row m-0">
                                            @foreach ($product as $item)
                                                <div class="col-12 px-0">
                                                    <div class="product-box">
                                                        <div class="product-image">
                                                            <a href="{{url('/product/'. $item->slug)}}">
                                                                <img src="{{ asset('company/products/' . $item->image) }}"  class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <ul class="product-option">
                                                                <li data-bs-toggle="tooltip" data-bs-placement="top"  title="View">
                                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view_{{ $item->id }}"> <i data-feather="eye"></i> </a>
                                                                    <!-- Quick View Modal Box Start -->
                                                                    @push('all_models')
                                                                        <div class="modal fade theme-modal view-modal" id="view_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div
                                                                                class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header p-0">
                                                                                        <button type="button" class="btn-close"
                                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                                            <i class="fa-solid fa-xmark"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="row g-sm-4 g-2">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="slider-image">
                                                                                                    <img src="{{ asset('company/products/details/' . $item->details_image) }}"
                                                                                                        class="img-fluid blur-up lazyload"
                                                                                                        alt="">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-lg-6">
                                                                                                <div class="right-sidebar-modal">
                                                                                                    <h4 class="title-name">{{ $item->name }}
                                                                                                    </h4>
                                                                                                    <h4 class="price theme-color"><i class="fa fa-turkish-lira"></i>
                                                                                                        @if (view_action() == 'view_right')
                                                                                                            {{ $item->price }}
                                                                                                        @else
                                                                                                            <span data-bs-toggle="tooltip"
                                                                                                                data-bs-placement="top"
                                                                                                                title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i
                                                                                                                    class="fa fa-info-circle"></i></span>
                                                                                                        @endif
                                                                                                        <span class="offer theme-color">per
                                                                                                            {{ $item->unit->name }}</span>
                                                                                                    </h4>
                                                                                                    <div class="product-detail">
                                                                                                        <h4>Product Details :</h4>
                                                                                                        <p>{!! $item->short_description !!}</p>
                                                                                                    </div>
                                                                                                    <div class="modal-button">
                                                                                                        @if (cart_action() == "cart_right")
                                                                                                            <button onclick="location.href = '{{route('add.to.cart',$item->id)}}';" class="btn btn-md add-cart-button icon">Add To Cart</button>
                                                                                                        @elseif (cart_action() == "not_cart_right")
                                                                                                            <button onclick="location.href = '#';" class="btn btn-md add-cart-button icon">Add To Cart</button>
                                                                                                        @else
                                                                                                            <button onclick="location.href = '{{route('login')}}';" class="btn btn-md add-cart-button icon">Add To Cart</button>
                                                                                                        @endif
                                                                                                        <button  onclick="location.href = '{{route('product.details',$item->slug)}}';" class="btn theme-bg-color view-button icon text-white fw-bold btn-md"> View More Details</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endpush
                                                                    <!-- Quick View Modal Box End -->
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                                    <a href="#"><i data-feather="refresh-cw"></i></a>
                                                                </li>

                                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                                    <a href="#" class="notifi-wishlist"> <i data-feather="heart"></i> </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-detail">
                                                            <a href="{{ route('product.details', $item->slug) }}">
                                                                <h6 class="name">{{$item->name}}</h6>
                                                            </a>

                                                            <h5 class="sold text-content theme-color">
                                                                <i class="fa fa-turkish-lira"></i>
                                                                @if (view_action() == 'view_right')
                                                                    {{ $item->price }}
                                                                @else
                                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i class="fa fa-info-circle"></i></span>
                                                                @endif
                                                                <span class="offer theme-color">per {{ $item->unit->name }}</span>
                                                            </h5>
                                                             <div class="add-to-cart-box bg-white">
                                                                @if (cart_action() == "cart_right")
                                                                    <a href="{{ route('add.to.cart', $item->id) }}" class="btn btn-add-cart addcart-button">Add To Cart
                                                                        <span class="add-icon bg-light-gray"> <i class="fa-solid fa-shopping-cart"></i> </span>
                                                                    </a>
                                                                @elseif (cart_action() == "not_cart_right")
                                                                    <a href="#" class="btn btn-add-cart addcart-button">Add To Cart
                                                                        <span class="add-icon bg-light-gray"> <i class="fa-solid fa-shopping-cart"></i> </span>
                                                                    </a>
                                                                @else
                                                                    <a href="{{route('login')}}" class="btn btn-add-cart addcart-button">Add To Cart
                                                                        <span class="add-icon bg-light-gray"> <i class="fa-solid fa-shopping-cart"></i> </span>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="title">
                        <h2>Our Experts</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        {{-- <p>Top Categories Of The Week</p> --}}
                    </div>

                    <div class="category-slider-2 product-wrapper no-arrow">
                        @foreach (expert() as $item )
                            <div>
                                <a href="{{route('expert.details',$item->slug)}}" class="category-box category-dark">
                                    <div>
                                        {{-- <img width="115" src="{{asset('premium/assets')}}/images/expert/1.jpg" class="blur-up lazyload" alt=""> --}}
                                        @if ($item->image)
                                            <img src="{{asset('expert/profile/'.$item->image)}}"  class="img-fluid blur-up lazyload" alt="">
                                        @else
                                            <img src="{{asset('premium/assets')}}/images/expert/1.jpg"  class="img-fluid blur-up lazyload" alt="">
                                        @endif
                                        <h5>{{$item->expert_designation->name ?? ''}}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="section-t-space section-b-space">
                        <div class="row g-md-4 g-3">
                            <div class="col-md-6">
                                <div class="banner-contain hover-effect">
                                    @if (first_middle_ad() && first_middle_ad()->first_banner_image)
                                        <img src="{{asset('ad/first/middle/banner/'.first_middle_ad()->first_banner_image)}}" class="bg-img blur-up lazyload" alt="">
                                    @else
                                        <img src="{{asset('premium/assets')}}/images/vegetable/banner/9.jpg" class="bg-img blur-up lazyload" alt="">
                                    @endif
                                    <div class="banner-details p-center-left p-4">
                                        <div>
                                            <h3 class="text-exo">{{first_middle_ad()->first_banner_title_one ?? "Get offer"}}</h3>
                                            <h4 class="text-russo fw-normal theme-color mb-2">{{first_middle_ad()->first_banner_title_one ?? "Hollow Block"}}</h4>
                                            @if(first_middle_ad() && first_middle_ad()->first_banner_link)
                                                <button onclick="location.href = '{{first_middle_ad()->first_banner_link}}';" class="btn btn-animation btn-sm mend-auto">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                            @else
                                                <button onclick="location.href = '{{route('shop')}}';" class="btn btn-animation btn-sm mend-auto">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner-contain hover-effect">
                                    @if (first_middle_ad() && first_middle_ad()->second_banner_image)
                                        <img src="{{asset('ad/first/middle/banner/'.first_middle_ad()->second_banner_image)}}" class="bg-img blur-up lazyload" alt="">
                                    @else
                                        <img src="{{asset('premium/assets')}}/images/vegetable/banner/10.jpg" class="bg-img blur-up lazyload" alt="">
                                    @endif
                                    <div class="banner-details p-center-left p-4">
                                         <div>
                                            <h3 class="text-exo">{{first_middle_ad()->second_banner_title_one ?? "Get offer"}}</h3>
                                            <h4 class="text-russo fw-normal theme-color mb-2">{{first_middle_ad()->second_banner_title_one ?? "BSB CABLE"}}</h4>
                                            @if(first_middle_ad() && first_middle_ad()->second_banner_link)
                                                <button onclick="location.href = '{{first_middle_ad()->second_banner_link}}';" class="btn btn-animation btn-sm mend-auto">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                            @else
                                                <button onclick="location.href = '{{route('shop')}}';" class="btn btn-animation btn-sm mend-auto">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="title d-block">
                        <h2>Our Popular Product</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        {{-- <p>A virtual assistant collects the products from your list</p> --}}
                    </div>

                    <div class="product-border overflow-hidden wow fadeInUp">
                        <div class="product-box-slider no-arrow">
                            @foreach (popular_products() as $item )
                                <div>
                                    <div class="row m-0">
                                        <div class="col-12 px-0">
                                            <div class="product-box">
                                                <div class="product-image">
                                                    <a href="{{ route('product.details', $item->slug) }}">
                                                        <img src="{{ asset('company/products/' . $item->image) }}" class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                     <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view_{{ $item->id }}"> <i  data-feather="eye"></i></a>
                                                        @push('all_models')
                                                            <!-- Quick View Modal Box Start -->
                                                            <div class="modal fade theme-modal view-modal" id="view_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div
                                                                    class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header p-0">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="fa-solid fa-xmark"></i></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row g-sm-4 g-2">
                                                                                <div class="col-lg-6">
                                                                                    <div class="slider-image">
                                                                                        <img src="{{ asset('company/products/details/' . $item->details_image) }}" class="img-fluid blur-up lazyload" alt="">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-lg-6">
                                                                                    <div class="right-sidebar-modal">
                                                                                        <h4 class="title-name">{{ $item->name }}
                                                                                        </h4>
                                                                                        <h4 class="price theme-color"><i class="fa fa-turkish-lira"></i>
                                                                                            @if (view_action() == 'view_right')
                                                                                                {{ $item->price }}
                                                                                            @else
                                                                                                <span data-bs-toggle="tooltip"
                                                                                                    data-bs-placement="top"
                                                                                                    title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i
                                                                                                        class="fa fa-info-circle"></i></span>
                                                                                            @endif
                                                                                            <span class="offer theme-color">per
                                                                                                {{ $item->unit->name }}</span>
                                                                                        </h4>
                                                                                        <div class="product-detail">
                                                                                            <h4>Product Details :</h4>
                                                                                            <p>{!! $item->short_description !!}</p>
                                                                                        </div>
                                                                                        <div class="modal-button">
                                                                                            @if (cart_action() == "cart_right")
                                                                                                <button onclick="location.href = '{{route('add.to.cart',$item->id)}}';" class="btn btn-md add-cart-button icon">Add To Cart</button>
                                                                                            @elseif (cart_action() == "not_cart_right")
                                                                                                <button onclick="location.href = '#';" class="btn btn-md add-cart-button icon">Add To Cart</button>
                                                                                            @else
                                                                                                <button onclick="location.href = '{{route('login')}}';" class="btn btn-md add-cart-button icon">Add To Cart</button>
                                                                                            @endif
                                                                                            <button  onclick="location.href = '{{route('product.details',$item->slug)}}';" class="btn theme-bg-color view-button icon text-white fw-bold btn-md"> View More Details</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Quick View Modal Box End -->
                                                        @endpush
                                                    </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                    <a href="#">
                                                        <i data-feather="refresh-cw"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                    <a href="#" class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                                </div>
                                                <div class="product-detail">
                                                    <a href="{{ route('product.details', $item->slug) }}">
                                                        <h6 class="name h-100">{{ $item->name }}</h6>
                                                    </a>

                                                    <h5 class="sold text-content theme-color">
                                                        <i class="fa fa-turkish-lira"></i>
                                                        @if (view_action() == 'view_right')
                                                            {{ $item->price }}
                                                        @else
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i
                                                                    class="fa fa-info-circle"></i></span>
                                                        @endif
                                                        <span class="offer theme-color">per {{ $item->unit->name }}</span>
                                                    </h5>

                                                    <div class="add-to-cart-box bg-white">
                                                        @if (cart_action() == "cart_right")
                                                            <a href="{{ route('add.to.cart', $item->id) }}" class="btn btn-add-cart addcart-button">Add To Cart
                                                                <span class="add-icon bg-light-gray"> <i class="fa-solid fa-shopping-cart"></i> </span>
                                                            </a>
                                                        @elseif (cart_action() == "not_cart_right")
                                                            <a href="#" class="btn btn-add-cart addcart-button">Add To Cart
                                                                <span class="add-icon bg-light-gray"> <i class="fa-solid fa-shopping-cart"></i> </span>
                                                            </a>
                                                        @else
                                                            <a href="{{route('login')}}" class="btn btn-add-cart addcart-button">Add To Cart
                                                                <span class="add-icon bg-light-gray"> <i class="fa-solid fa-shopping-cart"></i> </span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="section-t-space">
                        <a @if(second_middle_ad() &&  second_middle_ad()->link) href="{{second_middle_ad()->link}}" @else href="{{route('shop')}}" @endif>
                            <div class="banner-contain">
                                @if (second_middle_ad() && second_middle_ad()->image)
                                    <img src="{{asset('ad/second/middle/banner/'.second_middle_ad()->image)}}" class="bg-img blur-up lazyload" alt="">
                                @else
                                    <img src="{{asset('premium/assets')}}/images/vegetable/banner/15.jpg" class="bg-img blur-up lazyload" alt="">
                                @endif
                                <div class="banner-details p-center p-4 text-white text-center">
                                    <div>
                                        <h3 class="lh-base fw-bold offer-text">{{second_middle_ad()->title_one ?? 'Get $3 Cashback! Min Order of $30'}}</h3>
                                        <h6 class="coupon-code">{{second_middle_ad()->title_one ?? 'Use Code : GROCERY1920'}}</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="section-t-space section-b-space">
                        <div class="row g-md-4 g-3">
                            <div class="col-xxl-8 col-xl-12 col-md-7">
                                <div class="banner-contain hover-effect">
                                    @if (home_page_image() && home_page_image()->company)
                                        <img src="{{asset('imageSetting/joinUs/'.home_page_image()->company)}}" class="bg-img blur-up lazyload" alt="">
                                    @else
                                        <img src="{{asset('premium/assets')}}/images/vegetable/banner/12.jpg" class="bg-img blur-up lazyload" alt="">
                                    @endif
                                    <div class="banner-details p-center-left p-4">
                                        <div>
                                            <h2 class="text-kaushan fw-normal theme-color">Get Ready To</h2>
                                            <h3 class="mt-2 mb-3">Company Registration</h3>
                                            <p class="text-content banner-text">Register Your Company and increse sell.</p>
                                            <button onclick="location.href = '{{route('company.register')}}';" class="btn btn-animation btn-sm mend-auto">Register Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-12 col-md-5">
                                <a @if(third_middle_ad() && third_middle_ad()->link) href="{{third_middle_ad()->link}}" @else href="{{route('shop')}}" @endif class="banner-contain hover-effect h-100">
                                    @if (third_middle_ad() && third_middle_ad()->image)
                                        <img src="{{asset('ad/third/middle/banner/'.third_middle_ad()->image)}}" class="bg-img blur-up lazyload" alt="">
                                    @else
                                        <img src="{{asset('premium/assets')}}/images/vegetable/banner/13.jpg" class="bg-img blur-up lazyload" alt="">
                                    @endif

                                    <div class="banner-details p-center-left p-4 h-100">
                                        <div>
                                            <h2 class="text-kaushan fw-normal text-danger">{{third_middle_ad()->title_one ?? 'Get Offer'}}</h2>
                                            <h3 class="mt-2 mb-2 theme-color">{{third_middle_ad()->title_tow ?? 'RFL'}}</h3>
                                            <h3 class="fw-normal product-name text-title">{{third_middle_ad()->title_three ?? 'RFL'}}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="title d-block">
                        <div>
                            <h2>Our best Seller</h2>
                            <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                            {{-- <p>A virtual assistant collects the products from your list</p> --}}
                        </div>
                    </div>

                    <div class="best-selling-slider product-wrapper wow fadeInUp">
                        @foreach (array_chunk($best_seller_product, 4) as $product )
                            <div>
                                <ul class="product-list">
                                    @foreach ($product as $item )
                                        <li>
                                            <div class="offer-product">
                                                <a href="{{ route('product.details', $item->slug) }}" class="offer-image">
                                                    <img src="{{ asset('company/products/' . $item->image) }}" class="img-fluid blur-up lazyload" alt="">
                                                </a>

                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="{{ route('product.details', $item->slug) }}" class="text-title">
                                                            <h6 class="name">{{$item->name}}</h6>
                                                        </a>
                                                        <span>{{$item->porduct_category->name}}</span>
                                                        <h6 class="price theme-color">
                                                            <i class="fa fa-turkish-lira"></i>
                                                            @if (view_action() == 'view_right')
                                                                {{ $item->price }}
                                                            @else
                                                                <span class="theme-color" data-bs-toggle="tooltip" data-bs-placement="top" title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i class="fa fa-info-circle"></i></span>
                                                            @endif
                                                            <span class="offer theme-color">per {{ $item->unit->name }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                    </div>

                    <div class="section-t-space">
                        <div class="banner-contain hover-effect">
                            @if(fourth_middle_ad() && fourth_middle_ad()->image)
                                <img src="{{asset('ad/fourth/middle/banner/'.fourth_middle_ad()->image)}}" class="bg-img blur-up lazyload" alt="">
                            @else
                                <img src="{{asset('premium/assets')}}/images/vegetable/banner/14.gif" class="bg-img blur-up lazyload" alt="">
                            @endif
                            <div class="banner-details p-center banner-b-space w-100 text-center">
                                <div>
                                    <h6 class="ls-expanded theme-color mb-sm-3 mb-1">{{fourth_middle_ad()->title_one ?? 'Cement'}}</h6>
                                    <h2 class="banner-title">{{fourth_middle_ad()->title_two ?? 'Super Cement'}}</h2>
                                    <h5 class="lh-sm mx-auto mt-1 text-content">{{fourth_middle_ad()->title_one ?? 'Save up to 5% OFF'}}</h5>
                                    @if (fourth_middle_ad() && fourth_middle_ad()->link)
                                        <button onclick="location.href = '{{fourth_middle_ad()->link}}';" class="btn btn-animation btn-sm mx-auto mt-sm-3 mt-2">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                    @else
                                        <button onclick="location.href = '{{route('shop')}}';" class="btn btn-animation btn-sm mx-auto mt-sm-3 mt-2">Shop Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="title section-t-space">
                        <h2>Latest News</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        {{-- <p>A virtual assistant collects the products from your list</p> --}}
                    </div>

                    <div class="slider-3-blog ratio_65 no-arrow product-wrapper">
                        @foreach (latest_tow_blog() as $item )
                            <div>
                                <div class="blog-box">
                                    <div class="blog-box-image">
                                        <a href="{{route('our.blog.details',$item->slug)}}" class="blog-image">
                                            <img src="{{asset('news/'.$item->image)}}" class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>

                                    <a href="{{route('our.blog.details',$item->slug)}}" class="blog-detail">
                                        <h6>{{$item->created_at->format('d M y')}}</h6>
                                        <h5>{{$item->title}}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <!-- Blog Section Start -->
    <section>
        <div class="container" style="text-align: center; border: 1px solid #000; border-radius: 10px; padding: 20px; box-shadow: 5px 5px;">
            <div class="title">
                <h2 style="">Video Gallery</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-5 ratio_87">
                        @foreach (videos() as $item)
                            <div>
                                <div class="video_box">
                                    <div class="blog-box">
                                        <div class="blog-box-image">
                                            <a data-bs-toggle="modal" data-bs-target="#video_modal_{{$item->id}}" class="blog-image" style="position:relative">
                                                <img src="{{asset('video/image/'.$item->image)}}" class="bg-img blur-up lazyload" alt="">
                                                <div class="play_btn">
                                                    <img width="80" src="{{asset('premium/assets/images/default/play.png')}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        @push('all_models')
                                            <div class="modal fade theme-modal" id="video_modal_{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close video_close_btn" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe class="theVideo" width="100%" height="315" src="{{$item->link}}" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endpush
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <!-- Newsletter Section Start -->
    <section class="newsletter-section section-b-space">
        <div class="container-fluid-lg">
            <div class="newsletter-box newsletter-box-2">
                <div class="newsletter-contain py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                                <div class="newsletter-detail">
                                    <h2>Join our newsletter and get...</h2>
                                    <h5>Get Everyday Product Price Update</h5>
                                    <form action="{{route('subscriber.store')}}"  method="post">
                                     @csrf
                                    <div class="input-box">
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" required>
                                        {{-- <i class="fa-solid fa-envelope arrow"></i> --}}
                                        <button class="sub-btn  btn-animation">
                                            <span class="d-sm-block d-none">Subscribe</span>
                                            <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->
@endsection
@section('custom_js')
    <script>
        $(function(){
            $('.video_close_btn').click(function(){
                $('iframe').attr('src', $('iframe').attr('src'));
            });
        });
    </script>


<script>
    $(document).ready(function() {
        $('#button-addon2').on('click', function() {
            let query = $('#search-input').val();
            // if(query)
            // {
                $.ajax({
                    url: "{{ route('search') }}",
                    type: 'GET',
                    data: { search: query },
                    success: function(response) {
                        document.getElementById("search-results").style.display = 'block';
                        let resultContainer = $('#search-results');
                        const assetUrl = "{{ asset('') }}"; // This will give you the base URL for your assets
                     // Make sure this element exists in the view
                        resultContainer.html('');  // Clear previous results
                        let hasResults = false;
                        if (response.products.length > 0) {
                            hasResults = true;
                            resultContainer.append('<h3>Products</h3>');
                            response.products.forEach(function(product) {
                                let item = `<div class="card mt-2">
                                            <div class="card-body">
                                                <h5><a href="/product/${product.slug}" target="_blank">${product.name}</a></h5>

                                            </div>
                                        </div>`;
                                resultContainer.append(item);
                            });
                        }
                        if (response.expertcategories.length > 0)
                        {
                            hasResults = true;
                            resultContainer.append('<h3>Experts</h3>');
                            response.expertcategories.forEach(function(expertcateg){
                                let item = `<div class="card mt-2">
                                            <div class="card-body">
                                                <h5><a href="/expert/${expertcateg.slug}" target="_blank">${expertcateg.name}</a></h5>
                                            </div>
                                        </div>`;
                                resultContainer.append(item);
                            })
                        }

                        if (hasResults == false) {
                            resultContainer.append('<p>No results found</p>');
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            // }

            });
        });
</script>
@endsection

