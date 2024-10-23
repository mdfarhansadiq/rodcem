@extends('Premium.layout.frontend.agent.agent')
@section('title')
    {{config('app.name')}} |  {{auth('agent')->user()->name}} | Dashboard
@endsection
@section('subscription')
    active
@endsection
@section('user-content')
     <div class="dashboard-right-sidebar">
         <div class="dashboard-user-name">
             <h6 class="text-content">Dear, <b class="text-title">{{auth('agent')->user()->name}}</b></h6>
             @if (agentHasSubscriptin())
                <p class="text-content">Your Subscription will expire On <strong class="theme-color">{{Carbon\Carbon::parse(subsctiption_deadline()->deadline)->format('d-M-Y')}}</strong></p>
             @endif
             @if (!agentHasSubscriptin())
                <p class="text-content">Your Subscription will expired Please <strong>Get Subscription !</strong></p>
             @endif
         </div>
        <div class="dashboard-home">
            <div class="title">
                <h2>Select Your Subscription Plan</h2>
                <span class="title-leaf">
                    <svg class="icon-width bg-gray">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>

            <div class="row">
                @foreach (agent_subscription() as $item )
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="p-3">{{$item->subscriptionType->name}}</h2>
                                <h1 class="theme-color"><i class="fa fa-turkish-lira"></i> {{$item->subscription_fee}}</h1>
                            </div>
                            <div class="card-footer justify-content-center">
                                {{-- <button class="btn btn-success">Get Started</button> --}}
                                <button onclick="location.href = '{{route('agent.subscription.payment',$item->id)}}';" class="btn btn-animation btn-md bg-danger fw-bold mend-auto">Get Started <svg class="svg-inline--fa fa-arrow-right icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg><!-- <i class="fa-solid fa-arrow-right icon"></i> Font Awesome fontawesome.com --></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
