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
                  <h4 class="font-weight-bold mb-0 text-uppercase">Agent Services List</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded" data-toggle="modal" data-target="#choose_us_create">
                        <i class="ti-plus"></i>Add New
                    </button>
                </div>
                @push('all_models')
                <form class="forms-sample" action="{{route('super.agent.service.store')}}" method="post" enctype="multipart/form-data">
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
                                        {{-- <div class="form-group">
                                            <label for="exampleFormControlSelect3">Service Category</label>
                                            <select name="category_id"  class="form-control form-control-sm" id="exampleFormControlSelect3" required>
                                             @foreach ($categories as $category )                                                 
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                             @endforeach
                                            </select>
                                          </div>                                          --}}
                                        <div class="form-group">
                                              <label for="exampleInputUsername1">Title <span class="text-danger">*</span></label>
                                              <input type="text" class="form-control"  name="title"  required>
                                              @error('title')<div class="text-danger">{{$message}}</div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect3">Service Category</label>
                                            <input type="text" class="form-control" name="category" required>
                                            @error('category')<div class="text-danger">{{$message}}</div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Description <span class="text-danger">*</span></label>
                                            <input id="x" type="hidden" name="description">
                                            <trix-editor input="x"></trix-editor>
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
                  <p class="card-title mb-0">Agents List <span class="badge bg-primary"></span></p>
                  <div class="table-responsive text-center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Description</th>                                               
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($services as $row )                            
                            <tr>
                                <td>
                                    {{$loop->index+1}}
                                </td>
                                {{-- <td>
                                    <img src="{{asset('agent/portfolio/choose/'.$row->image)}}" alt="">
                                </td> --}}
                                <td>
                                    {{$row->title}}
                                </td>
                                <td>
                                    {{$row->category}}
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
                                                    <h4 class="text-primary">Description</h4>
                                                    <p>  {!!$row->description !!}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endpush
                                </td>
                                <td>
                                    {{-- edit --}}
                                    <span class="badge bg-primary p-2"  data-toggle="modal" data-target="#choose_us_edit_{{$row->id}}">Edit</span>
                                    @push('all_models')
                                    <form class="forms-sample" action="{{route('super.agent.service.update',$row->id)}}" method="post" enctype="multipart/form-data">
                                    @method('put')
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
                                                                <label for="exampleInputUsername1">Title <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"  name="title" value="{{$row->title}}"  required>
                                                                @error('title')<div class="text-danger">{{$message}}</div> @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect3">Service Category</label>
                                                                <input type="text" class="form-control" name="category" value="{{$row->category}}" required>
                                                                @error('category')<div class="text-danger">{{$message}}</div> @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Description <span class="text-danger">*</span></label>
                                                                <input id="edit_{{$row->id}}" type="hidden" value="{!!$row->description !!}" name="description">
                                                                <trix-editor input="edit_{{$row->id}}"></trix-editor>
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
                                    <form action="{{route('super.agent.service.destroy',$row->id)}}" method="post">
                                        @method('delete')
                                        @csrf
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
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
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