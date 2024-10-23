@extends('layouts.super')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">RoyalUI Dashboard</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div>
              </div>
            </div>
          </div>
         

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Order Details</p>

                  <!-- Button trigger modal -->
                  <button type="button"  class="btn btn-success text-white my-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Make Proposal
                  </button>



                  <div>
                    <h6 class="my-3">Order Name: {{$order->name}}</h6>
                    <h6 class="my-1">Order Description:</h6>
                    <p class="my-1">{{$order->des}}</p>

                    <h6 class="my-1">Order Note:</h6>
                    <p class="my-1">{{$order->note}}</p>
                    <h6 class="my-4">Order Status: {{$order->status}}</h6>
                    <h6 class="my-3">Order Agent Name: {{$order->Agent->name}}</h6>
                    <h6 class="my-3">Order Image</h6>
                    <h6 class="my-3"> <img src="{{asset('/storage/order/' . $order->image) }}" style="width:400px; border-radius:4%;" alt="image"/></h6>

                  </div>


                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">Proposals list</p>
                            <div class="table-responsive">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Company Name </th>
                                    <th>Status</th>
                                    <th>View</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($proposals as $index => $proposal)
                                  <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$proposal->title}}</td>
                                    <td>{{$proposal->Company->name}}</td>
                                    <td>@if ($proposal->status == 0)
                                            pending
                                        @elseif ($proposal->status == 1)
                                            Accept
                                        @else
                                            I don't have any records!
                                        @endif
                                    </td>
                                    <td> <a href="{{route('proposals.view', $proposal->id)}}">View</a></td>
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
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Make Proposal</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{route('proposals.store')}}" enctype="multipart/form-data">
                @csrf

                  <div class="form-group mb-2">
                    <label for="salary">Select Company</label>
                    <select  name="company_id" class="form-control">
                      @foreach($companies as $company)
                      <option value="{{$company->id}}">{{$company->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-2">
                    <label for="name">Proposal Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Proposal Title" required>
                    <input type="hidden" class="form-control" value="{{$order->id}}" name="order_id" >
                  </div>

                  <div class="form-group mb-2">
                    <label for="about">Product Description</label>
                    <textarea  class="form-control" name="des" rows="2" placeholder="Product Description"></textarea>
                  </div>

                  <div class="form-group mb-2">
                    <label for="about">Proposal Note</label>
                    <textarea  class="form-control" name="note" rows="2" placeholder="Proposal Note"></textarea>
                  </div>

                  <button type="submit" class="btn btn-success text-white">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button"  class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary text-white">Understood</button>
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