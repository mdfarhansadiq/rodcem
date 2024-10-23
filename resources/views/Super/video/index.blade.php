@extends('layouts.super')
@section('custom_css')
<style>
    .table td img {
    width: 200px;
    height: 200px;
    border-radius: 0;
}
</style>
@endsection
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">All Video</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded" data-toggle="modal" data-target="#create">
                        <i class="ti-plus"></i>Add New
                    </button>
                </div>
                @push('all_models')
                <form class="forms-sample" action="{{route('videos.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
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
                                            <label>Thumbnail <span class="text-danger">* (Recommended Dimenssion 281 X 285 PX) <small>PNG</small></span></label>
                                            <input type="file" name="image" class="file-upload-default" required>
                                            <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" required>
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Video Link<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"  name="link"  required>
                                            @error('link')<div class="text-danger">{{$message}}</div> @enderror
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
                  <p class="card-title mb-0">Product Categories <span class="badge bg-primary"></span></p>
                  <div class="table-responsive text-center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Link</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($videos as $row )
                            <tr>
                                <td>
                                    <img src="{{asset('video/image/'.$row->image)}}" alt="">
                                </td>
                                <td>
                                    <iframe width="330" height="305" src="{{$row->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </td>
                                <td>
                                    {{-- edit --}}
                                    <span class="badge bg-primary p-2"  data-toggle="modal" data-target="#edit_{{$row->id}}">Edit</span>
                                    @push('all_models')
                                    <form class="forms-sample" action="{{route('videos.update',$row->id)}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                        <div class="modal fade" id="edit_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
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
                                                                <img width="245" src="{{asset('video/image/'.$row->image)}}" alt="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Thumbanil Image <span class="text-danger">* (Recommended Dimenssion 281 X 255 PX) <small>PNG</small></span></label>
                                                                <input type="file" name="image" class="file-upload-default">
                                                                <div class="input-group col-xs-12">
                                                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                                                <span class="input-group-append">
                                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                                </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Video Link<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"  name="link" value="{{$row->link}}"  required>
                                                                @error('link')<div class="text-danger">{{$message}}</div> @enderror
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
                                    <form action="{{route('videos.destroy',$row->id)}}" method="post">
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
