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
                  <p class="card-title mb-0">proposal Respose</p>

                    <div>
                      <h6 class="my-3">Proposal Name: {{$proposal->title}}</h6>
                      <h6 class="my-1">Proposal Description:</h6>
                      <p class="my-1">{{$proposal->des}}</p>

                      <h6 class="my-1">Proposal Note:</h6>
                      <p class="my-1">{{$proposal->note}}</p>
                      <h6 class="my-4">Proposal Status: @if ($proposal->status == 0)
                                                            pending
                                                        @elseif ($proposal->status == 1)
                                                            Accept

                                                        @elseif ($proposal->status == 2)
                                                            Accept
                                                        @else
                                                            not found!
                                                        @endif
                      </h6>

                      <h6 class="my-1">Proposal Pricing:</h6>
                      <p class="my-1">{{$proposal->price}}</p>

                      <h6 class="my-3">Proposal Image</h6>
                      <h6 class="my-3"> <img src="{{asset('/storage/proposal/' . $proposal->image) }}" style="width:400px; border-radius:4%;" alt="image"/></h6>
                      

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


