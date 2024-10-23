@extends('layouts.super')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Expert Portfolio Apporval</h4>
                </div>
                {{-- <div>
                  <a href="{{route('company.register')}}" class="btn btn-primary btn-icon-text btn-rounded">
                    <i class="ti-plus"></i> Add New
                  </a>
                </div> --}}
              </div>
            </div>
          </div>
         

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">All Portfolio List <span class="badge bg-primary"></span></p>
                  <div class="table-responsive text-center">
                    <table class="table table-hover">
                      <thead>
                        <tr>                          
                          <th>Image</th>
                          <th>Name</th>
                          <th>E-mail</th>
                          <th>Contact</th>
                          <th>status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($experts as $index => $row)
                        <tr>
                          <td> 
                            @if($row->image)
                              <img src="{{asset('expert/profile/'.$row->image)}}" alt="image"/>
                            @else
                              <img src="{{asset('assets/rodcem/comapnylogo2.jpg') }}" alt="image"/>                               
                            @endif  
                          </td>
                          <td>{{$row->name}}</td>
                          <td>{{$row->email}}</td>
                          <td>{{$row->phone_number}}</td>
                          <td>
                            @if(expert_approval($row->id)->status == 0)
                              <span class="badge bg-danger p-1">Pending</span>
                            @else                              
                              <span class="badge bg-success p-1">Published</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('expert.portfolio',$row->slug)}}"><span class="badge bg-info p-2">View</span></a>
                            <a data-toggle="modal" data-target="#message_{{$row->id}}"><span class="badge bg-success p-2">Send Message</span></a>
                            
                            @push('all_models')
                              <!-- Modal -->
                              <form action="{{route('super.portfolio.approval.message')}}" method="post">
                              @csrf
                                <div class="modal fade" id="message_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">

                                        <div class="form-group">
                                          <label for="exampleTextarea1">Previous Message</label>
                                          <p>
                                            {{expert_approval($row->id)->message}}
                                          </p>
                                        </div>
                                        <input type="hidden" value="{{$row->id}}" name="expert_id">
                                        <div class="form-group">
                                          {{-- <label for="exampleTextarea1">Textarea</label> --}}
                                          <textarea name="message" class="form-control" id="exampleTextarea1" rows="4" placeholder="Wire here...." required></textarea>
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
                            @if (expert_approval($row->id)->status == 0)                              
                              <a href="{{route('super.portfolio.approve',$row->id)}}"><span class="badge bg-primary p-2">Approve</span></a>
                            @else
                              <span class="badge bg-primary p-2">Approved</span>
                            @endif
                          </td>
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