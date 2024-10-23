@extends('layouts.master.frontend')
@section('title')
  Company Shop
@endsection
@section('custom_css')
    <style>
        .vendors-single-wrap .vendors-single-content{
            width: 100%;
        }
        .wpo-checkout-area .coupon.coupon-3{
            margin-top: 0px;
        }
        </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@php
    // if()
    // {
    //    dd('nai');
    // }else{
    //     dd('ace');
    // }
@endphp
@section('content')
        <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <h2 class="d-none">Hide</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="{{route('front')}}">Home</a></li>
                                <li><a href="{{route('ecommerce.index')}}">Shop</a></li>
                                <li class="text-success">{{Auth()->user()->name}}</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->


        <!-- Information Section-->
        <div class="wpo-checkout-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="mb-2 d-flex justify-content-between">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        <a href="{{route('user.orders')}}" class="btn btn-success">All Orders</a>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="caupon-wrap s3">
                            <div class="biling-item">
                                <div class="billing-adress">
                                    <div class="coupon coupon-3">
                                        <h2>Your Information</h2>
                                    </div>
                                    <div class="contact-form form-style">
                                        <form action="{{route('user.profile.update')}}"  method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <label for="">Name</label>
                                                <input type="text"  id="fname1" name="name" value="{{Auth()->user()->name}}" required>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <label for="">Phone Number</label>
                                                <input type="text" placeholder="Last Name*" id="fname2" name="phone_number" value="{{Auth()->user()->phone_number}}" required>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <label for="">Email</label>
                                                <input type="email" id="email4" name="email" value="{{Auth()->user()->email}}" required>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <label>Upload Profile Photo</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="cout-order-area">
                            <h3>Your Profile</h3>
                            <div class="oreder-item d-flex justify-content-center">
                                @if (Auth()->user()->image)
                                    <img  width="100" src="{{asset('user/profile/'.Auth()->user()->image)}}" alt="">
                                @else
                                    <img  width="100" src="{{asset('assets/rodcem/profile.png')}}" alt="">
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
                                <h4 class="mt-1">{{Auth()->user()->name}}</h4>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h6 class="">{{Auth()->user()->email}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="biling-item">
                            <div class="billing-adress">
                                <div class="coupon coupon-3">
                                    <h2>Set Location And Find Agent</h2>
                                </div>
                                <div class="contact-form form-style">
                                    <form class="forms-sample" action="{{route('user.location.update')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            @if ($location)
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="exampleFormControlSelect3">Division <span class="text-danger">*</span></label>
                                                    <select name="division" class="form-control form-control-sm js-example-basic-single" id="divsision" required>
                                                    <option value="">Select Divission</option>
                                                    @foreach ($divissions as $division )
                                                        <option value="{{$division->id}}" {{$location->division_id == $division->id ? 'selected' : ''}}>{{$division->name}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="exampleFormControlSelect3">District <span class="text-danger">*</span></label>
                                                    <select name="district" class="form-control form-control-sm js-example-basic-single_district" id="district" required>
                                                    <option value="">Select District</option>
                                                    @foreach ($districts as $district )
                                                        <option value="{{$district->id}}" {{$location->district_id == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="exampleFormControlSelect3">Upazila <span class="text-danger">*</span></label>
                                                    <select name="upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="upazila" required>
                                                    <option value="">Select Upazila</option>
                                                    @foreach ($upazilas as $upazila )
                                                        <option value="{{$upazila->id}}" {{$location->upazila_id == $upazila->id ? 'selected' : ''}}>{{$upazila->name}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="exampleFormControlSelect3">Union <span class="text-danger">*</span></label>
                                                    <select name="union" class="form-control form-control-sm js-example-basic-single_upazila" id="union" required>
                                                    <option value="">Select Union</option>
                                                    @foreach ($unions as $union )
                                                        <option value="{{$union->id}}" {{$location->union_id == $union->id ? 'selected' : ''}}>{{$union->name}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <button type="submit" class="btn btn-success mr-2 mt-3">Submit</button>
                                                </div>
                                            @else
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <label for="exampleFormControlSelect3">Division <span class="text-danger">*</span></label>
                                                <select name="division" class="form-control form-control-sm js-example-basic-single" id="divsision" required>
                                                <option value="">Select Divission</option>
                                                @foreach ($divissions as $division )
                                                    <option value="{{$division->id}}">{{$division->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <label for="exampleFormControlSelect3">District <span class="text-danger">*</span></label>
                                                <select name="district" class="form-control form-control-sm js-example-basic-single_district" id="district" required>
                                                {{-- <option value="">Select District</option>
                                                @foreach ($districts as $district )
                                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                                @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <label for="exampleFormControlSelect3">Upazila <span class="text-danger">*</span></label>
                                                <select name="upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="upazila" required>
                                                {{-- <option value="">Select Upazila</option>
                                                @foreach ($upazilas as $upazila )
                                                    <option value="{{$upazila->id}}">{{$upazila->name}}</option>
                                                @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <label for="exampleFormControlSelect3">Union <span class="text-danger">*</span></label>
                                                <select name="union" class="form-control form-control-sm js-example-basic-single_upazila" id="union" required>
                                                {{-- <option value="">Select Union</option>
                                                @foreach ($unions as $union )
                                                    <option value="{{$union->id}}">{{$union->name}}</option>
                                                @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <button type="submit" class="btn btn-success mr-2 mt-3">Submit</button>
                                            </div>
                                            @endif
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="cout-order-area">
                            <h3>Nearby Agent</h3>
                            <div class="oreder-item">
                                @if ($location && UserNearAgent($location) != null)                                    
                                    <div class="title">
                                        <h2>Image <span>Aciton</span></h2>
                                    </div>
                                
                                    @foreach (UserNearAgent($location) as $agent) 
                                        @if($loop->index != 2)                                                                       
                                            <div class="oreder-product">
                                                <div class="images">
                                                    <span>
                                                        @if($agent->image)
                                                        <img width="50" src="{{asset('agent/profile/'.$agent->image)}}" alt="">
                                                    @else
                                                        <img width="50" src="{{asset('assets/rodcem/agents (2).jpg')}}" alt="">
                                                    @endif
                                                    </span>
                                                </div>
                                                <div class="product">
                                                    <ul>
                                                        <li class="first-cart">{{$agent->name}}</li>
                                                        <li class="first-cart"><small>{{$agent->phone_number}}</small></li>
                                                    </ul>
                                                </div>
                                                <span><a href="{{route('agent.details', $agent->slug)}}" class="text-success">view</a></span>
                                            </div>
                                        @else
                                            @break
                                        @endif                                     
                                    @endforeach
                                    <div class="d-flex justify-content-center mt-2">
                                        <a href="{{route('user.agents')}}" class="btn btn-success mt-2 float-right">View All</a>
                                    </div>
                                @else
                                     <div class="title">
                                        <h2>Sorry! No Agent Found</h2>
                                     </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Information Section-->
@endsection
@section('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#divsision').select2();
        $('#district').select2();
        $('#upazila').select2();
        $('#union').select2();
        });
    </script>
    {{-- Location  --}}
     <script>
        $(function(){
            // All Divisions
            $('#divsision').change(function(){
                var division_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.district')}}",
                    data   : {'division_id' : division_id},
                    success:function(response){
                     $('#district').html(response.html);
                     $('#upazila').html(response.district_upazilas);
                     $('#union').html(response.upazilas_union);  
                    },
                });
            });

            // All upazilas
            $('#district').change(function(){
                var district_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.upazila')}}",
                    data   : {'district_id' : district_id},
                    success:function(response){
                     $('#upazila').html(response.html);
                    },
                });
            });

             // All unions
                $('#upazila').change(function(){
                var upazila_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.union')}}",
                    data   : {'upazila_id' : upazila_id},
                    success:function(response){
                     $('#union').html(response.html);
                    },
                });
            });
        });
    </script>
@endsection
