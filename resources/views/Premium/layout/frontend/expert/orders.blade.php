@extends('Premium.layout.frontend.expert.expert')
@section('title')
    {{config('app.name')}} |  {{auth('expert')->user()->name}} | Order
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
                    <th scope="col">Product Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <nav class="custome-pagination">
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
    </nav>
</div>
</div>

@endsection
