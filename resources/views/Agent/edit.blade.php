@extends('layouts.agent')

@section('content')
 <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Profile</h3>
                  <p class="card-description">
                  
                  </p>
                <div class="item-thumbnail my-3">
                    <img src="{{asset('/storage/agent/' . Auth::guard('agent')->user()->image) }}" alt="image" style="width:130px; border-radius: 2%;" class="profile-pic">
                </div>


                <div>
                    <h6 class="my-3">Name: {{Auth::guard('agent')->user()->name}}</h6>
                    <h6 class="my-3" >Email: {{Auth::guard('agent')->user()->email}}</h6>
                    <h6 class="my-3">Contact: {{Auth::guard('agent')->user()->phone_number}}</h6>
                    <h6 class="my-3">Address: {{Auth::guard('agent')->user()->phone_number}}</h6>
                    <h6 class="my-3">NID:</h6>

                    <img src="{{asset('/storage/agent/' . Auth::guard('agent')->user()->nid) }}" alt="image" style="width:400px; border-radius: 2%;"  class="profile-pic">
                </div>
                  
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profile update</h4>
                  <p class="card-description">
                    Update your profile
                  </p>
                  <form class="forms-sample" method="post" action="{{route('agent.profile.update')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="exampleInputUsername2" value="{{Auth::guard('agent')->user()->name}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="exampleInputEmail2" value="{{Auth::guard('agent')->user()->email}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone_number" id="exampleInputMobile" value="{{Auth::guard('agent')->user()->phone_number}}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" id="exampleInputMobile" value="{{Auth::guard('agent')->user()->address}}">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Photo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="image" id="exampleInputMobile" ">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">NID</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="nid" id="exampleInputMobile">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
          </div>
        </footer>
        <!-- partial -->
@endsection
