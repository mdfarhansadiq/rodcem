@extends('layouts.master.frontend')
@section('title')
    Rodcem Home
@endsection
@section('custom_css')
   <style>
      marquee{
      font-size: 30px;
      font-weight: 800;
      color: #fff;
      font-family: sans-serif;
      }
    @media (max-width: 575px) {
      marquee{
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        font-family: sans-serif;
        }
        .hedline_btn{
            font-size: 15px;
        }
      }
      .themart-category-section{
        padding-bottom: 10px;
      }
    </style>
@endsection
@section('content')

    <!-- start of wpo-hero-section -->
    <section class="wpo-hero-slider-s2 mb-5">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- end swiper-slide item start -->
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="{{ asset('super/slider/' . $slider->image) }}">
                            <!-- <div class="gradient-overlay"></div> -->
                            <div class="container">
                                <div class="slide-content">
                                    {{-- <div data-swiper-parallax="200" class="slide-title-top">
                                            <span>Best Brand At The</span>
                                        </div> --}}
                                    <div data-swiper-parallax="300" class="slide-title">
                                        <h2>{{ $slider->title }}</h2>
                                    </div>
                                    {{-- <div data-swiper-parallax="400" class="slide-text">
                                            <p>Discount Up to 50% Off</p>
                                        </div> --}}
                                    <div class="clearfix"></div>
                                    <div data-swiper-parallax="500" class="slide-btns">
                                        <a href="{{ $slider->button_link }}"
                                            class="theme-btn">{{ $slider->button_name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end slide-inner -->
                    </div>
                @endforeach
                <!-- end swiper-slide item end -->
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <!-- end of wpo-hero-section -->

     <section class="themart-featured-section mb-5">
        <div class="container">
            <div class="row"  style="background:#233D50;color:#fff;">
                 <h1 class="col-md-2 mt-1 hedline_btn" style="color:white">HEADLINE</h1>
                 <div class="col-md-10">
                     <marquee style="color:#fff">{!!headline()->content!!}</marquee>
                 </div>
            </div>
        </div>
    </div>



    <!-- start of category-section -->
    <section class="themart-featured-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wpo-section-title">
                        <h2>CATEGORIES</h2>
                    </div>
                </div>
            </div>
            <div class="featured-categorie-slider owl-carousel">
                @foreach (product_categories() as $item)
                    <div class="featured-item">
                        <div class="images">
                            <a href="{{ route('category.product', $item->slug) }}"> <img height="100"
                                    src="{{ asset('super/product/category/' . $item->image) }}" alt=""></a>
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('category.product', $item->slug) }}">{{ $item->name }}</a></h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of category-section -->

     <!-- start of our-expert-section-section -->
    <section class="themart-trendingproduct-section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wpo-section-title">
                        <h2>Our Expert</h2>
                    </div>
                </div>
            </div>
            <div class="trendin-slider owl-carousel">
                @foreach ($experts as $expert)
                    <div class="product-item">
                        <div class="image">
                            <a href="{{route('expert.portfolio',$expert->slug)}}">
                                @if($expert->image)
                                    <img style="height: 280px" src="{{asset('expert/profile/'.$expert->image)}}" alt="">
                                @else
                                    <img src="{{asset('assets/rodcem/agents (2).jpg')}}" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="text">
                            <h2><a href="{{route('expert.portfolio',$expert->slug)}}">{{$expert->name}}</a></h2>
                            <div class="price">
                                <p class="present-price">{{$expert->expert_designation->name}}</p>
                                <p class="present-price">{{$expert->serviceZone->name ?? ''}}</p>
                            </div>
                            {{-- <div class="shop-btn">
                                <a class="theme-btn-s2" href="{{route('expert.portfolio',$expert->slug)}}">Contact</a>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end our-expert-section -->

        <!-- start of Barnd-section -->
    <section class="themart-featured-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wpo-section-title">
                        <h2>BRANDS</h2>
                    </div>
                </div>
            </div>
            <div class="featured-categorie-slider owl-carousel">
                @foreach (all_companies() as $item)
                    <div class="featured-item">
                        <div class="images">
                            <a href="{{ route('product', $item->slug) }}"> <img height="100"
                                    src="{{ $item->logo ? asset('company/profile/logo/' . $item->logo) : asset('assets/rodcem/defaultlogo.png') }}"
                                    alt=""></a>
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('product', $item->slug) }}">{{ $item->name }}</a></h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of Barnd-section -->

    <!-- start of main-service-section -->
    {{-- <section class="themart-category-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wpo-section-title">
                        <h2>Our Main Service</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="category-card">
                            <img src="{{ asset('serviceImage/' . $service_image->company) }}" alt="company image">
                            <div class="text">
                                <h3><a href="{{ route('company') }}">Compnay</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="category-card">
                            <img src="{{ asset('serviceImage/' . $service_image->agent) }}" alt="agent image">
                            <div class="text">
                                <h3><a href="{{ route('agents') }}">Agent</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="category-card">
                            <img src="{{ asset('serviceImage/' . $service_image->expert) }}" alt="">
                            <div class="text">
                                <h3><a href="{{ route('experts') }}">Expert</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section> --}}
    <!-- end of main-service-section -->

    <!-- start of themart-registration-section -->
    <section class="themart-offer-section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wpo-section-title">
                        <h2>Join With Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="offer-wrap" style="background:url({{ asset('imageSetting/joinUs/' . $join_us_image->expert) }})">
                        <div class="content">
                            <h3>Engineer Registration <br> Going On</h3>
                            <div class="count-up">
                                <div class="clock">
                                    <div class="count-up">
                                        <div class="clock">
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="e_days"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="e_hours"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="e_minutes"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="e_seconds"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="theme-btn-s2" href="{{ route('expert.register') }}">Register Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="offer-wrap" style="background:url({{asset('imageSetting/joinUs/'.$join_us_image->company)}}">
                        <div class="content">
                            <h3>Company Registration <br> Going On</h3>
                            <div class="count-up">
                                <div class="clock">
                                    <div class="count-up">
                                        <div class="clock">
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="c_days"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="c_hours"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="c_minutes"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="c_seconds"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="theme-btn-s2" href="{{ route('company.register') }}">Register Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="offer-wrap"  style="background:url({{ asset('imageSetting/joinUs/' . $join_us_image->agent) }})">
                        <div class="content">
                            <h3>Agent Registration <br> Going On</h3>
                            <div class="count-up">
                                <div class="clock">
                                    <div class="count-up">
                                        <div class="clock">
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="days"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="hours"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="minutes"></div>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div>
                                                    <div class="time" id="seconds"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="theme-btn-s2" href="{{ route('agent.register') }}">Register Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4">
                      <div class="banner-two-wrap" style="background: url({{asset('imageSetting/joinUs/'.$join_us_image->ad)}}">
                          <div class="text">

                          </div>
                      </div>
                  </div>
              </div>
            </div>
    </section>
    <!-- end of themart-registration-section -->

    {{-- <section class="deals-area">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6">
                    <div class="wpo-section-title"  style="margin:60px 0 20px 0">
                        <h2>Offer  Of The Day</h2>
                    </div>
                </div>
            </div>
            <div class="row deals-slider">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="offer-wrap">
                        <div class="image">
                            <img src="{{asset('theme/assets')}}/images/deals/1.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Yellow Hats</h2>
                            <span class="offer-price">$80</span>
                            <del>$150</del>
                            <a class="theme-btn-s2" href="product-single.html">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="all-deals-btn">
                        <a href="deals.html" class="theme-btn">All Offers</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="themart-interestproduct-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wpo-section-title" style="margin:60px 0 20px 0">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
                <div class="row">
                    @foreach ($news as $item )
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="product-item">
                                <div class="image">
                                    <img src="{{ asset('news/'.$item->image)}}" alt="">
                                </div>
                                <div class="text">
                                    <h2><a href="{{route('news.details', $item->slug)}}">{{$item->title}}</a></h2>
                                    {{-- <div class="price"> --}}
                                        <p class="text-start" style="padding:10px">
                                            {!!$item->short_description!!}
                                            <a class="text-center" href="{{route('news.details', $item->slug)}}">READ MORE...</a>
                                        </p>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="more-btn">
                        <a class="theme-btn-s2" href="{{route('news')}}">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start of themart-cta-section -->
    @include('layouts.master.subscriber')
    <!-- end of themart-cta-section -->
@endsection

@section('custom_js')

{{-- Agent Time  --}}
    <script>
        function makeTimer() {

            //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
            var endTime = new Date("30 March 2023 9:56:00 GMT+01:00");
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }

            $("#days").html(days + "<br><br><span>Days</span>");
            $("#hours").html(hours + "<br><br><span>Hours</span>");
            $("#minutes").html(minutes + "<br><br><span>Mins</span>");
            $("#seconds").html(seconds + "<br><br><span>Secs</span>");

        }

        setInterval(function() {
            makeTimer();
        }, 1000);
    </script>

    {{-- //expert timer  --}}
    <script>
        function expert_timer() {

            //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
            var endTime = new Date("30 March 2023 9:56:00 GMT+01:00");
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }

            $("#e_days").html(days + "<br><br><span>Days</span>");
            $("#e_hours").html(hours + "<br><br><span>Hours</span>");
            $("#e_minutes").html(minutes + "<br><br><span>Mins</span>");
            $("#e_seconds").html(seconds + "<br><br><span>Secs</span>");

        }

        setInterval(function() {
            expert_timer();
        }, 1000);
    </script>
    {{-- //Company timer  --}}
    <script>
        function company_timer() {

            //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
            var endTime = new Date("30 April 2023 9:56:00 GMT+01:00");
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }

            $("#c_days").html(days + "<br><br><span>Days</span>");
            $("#c_hours").html(hours + "<br><br><span>Hours</span>");
            $("#c_minutes").html(minutes + "<br><br><span>Mins</span>");
            $("#c_seconds").html(seconds + "<br><br><span>Secs</span>");

        }

        setInterval(function() {
            company_timer();
        }, 1000);
    </script>
    {{-- manually slider run  --}}
    <script>
        function sliderClick() {
            $(".owl-next").trigger('click');
        }
        setInterval(function() {
            sliderClick();
        }, 2000);
    </script>
@endsection
