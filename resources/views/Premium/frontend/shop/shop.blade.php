@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | Shop
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Shop Right Sidebar</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('front')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Right Sidebar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Category Section Start -->
    <section class="wow fadeInUp">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-7_1 no-space shop-box no-arrow">
                        @foreach (product_categories() as $item)
                            <div>
                                <div class="shop-category-box">
                                    <a href="#">
                                        <div class="shop-category-image">
                                            <img src="{{ asset('product/category/' . $item->image) }}" class="blur-up lazyload" alt="">
                                        </div>
                                        <div class="category-box-name">
                                            <h6>{{ $item->name }}</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!-- Shop Section Start -->
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-custome-3 wow fadeInUp">
                    <div class="left-box">
                        <div class="shop-left-sidebar">
                            <div class="back-button">
                                <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
                            </div>
                            @include('Premium.frontend.shop.sidebar')
                        </div>
                    </div>
                </div>

                <div class="col-custome-9 wow fadeInUp">
                    <div
                        class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        @foreach ($products as $item)
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ route('product.details', $item->slug) }}">
                                                <img src="{{ asset('company/products/' . $item->image) }}" class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view_{{ $item->id }}"> <i  data-feather="eye"></i></a>
                                                    @push('all_models')
                                                        <!-- Quick View Modal Box Start -->
                                                        <div class="modal fade theme-modal view-modal"
                                                            id="view_{{ $item->id }}" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">{{ $item->porduct_category->name }}</span>
                                            <a href="{{ route('product.details', $item->slug) }}">
                                                <h5 class="name">{{ $item->name }}</h5>
                                            </a>
                                            {{-- <p class="text-content mt-1 mb-2 product-content" style="line-clamp:1">{!!$item->short_description!!}</p> --}}
                                            <h5 class="price theme-color">
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
                        @endforeach
                    </div>

                    <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item" aria-current="page">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
