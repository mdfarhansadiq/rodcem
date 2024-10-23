@extends('layouts.front')

@section('page_title')
    Agents
@endsection
@section('custom_css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	{{-- <link rel="stylesheet" href="{{asset('assets/team')}}/css/fontawesome.min.css" type="text/css"/> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/team')}}/css/bootstrap.css" type="text/css"/> --}}
    <link rel="stylesheet" href="{{asset('assets/team')}}/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/team')}}/css/owl.carousel.min.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/team')}}/style.css" type="text/css"/>
    {{-- <link rel="stylesheet" href="{{asset('assets/team')}}/css/responsive.css" type="text/css"/> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')


<!-- Banner Start -->
{{-- <div class="page-banner" style="background-image: url({{ asset('Frontend/uploads/page-banner-10.jpg') }})">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-text">
					<h1>Expert</h1>
				</div>
			</div>
		</div>
	</div>
</div> --}}
<!-- Banner End -->



<section class="team-member-v3">
	<div class="container">
		<div class="row">
		<form action="{{route('find.agent')}}" method="get">
			<div class="col-md-12 mb-5">
				<div class="card text-center p-3" style="background:#337ab7">
					<h4 style="color:white">Find  Agent</h4>
						<div class="">
							<div class="form-group col-md-3">
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
							<div class="form-group col-md-3">
								<div>
									<label class="text-white" for="exampleFormControlSelect3">District</label>
								</div>
								<select name="district" class="form-control form-control-sm js-example-basic-single_district" id="district">
								<option value="">Select District</option>
								@foreach ($districts as $district )                  
									<option value="{{$district->id}}" @if(request()->district == $district->id) selected @endif>{{$district->name}}</option>
								@endforeach
								</select>
							</div> 
							<div class="form-group col-md-3">
								<div>
									<label  class="text-white" for="exampleFormControlSelect3">Upazila</label>
								</div>
								<select name="upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="upazila">
								<option value="">Select Upazila</option>
								@foreach ($upazilas as $upazila )                  
									<option value="{{$upazila->id}}" @if(request()->upazila == $upazila->id) selected @endif>{{$upazila->name}}</option>
								@endforeach
								</select>
							</div> 
							<div  class="form-group col-md-3">
								<div>
									<label class="text-white" for="exampleFormControlSelect3">Union</label>
								</div>
								<select name="union" class="form-control form-control-sm js-example-basic-single_upazila" id="union">
								<option value="">Select Union</option>
								@foreach ($unions as $union )                  
									<option value="{{$union->id}}" @if(request()->union == $union->id) selected @endif>{{$union->name}}</option>
								@endforeach
								</select>
							</div> 
						</div>
						<div class="d-flex justify-content-end form-group">
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
		
			<div class="team-member text-center">
				<div class="text-center"><h2 class="section-heading">Meet Our <span>Agents</span></h2></div>
				<div class="row">
					@foreach ($agents as $agent )						
						<div class="col-md-6 col-lg-3">
							<a href="{{route('agent.details',$agent->slug)}}">
								<div class="team-box">
									<div class="team-img">
										@if($agent->image)
											<img style="height: 280px" src="{{asset('agent/profile/'.$agent->image)}}" alt="">
										@else
											<img src="{{asset('assets/rodcem/agents (2).jpg')}}" alt="">
										@endif
										<div class="team-social">
											<ul>
												{{-- <li><a href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
												<li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
												<li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li> --}}
												{{-- <p>Dhaka BangladeshDhaka BangladeshDhaka BangladeshDhaka BangladeshDhaka Bangladesh</p> --}}
			
											</ul>
										</div>
									</div>
									<div class="text">
										<h4><a href="{{route('agent.details',$agent->slug)}}">{{$agent->name}}</a></h4>
										<p class="button">
											<a href="{{route('agent.details',$agent->slug)}}">See Full Profile</a>
										</p>
										{{-- @php
											dd($agent->lacation)
										@endphp --}}
										{{-- <span class="text-white">{{$agent->location->divission->name}}, {{$agent->location->district->name}}</span> --}}
									</div>		
							</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		
		</div>
	</div>
</section>

@endsection
@section('custom_js')
	    {{-- <script src="{{asset('assets/team')}}/js/jquery.min.js"></script>
		<script src="{{asset('assets/team')}}/js/bootstrap.min.js"></script>
		<script src="{{asset('assets/team')}}/js/onpagescroll.js"></script>
		<script src="{{asset('assets/team')}}/js/wow.min.js"></script>
		<script src="{{asset('assets/team')}}/js/jquery.countdown.js"></script>
		<script src="{{asset('assets/team')}}/js/owl.carousel.js"></script>
		<script src="{{asset('assets/team')}}/js/Chart.js"></script>
		<script src="{{asset('assets/team')}}/js/chart-function.js"></script>
		<script src="{{asset('assets/team')}}/js/script.js"></script>
		<script src="{{asset('assets/team')}}/js/particles.js"></script>
		<script src="{{asset('assets/team')}}/js/gold-app.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				setTimeout(function(){
					jQuery('.diamond-animation').addClass('done');
				}, 6000);
				setTimeout(function(){
					jQuery('.diamond-animation .main').addClass('active');
				}, 1000);
				setTimeout(function(){
					jQuery('.inside-bitcoin').addClass('active');
				}, 3000);
				setTimeout(function(){
					jQuery('.inside-bitcoin').addClass('spincoin');
				}, 5000);
				setTimeout(function(){
					jQuery('.diamond-animation .lines').addClass('active');
				}, 6000);
				setTimeout(function(){
					jQuery('.diamond-animation .top-coin').addClass('active');
				}, 3000);
				 setTimeout(function(){
					jQuery('.diamond-animation .outer-Orbit').addClass('active');
				}, 5000);
			});
		</script> --}}
		    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
			<script>
				$(document).ready(function() {
				$('#divsision').select2();
				$('#district').select2();
				$('#upazila').select2();
				$('#union').select2();
				});
			</script>
@endsection
