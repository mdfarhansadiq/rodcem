@extends('layouts.agent')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold mb-0 text-uppercase">Subscription</h4>
            </div>
            <div>
                {{-- <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                    <i class="ti-clipboard btn-icon-prepend"></i>Report
                </button> --}}
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-uppercase">Subscription Package</h4>                      
                    {{-- <form class="forms-sample" action="{{route('super.subscription.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Subscription Duration</label>
                            <input type="number" class="form-control"  name="duration" value="1" max="1" min="1">
                            @error('duration')<div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Subscription Duration</label>
                            <input type="text" class="form-control"  name="suffix" value="month">
                            @error('suffix')<div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Subscripion Fee</label>
                            <input type="number" class="form-control"  name="subscription_fee" value="{{$subscripiton->subscription_fee ?? ''}}">
                            @error('subscription_fee')<div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form> --}}
                    <div class="row">
                        @foreach ($subscriptions as $row )                            
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                    <h5 class="card-title">{{$row->subscription_name}}</h5>
                                    <h3 class=""><sup><small>BDT</small></sup>{{$row->subscription_fee}}/<sub><small>{{$row->duration}} {{$row->suffix}}</small></sub></h3>
                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                    <a href="#" class="card-link btn btn-info mt-3">SELECT</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom_js')

@endsection