@extends('layouts.front')
@section('page_title')
    | User Register
@endsection
@section('custom_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container my-4">
    {{-- user logout --}}
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary mr-2 mb-2">Logout</button>
    </form>

    <div class="row mb-5">
        <div class="col-md-12 mx-auto grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile Information</h4>        
                <div class="form-group">
                    <div class="card" style="width: 8rem;">            
                        @if (Auth()->user()->image)                                
                            <img class="card-img-top" src="{{asset('user/profile/'.Auth()->user()->image)}}" alt="Card image cap">
                        @else
                            <img class="card-img-top" src="{{asset('assets/rodcem/profile.png')}}" alt="Card image cap">
                        @endif                    
                    </div>
                </div>
                <form class="forms-sample" action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">User Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{Auth()->user()->name}}">
                        @error('name')<div class="text-danger">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="phone_number" value="{{Auth()->user()->phone_number}}">
                        @error('phone_number')<div class="text-danger">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{Auth()->user()->email}}">
                        @error('email')<div class="text-danger">{{$message}}</div> @enderror
                    </div>                        
                    <div class="form-group">
                        <label>Upload Profile Photo</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
            </div>
        </div>
        <div class="col-md-4 mx-auto grid-margin mt-3">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Your Location</h4>        
                            <form class="forms-sample" action="{{route('user.location.update')}}" method="post">
                                @csrf                   
                                @if ($location) 
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Division <span class="text-danger">*</span></label>
                                        <select name="division" class="form-control form-control-sm js-example-basic-single" id="divsision" required>
                                        <option value="">Select Divission</option>
                                        @foreach ($divissions as $division )                                                         
                                            <option value="{{$division->id}}" {{$location->division_id == $division->id ? 'selected' : ''}}>{{$division->name}}</option>                                           
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">District <span class="text-danger">*</span></label>
                                        <select name="district" class="form-control form-control-sm js-example-basic-single_district" id="district" required>
                                        <option value="">Select District</option>
                                        @foreach ($districts as $district )                  
                                            <option value="{{$district->id}}" {{$location->district_id == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Upazila <span class="text-danger">*</span></label>
                                        <select name="upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="upazila" required>
                                        <option value="">Select Upazila</option>
                                        @foreach ($upazilas as $upazila )                  
                                            <option value="{{$upazila->id}}" {{$location->upazila_id == $upazila->id ? 'selected' : ''}}>{{$upazila->name}}</option>
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Union <span class="text-danger">*</span></label>
                                        <select name="union" class="form-control form-control-sm js-example-basic-single_upazila" id="union" required>
                                        <option value="">Select Union</option>
                                        @foreach ($unions as $union )                  
                                            <option value="{{$union->id}}" {{$location->union_id == $union->id ? 'selected' : ''}}>{{$union->name}}</option>
                                        @endforeach
                                        </select>
                                    </div> 
                                @else
                                <div class="form-group">
                                    <label for="exampleFormControlSelect3">Division <span class="text-danger">*</span></label>
                                    <select name="division" class="form-control form-control-sm js-example-basic-single" id="divsision" required>
                                    <option value="">Select Divission</option>
                                    @foreach ($divissions as $division )                                                         
                                        <option value="{{$division->id}}">{{$division->name}}</option>                                           
                                    @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleFormControlSelect3">District <span class="text-danger">*</span></label>
                                    <select name="district" class="form-control form-control-sm js-example-basic-single_district" id="district" required>
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district )                  
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleFormControlSelect3">Upazila <span class="text-danger">*</span></label>
                                    <select name="upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="upazila" required>
                                    <option value="">Select Upazila</option>
                                    @foreach ($upazilas as $upazila )                  
                                        <option value="{{$upazila->id}}">{{$upazila->name}}</option>
                                    @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleFormControlSelect3">Union <span class="text-danger">*</span></label>
                                    <select name="union" class="form-control form-control-sm js-example-basic-single_upazila" id="union" required>
                                    <option value="">Select Union</option>
                                    @foreach ($unions as $union )                  
                                        <option value="{{$union->id}}">{{$union->name}}</option>
                                    @endforeach
                                    </select>
                                </div> 
                                @endif
                                
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <div class="col-md-8 mt-3"> 
           <h1 class="mt-3"> No agent available in your area.</h1>
        </div>

        <div class="col-md-12 mx-auto grid-margin stretch-card mt-5">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Password Change</h4>        
                <form class="forms-sample" action="{{route('user.password.update')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Current Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="current_password" placeholder="Enter Current Password">
                        @error('current_password')<div class="text-danger">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="new_password" id="exampleInputPassword1" placeholder="Enter New Password">
                        @error('new_password')<div class="text-danger">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" name="confirm_password" placeholder="Enter Confirm Password">
                        @error('confirm_password')<div class="text-danger">{{$message}}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
            </div>
        </div>
  </div>
</div>
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
@endsection