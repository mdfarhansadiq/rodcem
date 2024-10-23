@extends('layouts.company')
@section('custom_css')
<style>
    .card-img-top{
    height:300px;
}

.card-no-border .card {
    border-color: #d7dfe3;
    border-radius: 4px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.pro-img {
    margin-top: -80px;
    margin-bottom: 20px;
    width: 128px;
    height: 128px;
    /* border-radius: 100% */  
}

.little-profile .pro-img img {
    height:100px;
}

html body .m-b-0 {
    margin-bottom: 0px
}

h3 {
    line-height: 30px;
    font-size: 21px
}

.btn-rounded.btn-md {
    padding: 12px 35px;
    font-size: 16px
}

html body .m-t-10 {
    margin-top: 10px
}

.btn-primary,
.btn-primary.disabled {
    background: #7460ee;
    border: 1px solid #7460ee;
    -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    -webkit-transition: 0.2s ease-in;
    -o-transition: 0.2s ease-in;
    transition: 0.2s ease-in
}

.btn-rounded {
    border-radius: 60px;
    padding: 7px 18px
}

.m-t-20 {
    margin-top: 20px
}

.text-center {
    text-align: center !important
}

h1,
h2,
h3,
h4,
h5,
h6 {
    color: #455a64;
    font-family: "Poppins", sans-serif;
    font-weight: 400
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}
</style>
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">            
            <div class="col-md-6 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Sidebar Banner</h4>   
                    <form class="forms-sample" action="{{route('company.banner.setting.sidebar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-danger">Recommended Size 450 X 700 PX</label>
                            <input type="file" name="image" class="file-upload-default" >
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
                </div>
            </div>         
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Current Sidebar Banner</h4>                   
                    <div class="form-group">
                        @if ($banner && $banner->sidebar_banner)                            
                            <img width="450"  src="{{asset('company/banner/sidebar/'.$banner->sidebar_banner)}}" alt="">
                        @else
                            <img  src="{{asset('assets/rodcem/comapnyBanner/sidebarBanner.png')}}" alt="">
                        @endif                
                    </div>              
                </div>
                </div>
            </div>         
        </div>
        <div class="row">  
            <h4 class="text-uppercase">Small Banner Update</h4 class="text-uppercase">          
            <div class="col-md-6 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Small Banner One</h4>   
                    <form class="forms-sample" action="{{route('company.banner.setting.small')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-danger">Recommended Size 400 X 270 PX</label>
                            <input type="file" name="small_banner_one" class="file-upload-default" >
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('small_banner_one')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
                </div>
            </div>         
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Current Small Banner Oner</h4>                   
                    <div class="form-group">
                        @if ($banner && $banner->small_banner_one)                            
                            <img style="height: 270px; width:400px"  src="{{asset('company/banner/small_banner_one/'.$banner->small_banner_one)}}" alt="">
                        @else
                            <img  src="{{asset('assets/rodcem/defaultBanner/smallbanner.png')}}" alt="">
                        @endif                
                    </div>              
                </div>
                </div>
            </div>         
        </div>
        <div class="row">               
            <div class="col-md-6 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Small Banner Two</h4>   
                    <form class="forms-sample" action="{{route('company.banner.setting.small')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-danger">Recommended Size 400 X 270 PX</label>
                            <input type="file" name="small_banner_two" class="file-upload-default" >
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('small_banner_two')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
                </div>
            </div>         
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Current Small Banner Oner</h4>                   
                    <div class="form-group">
                        @if ($banner && $banner->small_banner_two)                            
                            <img style="height: 270px; width:400px"  src="{{asset('company/banner/small_banner_two/'.$banner->small_banner_two)}}" alt="">
                        @else
                            <img  src="{{asset('assets/rodcem/defaultBanner/smallbanner.png')}}" alt="">
                        @endif                
                    </div>              
                </div>
                </div>
            </div>         
        </div>
        <div class="row">               
            <div class="col-md-6 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Small Banner Three</h4>   
                    <form class="forms-sample" action="{{route('company.banner.setting.small')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-danger">Recommended Size 400 X 270 PX</label>
                            <input type="file" name="small_banner_three" class="file-upload-default" >
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('small_banner_three')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
                </div>
            </div>         
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Current Small Banner Three</h4>                   
                    <div class="form-group">
                        @if ($banner && $banner->small_banner_three)                            
                            <img style="height: 270px; width:400px"  src="{{asset('company/banner/small_banner_three/'.$banner->small_banner_three)}}" alt="">
                        @else
                            <img  src="{{asset('assets/rodcem/defaultBanner/smallbanner.png')}}" alt="">
                        @endif                
                    </div>              
                </div>
                </div>
            </div>         
        </div>
    </div>
</div>
@endsection
@section('custom_js')

@endsection