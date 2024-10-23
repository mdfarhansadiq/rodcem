@extends('layouts.master.frontend')
@section('page_title')
    {{-- {{config('app.name')}} --}}
@endsection
@section('content')
<div class="container">
    <div class="row" style="margin:80px 0 80px 0">
        <div class="col-md-10 mx-auto">
            {!! $terms_condation->terms_condation!!}
        </div>

    </div>
  </div>
@endsection
