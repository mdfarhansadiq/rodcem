@extends('layouts.master.ecommerce')
@section('title')
 Orders Details
@endsection
@section('custom_css')
    <style>
    .order-area .order-wrap td img {
        width: 50px;
        height: 50px;
        -o-object-fit: cover;
        object-fit: cover;
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
                            <li><a href="{{route('user.orders')}}">Order List</a></li>
                            <li class="text-success">{{$order->same_order_uid}} Details</li>
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
                                <table class="table-responsive order-wrap">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                        <th>Name</th>
                                        <th>Quentity</th>                          
                                        <th>Price</th>                  
                                        {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>      
                                        @foreach ($order->order_details as $details)
                                            <tr>
                                                <tr>
                                                    <td>
                                                      @if (!$details->product->image)                                
                                                        <img height="50" src="{{asset('assets/rodcem/product/default.webp')}}" alt="">
                                                      @else
                                                        <img src="{{asset('company/products/'.$details->product->image)}}" alt="">
                                                      @endif
                                                    </td>
                                                    <td>
                                                      <a href="{{route('product.details',$details->product->slug)}}">{{$details->product->name}}</a>
                                                    </td>                              
                                                    <td>
                                                        @if($details->agent_price != 0)
                                                            {{agent_total_price($order->id)/$details->quantity}} X {{$details->quantity}} {{($details->product->unit->name)}}
                                                        @else
                                                            *** X {{$details->quantity}} {{($details->product->unit->name)}}
                                                        @endif
                                                    </td> 
                                                    <td>
                                                        @if(agent_total_price($order->id) != 0)                      
                                                            {{agent_total_price($order->id)}} <sup>Tk</sup>
                                                        @else
                                                            ***
                                                        @endif
                                                    </td>                                                        
                                                    {{-- <td>
                                                      @if($order->status =="generated" || $order->status =="pending")
                                                        <a data-toggle="modal" data-target="#delete_{{$details->id}}" class="badge bg-danger p-2 text-white">Delete</a>
                                                        @push('all_models')
                                                        <div class="modal fade" id="delete_{{$details->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                                              <div class="modal-content">
                                                              <div class="modal-header">
                                                              </div>
                                                              <div class="modal-body text-center">
                                                                  <h2 class="text-danger">Are You Sure?</h2>
                                                                  <p>Your Won't able to retrive this.</p>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                  <a href="{{route('agent.product.delete',$details->id)}}" type="submit" class="btn btn-danger">Submit</a>
                                                              </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                        @endpush
                                                      @endif
                                                    </td>                         --}}
                                                  </tr>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td><h6>Total</h6></td>
                                            <td></td>                                    
                                            <td></td>                                    
                                            {{-- <td><h6>{{order_total_price($order->id)}} <sup>Tk</sup></h6></td> --}}
                                            <td>
                                                @if(agent_total_price($order->id) != 0)  
                                                    <h6>{{agent_total_price($order->id)}} <sup>Tk</sup></h6>
                                                @else
                                                    <h6>***<sup>Tk</sup></h6>
                                                @endif
                                            </td>
                                          </tr>
                                        <tr>
                                            <td><h6>Actions</h6></td>
                                            <td></td>                                            
                                            <td></td>                                            
                                            <td>                                              
                                                @if(agent_total_price($order->id) != 0 && $order->status == 'generated')
                                                    <div class="d-flex justify-content-center">
                                                        <span><a href="{{route('user.order.cancel',$order->id)}}">Cancel</a></span>
                                                        <span><a href="{{route('user.order.confirm',$order->id)}}">Accept</a></span>
                                                    </div>  
                                                @else
                                                    @if ($order->status == 'generated' || $order->status == 'pending' || $order->status == 'approve_by_admin' || $order->status == 'approve_by_company')                                                                                                   
                                                        <span><a href="{{route('user.order.cancel',$order->id)}}">Cancel</a></span>
                                                    @endif
                                                @endif

                                                @if ( $order->status == 'approve_by_company' || $order->status == 'payment_done' || $order->status == 'company_payment_receive' || $order->status == 'deliver' || $order->status == 'product_receive' )                                      
                                                    <a href="{{route('invoice',encrypt($order->id))}}" class="btn btn-success">Invoice</a>
                                                @endif
                                                
                                            </td>
                                          </tr>
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