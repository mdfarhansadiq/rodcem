@extends('layouts.company')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">All Order List</h4>
                </div>
                {{-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> --}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Order List</p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="order_table">
                      <thead>
                        <tr>
                          <th>Order Id</th>                          
                          <th>Total price</th>
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
                            <td>{{order_total_price($item->id)}}</td> 
                            <td>{{ Carbon\Carbon::parse($item->delivery_date)->format('d-M-y') }}</td>
                            <td>{{$item->created_at->diffForHumans()}}</td>                        
                            <td>                              
                              @if($item->status == 'approve_by_admin')
                                <span class="badge badge-pill bg-danger text-uppercase p-1">Pending</span>
                              @elseif ($item->status == 'approve_by_company')
                                <span class="badge badge-pill bg-success text-uppercase p-1">Approved</span>
                              @elseif ($item->status == 'user_cancel')
                                <span class="badge badge-pill bg-danger text-uppercase">Cancel By Client</span>
                              @elseif ($item->status == 'cancel_by_company')
                                <span class="badge badge-pill bg-danger text-uppercase p-1">Canceled</span>
                              @elseif ($item->status == 'cancel_by_agent')
                                <span class="badge badge-pill bg-danger text-capitalize">Canceled</span>
                              @elseif ($item->status == 'payment_done')
                                <span class="badge badge-pill bg-success text-uppercase p-1">Payment Complete</span> 
                              @elseif ($item->status == 'company_payment_receive')
                                <span class="badge badge-pill bg-success text-uppercase p-1">Payment Received</span>        
                              @elseif ($item->status == 'deliver')
                                <span class="badge badge-pill bg-success text-uppercase p-1">Delivered</span>                    
                              @elseif ($item->status == 'product_receive')
                                <span class="badge badge-pill bg-success text-uppercase p-1">Complete</span> 
                              @endif 
                            </td>                  
                            <td>
                              <a href="{{ route('company.order.details',$item->id) }}"><span class="badge  bg-success p-2">View</span></a>        
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection