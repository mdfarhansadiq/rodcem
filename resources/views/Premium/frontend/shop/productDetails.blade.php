@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | {{ $item->name }}
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>{{ $item->name }}</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">{{ $item->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Left Sidebar Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                        <div class="product-main-2 no-arrow">
                                            <div>
                                                <div class="slider-image">
                                                    <img src="{{ asset('company/products/details/' . $item->details_image) }}"
                                                        id="img-1" class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                {{-- <h6 class="offer-top">30% Off</h6> --}}
                                <h2 class="name">{{ $item->name }}</h2>
                                <div class="price-rating">
                                    <h3 class="theme-color price"><i class="fa fa-turkish-lira"></i>
                                        @if (view_action() == 'view_right')
                                            {{ $item->price }}
                                        @else
                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i
                                                    class="fa fa-info-circle"></i></span>
                                        @endif
                                        <span class="offer theme-color">per {{ $item->unit->name }}</span>
                                    </h3>
                                </div>

                                <div class="procuct-contain">
                                    <p>{!! $item->short_description !!}
                                    </p>
                                </div>
                                <form action="{{ route('add.to.cart.details') }}" method="post">
                                    @csrf
                                    <div class="note-box product-packege">
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <div class="cart_qty qty-box product-qty">
                                            <div class="input-group">
                                                <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text" name="quentity" value="1">
                                                <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @if (cart_action() == 'cart_right')
                                            <button type="submit"
                                                class="btn btn-md bg-dark text-white add-cart-button icon">Add To Cart</button>
                                        @elseif (cart_action() == 'not_cart_right')
                                            <button disabled class="btn btn-md bg-dark text-white add-cart-button icon">Add To Cart</button>
                                        @elseif(cart_action() == 'guest')
                                            <button disabled class="btn btn-md bg-dark text-white add-cart-button icon">Add To Cart</button>
                                        @endif
                                    </div>
                                </form>
                                <div class="paymnet-option">
                                    <div class="product-title">
                                        <h4>Guaranteed Safe Checkout</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/1.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/2.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/3.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/4.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/5.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">Description</button>
                                    </li>
                                </ul>
                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-description">
                                            <div class="nav-desh">
                                                <p>{!! $item->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box" style="height:200px;overflow:scroll">
                            {{-- <div class="verndor-contain">
                                <div class="vendor-image">
                                    <img src="{{asset('premium/assets')}}/images/product/vendor.png" class="blur-up lazyload" alt="">
                                </div>

                                <div class="vendor-name">
                                    <h5 class="fw-500">Noodles Co.</h5>
                                    <div class="product-rating mt-1">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                        <span>(36 Reviews)</span>
                                    </div>
                                </div>
                            </div>
                            <p class="vendor-detail">Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta.</p> --}}
                            <div class="verndor-contain">
                                <h3>Contact Our Agent</h3>
                            </div>
                            <div class="vendor-list">
                                <ul>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="map-pin"></i>
                                            <h5>Address: <span class="text-content">1288 Franklin Avenue</span></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="headphones"></i>
                                            <h5>Contact : <span class="text-content">**********</span></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="vendor-list">
                                <ul>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="map-pin"></i>
                                            <h5>Address: <span class="text-content">1288 Franklin Avenue</span></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="headphones"></i>
                                            <h5>Contact Seller: <span class="text-content">">**********</span></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Trending Products</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                    @foreach (trending_products() as $item)
                                        <li>
                                            <div class="offer-product">
                                                <a href="{{ route('product.details', $item->slug) }}"
                                                    class="offer-image">
                                                    <img src="{{ asset('company/products/' . $item->image) }}"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="{{ route('product.details', $item->slug) }}"
                                                            class="text-title">
                                                            <h6 class="name">{{ $item->name }}</h6>
                                                        </a>
                                                        <span>{{ $item->porduct_category->name }}</span>
                                                        <h6 class="price theme-color">
                                                            <i class="fa fa-turkish-lira"></i>
                                                            @if (view_action() == 'view_right')
                                                                {{ $item->price }}
                                                            @else
                                                                <span class="theme-color" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i
                                                                        class="fa fa-info-circle"></i></span>
                                                            @endif
                                                            <span class="offer theme-color">per
                                                                {{ $item->unit->name }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Banner Section -->
                        <div class="ratio_156 pt-25">
                            <div class="home-contain">
                                <img src="{{ asset('premium/assets') }}/images/vegetable/banner/8.jpg"
                                    class="bg-img blur-up lazyload" alt="">
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h6 class="text-yellow home-banner">Ispat</h6>
                                        <h3 class="text-uppercase fw-normal"><span
                                                class="theme-color fw-bold">Anawer</span> Isapat</h3>
                                        {{-- <h3 class="fw-light">every hour</h3> --}}
                                        <button onclick="location.href = '#';"
                                            class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Releted Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Related Products</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        @foreach (releted_products($item->id) as $item)
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ route('product.details', $item->slug) }}">
                                                <img src="{{ asset('company/products/' . $item->image) }}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#view_{{ $item->id }}"> <i
                                                            data-feather="eye"></i></a>
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
                                                                                    <h4 class="price theme-color"><i
                                                                                            class="fa fa-turkish-lira"></i>
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
                                                                                        @if (cart_action() == 'cart_right')
                                                                                            <button
                                                                                                onclick="location.href = '{{ route('add.to.cart', $item->id) }}';"
                                                                                                class="btn btn-md add-cart-button icon">Add
                                                                                                To Cart</button>
                                                                                            @elseif (cart_action() == 'not_cart_right')
                                                                                            <button
                                                                                                onclick="location.href = '#';"
                                                                                                class="btn btn-md add-cart-button icon">Add
                                                                                                To Cart</button>
                                                                                        @else
                                                                                            <button
                                                                                                onclick="location.href = '{{ route('login') }}';"
                                                                                                class="btn btn-md add-cart-button icon">Add
                                                                                                To Cart</button>
                                                                                        @endif
                                                                                        <button
                                                                                            onclick="location.href = '{{ route('product.details', $item->slug) }}';"
                                                                                            class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                                                                            View More Details</button>
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
                                                @if (cart_action() == 'cart_right')
                                                    <a href="{{ route('add.to.cart', $item->id) }}"
                                                        class="btn btn-add-cart addcart-button">Add To Cart
                                                        <span class="add-icon bg-light-gray"> <i
                                                                class="fa-solid fa-shopping-cart"></i> </span>
                                                    </a>
                                                @elseif (cart_action() == 'not_cart_right')
                                                    <a href="#" class="btn btn-add-cart addcart-button">Add To Cart
                                                        <span class="add-icon bg-light-gray"> <i
                                                                class="fa-solid fa-shopping-cart"></i> </span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}"
                                                        class="btn btn-add-cart addcart-button">Add To Cart
                                                        <span class="add-icon bg-light-gray"> <i
                                                                class="fa-solid fa-shopping-cart"></i> </span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Releted Product Section End -->
@endsection
@section('custom_js')
    <script>
        $(function(){
            $('.qty-right-plus').click(function(){
                 $('.qty-input').val(parseInt($('.qty-input').val())+1);
            });
        });
    </script>
@endsection
