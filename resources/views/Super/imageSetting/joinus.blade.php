@extends('layouts.super')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">Registration Image Update</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">Registration Image</h4>
                    <form action="{{route('super.join.us.image.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @if ($join_us_image && $join_us_image->agent)
                            <div class="form-group">
                                <img width="100" src="{{asset('imageSetting/joinUs/'.$join_us_image->agent)}}" alt="">
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Agent Image <span class="text-danger">(Recommended Size 415 x 320 PX)</span></label>
                            <input type="file" name="agent" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        @if ($join_us_image && $join_us_image->expert)
                        <div class="form-group">
                            <img width="100" src="{{asset('imageSetting/joinUs/'.$join_us_image->expert)}}" alt="expert image">
                        </div>
                        @endif

                        <div class="form-group">
                            <label>Expert Image <span class="text-danger">(Recommended Size 415 x 320 PX)</span></label>
                            <input type="file" name="expert" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>

                        @if ($join_us_image && $join_us_image->company)
                        <div class="form-group">
                            <img width="100" src="{{asset('imageSetting/joinUs/'.$join_us_image->company)}}" alt="comapny image">
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Company Image <span class="text-danger">(Recommended Size 790 x 286 PX)</span></label>
                            <input type="file" name="company" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>

                        @if ($join_us_image && $join_us_image->ad)
                        <div class="form-group">
                            <img width="100" src="{{asset('imageSetting/joinUs/'.$join_us_image->ad)}}" alt="home page banner image">
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Home Banner Image <span class="text-danger">(Recommended Size 1155 x 670 PX)</span></label>
                            <input type="file" name="ad" class="file-upload-default">
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

