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
                        <h4 class="font-weight-bold mb-0 text-uppercase">Why Agent Sell On Rodcem</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">Why Agent Sell</h4>
                    <form action="{{route('agent.why.selll.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img width="100" src="{{asset('why/sell/'.$why_sell->image_one)}}" alt="image one">
                    </div>
                    <div class="form-group">
                        <label>Image One upload <span class="text-danger">(Size 512 X 512Px  PNG)</span></label>
                        <input type="file" name="image_one" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title One <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  value="{{$why_sell->title_one ?? ''}}"  name="title_one">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description One <span class="text-danger">*</span></label>
                        <textarea name="description_one" class="form-control">{{$why_sell->description_one ?? ''}}</textarea>
                    </div>



                    <div class="form-group">
                        <img width="100" src="{{asset('why/sell/'.$why_sell->image_two)}}" alt="image one">
                    </div>
                    <div class="form-group">
                        <label>Image Two upload <span class="text-danger">(Size 512 X 512Px  PNG)</span></label>
                        <input type="file" name="image_two" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title Two <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  value="{{$why_sell->title_two ?? ''}}"  name="title_two">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description Two <span class="text-danger">*</span></label>
                        <textarea name="description_two" class="form-control">{{$why_sell->description_two ?? ''}}</textarea>
                    </div>


                    <div class="form-group">
                        <img width="100" src="{{asset('why/sell/'.$why_sell->image_three)}}" alt="image one">
                    </div>
                    <div class="form-group">
                        <label>Image Three upload <span class="text-danger">(Size 512 X 512Px  PNG)</span></label>
                        <input type="file" name="image_three" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title Three <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  value="{{$why_sell->title_three ?? ''}}"  name="title_three">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description Three <span class="text-danger">*</span></label>
                        <textarea name="description_three" class="form-control">{{$why_sell->description_three ?? ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <img width="100" src="{{asset('why/sell/'.$why_sell->image_four)}}" alt="image one">
                    </div>
                    <div class="form-group">
                        <label>Image Four upload <span class="text-danger">(Size 512 X 512Px  PNG)</span></label>
                        <input type="file" name="image_four" class="file-upload-default">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title Four <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  value="{{$why_sell->title_four ?? ''}}"  name="title_four">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description Four <span class="text-danger">*</span></label>
                        <textarea name="description_four" class="form-control">{{$why_sell->description_four ?? ''}}</textarea>
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
