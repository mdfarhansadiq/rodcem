@extends('layouts.agent')

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
                  <div>
                    <a href="{{route('agent.user.orders')}}" type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-back-left"></i> Back
                    </a>
                </div>
                </div>
              </div>
            </div>
          </div>          
          <div class="row">
          @if ($order->user)
          <div class="col-md-4  grid-margin stretch-card">
            <div class="card" style="width: 18rem;">             
              @if ($order->user->image)  
                <img  height="200" src="{{asset('user/profile/'.$order->user->image)}}" alt="">
              @else
                  <img height="200" class="card-img-top" src="{{asset('assets/rodcem/profile.png')}}" alt="Card image cap">
              @endif 
              <div class="card-body">
                <h5 class="card-title">Client Information</h5>
                <p>{{$order->user->name}}</p>
                <p>{{$order->user->phone_number}}</p>
                <p>{{$order->user->email}}</p>            
              </div>
            </div>
          </div>  
          @endif
            @if($order->status == 'approve_by_company' || $order->status == 'payment_done' )
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form action="{{route('agent.paymnet.slip.store',$order->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                          <h6>Upload Payment Slip </h6>
                          <input type="file" name="slip" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                          </div>
                          @error('slip') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          {{--start view payment slip  --}}
                          <a data-toggle="modal" data-target="#payment_slip_{{$order->id}}" class="btn btn-danger text-white">View Slip</a>
                          @push('all_models')
                          <div class="modal fade" id="payment_slip_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body text-center">                            
                                  <img width="400"  src="{{($order && $order->payment_slip) ? asset('agent/slip/'.$order->payment_slip->slip) : ''}}" alt="Panyment Slip">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>                                              
                                </div>
                                </div>
                            </div>
                          </div>
                          @endpush
                          {{-- end view payment slip  --}}
                        </div>
                    </form>
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
                          <th>Image</th>
                          <th>Name</th>
                          <th>Quentity</th>                          
                          <th>Company Price</th>
                          <th>Your Price</th>
                          {{-- <th>Action</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        <form action="{{route('agent.agent.price.setup')}}" method="post">
                          @csrf
                            @foreach ($order->order_details as $details)
                              <tr>
                                <td>
                                  @if (!$details->product->image)                                
                                    <img width="100" src="{{asset('assets/rodcem/product/default.webp')}}" alt="">
                                  @else
                                    <img src="{{asset('company/products/'.$details->product->image)}}" alt="">
                                  @endif
                                </td>
                                <td>
                                  <a href="{{route('product.details',$details->product->slug)}}">{{$details->product->name}}</a>
                                </td>                              
                                <td>{{$details->price/$details->quantity}} X {{$details->quantity}} {{($details->product->unit->name)}}</td> 
                                <td>{{$details->price}}</td>   
                                <td>
                                  <input type="hidden" name="order_details[]" value="{{$details->id}}">
                                  <input type="number" name="agent_price[{{$details->id}}][]" value="{{$details->agent_price ?? 0}}" required>
                                </td>   
                                <td>
                                  {{-- @if($order->status =="generated" || $order->status =="pending")
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
                                  @endif --}}
                                </td>                        
                              </tr>
                            @endforeach
                              <tr>
                                <td><h6>Total</h6></td>
                                <td></td>
                                <td></td>
                                <td><h6>{{order_total_price($order->id)}} <sup>Tk</sup></h6></td>
                                <td><h6>{{agent_total_price($order->id)}} <sup>Tk</sup></h6></td>
                              </tr>
                             <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                                <td>
                                  <a class="btn btn-primary" href="{{route('agent.user.orders')}}">Back</a>
                                  @if ($order->status == 'generated' || $order->status == 'pending') 
                                    @if ($order->status == 'generated')                                      
                                      <button class="btn btn-success">Update Your Price</button>
                                    @endif                                   
                                  @endif
                                  @if($order->status == 'user_confirm')
                                    <a href="{{route('agent.place.order',$order->id)}}" class="btn btn-info">Place Order</a>
                                  @endif                  
                                  {{--start view payment slip  --}}
                                  @if($order->status == 'payment_done' || $order->status == 'company_payment_receive' ||  $order->status == 'deliver' || $order->status == 'product_receive')
                                    <a data-toggle="modal" data-target="#payment_slip_{{$order->id}}" class="btn btn-danger text-white">View Slip</a>
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
                                    {{-- end view payment slip  --}}

                                  @if($order->status == 'deliver')
                                    <a href="{{route('agent.product.receive',$order->id)}}" class="btn btn-info">Product Received</a>
                                  @endif

                                  <a href="{{route('invoice',encrypt($order->id))}}" class="btn btn-success">Invoice</a>
                                </td>
                                <td></td>
                             </tr>
                        </form>
                      </tbody>                     
                    </table>
                    </div>
                  </div>
                  </div>
            </div>
            
            {{-- <div class="col-md-12">
              <div class="card">
                <div class="card-header text-center">
                  <img width="80" src="{{asset('assets/rodcem/logo.png')}}" class="me-2" alt="logo"/>
                  <h1>Invoice</h1>
                  <h6>Rodcem Agent</h6>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h6>Name &nbsp;&nbsp;&nbsp;: Atikur Rahaman</h6>
                      <h6>Address : Rajapur, Dagonbhuiyan, Feni</h6>
                    </div>
                    <div>
                      <h6>Order Data &nbsp;&nbsp;&nbsp;&nbsp;: 14 dec 2022</h6>
                      <h6>Delivery Data : 14 dec 2022</h6>
                    </div>
                  </div>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quentity</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> --}}
          </div>
</div>

<!-- content-wrapper ends -->
@endsection