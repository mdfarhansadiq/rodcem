@extends('layouts.super')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Banner Update</h4>                            
                    <form class="forms-sample" action="{{route('banner.setting.update')}}" method="post" enctype="multipart/form-data">                       
                      @csrf
                        <div class="form-group">
                          <img width="100" src="{{($banner &&  $banner->about) ? asset('super/banner/about/'. $banner->about) : asset('assets/rodcem/aboutus.jpg')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>About Image <span class="text-danger">(Recommended Dimenssion 1200 X 268 PX)</span></label>
                            <input type="file" name="about" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload About Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                          <img width="100" src="{{($banner &&  $banner->contact) ? asset('super/banner/contact/'. $banner->contact) : asset('assets/rodcem/contactus.jpg')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Contact Image  <span class="text-danger">(Recommended Dimenssion 1200 X 268 PX)</span></label>
                            <input type="file" name="contact" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Banner Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
                </div>
            </div>         
        </div>
    </div>
@endsection
