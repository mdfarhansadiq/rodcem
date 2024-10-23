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
                </div>
              </div>
            </div>
          </div>

          <div class="row">
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

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Set products prices</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <tbody>
                        <form action="{{ url('/company/order/set-products-prices') }}" method="post">
                          @csrf
                          @foreach($data as $item)
                            @if($item->company_id == auth('company')->id())
                              <tr>
                                <th>{{ $item->product->name }}</th>
                                <th>{{ $item->quantity }} {{ $item->product->unit->symbol }}</th>
                                <td>
                                  <input type="number" name="{{ $item->id }}" value="{{ $item->price }}" step="0.001" min="0.001" class="form-control" placeholder="Enter total price">
                                </td>
                              </tr>
                            @endif
                          @endforeach
                          <tr>
                            <td></td>
                            <td></td>
                            <td>                              
                              <button type="submit" class="btn  btn-success">Save</button>      
                              @if ($order->status == 10)                                
                                <a  class="btn btn-danger" data-toggle="modal" data-target="#order_cancel">Canceled</a>  
                              @else  
                              <a  class="btn btn-danger" data-toggle="modal" data-target="#order_cancel">Cancel</a>  
                              {{-- Order cancel Reason Modal    --}}
                              @push('all_models')
                              <div class="modal fade" id="order_cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Order Cancle Reason</h5>
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
                                            <option value="Stock Our">Stock Our</option>
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
                              {{--End Order cancel Reason Modal    --}}
                              @endif
                            </td>
                          </tr>
                        </form>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
          </div>
        </footer>
        <!-- partial -->
@endsection