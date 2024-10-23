@extends('layouts.expert')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">Banner</h4>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Banner Information</h4>    
              <form class="forms-sample" action="{{route('expert.portfolio.banner.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="text-uppercase" for="exampleInputUsername1">Yourself <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="yourself" value="{{$banner->yourself ?? ''}}">
                    @error('yourself')<div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="exampleInputUsername1">Profession Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="profession_title" value="{{$banner->profession_title ?? ''}}">
                    @error('profession_title')<div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="exampleInputEmail1">Short Description <span class="text-danger">*</span></label>                    
                    <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{$banner->description ?? '' }}</textarea>
                    @error('description')<div class="text-danger">{{$message}}</div> @enderror
                </div>   
                <div class="form-group">
                  @if ($banner && $banner->banner_image)                    
                  <img width="100" src="{{asset('expert/portfolio/banner/'.$banner->banner_image)}}" alt="">                      
                  {{-- @else --}}
                      {{-- <img width="100" src="{{asset('expert/portfolio/banner/banner-image-.5063d8f7c59de84.png')}}" alt=""> --}}
                  @endif
                </div>
                <div class="form-group">                  
                    <label class="text-uppercase">Upload Banner Image <span class="text-danger">*</span> <span class="text-danger">(Recommended Size 550 X 835 PX)</span></label>
                    <input type="file" name="banner_image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                  </div>
                  @error('banner_image')<div class="text-danger">{{$message}}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
