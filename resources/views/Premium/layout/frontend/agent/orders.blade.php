@extends('Premium.layout.frontend.agent.agent')
@section('title')
    {{config('app.name')}} |  {{auth('agent')->user()->name}} | Order
@endsection
@section('orders')
    active
@endsection
@section('user-content')

<div class="dashboard-order">
<div class="title">
    <h2>All Order</h2>
    <span class="title-leaf title-leaf-gray">
        <svg class="icon-width bg-gray">
            <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
        </svg>
    </span>
</div>

<div class="order-tab dashboard-bg-box">
    <div class="table-responsive">
        <table class="table order-table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Price</th>
                    <th scope="col">Your Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item )
                    <tr>
                        <td>#{{ $item->same_order_uid }}</td>
                        <td>
                            <span class="theme-color"><i class="fa fa-turkish-lira"></i> {{order_total_price($item->id)}}<span>
                        </td>
                        <td>
                            <span class="theme-color"><i class="fa fa-turkish-lira"></i> {{agent_total_price($item->id)}}<span>
                        </td>
                        <td>
                            @if ($item->status == 'generated')
                                <label class="text-capitalize success">generated</label>
                            @elseif ($item->status == 'user_cancel' || $item->status == 'cancel_by_admin' || $item->status == 'cancel_by_company'  || $item->status == 'cancel_by_agent')
                                <label class="text-capitalize danger">Canceled</label>
                            @elseif ($item->status == 'user_confirm')
                                <label class="text-capitalize success">User Confirm</label>
                            @elseif ($item->status == 'pending' || $item->status == 'approve_by_admin')
                                <label class="text-capitalize danger">Processing</label>
                            @elseif ($item->status == 'approve_by_company')
                                <label class="text-capitalize success">Approved</label>
                            @elseif ($item->status == 'payment_done' || $item->status == 'company_payment_receive')
                                <label class="text-capitalize success">Payment Complete</label>
                            @elseif ($item->status == 'deliver')
                                <label class="text-capitalize success">Delivered</label>
                            @elseif ($item->status == 'product_receive')
                                <label class="text-capitalize success">Completed</label>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('agent.order.details',$item->id)}}"><span class="text-success"><i class="fa fa-eye"></i></span></a>
                        </td>
                    </tr>
                @endforeach
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
