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
                        <h4 class="font-weight-bold mb-0 text-uppercase">Business Info</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">Business Info</h4>
                    <form action="{{route('agent.business.info.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title One <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  value="{{$business_info->title_one ?? ''}}"  name="title_one">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description One <span class="text-danger">*</span></label>
                        <textarea name="description_one" class="form-control">{{$business_info->description_one ?? ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Title Two <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  value="{{$business_info->title_two ?? ''}}"  name="title_two">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description Two <span class="text-danger">*</span></label>
                        <textarea name="description_two" class="form-control">{{$business_info->description_two ?? ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Title Three <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  value="{{$business_info->title_three ?? ''}}"  name="title_three">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description Three <span class="text-danger">*</span></label>
                        <textarea name="description_three" class="form-control">{{$business_info->description_three ?? ''}}</textarea>
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
