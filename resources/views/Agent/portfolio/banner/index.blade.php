@extends('layouts.agent')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Banner Image Update</h4>                            
                    <form class="forms-sample" action="{{route('agent.portfolio.banner.update')}}" method="post" enctype="multipart/form-data">                       
                      @csrf
                        <div class="form-group">
                          <img width="50" src="{{($banner && $banner->image) ? asset('agent/portfolio/banner/'.$banner->image) : asset('agent/portfolio/images/slider/slide_man.png')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Banner Image <span class="text-danger">(Recommended Image Dimension 424 X 718 PX)</span></label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Banner Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                          <img width="50" src="{{($banner && $banner->bg_image) ? asset('agent/portfolio/banner/bg/'.$banner->bg_image) : asset('agent/portfolio/images/slider/slide1.jpg')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Banner Background Image <span class="text-danger">(Recommended Image Dimension 2000 X 1200 PX)</span></label>
                            <input type="file" name="bg_image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Banner Backgroud Image">
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
