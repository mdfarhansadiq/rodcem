@extends('Premium.layout.frontend.expert.expert')
@section('title')
    {{config('app.name')}} |  {{auth('expert')->user()->name}} | Profile
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
        <form action="{{route('expert.profile.update')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row g-4">
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input type="text" name="name" class="form-control" id="pname" value="{{auth('expert')->user()->name ?? ''}}" required>
                        <label for="pname">Full Name</label>
                    </div>
                </div>
                <div class="col-xxl-4">
                        <div class="form-floating theme-form-floating">
                        <input type="text" class="form-control" id="fullname" name="phone_number" value="{{auth('expert')->user()->phone_number ?? ''}}" placeholder="Phone Number" required>
                        <label for="fullname">Phone Number</label>
                        @error('phone_number') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input disabled type="email" name="email" class="form-control" id="email" value="{{auth('expert')->user()->email ?? ''}}" placeholder="Email Address" required>
                        <label for="email">Email Address</label>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating-2 search-box">
                        <select name="designation" class="form-select" aria-label="Default select example"  required>
                            @foreach (expert_categories() as $category)
                                <option value="{{$category->id}}" {{{$category->id == auth('expert')->user()->designation ? 'selected' : ''}}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xxl-4">
                   <div class="form-floating theme-form-floating-2 search-box">
                        <select name="service_zone" class="form-select" aria-label="Default select example"  required>
                            @foreach (district() as $item)
                                <option value="{{$item->id}}" {{auth('expert')->user()->service_zone == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                        <label for="service area">Serivce Area</label>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <textarea name="about" class="form-control" id=""  rows="10">{{auth('expert')->user()->about ?? ''}}</textarea>
                        <label for="about">About</label>
                        @error('about') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input type="file" name="image" class="form-control">
                        <label for="email">Profile Photo <span class="text-danger "> (Recommended Size 192 X 168 PX)</span></label>
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
