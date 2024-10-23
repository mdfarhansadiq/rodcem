@extends('Premium.layout.frontend.expert.expert')
@section('title')
    {{config('app.name')}} |  {{auth('expert')->user()->name}} | Dashboard
@endsection
@section('expert_dashboard')
    active
@endsection
@section('user-content')
     <div class="dashboard-right-sidebar">
        <div class="dashboard-home">
            <div class="title">
                <h2>My Dashboard</h2>
                <span class="title-leaf">
                    <svg class="icon-width bg-gray">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>

            <div class="dashboard-user-name">
                <h6 class="text-content">Hello, <b class="text-title">{{auth('expert')->user()->name}}</b></h6>
                <p class="text-content">From your My Account Dashboard you have the ability to
                    view a snapshot of your recent account activity and update your account
                    information. Select a link below to view or edit information.</p>
            </div>

            <div class="total-box">
                <div class="row g-sm-4 g-3">
                    <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                        <div class="totle-contain">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg"
                                class="img-1 blur-up lazyload" alt="">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg" class="blur-up lazyload"
                                alt="">
                            <div class="totle-detail">
                                <h5>Total Order</h5>
                                <h3>0</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                        <div class="totle-contain">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg"
                                class="img-1 blur-up lazyload" alt="">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg" class="blur-up lazyload"
                                alt="">
                            <div class="totle-detail">
                                <h5>Total Pending Order</h5>
                                <h3>0</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                        <div class="totle-contain">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                class="img-1 blur-up lazyload" alt="">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                class="blur-up lazyload" alt="">
                            <div class="totle-detail">
                                <h5>Total Wishlist</h5>
                                <h3>0</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
