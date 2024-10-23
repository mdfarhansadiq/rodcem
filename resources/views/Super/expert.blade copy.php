@extends('layouts.super')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Expert List</h4>
                </div>
                <div>
                  <a href="{{route('expert.register')}}" class="btn btn-primary btn-icon-text btn-rounded">
                    <i class="ti-plus"></i> Add New
                  </a>
                </div>
              </div>
            </div>
          </div>
         

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Experts List</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>                  
                          <th>Logo</th>
                          <th>Name</th>
                          <th>E-mail</th>
                          <th>Contact</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($experts as $index => $expert)
                        <tr>
                          <td> 
                            @if($expert->logo)
                              <img src="{{asset('/expert/profile/' . $expert->image) }}" alt="image"/>
                            @else
                              <img src="{{asset('assets/rodcem/profile.png') }}" alt="image"/>
                            @endif
                          </td>
                          <td>{{ $expert->name }}</td>
                          <td>{{ $expert->email }}</td>
                          <td>{{ $expert->phone_number }}</td>
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
        <!-- content-wrapper ends -->
@endsection