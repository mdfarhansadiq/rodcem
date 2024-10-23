@extends('layouts.master.frontend')
@section('title')
  Rodcem Agents
@endsection
@section('custom_css')
    <style>
       .find_agent{
            padding-top: 50px;
            padding-bottom: 50px;
        }
        /* .themart-category-section {
            padding-bottom: 90px;
        } */
        .section-padding {
            padding: 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

      <!-- Find Agent Section -->
    <section class="themart-category-section find_agent">
        <div class="container">
          <div class="row">
            <form action="{{route('find.agent')}}" method="get">
                <div class="col-md-12 mb-5">
                    <div class="card text-center p-3" style="    background: linear-gradient(180deg, #233D50 0%, #233D50 100%);">
                        <h4 style="color:white">Find  Agent</h4>
                            <div class="row">
                                <div class="form-group col-lg-3 col-md-6 col-12">
                                    <div>
                                        <label class="text-white" for="exampleFormControlSelect3">Division</label>
                                    </div>
                                    <select name="division" class="form-control form-control-sm js-example-basic-single" id="divsision" required>
                                    <option value="">Select Divission</option>
                                    @foreach ($divissions as $division )
                                        <option value="{{$division->id}}" @if(request()->division == $division->id) selected @endif>{{$division->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-3 col-md-6 col-12">
                                    <div>
                                        <label class="text-white" for="exampleFormControlSelect3">District</label>
                                    </div>
                                    <select name="district" class="form-control form-control-sm js-example-basic-single_district" id="district">
                                    {{-- <option value="">Select District</option> --}}
                                    {{-- @foreach ($districts as $district )
                                        <option value="{{$district->id}}" @if(request()->district == $district->id) selected @endif>{{$district->name}}</option>
                                    @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group col-lg-3 col-md-6 col-12">
                                    <div>
                                        <label  class="text-white" for="exampleFormControlSelect3">Upazila</label>
                                    </div>
                                    <select name="upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="upazila">
                                    {{-- <option value="">Select Upazila</option>
                                    @foreach ($upazilas as $upazila )
                                        <option value="{{$upazila->id}}" @if(request()->upazila == $upazila->id) selected @endif>{{$upazila->name}}</option>
                                    @endforeach --}}
                                    </select>
                                </div>
                                <div  class="form-group col-lg-3 col-md-6 col-12">
                                    <div>
                                        <label class="text-white" for="exampleFormControlSelect3">Union</label>
                                    </div>
                                    <select name="union" class="form-control form-control-sm js-example-basic-single_upazila" id="union">
                                    {{-- <option value="">Select Union</option> --}}
                                    {{-- @foreach ($unions as $union )
                                        <option value="{{$union->id}}" @if(request()->union == $union->id) selected @endif>{{$union->name}}</option>
                                    @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end form-group mt-2">
                                @if(request()->routeIs('find.agent'))
                                    <a href="{{route('agents')}}" class="btn" style="background: red;color:#fff"><i class="fa fa-times" aria-hidden="true"></i> Clear</a>
                                @else
                                    @if(Auth()->guard('agent')->check() || Auth()->guard('company')->check() ||  Auth()->guard('expert')->check()  || Auth()->check())
                                        <button type="submit" class="btn btn-light" style="background: #ffffff"><i class="fa fa-search" aria-hidden="true"></i> Find A Agent</button>
                                    @else
                                        <a href="{{route('login')}}" class="btn btn-light" style="background: #ffffff"><i class="fa fa-search" aria-hidden="true"></i> Find A Agent</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                </div>
            </form>
          </div>
        </div>
    </section>
      <!-- Find Agent Section -->

      <!-- start of themart-category-section -->
      <section class="themart-category-section  section-padding">
        <div class="container">
          <div class="row">
              <div class="col-lg-6">
                  <div class="wpo-section-title">
                      <h2>Our Agent</h2>
                  </div>
              </div>
          </div>
          <div class="container">
              <div class="row">
                @foreach ($agents as $agent)
                    <div class="col-lg-3 col-12">
                        <div class="category-card">
                            {{-- <img src="{{asset('theme/assets')}}/images/category/4.jpg" alt=""> --}}
                            @if($agent->image)
                            <img style="height: 280px" src="{{asset('agent/profile/'.$agent->image)}}" alt="">
                        @else
                            <img src="{{asset('assets/rodcem/agents (2).jpg')}}" alt="">
                        @endif
                            <div class="text">
                                <h3><a href="{{route('agent.details',$agent->slug)}}">Profile</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
          </div>
      </section>
      <!-- end of themart-category-section -->
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
    <script>
        $(function(){
            // All Divisions
            $('#divsision').change(function(){
                var division_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.district')}}",
                    data   : {'division_id' : division_id},
                    success:function(response){
                     $('#district').html(response.html);
                     $('#upazila').html(response.district_upazilas);
                     $('#union').html(response.upazilas_union);                     
                    },
                });
            });

            // All upazilas
            $('#district').change(function(){
                var district_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.upazila')}}",
                    data   : {'district_id' : district_id},
                    success:function(response){
                     $('#upazila').html(response.html);
                    },
                });
            });

             // All unions
                $('#upazila').change(function(){
                var upazila_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.union')}}",
                    data   : {'upazila_id' : upazila_id},
                    success:function(response){
                     $('#union').html(response.html);
                    },
                });
            });
        });
    </script>
@endsection
