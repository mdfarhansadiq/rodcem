@extends('layouts.front')

@section('page_title')
    Products
@endsection
@section('custom_css')
  <style>
    .ecommerce-card{
      padding: 0;
      /* width:50%;
      width:50%; */
    }
    .card-text {
      /* padding: 10px 15px; */
      padding: 0px;
      background: #fff;
      font-size: 14px;
      color: #2D6CA4;
    }
    .grid-view {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    -webkit-column-gap: 2rem;
    -moz-column-gap: 2rem;
    column-gap: 2rem;
    row-gap: 2rem;
    }
    .owl-carousel .owl-dot, .owl-carousel .owl-nav .owl-next, .owl-carousel .owl-nav .owl-prev{
      display: none;
      opacity: 0;
    }

    .card-img-top{
    height:300px;
}

.card-no-border .card {
    border-color: #d7dfe3;
    border-radius: 4px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.pro-img {
    margin-top: -80px;
    margin-bottom: 20px;
    width: 128px;
    height: 128px;
    /* border-radius: 100% */  
}

.little-profile .pro-img img {
    height:100px;
}

html body .m-b-0 {
    margin-bottom: 0px
}

h3 {
    line-height: 30px;
    font-size: 21px
}

.btn-rounded.btn-md {
    padding: 12px 35px;
    font-size: 16px
}

html body .m-t-10 {
    margin-top: 10px
}

.btn-primary,
.btn-primary.disabled {
    background: #286090;
    border: 1px solid #286090;
    -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    -webkit-transition: 0.2s ease-in;
    -o-transition: 0.2s ease-in;
    transition: 0.2s ease-in
}

.btn-rounded {
    border-radius: 60px;
    padding: 7px 18px
}

.m-t-20 {
    margin-top: 20px
}

.text-center {
    text-align: center !important
}

h1,
h2,
h3,
h4,
h5,
h6 {
    color: #455a64;
    font-family: "Poppins", sans-serif;
    font-weight: 400
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}
  </style>
@endsection

@section('content')


@php
  // dd($company->products)
@endphp
<div class="container my-4">
  <div class="row">
<div class="col-md-12 mx-auto grid-margin stretch-card">
    <div class="card">
        @if ($company->cover)                                
            <img class="card-img-top" src="{{asset('company/profile/cover/'.$company->cover)}}" alt="Card image cap">
        @else
            <img class="card-img-top" src="{{asset('assets/rodcem/defatultcover.jpg')}}" alt="Card image cap">
        @endif
        <div class="card-body little-profile text-center">
            <div class="pro-img">
            @if ($company->logo)                                
                <img class="card-img-top" src="{{asset('company/profile/logo/'.$company->logo)}}" alt="Card image cap">
            @else
                <img class="card-img-top" src="{{asset('assets/rodcem/defautllogo.webp')}}" alt="Card image cap">
            @endif
            </div>            
            <div class="row text-center m-t-20">
                <div class="col-lg-4 col-md-4 ">
                    <h3 class="m-b-0 font-light"></h3>                    
                </div>
            </div>
        </div>
    </div>
</div>


  <!-- Partner Start -->
  <section class="partner-v1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>Our All Products</h2>
            <p>All Our Companys Product  are Listed Below</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            {{-- <div class="partner-carousel">          
              <img src="{{ asset('company/categories/1673372892_1669026180_pexels-pixabay-268941.jpg') }}" >      
            </div>     --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Partner End -->

<div class="col-12 mb-5">
  <div class="row">
    <div class="row" id="all_product">
      @foreach($company->products as $item)
        <div class="card ecommerce-card col-sm-6 col-md-3 m-5">
            <div class="item-img text-center">
                <a href="app-ecommerce-details.html">
                    <img style="height: 200px" class="img-fluid card-img-top" src="{{asset('company/products/' . $item->image)}}" alt="img-placeholder">
                </a>
            </div>
            <div class="card-body">
                <div class="item-wrapper">
                    {{-- <div class="item-rating">
                        <ul class="unstyled-list list-inline">
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star filled-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></li>
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star filled-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></li>
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star filled-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></li>
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star filled-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></li>
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star unfilled-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></li>
                        </ul>
                    </div> --}}
                    {{-- <div class="item-cost">
                        <h6 class="item-price">$129.29</h6>
                    </div> --}}
                </div>
                <h6 class="item-name">
                    {{-- <a class="text-body" href="app-ecommerce-details.html"> Google - Google Home - White/Slate fabric </a> --}}
                    <span class="card-text item-company">{{$item->name}}</span>
                </h6>
                {{-- <p class="card-text item-description">
                    Simplify your everyday life with the Google Home, a voice-activated speaker powered by the Google Assistant. Use
                    voice commands to enjoy music, get answers from Google and manage everyday tasks. Google Home is compatible with
                    Android and iOS operating systems, and can control compatible smart devices such as Chromecast or Nest.
                </p> --}}
            </div>
            <div class="item-options text-center">
                {{-- <div class="item-wrapper">
                    <div class="item-cost">
                        <h4 class="item-price">$129.29</h4>
                        <p class="card-text shipping">
                            <span class="badge badge-pill badge-light-success">Free Shipping</span>
                        </p>
                    </div>
                </div> --}}
                {{-- <a href="javascript:void(0)" class="btn btn-light btn-wishlist waves-effect waves-float waves-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    <span>Wishlist</span>
                </a> --}}
                @if(auth('agent')->check())
                <a style="width: 100%;" href="{{ url('add-to-cart/' . $item->id)}}" class="btn btn-primary btn-cart waves-effect waves-float waves-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    <span class="add-to-cart">Add to cart</span>
                </a>
                @endif
                {{-- // <a href="{{ url('add-to-cart/' . $item->id) }}" class="btn text-white" style="background-color: #ed4c2c!important;"> <img src="{{asset('assets/rodcem/icon/shopping-cart.svg')}}" alt=""> Add to cart</a> --}}
            </div>
        </div>
      @endforeach
    </div>
  </div>
{{-- </div> --}}
</div>
</div>
</div>


@endsection
