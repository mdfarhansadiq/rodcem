@extends('layouts.master.frontend')
@section('title')
  Company Shop
@endsection
@section('custom_css')
    <style>
       .Descriptions-item ul li {
            list-style: inside;
        }
    </style>
@endsection
@section('content')
        <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <h2 class="d-none">Hide</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="{{route('front')}}">Home</a></li>
                                <li><a href="{{route('product',$product->company->slug)}}">{{$product->company->name}}</a></li>
                                <li class="text-success">{{$product->name}}</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- product-single-section  start-->
        <div class="product-single-section section-padding">
            <div class="container">
                <div class="product-details">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="product-single-img">
                                <div class="product-active ">
                                    <div class="item">
                                        <img src="{{asset('company/products/'.$product->image)}}" alt="">
                                    </div>
                                </div>                               
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-single-content">
                                <h2>{{$product->name}}</h2>
                                <div class="price">                                   
                                @if (auth('company')->user() || auth('agent')->user() || auth('super')->user())                                                                
                                    <span class="present-price">{{$product->price}} <sup>Tk</sup></span>                                                       
                                @endif
                                    {{-- <del class="old-price">$200.00</del> --}}
                                </div>
                                <p>
                                    {!! $product->short_description!!}
                                </p>
                                @if(Auth()->check() || Auth('agent')->check())                           
                                <div class="pro-single-btn">
                                    <form action="{{route('add.to.cart.details')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="quantity cart-plus-minus">
                                            <input class="text-value" name="quentity" type="text" value="1">
                                        </div>
                                        <button type="submit" class="theme-btn-s2" style="border:none">Add to cart</button>
                                    </form>
                                </div>
                                @else
                                    @if(Auth('company')->check() || Auth('super')->check() || !Auth()->check())                                                               
                                    <div class="pro-single-btn">
                                        <div class="quantity cart-plus-minus">
                                            <input class="text-value" name="quentity" type="text" value="1">
                                        </div>
                                        <a href="{{route('login')}}" class="theme-btn-s2" style="border:none">Add to cart</a>                                     
                                        {{-- <button type="submit" class="theme-btn-s2" style="border:none">Add to cart</button>                                      --}}
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab-area">
                    <ul class="nav nav-mb-3 main-tab" id="tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="descripton-tab" data-bs-toggle="pill"
                                data-bs-target="#descripton" type="button" role="tab" aria-controls="descripton"
                                aria-selected="true">Description</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="descripton" role="tabpanel"
                            aria-labelledby="descripton-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="Descriptions-item">
                                            {!!$product->description!!}  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-product">
            </div>
        </div>
        <!-- product-single-section  end-->

@endsection
