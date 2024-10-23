@extends('layouts.super')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Agent List <span class="badge bg-primary">{{agents()}}</span></h4>
                </div>
                <div>
                    <a href="{{route('super.agent.register.form')}}" class="btn btn-primary btn-icon-text btn-rounded">
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
                    <form action="{{route('super.agent.search')}}" method="get">
                        <div class="input-group">
                          <input type="text" class="form-control" name="search" placeholder="Search by name or email or phone number..." value="@isset(request()->search) {{request()->search}} @endisset" required>
                          <div class="input-group-append">
                            @if (request()->routeIs('super.agent.search'))
                              <button type="submit" class="btn btn-primary" type="button">Search</button>
                              <a href="{{route('agents.list')}}" type="submit" class="btn btn-danger" type="button">Clear</a>
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
                          <th>Image</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Document</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($agents as $index => $agent)
                        <tr>
                          <td>
                          @if($agent->image)
                            <img src="{{asset('/agent/profile/' . $agent->image) }}" alt="image"/>
                          @else
                            <img src="{{asset('assets/rodcem/profile.png') }}" alt="image"/>
                          @endif
                          </td>
                          <td>{{$agent->name}}</td>
                          <td>
                            <a href="tel:{{$agent->phone_number}}">{{$agent->phone_number}}</a><br>
                            <a href="mailto: {{$agent->email}}"> {{$agent->email}}</a>
                          </td>
                          <td>
                            <a href="{{route('super.agent.document.index',$agent->slug)}}"><span class="badge bg-success p-2">View Document</span></a>
                          </td>
                          <td>
                            @if ($agent->status == 0)
                              <span class="badge bg-danger p-2">Pending</span>
                            @elseif($agent->status == 1)
                              <span class="badge bg-success p-2">Active</span>
                             @elseif($agent->status == 10)
                              <span class="badge bg-danger p-2">Deactive</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('super.agent.view',$agent->id)}}"><span class="badge bg-primary p-2">View</span></a>

                            @if (($agent->status == 0 && $has_one_time_payment == 0) || ($agent->status == 0 && $has_one_time_payment != 0) || ($agent->status == 0 && $one_time_payment_status == 0))
                              <a href="{{route('super.agent.approval',$agent->slug)}}"><span class="badge bg-primary p-2">Approve</span></a>
                            @endif
                            @if($agent->status == 1)
                              <a data-toggle="modal" data-target="#deactive_{{$agent->slug}}"><span class="badge bg-danger p-2">Deactive</span></a>
                              @push('all_models')
                                <!-- Modal -->
                                <form action="{{route('super.agent.deactive',$agent->slug)}}" method="post">
                                @csrf
                                  <div class="modal fade" id="deactive_{{$agent->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            @endif
                            @if($agent->status == 10)
                              <a href="{{route('super.agent.approval',$agent->slug)}}"><span class="badge bg-primary p-2">Active</span></a>
                            @endif
                            {{-- delete Agent start --}}
                              <a data-toggle="modal" data-target="#delete_{{$agent->id}}"><span class="badge bg-danger p-2">Delete</span></a>
                                @push('all_models')
                                  <div class="modal fade" id="delete_{{$agent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Delete Agent</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">

                                          <div class="form-group">
                                          </div>
                                          <div class="form-group">
                                            <h2 class="text-danger">Are Your Sure?</h2>
                                            <p>If you delete this Agent all of contains attached with this Agent <span class="text-danger">('portfolio, orders, 'subscriptions')</span> will be deleted! </p>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          <a href="{{route('super.agent.delete',$agent->id)}}" class="btn btn-primary">Delete</a>
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
                  {{ $agents->appends(request()->query())->links('pagination::bootstrap-5')}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
