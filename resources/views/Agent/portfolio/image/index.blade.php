@extends('layouts.agent')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Banner Image Update</h4>                            
                    <form class="forms-sample" action="{{route('agent.portfolio.image.update')}}" method="post" enctype="multipart/form-data">                       
                      @csrf
                        <div class="form-group">
                          <img width="50" src="{{($image && $image->about_image) ? asset('agent/portfolio/image/'.$image->about_image) : asset('agent/portfolio/images/about/ab1.jpg')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>About Image</label>
                            <input type="file" name="about_image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload About Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                          <img width="50" src="{{($image && $image->service_image) ? asset('agent/portfolio/image/'.$image->service_image) : asset('agent/portfolio/images/services/s1.jpg')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Service Image</label>
                            <input type="file" name="service_image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Banner Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                          <img width="50" src="{{($image && $image->choose_us_image) ? asset('agent/portfolio/image/'.$image->choose_us_image) : asset('agent/portfolio/images/background/choose-trainr.jpg')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Why Choose Us  Image</label>
                            <input type="file" name="choose_us_image" class="file-upload-default">
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
