@extends('layouts.super')
@section('custom_css')
    <style>
        .table td img {
            width: 100px;
            height: 60px;
            border-radius: 0;
        }
    </style>
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">Slider Banner List</h4>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded" data-toggle="modal" data-target="#create">
                            <i class="ti-plus"></i>Add New
                        </button>
                    </div>
                    @push('all_models')
                    <form class="forms-sample" action="{{route('super.ad.slider.banner.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="card-title text-uppercase"></h4>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Title One <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="title_one">
                                            @error('title_one')<div class="text-danger">{{$message}}</div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Title Two <span class="text-danger"> *</span></label>
                                           <input type="text" class="form-control" name="title_two">
                                            @error('title_two')<div class="text-danger">{{$message}}</div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Link<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="link">
                                            @error('link')<div class="text-danger">{{$message}}</div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Image <span class="text-danger"> *</span> <span class="text-danger">(Recommended Image Size 376 X 231 px)</span></label>
                                            <input type="file" name="image" class="file-upload-default" required>
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" required>
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endpush
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>Image</th>
                                        <th>Title One</th>
                                        <th>Title Two</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($data as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('ad/slider/banner/'.$item->image) }}">
                                        </td>
                                        <td>{{ $item->title_one}}</td>
                                        <td>{{ $item->title_two}}</td>
                                        <td>
                                            <a href="{{$item->link}}">{{$item->link}}</a>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a class="text-decoration-none text-warning p-2" data-toggle="modal" data-target="#edit_{{$item->id}}">
                                                <svg style="width: 20px; height: 20px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>
                                            @push('all_models')
                                            <form class="forms-sample" action="{{route('super.ad.slider.banner.update',$item->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal fade" id="edit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4 class="card-title text-uppercase"></h4>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Title One <span class="text-danger"> *</span></label>
                                                                    <input type="text" class="form-control" name="title_one" value="{{$item->title_one}}">
                                                                    @error('title_one')<div class="text-danger">{{$message}}</div> @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Title Two <span class="text-danger"> *</span></label>
                                                                <input type="text" class="form-control" name="title_two" value="{{$item->title_two}}">
                                                                    @error('title_two')<div class="text-danger">{{$message}}</div> @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Link<span class="text-danger"> *</span></label>
                                                                    <input type="text" class="form-control" name="link" value="{{$item->link}}">
                                                                    @error('link')<div class="text-danger">{{$message}}</div> @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <img width="60" src="{{asset('ad/slider/banner/'.$item->image)}}" alt="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Image <span class="text-danger"> *</span> <span class="text-danger">(Recommended Image Size 376 X 231 px)</span></label>
                                                                    <input type="file" name="image" class="file-upload-default">
                                                                    <div class="input-group col-xs-12">
                                                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" required>
                                                                        <span class="input-group-append">
                                                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @endpush

                                            <a class="text-decoration-none text-danger p-2" href="{{ route('super.ad.slider.banner.delete', $item->id) }}">
                                                <svg style="width: 20px; height: 20px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>

                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
