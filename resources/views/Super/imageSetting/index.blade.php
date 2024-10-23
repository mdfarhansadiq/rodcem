@extends('layouts.super')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">Service Image Update</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">Service Image</h4>
                    <form action="{{route('super.service.image.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <img width="100" src="{{asset('serviceImage/'.$service_image->company)}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Company Image <span class="text-danger">(Recommended Size 600 X 400 PX)</span></label>
                            <input type="file" name="company" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <img width="100" src="{{asset('serviceImage/'.$service_image->agent)}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Agent Image <span class="text-danger">(Recommended Size 600 X 400 PX)</span></label>
                            <input type="file" name="agent" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <img width="100" src="{{asset('serviceImage/'.$service_image->expert)}}" alt="expert image">
                        </div>
                        <div class="form-group">
                            <label>Expert Image <span class="text-danger">(Recommended Size 600 X 400 PX)</span></label>
                            <input type="file" name="expert" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                 </div>
                </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection

