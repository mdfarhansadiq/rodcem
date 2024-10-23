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
                            <h4 class="font-weight-bold mb-0 text-uppercase">News Edit</h4>
                        </div>
                        <div>
                            <a href="{{ route('news.index') }}" class="btn btn-primary btn-icon-text btn-rounded">
                                <i class="ti-share-alt"></i> Go back
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 m-auto grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('news.update', $news->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                    <select id="sub_category" name="news_category_id" class="form-control" required>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $news->category->id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('news_category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Title<span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="title" class="form-control"
                                        placeholder="Enter Title" value="{{ $news->title }}" required>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <img width="100" src="{{ asset('news/' . $news->image) }}" alt="">
                                    </div>
                                    <label for="image">Image <span class="text-danger">*(Recommended Image Dimension 450 X 300 PX)</span></label>
                                    <input type="file" id="image" class="form-control" name="image" accept="image/*">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="name">Video<span class="text-danger">Optional</span></label>
                                    <input type="text" id="video_link" name="video" class="form-control" placeholder="Enter Video" value="{{$news->video}}">
                                    @error('video')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="exampleInputUsername1">Short Description <span class="text-danger">Recommende 25-30 word</span></label>
                                    <input id="y" type="hidden" name="short_description" value="{!! $news->short_description !!}">
                                    <trix-editor input="y"></trix-editor>
                                    @error('short_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Long Description <span class="text-danger"></span></label>
                                    <input id="x" type="hidden" name="description" value="{!! $news->description !!}">
                                    <trix-editor input="x"></trix-editor>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" class="btn  btn-success" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('custom_js')
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    @endsection
