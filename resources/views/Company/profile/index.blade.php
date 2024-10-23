@extends('layouts.company')
@section('custom_css')
<style>
    .card-img-top{
    height:300px;
}

.card-no-border .card {
    border-color: #d7dfe3;
    border-radius: 4px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.pro-img {
    margin-top: -80px;
    margin-bottom: 20px;
    width: 128px;
    height: 128px;
    /* border-radius: 100% */
}

.little-profile .pro-img img {
    height:100px;
}

html body .m-b-0 {
    margin-bottom: 0px
}

h3 {
    line-height: 30px;
    font-size: 21px
}

.btn-rounded.btn-md {
    padding: 12px 35px;
    font-size: 16px
}

html body .m-t-10 {
    margin-top: 10px
}

.btn-primary,
.btn-primary.disabled {
    background: #7460ee;
    border: 1px solid #7460ee;
    -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
    -webkit-transition: 0.2s ease-in;
    -o-transition: 0.2s ease-in;
    transition: 0.2s ease-in
}

.btn-rounded {
    border-radius: 60px;
    padding: 7px 18px
}

.m-t-20 {
    margin-top: 20px
}

.text-center {
    text-align: center !important
}

h1,
h2,
h3,
h4,
h5,
h6 {
    color: #455a64;
    font-family: "Poppins", sans-serif;
    font-weight: 400
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}
</style>
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                    @if (Auth()->guard('company')->user()->cover)
                        <img class="card-img-top" src="{{asset('company/profile/cover/'.Auth()->guard('company')->user()->cover)}}" alt="Card image cap">
                    @else
                        <img class="card-img-top" src="{{asset('assets/rodcem/defatultcover.jpg')}}" alt="Card image cap">
                    @endif
                    <div class="card-body little-profile text-center">
                        <div class="pro-img">
                        @if (Auth()->guard('company')->user()->logo)
                            <img class="card-img-top" src="{{asset('company/profile/logo/'.Auth()->guard('company')->user()->logo)}}" alt="Card image cap">
                        @else
                            <img class="card-img-top" src="{{asset('assets/rodcem/defautllogo.webp')}}" alt="Card image cap">
                        @endif
                        </div>
                        {{-- <h3 class="m-b-0">{{Auth()->guard('company')->user()->name}}</h3>
                        <p>{{Auth()->guard('company')->user()->email}}</p> <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Follow</a> --}}
                        {{-- <div class="row text-center m-t-20">
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light">10434</h3><small>Articles</small>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light">434K</h3><small>Followers</small>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light">5454</h3><small>Following</small>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile Information</h4>
                    <form class="forms-sample" action="{{route('company.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">User Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{Auth()->guard('company')->user()->name}}">
                                @error('name')<div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Phone</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="phone_number" value="{{Auth()->guard('company')->user()->phone_number}}">
                                @error('phone_number')<div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect2">Category</label>
                                <select name="category" class="form-control" id="exampleFormControlSelect2">
                                    @foreach (company_categories() as $category)
                                      <option value="{{$category->id}}" {{Auth('company')->user()->category == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('designation')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{Auth()->guard('company')->user()->email}}">
                                @error('email')<div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Since</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="since" value="{{Auth()->guard('company')->user()->since ?? '2000'}}">
                                @error('since')<div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Address</label>
                                <textarea name="address" class="form-control" id="exampleTextarea1" rows="1">{{Auth()->guard('company')->user()->address ?? "Your Company Address"}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">About Company <span class="text-danger">(Recommended within 15 word)</span></label>
                                <textarea name="about" class="form-control" id="exampleTextarea1" rows="3">{{Auth()->guard('company')->user()->about ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro praesentium et atque dolores quaerat.'}} </textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Logo upload <span class="text-danger">Recommended Size 250 X 150 PX</span></label>
                                <input type="file" name="logo" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cover Photo <span class="text-danger">(Recommended Dimenssion 1120 X 400 PX)</span></label>
                                <input type="file" name="cover" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                </div>
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
                    <form class="forms-sample" action="{{route('company.password.update')}}" method="post">
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
