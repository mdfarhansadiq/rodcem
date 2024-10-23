@extends('layouts.super')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">First Left Banner Ad</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">First Left Banner AD</h4>
                    <form action="{{route('super.ad.first.left.banner.update')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputUsername1">Title One<span class="text-danger"></span></label>
                        <input type="title" class="form-control"  value="{{$item->title_one ?? ''}}"  name="title_one">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Title Two<span class="text-danger"></span></label>
                        <input type="title" class="form-control"  value="{{$item->title_two ?? ''}}"  name="title_two">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Title Three<span class="text-danger"></span></label>
                        <input type="title" class="form-control"  value="{{$item->title_three ?? ''}}"  name="title_three">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Link<span class="text-danger">*</span></label>
                        <input type="title" class="form-control"  value="{{$item->link ?? ''}}"  name="link">
                    </div>

                    @if($item && $item->image)
                        <div class="form-group">
                            <img width="120" src="{{asset('ad/first/left/banner/'.$item->image)}}" alt="first_left_banner">
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Ad Image <span class="text-danger">(Recommended Size 375 x 586 PX)</span></label>
                        <input type="file" name="image" class="file-upload-default">
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

