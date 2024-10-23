
@extends('layouts.super')
@section('content')


<div class="content-wrapper">
    <div class=" p-4  border-rounded shadow">
        <h3 class="text-center ">Slider Create</h3>
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data"> @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Slider Title</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contrary to popular belief">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">App Link</label>
                <input name="app_link" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contrary to popular belief">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                <input name="image" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>

    </div>
</div>


@endsection
