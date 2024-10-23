@extends('layouts.agent')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">about Information Update</h4>                            
                    <form class="forms-sample" action="{{route('agent.portfolio.about.update')}}" method="post" enctype="multipart/form-data">                       
                      @csrf
                        <div class="form-group">
                          <img width="50" src="{{($about && $about->image) ? asset('agent/portfolio/about/'.$about->image) : asset('agent/portfolio/images/about/ab1.jpg')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Image <span class="text-danger">(Recommended Image Dimension 424 X 718 PX)</span></label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload about Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Title</label>
                            <textarea name="heading" class="form-control" id="exampleTextarea1" rows="4">{{$about->heading ?? ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Paragraph</label>
                            <textarea name="paragraph" class="form-control" id="exampleTextarea1" rows="6">{{$about->paragraph ?? ''}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
                </div>
            </div>         
        </div>
    </div>
@endsection
