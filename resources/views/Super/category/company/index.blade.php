@extends('layouts.super')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endsection
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Company Category List</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded" data-toggle="modal" data-target="#choose_us_create">
                        <i class="ti-plus"></i>Add New
                    </button>
                </div>
                @push('all_models')
                <form class="forms-sample" action="{{route('super.company.category.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                    <div class="modal fade" id="choose_us_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-10 mx-auto grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-uppercase"></h4>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"  name="name"  required>
                                                @error('name')<div class="text-danger">{{$message}}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                @endpush
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Company Category List <span class="badge bg-primary"></span></p>
                  <div class="table-responsive text-center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $row )
                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                                <td>
                                    {{$row->name}}
                                </td>
                                <td>
                                    {{-- edit --}}
                                    <span class="badge bg-primary p-2"  data-toggle="modal" data-target="#choose_us_edit_{{$row->id}}">Edit</span>
                                    @push('all_models')
                                    <form class="forms-sample" action="{{route('super.company.category.update',$row->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="modal fade" id="choose_us_edit_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-10 mx-auto grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title text-uppercase"></h4>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Name <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"  name="name" value="{{$row->name}}"  required>
                                                                    @error('name')<div class="text-danger">{{$message}}</div> @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
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
                                                <a href="{{route('super.company.category.delete',$row->id)}}" class="btn btn-danger">Submit</a>
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
@section('custom_js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection
