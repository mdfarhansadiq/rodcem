@extends('layouts.super')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile Information</h4>        
                    <div class="form-group">
                        <div class="card" style="width: 8rem;">            
                            @if (Auth()->guard('super')->user()->image)                                
                                <img class="card-img-top" src="{{asset('super/profile/'.Auth()->guard('super')->user()->image)}}" alt="Card image cap">
                            @else
                                <img class="card-img-top" src="{{asset('assets/rodcem/profile.png')}}" alt="Card image cap">
                            @endif
                     
                        </div>
                    </div>
                    <form class="forms-sample" action="{{route('super.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">User Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{Auth()->guard('super')->user()->name}}">
                            @error('name')<div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Phone</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="phone_number" value="{{Auth()->guard('super')->user()->phone_number}}">
                            @error('phone_number')<div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{Auth()->guard('super')->user()->email}}">
                            @error('email')<div class="text-danger">{{$message}}</div> @enderror
                        </div>                        
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
                </div>
            </div>
    

            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Password Change</h4>        
                    <form class="forms-sample" action="{{route('super.password.update')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Current Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="current_password" placeholder="Enter Current Password">
                            @error('current_password')<div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="exampleInputPassword1" placeholder="Enter New Password">
                            @error('new_password')<div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Confirm Password</label>
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
</div>
@endsection
@section('custom_js')

@endsection