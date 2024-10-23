@extends('layouts.agent')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Agent List</h4>
                </div>
              </div>
            </div>
          </div>
         

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Agents List <span class="badge bg-primary"></span></p>
                  <div class="table-responsive text-center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>                                               
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($contacts as $row )                            
                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                                <td>
                                    {{$row->name}}
                                </td>
                                <td>
                                    <a href="mailto:{{$row->email}}">{{$row->email}}</a>
                                </td>                                
                                <td>
                                    <a href="tel:{{$row->phone_number}}">{{$row->phone_number}}</a>
                                </td>                                
                                <td>
                                    <span class="badge bg-success p-2" data-toggle="modal" data-target="#show_{{$row->id}}">View</span>
                                    @push('all_models')
                                        <div class="modal fade" id="show_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body text-center">
                                                    <h4 class="text-primary">Message</h4>
                                                    <p>{{$row->message}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endpush
                                    {{-- delete  --}}
                                    <span class="badge bg-danger p-2" data-toggle="modal" data-target="#delete_{{$row->id}}">Delete</span>
                                    @push('all_models')
                                        <div class="modal fade" id="delete_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body text-center">
                                                    <h2 class="text-danger">Are You Sure?</h2>
                                                    <p>Your Won't able to retrive this.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                    <a href="{{route('agent.portfolio.contact.delete',$row->id)}}" class="btn btn-danger">Submit</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>                           
                                    @endpush
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