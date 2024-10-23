
@extends('layouts.super')
@section('content')


    <div class="content-wrapper">
        <div class=" p-4  border-rounded shadow col-8 m-auto">
            <h3 class="text-center ">Edit Slider</h3>
            <form action="{{ route('slider.update', $data->id) }}" method="POST" enctype="multipart/form-data"> @csrf
                @method("PATCH")
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Slider Title</label>
                    <input value="{{ $data->title }}" name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contrary to popular belief">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">App Link</label>
                    <input value="{{ $data->app_link }}" name="app_link" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contrary to popular belief">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea  name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" >{{ $data->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                    <img  class="thumbnail ms-3" src="{{ asset('super/sliders/' . $data->image) }}" style="width:350px; height: 250px; border-radius:4%;" alt="{{ $data->title }}">
                </div>
                <div class="mb-3 d-flex">
                    <label for="exampleFormControlTextarea1" class="form-label">Change Image</label>
                    <input name="image" type="file" class="form-control " id="inputGroupFile01">

                </div>
                <div class="mb-3">
                    <a href="{{ route('slider.index') }}" class="btn btn-dark"> <i class="ti-back-left btn-icon-prepend me-1"></i>Go Back</a>  <button type="submit" class="btn btn-success">  <i class="ti-clipboard btn-icon-prepend me-1"></i>Update</button>
                </div>
            </form>

        </div>
    </div>


@endsection
