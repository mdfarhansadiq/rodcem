@extends('layouts.expert')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">About</h4>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">About Information</h4>    
              <form class="forms-sample" action="{{route('expert.portfolio.about.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="text-uppercase" for="exampleInputUsername1">Age <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="exampleInputUsername1" name="age" value="{{$about->age ?? ''}}">
                    @error('age')<div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="exampleInputUsername1">Height</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="height" value="{{$about->height ?? ''}}">
                    @error('height')<div class="text-danger">{{$message}}</div> @enderror
                </div>

                @if ($about && $about->blood_type)                  
                <div class="form-group">
                  <label for="exampleFormControlSelect3">Blood Group</label>
                  <select name="blood_type" class="form-control form-control-sm" id="exampleFormControlSelect3">
                    <option value="A+" {{($about->blood_type == 'A+' ) ? 'selected' : ''}}>A+</option>
                    <option value="A-" {{($about->blood_type == 'A-' ) ? 'selected' : ''}}>A-</option>
                    <option value="B+" {{($about->blood_type == 'B+' ) ? 'selected' : ''}}>B+</option>
                    <option value="B-" {{($about->blood_type == 'B-' ) ? 'selected' : ''}}>B-</option>
                    <option value="AB+" {{($about->blood_type == 'AB+' ) ? 'selected' : ''}}>AB+</option>
                    <option value="AB-" {{($about->blood_type == 'AB-' ) ? 'selected' : ''}}>AB-</option>
                    <option value="O+" {{($about->blood_type == 'O+' ) ? 'selected' : ''}}>O+</option>
                    <option value="O-" {{($about->blood_type == 'O-' ) ? 'selected' : ''}}>O-</option>
                  </select>
                  @error('blood_type')<div class="text-danger">{{$message}}</div> @enderror
                </div>
                @else
                <div class="form-group">
                  <label for="exampleFormControlSelect3">Blood Group</label>
                  <select name="blood_type" class="form-control form-control-sm" id="exampleFormControlSelect3">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+" >AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                  @error('blood_type')<div class="text-danger">{{$message}}</div> @enderror
                </div>
                @endif

                <div class="form-group">
                    <label class="text-uppercase" for="exampleInputEmail1">Write About Your Self <span class="text-danger">*</span></label>                    
                    <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{$about->description ?? '' }}</textarea>
                    @error('description')<div class="text-danger">{{$message}}</div> @enderror
                </div>  

                <div class="form-group">
                  @if ($about &&  $about->image)                    
                      <img width="100" src="{{asset('expert/portfolio/about/'.$about->image)}}" alt="">
                  @else
                      <img width="100" src="{{asset('expert/portfolio/banner/about-image-.5063d8f7c59de84.png')}}" alt="">
                  @endif
                </div>
                <div class="form-group">                  
                    {{-- <label class="text-uppercase">Upload Image <span class="text-danger">*</span></label> --}}
                    <label class="text-uppercase">Upload Image <span class="text-danger">*</span> <span class="text-danger">(Recommended Size 904 X 509 PX)</span></label>
                    <input type="file" name="image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                  </div>
                  @error('image')<div class="text-danger">{{$message}}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
