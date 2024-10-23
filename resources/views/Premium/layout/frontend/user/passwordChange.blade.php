@extends('Premium.layout.frontend.user.user')
@section('title')
    {{config('app.name')}} |  {{auth()->user()->name}} | Password Change
@endsection
@section('password_change')
    active
@endsection
@section('user-content')
<div class="dashboard-right-sidebar">
    <div class="dashboard-home">
        <div class="title">
            <h2>Update Your Password</h2>
            <span class="title-leaf">
                <svg class="icon-width bg-gray">
                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                </svg>
            </span>
        </div>
        <form action="{{route('user.password.change.update')}}" method="post">
        @csrf
            <div class="row g-4">
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input type="password" name="current_password" class="form-control" id="password" placeholder="Current Password" required>
                        <label for="password">Current Password</label>
                        @error('current_password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input type="password" name="new_password" class="form-control" id="password" placeholder="New Password" required>
                        <label for="password">New Password</label>
                        @error('new_password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Confirm Password" required>
                        <label for="password">Confirm Password</label>
                        @error('confirm_password') <span class="text-danger">{{$message}}</span> @enderror
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
