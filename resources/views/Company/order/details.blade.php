@extends('layouts.company')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase"><a href="">#{{$order->same_order_uid}}</a> Order Details</h4>
                </div>
                <div>
                    <a href="{{route('company.order.index')}}" type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-back-left"></i> Back
                    </a>
                </div>
              </div>
            </div>
          </div>          
          <div class="row">
            @if ($order->status == 10 && $order->order_cancel->company)              
            <div class="col-md-12 ">
              <div class="alert alert-danger" role="alert">
                This Order Is Cancelled By {{$order->order_cancel->company->name}} Beacuse Of {{$order->order_cancel->cancel_reason}}                
              </div>
            </div>
            @endif
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Order Location</p>
                    <div class="table-responsive">
                      <table class="table table-hover text-center">
                        <thead>
                          <tr>
                            <th>Divission</th>
                            <th>District</th>
                            <th>Upazila</th>                          
                            <th>Union</th>
                          </tr>
                        </thead>
                        <tbody>               
                            <tr>
                              <td>{{$order->order_location->divission->name}}</td>                              
                              <td>{{$order->order_location->district->name}}</td>                              
                              <td>{{$order->order_location->upazila->name}}</td>                              
                              <td>{{$order->order_location->union->name}}</td>                              
                            </tr>     
                        </tbody>                     
                      </table>
                    </div>                    
                </div>
              </div>
            </div>
            @if ($order->note)              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h6>Addational Information</h6>
                      <div class="form-group">                        
                        <textarea class="form-control" id="exampleTextarea1" rows="2">{{$order->note}}</textarea>
                      </div>
                  </div>
                </div>
              </div>
            @endif

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Product List</p>
                  <div class="table-responsive">
                    <table class="table table-hover text-center">
                      <thead>
                        <tr>
                          <th>Product Image</th>
                          <th>Product Name</th>
                          <th>Quentity</th>                          
                          <th>Company Price</th>               
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($order->order_details as $details )
                          <tr>
                            <td>
                              @if (!$details->product->image)                                
                                <img width="100" src="{{asset('assets/rodcem/product/default.webp')}}" alt="">
                              @else
                                <img src="{{asset('company/products/'.$details->product->image)}}" alt="">
                              @endif
                            </td>
                            <td>{{$details->product->name}}</td>
                            <td>{{$details->price/$details->quantity}} X {{$details->quantity}} {{($details->product->unit->name)}}</td>                      
                            <td>{{$details->price}} </td>                                                   
                          </tr>
                          @endforeach
                          <tr>
                            <td><h6>Total</h6></td>
                            <td></td>
                            <td></td>
                            <td><h6>{{order_total_price($order->id)}}<sup>Tk</sup></h6></td>                     
                          </tr>
                          <tr>
                            <td></td>                           
                            <td></td>                           
                            <td></td>                                                                                 
                            <td>  

                            {{--start view payment slip  --}}
                            @if($order->status == 'payment_done' || $order->status == 'company_payment_receive' ||  $order->status == 'deliver' || $order->status == 'product_receive' )
                              <a data-toggle="modal" data-target="#payment_slip_{{$order->id}}" class="badge bg-danger p-2 text-white">View Slip</a>
                              @push('all_models')
                              <div class="modal fade" id="payment_slip_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <a href="{{asset('agent/slip/'.$order->payment_slip->slip)}}" download class="badge bg-primary p-2">Download</a>
                                    </div>
                                    <div class="modal-body text-center">                                  
                                      <img width="400"  src="{{asset('agent/slip/'.$order->payment_slip->slip)}}" alt="Panyment Slip">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>                                              
                                    </div>
                                    </div>
                                </div>
                              </div>
                              @endpush                                                                                                                     
                            @endif
                            {{--end view payment slip  --}}

                            {{-- payment receive --}}
                            @if($order->status == 'company_payment_receive')
                              <a href="{{route('company.payment.deliver',$order->id)}}" class="badge bg-primary p-2">Delivered</a> 
                            @endif 

                            {{-- payment done  --}}
                            @if($order->status == 'payment_done')
                              <a href="{{route('company.payment.receive',$order->id)}}" class="badge bg-primary p-2">Payment Receive</a> 
                            @endif 
                            
                            {{-- approve, cancle --}}
                            @if ($order->status == 'approve_by_admin')                                 
                              <a href="{{route('company.order.approve',$order->id)}}" class="btn  btn-success">Approve</a>                    
                            @endif                            
                            @if ($order->status == 'cancel_by_company')                                
                              <a class="btn btn-danger" data-toggle="modal" data-target="#order_cancel">Canceld</a>  
                            @else 
                              @if($order->status == 'approve_by_admin')                                
                                <a class="btn btn-danger text-white" data-toggle="modal" data-target="#order_cancel">Cancel</a>  
                                @push('all_models')
                                <div class="modal fade" id="order_cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Order Cancel Reason</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form action="{{route('company.order.cancel',$order->id)}}" method="post">
                                        <div class="modal-body">
                                            @csrf
                                          <div class="form-group">
                                            <label for="exampleFormControlSelect3">Select Reason</label>
                                            <select name="cancel_reason" class="form-control form-control-sm" id="exampleFormControlSelect3" required>
                                              <option value="">Select a reason</option>
                                              <option value="Dalivery Not Possible">Dalivery Not Possible</option>
                                              <option value="Stock Our">Stock Out</option>
                                              <option value="Other">Other</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                      </form>     
                                      </div>
                                    </div>
                                  </div> 
                                @endpush   
                              @endif
                            @endif
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                      </tbody>                     
                    </table>
                    </div>
                  </div>
                  </div>
            </div>
          </div>
</div>
@endsection