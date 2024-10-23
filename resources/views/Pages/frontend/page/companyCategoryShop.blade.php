@extends('layouts.master.frontend')
@section('title')
  Company Shop
@endsection
@section('custom_css')
    <style>
        .vendors-single-wrap .vendors-single-content{
            width: 100%;
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
                                <li><a href="{{route('company')}}">Companies</a></li>
                                <li class="text-success">{{$company->name}}</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- product-area-start -->
        <div class="shop-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="vendors-single-wrap" style="width: 100%;">
                            <div class="image">
                                {{-- <img src="{{asset('theme/assets')}}/images/vendor/vendor_bg.jpg" alt=""> --}}
                                <img 
                                
                                src="{{ ($company && $company->cover) ? asset('company/profile/cover/'.$company->cover) : asset('theme/assets/images/vendor/vendor_bg.jpg')}}" alt="">
                            </div>
                            <div class="vendors-single-content">
                                <div class="vendeor-log">                                    
                                    <img width="130" src="{{ ($company && $company->logo) ? asset('company/profile/logo/'.$company->logo) : asset('theme/assets/images/vendor/img-1.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <h6>Since {{$company->since}}</h6>
                                    {{-- <h2>Lorem Ipsum Group</h2> --}}
                                    <div class="all-prodact">
                                        @php
                                            $company_products = company_products_count($company->slug);
                                        @endphp
                                        {{$company_products}} products
                                    </div>
                                    <p> {{$company->about}} </p>
                                </div>
                                <div class="contact-ft">
                                    <ul>
                                        <li><i class="fi flaticon-mail"></i>{{$company->email}}</li>
                                        <li><i class="fi flaticon-phone"></i>{{$company->phone_number}}</li>
                                        <li><i class="fi flaticon-pin"></i>{{$company->address}}</li>
                                    </ul>
                                </div>
                                <ul class="vendeor-social">
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="shop-filter-wrap">
                            <div class="filter-item">
                                <div class="shop-filter-item">
                                    <div class="shop-filter-search">
                                        <form>
                                            <div>
                                                <input type="text" class="form-control" placeholder="Search..">
                                                <button type="submit"><i class="ti-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-item">
                                <div class="shop-filter-item category-widget">
                                    <h2>Categories</h2>
                                    <ul>
                                        @foreach ($company->categories as $category)                                            
                                            <li><a href="{{route('company.category.product',$category->slug)}}">{{$category->sub_category}}<span>({{products($category->id)}})</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="shop-section-top-inner">
                            <div class="shoping-product">
                                <p>We found <span>{{count($products)}}  items</span> for you!</p>
                            </div>            
                        </div>
                        <div class="tab-content">
                            {{-- product grid view  --}}
                            <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                <div class="product-wrap">
                                    <div class="row align-items-center">
                                        @foreach ($products as $item )                                            
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="product-item">
                                                    <div class="image">
                                                        <img height="200" src="{{asset('company/products/'.$item->image)}}" alt="">
                                                        {{-- <div class="tag new">New</div> --}}
                                                        <ul class="cart-wrap">
                                                            <ul class="cart-wrap">
                                                            @if(Auth()->check() || Auth('agent')->check())
                                                                <li>
                                                                    <a href="{{route('add.to.cart',$item->id)}}" data-bs-toggle="tooltip" data-bs-html="true" title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                                </li>
                                                            @else
                                                                @if(Auth('company')->check() == false || Auth('super')->check() == false)                                                               
                                                                    <li>
                                                                        <a href="{{route('login')}}" data-bs-toggle="tooltip" data-bs-html="true" title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                                    </li>
                                                                @endif                                                                
                                                            @endif
                                                            <li data-bs-toggle="modal" data-bs-target="#popup-quickview_{{$item->id}}">
                                                                <button data-bs-toggle="tooltip" data-bs-html="true"
                                                                    title="Quick View"><i
                                                                        class="fi flaticon-eye"></i></button>
                                                            </li>
                                                            @push('all_models')
                                                            <!-- popup-quickview  -->
                                                            <div id="popup-quickview_{{$item->id}}" class="modal fade" tabindex="-1">
                                                                <div class="modal-dialog quickview-dialog">
                                                                    <div class="modal-content">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i  class="ti-close"></i></button>
                                                                        <div class="modal-body d-flex">
                                                                            <div class="product-details">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-lg-5">
                                                                                        <div class="product-single-img">
                                                                                            <div class="modal-product">
                                                                                                <div class="item">
                                                                                                    <img src="{{asset('company/products/'.$item->image)}}" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-7">
                                                                                        <div class="product-single-content">
                                                                                            <h5>{{$item->name}}</h5>                                                                                      
                                                                                            @if (auth('company')->user() || auth('agent')->user() || auth('super')->user())                                                                                                    
                                                                                                <h6>{{$item->price}} <sup>Tk</sup></h6>
                                                                                            @endif                                                                                                                                                                                   
                                                                                            <p> {!! $item->short_description !!}</p>
                                                                                            <form action="{{route('add.to.cart.details')}}" id="cart_form" method="post">
                                                                                                @csrf
                                                                                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                                                                                <div class="pro-single-btn">
                                                                                                    <div class="quantity cart-plus-minus">
                                                                                                        <input type="text" name="quentity" value="1">
                                                                                                        <div class="dec qtybutton">-</div>
                                                                                                        <div class="inc qtybutton"></div>
                                                                                                    </div>                                                                                                    
                                                                                                    @if(Auth()->check() || Auth('agent')->check()) 
                                                                                                        <a onclick='document.getElementById("cart_form").submit()' class="theme-btn">Add to cart</a>
                                                                                                    @elseif(Auth('company')->check() == false || Auth('super')->check() == false)                                                                                                        
                                                                                                        <a href="{{route('login')}}" class="theme-btn">Add to cart</a>                                                                                                 
                                                                                                    @else
                                                                                                        <a href="{{route('login')}}" class="theme-btn">Add to cart</a>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- popup-quickview -->
                                                            </div>
                                                            @endpush
                                                            {{-- <li>
                                                                <a href="wishlist.html" data-bs-toggle="tooltip"
                                                                    data-bs-html="true" title="Wish List"><i
                                                                        class="fi flaticon-heart"
                                                                        aria-hidden="true"></i></a>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                    <div class="text">
                                                        <h2><a href="{{route('product.details',$item->slug)}}">{{$item->name}}</a></h2>
                                                        <div class="rating-product">
                                                        </div>
                                                        <div class="price">
                                                            @if (auth('company')->user() || auth('agent')->user() || auth('super')->user())                                                                                                                            
                                                                <span class="present-price">{{$item->price}}<sup>Tk</sup></span>
                                                            @endif
                                                            {{-- <del class="old-price">$200.00</del> --}}
                                                        </div>
                                                        <div class="shop-btn">
                                                            @if(Auth()->check() || Auth('agent')->check())
                                                                @if(order_time() == true)
                                                                    <a class="theme-btn-s2" href="{{route('shop.now',$item->id)}}">Shop Now</a>
                                                                @else
                                                                    <a class="theme-btn-s2" data-bs-toggle="modal" data-bs-target="#shop_product_{{$item->id}}">Shop Now</a>
                                                                    @push('all_models')                                                                        
                                                                        <div class="modal fade" id="shop_product_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title text-warning" id="exampleModalLongTitle">Warning!</h5>
                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                <p class="text-danger">
                                                                                    Order Time {{order_time_setting()->start}} To {{order_time_setting()->end}}
                                                                                </p>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    @endpush
                                                                @endif
                                                            @else
                                                                @if(Auth('company')->check() == false || Auth('super')->check() == false)
                                                                <a class="theme-btn-s2" href="{{route('login')}}">Shop Now</a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-area-end -->
@endsection
