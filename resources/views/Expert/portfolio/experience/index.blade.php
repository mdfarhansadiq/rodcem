@extends('layouts.expert')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0 text-">Experience</h4>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Experience List</h4>
                    <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">+ Add New</a>
                    @push('all_models')        
                    <form class="forms-sample" action="{{route('expert.portfolio.experience.store')}}" method="post">
                        @csrf
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Experience</h5>
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
                                      <label class="text-uppercase" for="exampleInputUsername1">Institute Name <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="exampleInputUsername1" name="institute_name" value="{{old('institute_name')}}" required>
                                      @error('institute_name')<div class="text-danger">{{$message}}</div> @enderror
                                  </div>   
                                  <div class="form-group">
                                      <label class="text-uppercase" for="exampleInputUsername1">Duration<span class="text-danger" required>*</span></label>
                                      <input type="text" class="form-control" id="exampleInputUsername1" name="duration" value="{{old('duration')}}">
                                      @error('duration')<div class="text-danger">{{$message}}</div> @enderror
                                    </div> 
                                    <div class="form-group">
                                      <label for="exampleTextarea1">Description</label>
                                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4" required>{{old('description')}}</textarea>
                                      @error('description')<div class="text-danger">{{$message}}</div> @enderror
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
                <table class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Institute Name</th>
                        <th>Duration</th>
                        {{-- <th>Description</th> --}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($qualifications as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->institute_name}}</td>
                            <td>{{$row->duration}}</td>
                            {{-- <td>{{$row->description}}</td> --}}
                            <td>
                                <a data-toggle="modal" data-target="#education_{{$row->id}}"  class="badge bg-warning p-2">Edit</a>
                                @push('all_models')        
                                <form class="forms-sample" action="{{route('expert.portfolio.experience.update', $row->slug)}}" method="post">
                                    @csrf
                                    <div class="modal fade" id="education_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Qualification</h5>
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
                                                  <label class="text-uppercase" for="exampleInputUsername1">Institute Name <span class="text-danger">*</span></label>
                                                  <input type="text" class="form-control" id="exampleInputUsername1" name="institute_name" value="{{$row->institute_name}}" required>
                                                  @error('institute_name')<div class="text-danger">{{$message}}</div> @enderror
                                              </div>   
                                              <div class="form-group">
                                                  <label class="text-uppercase" for="exampleInputUsername1">Duration<span class="text-danger" required>*</span></label>
                                                  <input type="text" class="form-control" id="exampleInputUsername1" name="duration" value="{{$row->duration}}">
                                                  @error('duration')<div class="text-danger">{{$message}}</div> @enderror
                                                </div> 
                                                <div class="form-group">
                                                  <label for="exampleTextarea1">Description</label>
                                                  <textarea name="description" class="form-control" id="exampleTextarea1" rows="4" required>{{$row->description}}</textarea>
                                                  @error('description')<div class="text-danger">{{$message}}</div> @enderror
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
                                        <a href="{{route('expert.portfolio.experience.delete', $row->slug)}}" class="btn btn-danger">Submit</a>
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
