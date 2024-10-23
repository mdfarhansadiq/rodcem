@extends('layouts.expert')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0 text-uppercase">Project Category</h4>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Category List</h4>
                    <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">+ Add New</a>
                    @push('all_models')        
                    <form class="forms-sample" action="{{route('expert.portfolio.project.category.store')}}" method="post">
                        @csrf
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <div class="form-group">
                                      <label class="text-uppercase" for="exampleInputUsername1">Name <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{old('name')}}" required>
                                      @error('name')<div class="text-danger">{{$message}}</div> @enderror
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
                </div>
                <p class="card-description">
                </p>
                <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>                      
                        <th>SL</th>
                        <th>Categoy Name</th>
                        {{-- <th>Description</th> --}}
                        {{-- <th>Description</th> --}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $row)
                        <tr>     
                            <td>
                              {{$loop->index+1}}
                            </td>        
                            <td>{{$row->name}}</td>
                            {{-- <td>{{$row->description}}</td> --}}
                            <td>
                                <a data-toggle="modal" data-target="#project_category_{{$row->id}}"  class="badge bg-warning p-2">Edit</a>
                                @push('all_models')        
                                <form class="forms-sample" action="{{route('expert.portfolio.project.category.update', $row->slug)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal fade" id="project_category_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="form-group">
                                              <label class="text-uppercase" for="exampleInputUsername1">Name <span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{$row->name}}" required>
                                              @error('name')<div class="text-danger">{{$message}}</div> @enderror
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
                                <a data-toggle="modal" data-target="#delete_{{$row->id}}"  class="badge bg-danger p-2 text-white">Delete</a>
                                @push('all_models')
                                <div class="modal fade" id="delete_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        {{-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> --}}
                                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button> --}}
                                      </div>
                                      <div class="modal-body text-center">
                                        <h2 class="text-danger">Are You Sure?</h2>
                                        <p>Your Won't able to retrive this.</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                        <a href="{{route('expert.portfolio.project.category.delete', $row->slug)}}" class="btn btn-danger">Submit</a>
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
@endsection
