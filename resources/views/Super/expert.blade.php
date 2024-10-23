@extends('layouts.super')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Expert List <span class="badge bg-primary">{{experts()}}</span></h4>
                </div>
                <div>
                  <a href="{{route('super.expert.register.form')}}" class="btn btn-primary btn-icon-text btn-rounded">
                    <i class="ti-plus"></i> Add New
                  </a>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  <div class="form-group mt-2">
                    <form action="{{route('super.expert.search')}}" method="get">
                        <div class="input-group">
                          <input type="text" class="form-control" name="search" placeholder="Search by name or email or phone number..." value="@isset(request()->search) {{request()->search}} @endisset" required>
                          <div class="input-group-append">
                            @if (request()->routeIs('super.expert.search'))
                              <button type="submit" class="btn btn-primary" type="button">Search</button>
                              <a href="{{route('expert.list')}}" type="submit" class="btn btn-danger" type="button">Clear</a>
                            @else
                              <button type="submit" class="btn btn-primary" type="button">Search</button>
                            @endif
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive text-center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Logo</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($experts as $index => $expert)
                        <tr>
                          <td>
                            @if($expert->image)
                              <img src="{{asset('expert/profile/'.$expert->image) }}" alt="image"/>
                            @else
                              <img src="{{asset('assets/rodcem/profile.png') }}" alt="image"/>
                            @endif
                          </td>
                          <td>
                            <a href="tel:{{$expert->phone_number}}">{{$expert->phone_number}}</a><br>
                            <a href="mailto: {{$expert->email}}"> {{$expert->email}}</a>
                          </td>
                          <td>{{$expert->phone_number}}</td>
                          <td>
                            @if ($expert->status == 0)
                              <a href=""><span class="badge bg-danger p-2">Pending</span></a>
                            @elseif($expert->status == 1)
                              <span class="badge bg-success p-2">Active</span>
                             @else
                              <span class="badge bg-danger p-2">Deactivated</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('super.expert.view',$expert->id)}}"><span class="badge bg-primary p-2">View</span></a>
                            {{-- <a href="{{route('expert.portfolio',$expert->slug)}}"><span class="badge bg-info p-2">View Portfolio</span></a> --}}
                            @if ($expert->status == 0 )
                              <a href="{{route('super.expert.approval',$expert->slug)}}"><span class="badge bg-primary p-2">Approve</span></a>
                            @elseif($expert->status == 1)
                              <a data-toggle="modal" data-target="#deactive_{{$expert->slug}}"><span class="badge bg-danger p-2">Deactive</span></a>
                              @push('all_models')
                                <!-- Modal -->
                                <form action="{{route('super.expert.deactive',$expert->slug)}}" method="post">
                                @csrf
                                  <div class="modal fade" id="deactive_{{$expert->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Deactive Reason</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">

                                          <div class="form-group">
                                            {{-- <label for="exampleTextarea1">Previous Message</label>                                        --}}
                                          </div>
                                          <div class="form-group">
                                            {{-- <label for="exampleTextarea1">Textarea</label> --}}
                                            <textarea name="message" class="form-control" id="exampleTextarea1" rows="4" required>Beacuse of</textarea>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              @endpush
                            @else
                              <a href="{{route('super.expert.approval',$expert->slug)}}"><span class="badge bg-primary p-2">Active</span></a>
                            @endif
                            {{-- delete Agent start --}}
                              <a data-toggle="modal" data-target="#delete_{{$expert->id}}"><span class="badge bg-danger p-2">Delete</span></a>
                                @push('all_models')
                                  <div class="modal fade" id="delete_{{$expert->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Delete Expert</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">

                                          <div class="form-group">
                                          </div>
                                          <div class="form-group">
                                            <h2 class="text-danger">Are Your Sure?</h2>
                                            <p>If you delete this Expert all of contains attached with this Expert <span class="text-danger">('portfolio')</span> will be deleted! </p>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          <a href="{{route('super.expert.delete',$expert->id)}}" class="btn btn-primary">Delete</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @endpush
                            {{-- delete Comapny end --}}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{ $experts->appends(request()->query())->links('pagination::bootstrap-5')}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
