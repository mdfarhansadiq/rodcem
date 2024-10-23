@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | All Companies
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Seller Grid</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Seller Grid</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Grid Section Start -->
    <section class="seller-grid-section">
        <div class="container-fluid-lg">
            <div class="row g-4">
                @foreach ($companis as $item)
                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('company.shop', $item->slug) }}" class="seller-grid-box">
                            <div class="grid-contain">
                                <div class="seller-contact-details">
                                    <div class="saller-contact">
                                        <div class="seller-icon">
                                            <i class="fa-solid fa-map-pin"></i>
                                        </div>

                                        <div class="contact-detail">
                                            <h5>Address: <span> {{ $item->address ?? '' }}</span></h5>
                                        </div>
                                    </div>

                                    <div class="saller-contact">
                                        <div class="seller-icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>

                                        <div class="contact-detail">
                                            <h5>Category: <span>{{ $item->company_category->name ?? '' }}</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="contain-name">
                                    <div>
                                        <h6>Since {{ $item->since }}</h6>
                                        <h3>{{ $item->name }}</h3>
                                        <span class="product-label">{{ company_products_count($item->slug) }}
                                            Products</span>
                                    </div>

                                    <div class="grid-image">
                                        @if ($item->logo)
                                            <img src="{{ asset('company/profile/logo/' . $item->logo) }}" alt=""
                                                class="img-fluid">
                                        @else
                                            <img src="{{ asset('company/profile/logo/default.png') }}" alt=""
                                                class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- <nav class="custome-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1">
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
            </nav> --}}
        </div>
    </section>
    <!-- Grid Section End -->

    <!-- Newsletter Section Start -->
    {{-- <section class="newsletter-section section-b-space">
        <div class="container-fluid-lg">
            <div class="newsletter-box newsletter-box-2">
                <div class="newsletter-contain py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                                <div class="newsletter-detail">
                                    <h2>Join our newsletter and get...</h2>
                                    <h5>$20 discount for your first order</h5>
                                    <div class="input-box">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Your Email">
                                        <i class="fa-solid fa-envelope arrow"></i>
                                        <button class="sub-btn  btn-animation">
                                            <span class="d-sm-block d-none">Subscribe</span>
                                            <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Newsletter Section End -->
@endsection
