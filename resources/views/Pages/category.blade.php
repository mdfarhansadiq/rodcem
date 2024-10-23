@extends('layouts.front')
@section('page_title')
    Categories
@endsection
@section('content')

<!-- content  -->
<div class="container my-5" >
  <div class="row ">
      @foreach($categories as $category)
    <div class="col-md-3 my-3">
      <div class="card-sl">
        <div class="card-image">
          <img src="{{ asset('company/categories/'.$category->image) }}" />
        </div>

        <a class="card-action" href="#"><i class="fa fa-heart"></i></a>
        <div class="card-heading">
          {{ $category->name }}
        </div>
        <!-- <div class="card-text">
          Audi Q8 is a full-size luxury crossover SUV coupé made by Audi that was launched in 2018.
        </div> -->
        <!-- <div class="card-text">
          $67,400
        </div> -->
        <a href="#" class="card-button"> VIEW</a>
      </div>
    </div>

      @endforeach
  </div>
</div>

<!-- content end  -->


@endsection
