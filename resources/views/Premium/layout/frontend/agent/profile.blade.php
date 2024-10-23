@extends('Premium.layout.frontend.agent.agent')
@section('title')
    {{config('app.name')}} |  {{auth('agent')->user()->name}} | Profile
@endsection
@section('profile')
    active
@endsection
@section('user-content')
<div class="dashboard-right-sidebar">
    <div class="dashboard-home">
        <div class="title">
            <h2>Update Profile Information</h2>
            <span class="title-leaf">
                <svg class="icon-width bg-gray">
                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                </svg>
            </span>
        </div>
        <form action="{{route('agent.profile.update')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row g-4">
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input type="text" name="name" class="form-control" id="pname" value="{{auth('agent')->user()->name ?? ''}}" required>
                        <label for="pname">Full Name</label>
                    </div>
                </div>
                <div class="col-xxl-4">
                        <div class="form-floating theme-form-floating">
                        <input type="text" class="form-control" id="fullname" name="phone_number" value="{{auth('agent')->user()->phone_number ?? ''}}" placeholder="Phone Number" required>
                        <label for="fullname">Phone Number</label>
                        @error('phone_number') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input disabled type="email" name="email" class="form-control" id="email" value="{{auth('agent')->user()->email ?? ''}}" placeholder="Email Address" required>
                        <label for="email">Email Address</label>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input type="text" name="shop_name" class="form-control" id="email" value="{{auth('agent')->user()->shop_info->shop_name ?? ''}}" placeholder="Shop Name">
                        <label for="text">Shop Name</label>
                        @error('shop_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <textarea class="form-control" name="shop_address" rows="10">{{auth('agent')->user()->shop_info->shop_address ?? ''}}</textarea>
                        <label for="email">Shop Address</label>
                        @error('shop_address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input type="file" name="image" class="form-control">
                        <label for="email">Profile Photo <span class="text-danger "> (Recommended Size 107 X 107 PX)</span></label>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <button type="submit" class="btn theme-bg-color text-light">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
