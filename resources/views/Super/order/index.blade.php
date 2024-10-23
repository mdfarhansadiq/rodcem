@extends('layouts.super')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">All Order List</h4>
                </div>
                <div>
                    {{-- <a href="{{route('super.order.index')}}" type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-back-left"></i> Back
                    </a> --}}
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <div class="form-group mt-2">
                  <form action="{{route('super.order.search')}}" method="get">
                      <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search by order id..." value="@isset(request()->search) {{request()->search}} @endisset" required>
                        <div class="input-group-append">
                          @if (request()->routeIs('super.order.search'))
                            <button type="submit" class="btn btn-primary" type="button">Search</button>
                            <a href="{{route('super.order.index')}}" type="submit" class="btn btn-danger" type="button">Cancel</a>
                          @else
                            <button type="submit" class="btn btn-primary" type="button">Search</button>
                          @endif
                        </div>
                      </div>
                  </form>
                  </div>
                  <form action="{{route('super.order.date.filter')}}" method="get">
                  <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="">Start Date</label>
                           <input type="date" name="start_date" @if(request()->start_date) value="{{request()->start_date}}" @endif class="form-control">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="">End Date</label>
                          <input name="end_date" @if(request()->end_date) value="{{request()->end_date}}" @endif type="date" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          @if (request()->routeIs('super.order.date.filter'))
                          <div class="d-flex justify-content-between">
                            <button class="btn btn-primary form-control mr-2" style="margin-top:30px">Filter</button>
                            <a href="{{route('super.order.index')}}" type="submit" class="btn btn-danger" type="button" style="margin-top:30px">Cancel</a>
                          </div>
                          @else
                              <button class="btn btn-primary form-control" style="margin-top:30px">Filter</button>
                          @endif
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-body" id="order_table">
                  <div class="table-responsive">
                    <table class="table table-hover text-center">
                      <thead>
                        <tr>
                          <th>Order Id</th>
                          <th>Company</th>
                          <th>Agent Name</th>
                          <th>Company Price</th>
                          <th>Agent Price</th>
                          {{-- <th>Your price</th> --}}
                          <th>Delivery time</th>
                          <th>Created At</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>#{{ $item->same_order_uid }}</td>
                            <td>
                              <a href="{{route('product',$item->company->slug)}}">{{$item->company->name}}</a>
                            </td>
                            <td>
                              <a href="#">{{ $item->Agent->name }}</a>
                            </td>
                            <td>{{order_total_price($item->id)}}</td>
                            <td>{{agent_total_price($item->id)}}</td>
                            <td>{{ Carbon\Carbon::parse($item->delivery_date)->format('d-M-y') }}</td>
                            <td>{{$item->created_at->diffForHumans()}}</td>
                            <td>
                              @if ($item->status == 'pending')
                                <span class="badge badge-pill bg-danger text-capitalize">Pending</span>
                              @elseif ($item->status == 'cancel_by_admin')
                                <span class="badge badge-pill bg-danger text-capitalize">cancel by rodcem</span>
                              @elseif ($item->status == 'user_cancel')
                                <span class="badge badge-pill bg-danger text-capitalize">Cancel By Client</span>
                              @elseif ($item->status == 'cancel_by_agent')
                                <span class="badge badge-pill bg-danger text-capitalize">Canceled</span>
                              @elseif ($item->status == 'approve_by_admin')
                                <span class="badge badge-pill bg-success text-capitalize">approve by rodcem</span>
                              @elseif ($item->status == 'approve_by_company')
                                <span class="badge badge-pill bg-success text-capitalize">approve by {{$item->company->name}}</span>
                              @elseif ($item->status == 'cancel_by_company')
                                <span class="badge badge-pill bg-danger text-capitalize">cancel by {{$item->company->name}}</span>
                              @elseif ($item->status == 'payment_done')
                                <span class="badge badge-pill bg-success text-capitalize">Payment Complete</span>
                              @elseif ($item->status == 'company_payment_receive')
                                <span class="badge badge-pill bg-success text-capitalize p-1">Payment Received by {{$item->company->name}}</span>
                              @elseif ($item->status == 'deliver')
                                <span class="badge badge-pill bg-success text-capitalize p-1">Delivered By {{$item->company->name}}</span>
                              @elseif ($item->status == 'product_receive')
                                <span class="badge badge-pill bg-success text-capitalize p-1">Complete</span>
                              @endif
                            </td>
                            {{-- <td>
                                @if(empty($item->delivery_date) || empty($item->delivery_location))
                                  <a href="{{ url('/agent/order/set-time-location/' . $item->id) }}" class="btn btn-sm btn-info">Set Delivery time and Location</a>
                                @endif
                                @if($item->total_price && !$item->agent_price)
                                  <a href="{{ url('/agent/order/set-products-prices/' . $item->id) }}" class="btn btn-sm btn-info">Set products prices</a>
                                @endif
                            </td> --}}
                            <td>
                                <a href="{{route('super.order.details',$item->id)}}"><span class="badge badge-pill bg-primary">Order Details</span></a>
                                {{-- <a href="{{route('agent.order.delete',$item->id)}}"><span class="badge badge-pill bg-danger">Delete</span></a>  --}}
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $data->appends(request()->query())->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- content-wrapper ends -->
@endsection
