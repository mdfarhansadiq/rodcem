@extends('layouts.super')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">Customer Comment</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">Customer Comment</h4>
                    <form action="{{route('super.ad.customer.comment.update')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputUsername1">Title<span class="text-danger"></span></label>
                        <input type="text" class="form-control"  value="{{$item->title ?? ''}}"  name="title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Description<span class="text-danger"></span></label>
                        <textarea name="description" class="form-control">{{$item->description ?? ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Name<span class="text-danger"></span></label>
                        <input type="text" class="form-control"  value="{{$item->name ?? ''}}"  name="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Designation<span class="text-danger"></span></label>
                        <input type="text" class="form-control"  value="{{$item->designation ?? ''}}"  name="designation">
                    </div>

                    @if($item && $item->image)
                        <div class="form-group">
                            <img width="120" src="{{asset('ad/customer/comment/'.$item->image)}}" alt="customer comment image">
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Image <span class="text-danger">(Recommended Size 300 x 280 PX)</span></label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                 </div>
                </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection

