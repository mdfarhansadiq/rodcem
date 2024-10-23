@extends('layouts.master.frontend')
@section('title')
  Rodcem Home
@endsection

@section('content')

        <!-- start of wpo-hero-section -->
        <div class="wpo-hero-slider">
          <div class="container container-fluid-sm">
              <div class="hero-slider">
                  <div class="hero-slider-item">
                      <div class="slider-bg">
                          <img src="{{asset('theme/assets')}}/images/slider/slide-1.jpg" alt="">
                      </div>
                      <div class="slider-content">
                          <div class="slide-title">
                              <h2>Trendy & Unique
                                  Collection</h2>
                          </div>
                          <a class="theme-btn" href="product.html">Shop Now</a>
                      </div>
                  </div>
                  <div class="hero-slider-item">
                      <div class="slider-bg">
                          <img src="{{asset('theme/assets')}}/images/slider/slide-2.jpg" alt="">
                      </div>
                      <div class="slider-content">
                          <div class="slide-title">
                              <h2>Trendy & Unique
                                  Collection</h2>
                          </div>
                          <a class="theme-btn" href="product.html">Shop Now</a>
                      </div>
                  </div>
                  <div class="hero-slider-item">
                      <div class="slider-bg">
                          <img src="{{asset('theme/assets')}}/images/slider/slide-3.jpg" alt="">
                      </div>
                      <div class="slider-content">
                          <div class="slide-title">
                              <h2>Trendy & Unique
                                  Collection</h2>
                          </div>
                          <a class="theme-btn" href="product.html">Shop Now</a>
                      </div>
                  </div>
              </div>
          </div>
          <ul class="hero-social">
              <li>
                  <a href="#"><i class="ti-facebook"></i></a>
              </li>
              <li>
                  <a href="#"><i class="ti-instagram"></i></a>
              </li>
              <li>
                  <a href="#"><i class="ti-linkedin"></i></a>
              </li>
              <li>
                  <a href="#"><i class="ti-twitter-alt"></i></a>
              </li>
          </ul>
      </div>
      <!-- end of wpo-hero-section -->

      <!-- start of themart-category-section -->
      <section class="themart-category-section s2 section-padding">
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
                          <img src="{{asset('theme/assets')}}/images/category/1.jpg" alt="">
                          <div class="text">
                              <h3><a href="product-single.html">Compnay</a></h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-12">
                      <div class="category-card">
                          <img src="{{asset('theme/assets')}}/images/category/2.jpg" alt="">
                          <div class="text">
                              <h3><a href="product-single.html">Agent</a></h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-12">
                      <div class="category-card">
                          <img src="{{asset('theme/assets')}}/images/category/3.jpg" alt="">
                          <div class="text">
                              <h3><a href="product-single.html">Expert</a></h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- end of themart-category-section -->

      <!-- start of themart-featured-section -->
      <section class="themart-featured-section">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="wpo-section-title">
                          <h2>Featured Categories</h2>
                      </div>
                  </div>
              </div>
              <div class="featured-categorie-slider owl-carousel">
                  <div class="featured-item">
                      <div class="images">
                          <img src="{{asset('theme/assets')}}/images/featured-categorie/1.png" alt="">
                      </div>
                      <div class="text">
                          <h2><a href="product.html">Sneakers</a></h2>
                      </div>
                  </div>
                  <div class="featured-item">
                      <div class="images">
                          <img src="{{asset('theme/assets')}}/images/featured-categorie/2.png" alt="">
                      </div>
                      <div class="text">
                          <h2><a href="product.html">Cosmetics</a></h2>
                      </div>
                  </div>
                  <div class="featured-item">
                      <div class="images">
                          <img src="{{asset('theme/assets')}}/images/featured-categorie/3.png" alt="">
                      </div>
                      <div class="text">
                          <h2><a href="product.html">Bags</a></h2>
                      </div>
                  </div>
                  <div class="featured-item">
                      <div class="images">
                          <img src="{{asset('theme/assets')}}/images/featured-categorie/4.png" alt="">
                      </div>
                      <div class="text">
                          <h2><a href="product.html">Jackets</a></h2>
                      </div>
                  </div>
                  <div class="featured-item">
                      <div class="images">
                          <img src="{{asset('theme/assets')}}/images/featured-categorie/5.png" alt="">
                      </div>
                      <div class="text">
                          <h2><a href="product.html">Skin Care</a></h2>
                      </div>
                  </div>
                  <div class="featured-item">
                      <div class="images">
                          <img src="{{asset('theme/assets')}}/images/featured-categorie/6.png" alt="">
                      </div>
                      <div class="text">
                          <h2><a href="product.html">Jewelry</a></h2>
                      </div>
                  </div>
                  <div class="featured-item">
                      <div class="images">
                          <img src="{{asset('theme/assets')}}/images/featured-categorie/7.png" alt="">
                      </div>
                      <div class="text">
                          <h2><a href="product.html">Dress</a></h2>
                      </div>
                  </div>
                  <div class="featured-item">
                      <div class="images">
                          <img src="{{asset('theme/assets')}}/images/featured-categorie/8.png" alt="">
                      </div>
                      <div class="text">
                          <h2><a href="product.html">Kids</a></h2>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- end of themart-featured-section -->

      <!-- start of themart-offer-section -->
      <section class="themart-offer-section section-padding">
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
                      <div class="offer-wrap">
                          <div class="content">
                              <h3>Engineer Registration <br> Goin On</h3>
                              {{-- <span class="offer-price">$80</span>
                              <del>$150</del> --}}

                              <div class="count-up">
                                  <div id="clock"></div>
                              </div>
                              <a class="theme-btn-s2" href="{{route('expert.register')}}">Register Now</a>
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <div class="banner-two-wrap">
                          <div class="text">
                              <h2>New Year Sale</h2>
                              <h4>Up To 70% Off</h4>
                              <a class="theme-btn-s2" href="product.html">Shop Now</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- end of themart-offer-section -->
      <!-- start of themart-cta-section -->
      @include('layouts.master.subscriber')
      <!-- end of themart-cta-section -->
@endsection
