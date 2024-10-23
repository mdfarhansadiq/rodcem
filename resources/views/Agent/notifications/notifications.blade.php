@extends('layouts.agent');
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0 text-uppercase">All Notification <span class="badge bg-primary"></span></h4>
            </div>
            <div>
              {{-- <a href="{{route('company.register')}}" class="btn btn-primary btn-icon-text btn-rounded">
                <i class="ti-plus"></i> Add New
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
              </div>
            </div>
            <div class="card-body">         
              <div class="table-responsive text-center">
                <table class="table table-hover">            
                  <tbody>
                    @foreach (agent_all_notification('agent', auth('agent')->id()) as $notification )
                        <tr>
                            {{-- <a href="" class="dropdown-item">
                                <div class="item-thumbnail">
                                  <div class="item-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                  </div>
                                </div>
                                <div class="item-content">
                                  <h6 class="font-weight-normal">{{$notification->title}}</h6>
                                  <p class="font-weight-light small-text mb-0 text-muted">
                                    {{$notification->created_at->diffForHumans()}}
                                  </p>
                                </div>
                              </a> --}}                            
                              <div class="alert alert-success" role="alert">
                                {{$notification->title}} <small>({{$notification->created_at->diffForHumans()}})</small> <small class="text-danger">{{$notification->status}}</small> <a href="">view</a>
                              </div>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{-- {{ $companies->appends(request()->query())->links('pagination::bootstrap-5')}} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
@endsection