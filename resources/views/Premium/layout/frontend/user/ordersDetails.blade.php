@extends('Premium.layout.frontend.user.user')
@section('title')
    {{config('app.name')}} |  {{auth()->user()->name}} | Orders
@endsection
@section('orders')
    active
@endsection
@section('user-content')

<div class="dashboard-order">
<div class="title  d-flex justify-content-between">
    <div>
        <h2>Order Details</h2>
        <span class="title-leaf title-leaf-gray">
            <svg class="icon-width bg-gray">
                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
            </svg>
        </span>
    </div>
    <div>
        <a href="{{route('user.orders')}}" class="btn theme-bg-color btn-sm text-light"><span><i class="fa fa-angle-left"></i></span> <span> Back</span></a>
    </div>
</div>
@if ( $order->status =="generated" && $order->user_order_status =="generated" && is_user_order($order->id)->user_id != null)
    <div class="alert alert-success" role="alert">
        Your Order is now <strong>Pending..</strong> Agent Give You Product Price.
    </div>
@endif

<div class="order-tab dashboard-bg-box">
    <div class="table-responsive">
        <table class="table order-table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->order_details  as $item )
                    <tr>
                        <td>
                            <a href="{{route('product.details',$item->product->slug)}}" class="product-image">
                                 <img width="40" src="{{asset ('company/products/'.$item->product->image)}}"  class="img-fluid blur-up lazyload" alt="Product Image">
                            </a>
                        </td>
                        <td>
                            <h6><a href="{{route('product.details',$item->product->slug)}}">{{$item->product->name}}</a><h6>
                            @if($item->agent_price != 0)
                                <span class="theme-color"><i class="fa fa-turkish-lira"></i>  {{agent_order_item_total_price($item->id)/$item->quantity}} X {{$item->quantity}} {{($item->product->unit->name)}}</span>
                            @else
                                 <span class="theme-color"><i class="fa fa-turkish-lira"></i> *** X {{$item->quantity}}</span>  {{($item->product->unit->name)}}
                            @endif
                        </td>
                        <td>
                            @if(agent_order_item_total_price($item->id))
                                <span class="theme-color"><i class="fa fa-turkish-lira"></i> {{agent_order_item_total_price($item->id)}} </span>
                            @else
                                <span class="theme-color"><i class="fa fa-turkish-lira"></i> ***</span>
                            @endif
                        </td>
                        {{-- <td>
                            <a href=""><span class="text-success"><i class="fa fa-eye"></i></span></a>
                        </td> --}}
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">
                        {{-- order cancel  --}}
                        @if ($order->status == 'generated' || $order->status == 'pending' || $order->status == 'approve_by_admin' || $order->status == 'approve_by_company')
                            <a href="{{route('user.order.cancel',$order->id)}}" class="btn btn-sm bg-danger text-white" style="width:100px;display:inline-block;padding:10px;">Cancel Order</a>
                        @endif
                        {{-- place order  --}}
                        @if (agent_total_price($order->id) != 0 && $order->status =="generated")
                            <a href="{{route('user.order.confirm',$order->id)}}" class="btn btn-sm bg-primary text-white" style="width:100px;display:inline-block;padding:10px;">Confirm</a>
                        @endif
                        {{-- slip upload  --}}
                        @if ($order->status == 'approve_by_company' || $order->status == 'payment_done')
                            <a data-bs-toggle="modal" data-bs-target="#add_project" class="btn btn-sm theme-bg-color text-white" style="width:100px;display:inline-block;padding:10px">Payment Slip</a>
                            @push('all_models')
                                <form action="{{route('user.payment.slip.store',$order->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal fade theme-modal" id="add_project" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Upload payment Slip</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-4">
                                                        <div class="col-xxl-4">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="file" name="slip" class="form-control" required>
                                                                <label for="email">Paymnet Slip <span class="text-danger "></span></label>
                                                                @error('slip')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn theme-bg-color text-light">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endpush
                        @endif
                        {{-- slip view  --}}
                        @if($order->status == 'payment_done' || $order->status == 'company_payment_receive' ||  $order->status == 'deliver' || $order->status == 'product_receive')
                            <a data-bs-toggle="modal" data-bs-target="#view_slip" class="btn btn-sm theme-bg-color text-white" style="width:100px;display:inline-block;padding:10px">View Slip</a>
                            @push('all_models')
                                <div class="modal fade theme-modal" id="view_slip" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">View payment Slip</h5>
                                                 <a href="{{asset('agent/slip/'.$order->payment_slip->slip)}}" download class="badge bg-primary p-2">Download</a>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-4">
                                                    <div class="col-xxl-4">
                                                        <img width="400"  src="{{asset('agent/slip/'.$order->payment_slip->slip)}}" alt="Panyment Slip">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endpush
                        @endif
                        {{-- invoice  --}}
                        @if ($order->status == 'company_payment_receive' || $order->status == 'deliver' || $order->status == 'product_receive')
                            <a href="{{route('invoice',encrypt($order->id))}}" class="btn btn-sm bg-danger text-white" style="width:100px;display:inline-block;padding:10px;">Invoice</a>
                        @endif
                        {{-- order receive  --}}
                        @if ($order->status == 'deliver')
                            <a href="{{route('user.order.receive',$order->id)}}" class="btn btn-sm bg-success text-white" style="width:100px;display:inline-block;padding:10px;">Receive</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
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
</div>

@endsection
