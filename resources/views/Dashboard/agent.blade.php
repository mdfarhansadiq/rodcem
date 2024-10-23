@extends('layouts.agent')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Dashboard</h4>
                </div>
                <div>
                    {{-- <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button> --}}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Today Sales</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{agent_total_sell_in_day(auth('agent')->id())}}<sup>Tk</sup></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="font-weight-bold" style="font-size:20px">{{agent_total_purchase_in_day(auth('agent')->id())}}<sup>Tk</sup></span> <span class="text-black font-weight-bold ms-1">({{agent_total_sell_in_day(auth('agent')->id()) - agent_total_purchase_in_day(auth('agent')->id())}}<sup>Tk</sup>)</span></p>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Current Month Sales</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{agent_current_month_sell_in_day(auth('agent')->id())}}<sup>Tk</sup></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="font-weight-bold" style="font-size:20px">{{agent_current_month_purchase_in_day(auth('agent')->id())}}<sup>Tk</sup></span> <span class="text-black font-weight-bold ms-1">({{agent_total_sell_in_day(auth('agent')->id()) - agent_total_purchase_in_day(auth('agent')->id())}}<sup>Tk</sup>)</span></p>
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Payments Order</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{agent_total_payment(auth('agent')->id())}}</h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Complete Order</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{agent_complete_order(auth('agent')->id())}}</h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-success">64.00%<span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">        
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Totle Order</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach (agent_porduct_selling_count_in_month(auth('agent')->id()) as $key => $id)  
                          @if($loop->index != 7)                                                      
                            <tr>
                              <th scope="row">{{$loop->index+1}}</th>
                              <td>{{$key}}</td>
                              <td>{{$id}}</td>                  
                            </tr>
                          @else
                            @break;
                          @endif
                          @endforeach
                        </tbody>
                      </table> 
                    </div>
                    <div class="col-md-8">
                      <canvas id="order_graph" style="width:100%;max-width:700px"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">        
              <div class="card">
                <div class="card-body d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="ml-xl-4">
                        <h1>{{agent_total_orders(auth('agent')->id())}}</h1>
                        <h3 class="font-weight-light mb-xl-4">Orders</h3>
                        <p class="text-muted mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                      </div> 
                    </div>
                    <div class="col-md-8">
                      <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
        <!-- content-wrapper ends -->
@endsection
@section('custom_js')
<script>src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
{{-- Doughnut Charts Monthly Order Staticstics  --}}
  <script>
    var xValues = ["Complete", "Pending", "Cancel", "Payment"];
    var yValues = [{{agent_complete_order(auth('agent')->id())}}, {{agent_total_pending(auth('agent')->id())}}, {{agent_total_cancel(auth('agent')->id())}}, {{agent_total_payment(auth('agent')->id())}}];
    var barColors = [
      "#28A745",
      "#17A2B8",
      "#DC3545",
      "#FFC107",
      "#007BFF"
    ];
    
    new Chart("myChart", {
      type: "doughnut",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Order Statistics Of {{now_month()}}" 
        }
      }
    });
  </script>

<script>  
  var xValues = @json(all_day_current_month());
  var yValues = @json(agent_order_of_current_month_days(auth('agent')->id()));
  
  new Chart("order_graph", {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        pointRadius: 2,
        borderColor: "rgba(0,0,255,0.5)",
        data: yValues
      }]
    },    
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "All Order Statistics Of {{now_month()}}",
        fontSize: 16
      }
    }
  });
  </script>
@endsection