@extends('layouts.expert')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            {{-- @if(expert_approval(Auth('expert')->id())->status == 0)
            <div class="grid-margin col-md-12">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{expert_approval(Auth('expert')->id())->message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            @endif   --}}
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Dashboard</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Services</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{expert_total_projects(auth('expert')->id())}}</h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Projects</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{expert_total_projects(auth('expert')->id())}}</h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-danger">0.47% <span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Contact</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">0</h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-success">64.00%<span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Views</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">0</h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  {{-- <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection