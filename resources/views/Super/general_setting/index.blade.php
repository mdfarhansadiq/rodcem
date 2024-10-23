@extends('layouts.super')
@section('titel')
    Rodcem General Setting
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">General Setting</h4>
                </div>
                <div>
                    {{-- <a href="{{route('agents.list')}}" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-back-left"></i> Agent List
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
                            <h4 class="card-title text-uppercase">General Setting</h4>    
                            <form action="{{route('general.setting.update')}}" method="post">                                                                       
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email <span class="text-danger">(required)</span> </label>
                                    <input type="email" class="form-control" value="{{general_setting()->email ?? ''}}" name="email">
                                    @error('email')<div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email <span class="text-danger">(optional)</span></label>
                                    <input type="email" class="form-control"  name="email_secoend" value="{{general_setting()->email_secoend ?? ''}}">
                                    @error('duration')<div class="text-danger">{{$message}}</div> @enderror
                                </div>   
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Phone Number <span class="text-danger">(required)</span> </label>
                                    <input type="text" class="form-control"  name="phone" value="{{general_setting()->phone ?? ''}}">
                                    @error('phone')<div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Phone Number <span class="text-danger">(optional)</span></label>
                                    <input type="text" class="form-control"  name="phone_secoend" value="{{general_setting()->phone_secoend ?? ''}}">
                                    @error('phone_secoend')<div class="text-danger">{{$message}}</div> @enderror
                                </div>   
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Address <span class="text-danger">(required)</span></label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="address">{{general_setting()->address ?? '' }}</textarea>           
                                    @error('phone_secoend')<div class="text-danger">{{$message}}</div> @enderror
                                </div>   

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Footer Description <span class="text-danger">(required)</span></label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="footer_description">{{general_setting()->footer_description ?? '' }}</textarea>           
                                    @error('footer_description')<div class="text-danger">{{$message}}</div> @enderror
                                </div> 
                                
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Facebook <span class="text-danger"></span></label>
                                    <input type="text" class="form-control"  name="facebook" value="{{general_setting()->facebook ?? ''}}">
                                    @error('facebook')<div class="text-danger">{{$message}}</div> @enderror
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Twitter <span class="text-danger"></span></label>
                                    <input type="text" class="form-control"  name="twitter" value="{{general_setting()->twitter ?? ''}}">
                                    @error('twitter')<div class="text-danger">{{$message}}</div> @enderror
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Instagram <span class="text-danger"></span></label>
                                    <input type="text" class="form-control"  name="instagram" value="{{general_setting()->instagram ?? ''}}">
                                    @error('instagram')<div class="text-danger">{{$message}}</div> @enderror
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Youtube <span class="text-danger"></span></label>
                                    <input type="text" class="form-control"  name="youtube" value="{{general_setting()->youtube ?? ''}}">
                                    @error('youtube')<div class="text-danger">{{$message}}</div> @enderror
                                </div> 

                                <div class="form-group">         
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button> 
                                </div>   
                            </form>                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection