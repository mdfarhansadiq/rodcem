@extends('layouts.super')
@section('custom_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0 text-uppercase">Agent Information</h4>
            </div>
            <div>
                <a href="{{route('agents.list')}}" class="btn btn-primary btn-icon-text btn-rounded">
                  <i class="ti-back-left"></i> Agent List
                </a>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
            <div class="col-md-12 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">             
                    <div class="form-group">         
                    </div>
                    <form class="forms-sample" action="{{route('super.agent.document.update',$agent->slug)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- Shop Information --}}
                        <div class="row">
                          <h6 class="text-uppercase">Shop Information</h6>
                          <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Shop Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="shop_name" value="{{$shop_info->shop_name ?? ''}}">
                              @error('shop_name')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 
                          <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Shop Address</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="shop_address" value="{{$shop_info->shop_address ?? ''}}">
                              @error('shop_address')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 
                        </div>

                        {{-- Agent Information  --}}
                        <div class="row">
                          <h6 class="text-uppercase">Individual Information</h6>
                          <div class="form-group col-md-6">
                              <label for="exampleInputUsername1">Name</label>
                              <input disabled type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{$agent->name ?? ''}}">
                              @error('name')<div class="text-danger">{{$message}}</div> @enderror
                          </div>
                          <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Email address</label>
                              <input disabled type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$agent->email ?? ''}}">
                              @error('email')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 
                          <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Father Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="father_name" value="{{$agent_info->father_name ?? ''}}">
                              @error('father_name')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 
                          <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Mother Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="mother_name" value="{{$agent_info->mother_name ?? ''}}">
                              @error('mother_name')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 
                          <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Nid No</label>
                              <input type="number" class="form-control" id="exampleInputEmail1" name="nid_no" value="{{$agent_info->nid_no ?? ''}}">
                              @error('nid_no')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 
                          <div class="form-group col-md-6">
                            <label for="exampleInputUsername1">Phone</label>
                            <input disabled type="text" class="form-control" id="exampleInputUsername1" name="phone_number" value="{{$agent->phone_number ?? ''}}">
                            @error('phone_number')<div class="text-danger">{{$message}}</div> @enderror
                         </div>
                          <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Date Of Birth</label>
                              <input type="date" class="form-control" id="exampleInputEmail1" name="date_of_birth" value="{{$agent_info->date_of_birth ?? ''}}">
                              @error('date_of_birth')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 

                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Gender</label>
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="male" {{$agent_info && $agent_info->gender == 'male' ? 'checked' :''}}>
                                    Mail
                                  <i class="input-helper"></i></label>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="membershipRadios2" value="female" {{$agent_info && $agent_info->gender == 'female' ? 'checked' :''}}>
                                    Female
                                  <i class="input-helper"></i></label>
                                </div>
                              </div>
                            </div>
                          </div>
                           
                          @if ($agent_info && $agent_info->photo)                
                            <div class="form-group col-md-8">
                                <label>Uplaod Agent Photo</label>
                                <input type="file" name="agent_photo" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <img width="150" src="{{asset('agent/document/agent/photo/'.$agent_info->photo)}}" alt="">
                            </div>                      
                          @else
                            <div class="form-group">
                              <label>Uplaod Agent Photo</label>
                              <input type="file" name="agent_photo" class="file-upload-default">
                              <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                              <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                              </div>
                            </div>
                          @endif
                        </div>

                        {{--present address  --}}
                        <div class="row">
                          <h6 class="text-uppercase">Present Address</h6>        
                          <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect3">Division</label>
                            <select name="present_division" class="form-control form-control-sm js-example-basic-single" id="divsision" >
                              <option value="">Select Divission</option>
                              @foreach ($divissions as $division )    
                                <option value="{{$division->id}}" {{$present_info && $present_info->division_id == $division->id ? 'selected' : ''}}>{{$division->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                          <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect3">District</label>
                            <select name="present_district" class="form-control form-control-sm js-example-basic-single_district" id="district" >
                              <option value="">Select District</option>
                              @foreach ($districts as $district )                  
                                <option value="{{$district->id}}" {{$present_info &&  $present_info->district_id == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                          <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect3">Upazila</label>
                            <select name="present_upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="upazila" >
                              <option value="">Select Upazila</option>
                              @foreach ($upazilas as $upazila )                  
                                <option value="{{$upazila->id}}" {{$present_info &&  $present_info->upazila_id == $upazila->id ? 'selected' : ''}}>{{$upazila->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                          <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect3">Union</label>
                            <select name="present_union" class="form-control form-control-sm js-example-basic-single_upazila" id="union" >
                              <option value="">Select Union</option>
                              @foreach ($unions as $union )                  
                                <option value="{{$union->id}}" {{$present_info && $present_info->union_id == $union->id ? 'selected' : ''}}>{{$union->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Post Office</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="present_post_office" value="{{$present_info->post_office ?? ''}}">
                                @error('present_post_office')<div class="text-danger">{{$message}}</div> @enderror
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Post Code</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="present_post_code" value="{{$present_info->post_code ?? ''}}">
                                @error('present_post_code')<div class="text-danger">{{$message}}</div> @enderror
                            </div> 
                        </div> 
                        {{-- parmanet address  --}}
                        <div class="row">
                          <h6 class="text-uppercase">Pharmanent Address</h6>
                          <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect3">Division</label>
                            <select name="pharmanent_division" class="form-control form-control-sm js-example-basic-single" id="parmanet_divsision" >
                              <option value="">Select Divission</option>
                              @foreach ($divissions as $division )    
                                <option value="{{$division->id}}" {{$parmanent_info && $parmanent_info->division_id == $division->id ? 'selected' : ''}}>{{$division->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                          <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect3">District</label>
                            <select name="pharmanent_district" class="form-control form-control-sm js-example-basic-single_district" id="parmanet_district">
                              <option value="">Select District</option>
                              @foreach ($districts as $district )                  
                                <option value="{{$district->id}}" {{$parmanent_info &&  $parmanent_info->district_id == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                          <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect3">Upazila</label>
                            <select name="pharmanent_upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="parmanet_upazila" >
                              <option value="">Select Upazila</option>
                              @foreach ($upazilas as $upazila )                  
                                <option value="{{$upazila->id}}" {{$parmanent_info &&  $parmanent_info->upazila_id == $upazila->id ? 'selected' : ''}}>{{$upazila->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                          <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect3">Union</label>
                            <select name="pharmanent_union" class="form-control form-control-sm js-example-basic-single_upazila" id="parmanet_union" >
                              <option value="">Select Union</option>
                              @foreach ($unions as $union )                  
                                <option value="{{$union->id}}" {{$parmanent_info && $parmanent_info->union_id == $union->id ? 'selected' : ''}}>{{$union->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                          <div class="form-group col-md-4">
                              <label for="exampleInputEmail1">Post Office</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="pharmanent_post_office" value="{{$parmanent_info->post_office ?? ''}}">
                              @error('post_office')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 
                          <div class="form-group col-md-4">
                              <label for="exampleInputEmail1">Post Code</label>
                              <input type="number" class="form-control" id="exampleInputEmail1" name="pharmanent_post_code" value="{{$parmanent_info->post_code ?? ''}}">
                              @error('post_code')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 
                        </div> 
                        {{-- Nominee address  --}}
                        <div class="row">
                          <h6 class="text-uppercase">Nominee Information</h6>        
                          <div class="form-group col-md-6">
                              <label for="exampleInputUsername1">Nominee Name</label>
                              <input type="text" class="form-control" id="exampleInputUsername1" name="nominee_name" value="{{$nominee_info->nominee_name ?? ''}}">
                              @error('nominee_name')<div class="text-danger">{{$message}}</div> @enderror
                          </div>
                          <div class="form-group col-md-6">
                              <label for="exampleInputUsername1">Nominee  Phone</label>
                              <input type="text" class="form-control" id="exampleInputUsername1" name="nominee_phone" value="{{$nominee_info->nominee_phone ?? ''}}">
                              @error('nominee_phone')<div class="text-danger">{{$message}}</div> @enderror
                          </div>
                          <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" name="nominee_email" value="{{$nominee_info->nominee_email ?? ''}}">
                              @error('nominee_email')<div class="text-danger">{{$message}}</div> @enderror
                          </div>  
                          <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Nid No</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="nominee_nid_no" value="{{$nominee_info->nominee_nid_no ?? ''}}">
                              @error('nominee_nid_no')<div class="text-danger">{{$message}}</div> @enderror
                          </div> 

                          @if ($nominee_info && $nominee_info->nominee_photo)
                            <div class="form-group col-md-8">
                              <label>Upload Nominee Photo</label>
                              <input type="file" name="nominee_photo" class="file-upload-default">
                              <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                              <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <img width="150" src="{{asset('agent/document/nominee/photo/'.$nominee_info->nominee_photo)}}" alt="">
                          </div>    
                          @else
                            <div class="form-group">
                              <label>Upload Nominee Photo</label>
                              <input type="file" name="nominee_photo" class="file-upload-default">
                              <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                              <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                              </div>
                            </div>
                          @endif
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

        $('#parmanet_divsision').select2();
        $('#parmanet_district').select2();
        $('#parmanet_upazila').select2();
        $('#parmanet_union').select2();
        });
    </script>
@endsection