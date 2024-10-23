@extends('layouts.super')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">Middle First Ad</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">First Middle AD</h4>
                    <form action="{{route('super.ad.first.middle.banner.update')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputUsername1">First Ad Title One<span class="text-danger"></span></label>
                        <input type="title" class="form-control"  value="{{$item->first_banner_title_one ?? ''}}"  name="first_banner_title_one">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">First Ad Title Two<span class="text-danger"></span></label>
                        <input type="title" class="form-control"  value="{{$item->first_banner_title_two ?? ''}}"  name="first_banner_title_two">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">First Ad Link<span class="text-danger"></span></label>
                        <input type="title" class="form-control"  value="{{$item->first_banner_link ?? ''}}"  name="first_banner_link">
                    </div>

                    @if($item && $item->first_banner_image)
                        <div class="form-group">
                            <img width="120" src="{{asset('ad/first/middle/banner/'.$item->first_banner_image)}}" alt="about_us">
                        </div>
                    @endif
                    <div class="form-group">
                        <label>First Ad Image <span class="text-danger">(Recommended Size 538 X 157 PX)</span></label>
                        <input type="file" name="first_banner_image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>

                    <h6 class="pt-2">SECOND AD</h6>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Second Ad Title One<span class="text-danger"></span></label>
                        <input type="title" class="form-control"  value="{{$item->second_banner_title_one ?? ''}}"  name="second_banner_title_one">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Second Ad Title Two<span class="text-danger"></span></label>
                        <input type="title" class="form-control"  value="{{$item->second_banner_title_two ?? ''}}"  name="second_banner_title_two">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Second Ad Link<span class="text-danger">*</span></label>
                        <input type="title" class="form-control"  value="{{$item->second_banner_link ?? ''}}"  name="second_banner_link">
                    </div>

                    @if($item && $item->second_banner_image)
                        <div class="form-group">
                            <img width="120" src="{{asset('ad/first/middle/banner/'.$item->second_banner_image)}}" alt="about_us">
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Second Ad Image <span class="text-danger">(Recommended Size 538 X 157 PX)</span></label>
                        <input type="file" name="second_banner_image" class="file-upload-default">
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

