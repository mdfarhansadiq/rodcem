@extends('layouts.front')

@section('page_title')
    Experts
@endsection
@section('custom_css')
	<link rel="stylesheet" href="{{asset('assets/team')}}/css/animate.css" type="text/css"/>
	<link rel="stylesheet" href="{{asset('assets/team')}}/css/owl.carousel.min.css" type="text/css"/>
	<link rel="stylesheet" href="{{asset('assets/team')}}/style.css" type="text/css"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<style>
		.heading h2 {
		  font-family: 'Merriweather', sans-serif;
		  font-size: 28px;
		  text-align: center;
		  font-weight: 700;
		  color: rgb(54 67 91);
		  margin-top:20px;
		}
  </style>
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
		<form action="{{route('find.expert')}}" method="get">
			<div class="input-group">
				<input type="search" name='search' @isset(request()->search) value="{{request()->search}}" @endisset class="form-control rounded" placeholder="Find Expert" aria-label="Search" aria-describedby="search-addon" />
			</div>
			<div class="mt-2 d-flex justify-content-end form-group">
				@if(request()->routeIs('find.expert'))
					<a href="{{route('experts')}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Clear</a>
				@else
					@if(Auth()->guard('agent')->check() || Auth()->guard('company')->check() ||  Auth()->guard('expert')->check()  || Auth()->check()) 																	
						<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Find Expert</button>
					@else
						<a href="{{route('login')}}" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Find Expert</a>
					@endif
				@endif
			</div>
		</form>
			{{-- <form action="{{route('find.expert')}}" method="get">
				<div class="col-md-12 mb-5">
					<div class="card text-center p-3" style="background:#337ab7">
					<h4 style="color:white">Find  Expert</h4>
					<div class="form-group col-md-10">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
						  <div class="input-group-append">
							<button class="btn btn-sm btn-primary" type="button">Search</button>
						  </div>
						</div>
					  </div>
						<div class="d-flex justify-content-end form-group">
							@if(request()->routeIs('find.expert'))
								<a href="{{route('experts')}}" class="btn" style="background:red; color:white"><i class="fa fa-times" aria-hidden="true"></i> Clear</a>
							@else
								@if(Auth()->guard('agent')->check() || Auth()->guard('company')->check() ||  Auth()->guard('expert')->check()  || Auth()->check()) 																	
									<button type="submit" class="btn btn-light" style="background: white"><i class="fa fa-search" aria-hidden="true"></i> Find Expert</button>
								@else
									<a href="{{route('login')}}" class="btn btn-light" style="background: white"><i class="fa fa-search" aria-hidden="true"></i> Find Expert</a>
								@endif
							@endif
						</div>
					</div>				
				</div>
			</form> --}}
			<div class="col-md-12">
				<div class="heading">
				  <h2>Meet Our Expert</h2>
				</div>
			  </div>
			<div class="col-md-12">
				<div class="team-section p-tb" id="team">
					<div class="container">
						{{-- <div class="text-center"><h2 class="section-heading text-uppercase mb-5">Meet Our <span style="color:#337ab7">Expert</span></h2></div> --}}
						<div class="team-member text-center">
							<div class="row">
								@foreach ($experts as $expert )								
									<div class="col wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; @if($loop->index != 0) animation-delay: 0.{{$loop->index+1}}s;@endif">
										<div class="team">
											{{-- <a href="{{route('expert.portfolio',$expert->slug)}}"> --}}
											<a href="{{route('expert.portfolio', $expert->slug)}}">
												@if ($expert->image)												
													<img style="width:230px; height:230px;" src="{{asset('expert/profile/'.$expert->image)}}" alt="team">
												@else
													<img src="{{asset('assets/rodcem/expert_team.jpg')}}" alt="team">
												@endif
												<h4><a href="{{route('expert.portfolio',$expert->slug)}}">{{$expert->name}}</a></h4>
												<span>{{$expert->designation}}</span>
											</a>
										</div>
									</div>
								@endforeach

								{{-- <div class="col wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
									<div class="team">
										<img src="images/team-2.jpg" alt="team">
										<h4>Dan Kaul</h4>
										<span>Co-founder &amp; CTO</span>
									</div>
								</div>
								<div class="col wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
									<div class="team">
										<img src="images/team-3.jpg" alt="team">
										<h4>Saru Matt</h4>
										<span>Marketing Officer</span>
									</div>
								</div>
								<div class="col wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
									<div class="team">
										<img src="images/team-4.jpg" alt="team">
										<h4>Cyrus Nato</h4>
										<span>Lead Product Manager</span>
									</div>
								</div> --}}
							</div>					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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
@endsection
