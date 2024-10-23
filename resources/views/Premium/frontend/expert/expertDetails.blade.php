@extends('Premium.layout.frontend.premium')
@section('title')
    {{config('app.name')}} | Expert Details
@endsection
@section('content')
        <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>{{$expert->name}} Portfolio</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('front')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{$expert->name}} Portfolio</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

     <section class="team-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-user product-wrapper">
                        <div>
                            <div class="team-box">
                                <div class="team-iamge">
                                    @if ($expert->image)
                                            <img src="{{asset('expert/profile/'.$expert->image)}}"  class="img-fluid blur-up lazyload" alt="">
                                        @else
                                            <img src="{{asset('premium/assets')}}/images/expert/1.jpg"  class="img-fluid blur-up lazyload" alt="">
                                        @endif
                                </div>

                                <div class="team-name">
                                    <h3>{{$expert->name}}</h3>
                                    <h5>{{$expert->expert_designation->name ?? ''}}</h5>
                                    <p style="-webkit-line-clamp: 5;width: 100%;">{{$expert->about}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-order" role="tabpanel"
                                aria-labelledby="pills-order-tab">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>{{$expert->name}} Portfolio</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="order-contain">
                                        @foreach ($expert->expert_portfolio as $item )
                                            <div class="order-box dashboard-bg-box">
                                                <div class="order-container">
                                                    <div class="order-icon">
                                                        <i data-feather="box"></i>
                                                    </div>

                                                    <div class="order-detail">
                                                        <h4>{{$item->title}}</h4>
                                                        {{-- <h6 class="text-content">Gouda parmesan caerphilly mozzarella cottage cheese cauliflower cheese taleggio gouda.</h6> --}}
                                                    </div>
                                                </div>

                                                <div class="product-order-detail">
                                                    <a href="product-left-thumbnail.html" class="order-image">
                                                        <img  src="{{asset('expert/portfolio/'.$item->image)}}" class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="order-wrap">
                                                        <a href="product-left-thumbnail.html">
                                                            {{-- <h3>Fantasy Crunchy Choco Chip Cookies</h3> --}}
                                                        </a>
                                                        <p class="text-content">{{$item->description}}</p>

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
    </section>
    <!-- User Dashboard Section End -->
@endsection

