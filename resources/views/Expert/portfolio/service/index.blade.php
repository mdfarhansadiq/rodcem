@extends('layouts.expert')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0 text-">All Services</h4>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Service List</h4>
                    <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">+ Add New</a>
                    @push('all_models')        
                    <form class="forms-sample" action="{{route('expert.portfolio.service.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Service</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <div class="form-group">
                                      <label class="text-uppercase" for="exampleInputUsername1">Title <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="exampleInputUsername1" name="title" value="{{old('title')}}" required>
                                      @error('title')<div class="text-danger">{{$message}}</div> @enderror
                                  </div>                         
                                  <div class="form-group">
                                      <label for="exampleTextarea1">Description</label>
                                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4" required>{{old('description')}}</textarea>
                                      @error('description')<div class="text-danger">{{$message}}</div> @enderror
                                  </div>  
                                  <div class="form-group">
                                    <label>Service Image</label>
                                    <input type="file" name="image" class="file-upload-default" required>
                                    <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                    </div>
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
                        <th>Image</th>
                        <th>Title</th>
                        {{-- <th>Description</th> --}}
                        {{-- <th>Description</th> --}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $row)
                        <tr>     
                            <td>
                              <img src="{{asset('expert/portfolio/service/'.$row->image)}}" alt="">
                            </td>        
                            <td>{{$row->title}}</td>
                            {{-- <td>{{$row->description}}</td> --}}
                            <td>
                                <a data-toggle="modal" data-target="#education_{{$row->id}}"  class="badge bg-warning p-2">Edit</a>
                                @push('all_models')        
                                <form class="forms-sample" action="{{route('expert.portfolio.service.update', $row->slug)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal fade" id="education_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Service</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label class="text-uppercase" for="exampleInputUsername1">Title <span class="text-danger">*</span></label>
                                                  <input type="text" class="form-control" id="exampleInputUsername1" name="title" value="{{$row->title}}" required>
                                                  @error('title')<div class="text-danger">{{$message}}</div> @enderror
                                              </div>                           
                                              <div class="form-group">
                                                  <label for="exampleTextarea1">Description</label>
                                                  <textarea name="description" class="form-control" id="exampleTextarea1" rows="4" required>{{$row->description}}</textarea>
                                                  @error('description')<div class="text-danger">{{$message}}</div> @enderror
                                              </div>
                                             
                                              <div class="form-group">
                                                <img width="100" src="{{asset('expert/portfolio/service/'.$row->image)}}" alt="">
                                              </div>

                                              <div class="form-group">
                                                <label>Service Image</label>
                                                <input type="file" name="image" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                                </div>
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
                                        <a href="{{route('expert.portfolio.service.delete', $row->slug)}}" class="btn btn-danger">Submit</a>
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
