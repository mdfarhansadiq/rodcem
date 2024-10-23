@extends('Premium.layout.frontend.agent.agent')
@section('title')
    {{config('app.name')}} |  {{auth('agent')->user()->name}} | Dashboard
@endsection
@section('agent_dashboard')
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
                <h6 class="text-content">Hello, <b class="text-title">{{auth('agent')->user()->name}}</b></h6>
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
                                <h3>{{total_order()}}</h3>
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
                                <h3>{{total_pending_order()}}</h3>
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
                                <h5>Total Sell in Today</h5>
                                <h3>{{agent_total_sell_in_day(auth('agent')->id())}}</h3>
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
                                <h5>Total Profit in Today</h5>
                                <h3>{{agent_total_sell_in_day(auth('agent')->id()) - agent_total_purchase_in_day(auth('agent')->id()) }}</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
