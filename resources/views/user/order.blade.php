@extends('layouts.master.ecommerce')
@section('title')
    User Orders
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
                            <li class="text-success">Shop</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> 
        <!-- end container -->
    </section>

    <div class="order-area section-padding">
        <div class="container">
            <div class="form">
                <div class="order-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <form action="https://wpocean.com/html/tf/themart/order">
                                <table class="table-responsive order-wrap" id="order_table">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Company Name</th>
                                            <th>Price</th>
                                            <th>Delivery Date</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                       
                                        @foreach($data as $item)
                                        <tr>
                                            <td>#{{ $item->same_order_uid }}</td>
                                            <td><a href="{{route('product',$item->company->slug)}}">{{$item->company->name}}</a></td> 
                                            <td> 
                                                @if(agent_total_price($item->id) != 0)                      
                                                    {{agent_total_price($item->id)}} <sup>Tk</sup>
                                                @else
                                                    ***<sup>Tk</sup>
                                                @endif   
                                            </td>                           
                                            <td>{{ Carbon\Carbon::parse($item->delivery_date)->format('d-M-y') }}</td>
                                            <td>{{$item->created_at->diffForHumans()}}</td>
                                            @if ($item->status == 'generated')
                                                <td class="Del"><span class="text-capitalize">generated</span> </td>                                 
                                            @elseif ($item->status == 'user_cancel' || $item->status == 'cancel_by_admin' || $item->status == 'cancel_by_company')
                                               <td class="can"><span class="text-capitalize">Canceled</span></td>                                             
                                            @elseif ($item->status == 'user_confirm' || $item->status == 'generated' || $item->status == 'pending' || $item->status == 'approve_by_admin' || $item->status == 'approve_by_company')   
                                                <td class="del"><span class="text-capitalize">Processing</span></td>
                                            @elseif ($item->status == 'payment_done' || $item->status == 'company_payment_receive')  
                                                <td class="Del"><span>Payment Complete</span></td>                                           
                                            @elseif ($item->status == 'deliver')  
                                                <td class="Del"><span>Delivered</span></td>                                           
                                            @elseif ($item->status == 'product_receive')  
                                                <td class="Del"><span>Complete</span></td>                                           
                                            @endif                                                    
                                           
                                            <td class="action">
                                                <ul>
                                                    <li class="w-btn-view"><a href="{{route('user.order.details',$item->id)}}"><i class="fi ti-eye"></i></a></li>                                                                                                                                           
                                                </ul>                                                                                   
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection