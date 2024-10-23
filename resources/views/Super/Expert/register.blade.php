@extends('layouts.super')
@section('titel')
    Expert Register
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Add New Expert</h4>
                </div>
                <div>
                    {{-- <a href="{{route('Experts.list')}}" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-back-left"></i> Expert List
                    </a> --}}
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="modal-body">
                <div class="col-md-10 mx-auto grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-uppercase">Add New Expert</h4>
                           <form method="POST" action="{{ route('super.expert.register') }}" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <label>Expert Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Expert Name">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Designation <span class="text-danger">*</span></label>
                                    <select name="designation" class="form-control" id="exampleFormControlSelect2">
                                        @foreach (expert_categories() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('designation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Service Zone <span class="text-danger">*</span></label>
                                    <select name="service_zone" class="form-control" id="exampleFormControlSelect2">
                                        @foreach (all_district() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('service_zone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Phone Number <span class="text-danger">*</span></label>
                                    <input type="Number" name="phone_number" class="form-control" value="{{old('phone_number')}}" placeholder="Enter Number">
                                    @error('phone_number')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control"  placeholder="Enter Password">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control"  placeholder="Enter Confirm Password">
                                    @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                <button class="btn btn-primary font-weight-medium">Submit</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
