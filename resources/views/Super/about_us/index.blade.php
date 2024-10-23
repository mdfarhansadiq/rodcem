@extends('layouts.super')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endsection
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">About Us</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">About Us</h4>    
                    <form action="{{route('super.about.us.update')}}" method="post" enctype="multipart/form-data">
                    @csrf                                        
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title <span class="text-danger">*</span></label>              
                        <input type="title" class="form-control"  value="{{$about_us->title ?? ''}}"  name="title" required>                
                    </div>
                    @if($about_us && $about_us->image)                    
                        <div class="form-group">
                            <img width="120" src="{{asset('about/us/'.$about_us->image)}}" alt="about_us">
                        </div>
                    @endif 
                    <div class="form-group">
                        <label>Image <span class="text-danger">(Recommended Size 570 X 740 PX)</span></label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description <span class="text-danger">*</span></label>              
                        <input id="x" value="{!!$about_us->description ?? ''!!}" type="hidden" name="description">
                        <trix-editor input="x"></trix-editor>                   
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
@section('custom_js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection