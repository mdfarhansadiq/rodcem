
@extends('layouts.super')
@section('content')
    <div class="content-wrapper">
        <div class="col-8 shadow p-2 m-auto">
            <table class="table">
               <tbody>


               <tr>
                   <th>Title</th>
                   <td>{{ $data->title }}</td>
               </tr>
               <tr>
                   <th>Description</th>
                   <td>{{ $data->description }}</td>
               </tr>
               <tr>
                   <th>App</th>
                   <td><a href="{{ $data->app_link }}">Download App</a></td>
               </tr>
               <tr>
                   <th>Created At</th>
                   <td>
                       {{$data->created_at}}
                   </td>
               </tr>
               <tr>
                   <th>Image</th>
                   <td>
                       <img  class="thumbnail " src="{{ asset('super/sliders/' . $data->image) }}" style="width:350px; height: 250px; border-radius:4%;" alt="{{ $data->title }}">
                   </td>
               </tr>
               </tbody>
            </table>
            <a class="btn btn-dark m-2" href="{{ route('slider.index') }}"><i class="ti-back-left btn-icon-prepend me-1"></i>Go Back</a>
        </div>
    </div>

@endsection
