@extends('Premium.layout.frontend.premium')
@section('title')
    {{config('app.name')}} | About
@endsection
@section('content')
        <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>About Us</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('front')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Fresh Vegetable Section Start -->
    <section class="fresh-vegetable-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
                <div class="col-xl-6 col-12">
                    <div class="row g-sm-4 g-2">
                        <div class="col-6">
                            <div class="fresh-image-2">
                                <div>
                                    <img src="{{asset('premium/assets')}}/images/inner-page/about-us/1.jpg" class="bg-img blur-up lazyload" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="fresh-image">
                                <div>
                                    <img src="{{asset('premium/assets')}}/images/inner-page/about-us/2.jpg" class="bg-img blur-up lazyload" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-12">
                    <div class="fresh-contain p-center-left">
                        <div>
                            <div class="review-title">
                                <h4>About Us</h4>
                                {{-- <h2>We make Organic Food In Market</h2> --}}
                            </div>

                            <div class="delivery-list">
                                <p class="text-content">Rodcem.com is an innovative online platform designed to provide comprehensive construction business solutions for the people of Bangladesh. Founded in 2019 by Md Al Farhad, the platform allows customers to purchase building materials online with ease, making the construction process simpler and more convenient than ever before.

Since its inception, Rodcem.com has been committed to maintaining strong ethical business practices, ensuring that customers receive top-quality products and exceptional service. With a focus on customer satisfaction, the company has quickly established itself as a leading player in the construction industry in Bangladesh.</p>

                                <ul class="delivery-box">
                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/delivery.svg" class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">100% delivery for all orders</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/leaf.svg" class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Best Product</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/delivery.svg" class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Delivery for all orders</h5>
                                            </div>
                                        </div>
                                    </li>
{{--
                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/leaf.svg" class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Only fresh foods</h5>
                                            </div>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fresh Vegetable Section End -->

    <!-- Client Section Start -->
    <section class="client-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-title text-center">
                        <h4>What We Do</h4>
                        <h2 class="center">We are Trusted by Clients</h2>
                    </div>

                    <div class="slider-3_1 product-wrapper">
                        <div>
                            <div class="clint-contain">
                                <div class="client-icon">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg" class="blur-up lazyload" alt="">
                                </div>
                                <h2>10</h2>
                                <h4>Business Years</h4>
                                <p>A coffee shop is a small business that sells coffee, pastries, and other morning
                                    goods. There are many different types of coffee shops around the world.</p>
                            </div>
                        </div>

                        <div>
                            <div class="clint-contain">
                                <div class="client-icon">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/buy.svg" class="blur-up lazyload" alt="">
                                </div>
                                <h2>80 K+</h2>
                                <h4>Products Sales</h4>
                                <p>Some coffee shops have a seating area, while some just have a spot to order and then
                                    go somewhere else to sit down. The coffee shop that I am going to.</p>
                            </div>
                        </div>

                        <div>
                            <div class="clint-contain">
                                <div class="client-icon">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/user.svg" class="blur-up lazyload" alt="">
                                </div>
                                <h2>90%</h2>
                                <h4>Happy Customers</h4>
                                <p>My goal for this coffee shop is to be able to get a coffee and get on with my day.
                                    It's a Thursday morning and I am rushing between meetings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->

    <!-- Blog Section Start -->
    {{-- <section class="section-lg-space">
        <div class="container-fluid-lg">
            <div class="about-us-title text-center">
                <h4 class="text-content">Our Blog</h4>
                <h2 class="center">Our Latest Blog</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-5 ratio_87">
                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <div class="blog-image">
                                        <a href="blog-detail.html" class="rounded-3">
                                            <img src="{{asset('premium/assets')}}/images/veg-2/blog/1.jpg" class="bg-img blur-up lazyload"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                <a href="blog-detail.html" class="blog-detail d-block">
                                    <h6>Farmart</h6>
                                    <h5>Fresh Meat Saugage</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <div class="blog-image">
                                        <a href="blog-detail.html" class="rounded-3">
                                            <img src="{{asset('premium/assets')}}/images/veg-2/blog/2.jpg" class="bg-img blur-up lazyload"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                <a href="blog-detail.html" class="blog-detail d-block">
                                    <h6>Soda Brand</h6>
                                    <h5>Soda 500ml - 20% OFF</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <div class="blog-image">
                                        <a href="blog-detail.html" class="rounded-3">
                                            <img src="{{asset('premium/assets')}}/images/veg-2/blog/3.jpg" class="bg-img blur-up lazyload"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                <a href="blog-detail.html" class="blog-detail d-block">
                                    <h6>Beer Brand</h6>
                                    <h5>Soda 500ml - 20% OFF</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <div class="blog-image">
                                        <a href="blog-detail.html" class="rounded-3">
                                            <img src="{{asset('premium/assets')}}/images/veg-2/blog/4.jpg" class="bg-img blur-up lazyload"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                <a href="blog-detail.html" class="blog-detail d-block">
                                    <h6>Beer Brand</h6>
                                    <h5>Fresh Beer -30% OFF</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="blog-box">
                                <div class="blog-image">
                                    <a href="blog-detail.html" class="rounded-3">
                                        <img src="{{asset('premium/assets')}}/images/veg-2/blog/5.jpg" class="bg-img blur-up lazyload"
                                            alt="">
                                    </a>
                                </div>

                                <a href="blog-detail.html" class="blog-detail d-block">
                                    <h6>Milk Brand</h6>
                                    <h5>Fresh Milk</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Blog Section End -->
@endsection
