@extends('layouts.super')

@section('content')
@php
  // dd(all_day_current_month());
@endphp
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
                  <p class="card-title text-md-center text-xl-left">Companies</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">       
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{companies()}} <small style="font-size:14px;">Total</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{active_company()}} <small style="font-size:14px;">Active</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{pending_company()}} <small style="font-size:14px;">Pending</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{deactive_compnay()}} <small style="font-size:14px;">Deactive</small></h3><br>           
                    {{-- <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> --}}
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Agents</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">       
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{agents()}} <small style="font-size:14px;">Total</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{active_agent()}} <small style="font-size:14px;">Active</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{pending_agent()}} <small style="font-size:14px;">Pending</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{deactive_agent()}} <small style="font-size:14px;">Deactive</small></h3><br>           
                    {{-- <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> --}}
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Expert</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">       
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{experts()}} <small style="font-size:14px;">Total</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{active_expert()}} <small style="font-size:14px;">Active</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{pending_expert()}} <small style="font-size:14px;">Pending</small></h3><br>
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="width:100%">{{deactive_expert()}} <small style="font-size:14px;">Deactive</small></h3><br>           
                    {{-- <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> --}}
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Users</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{users()}}</h3>
                    {{-- <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> --}}
                  </div>  
                  <p class="card-title text-md-center text-xl-left mt-4">Total Subscribers</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{total_subscriber()}}</h3>
                    {{-- <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> --}}
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
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
                          @foreach (company_total_order_in_month() as $key => $id)  
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
                        <h1>{{total_orders()}}</h1>
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
    var yValues = [{{complete_order()}}, {{total_pending()}}, {{total_cancel()}}, {{total_payment()}}];
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
  // var xValues = ['1', '2', '3'];
  var xValues = @json(all_day_current_month());

  // var xValues = [@json_arry(all_day_current_month())];
  var yValues = @json(order_of_current_month_days());
  // var yValues = [5,10,20,12];
  // generateData("Math.sin(x)", 0, 10, 0.5);
  
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
  // function generateData(value, i1, i2, step = 1) {
  //   for (let x = i1; x <= i2; x += step) {
  //     yValues.push(eval(value));
  //     xValues.push(x);
  //   }
  // }
  </script>
@endsection