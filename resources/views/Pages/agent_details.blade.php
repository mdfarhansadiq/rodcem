@extends('layouts.front')
@section('page_title')
    Contact
@endsection
@section('custom_css')
	<style>

.u-center-text {
  text-align: center !important;
}

.u-margin-bottom-small {
  margin-bottom: 1.5rem !important;
}

.u-margin-bottom-medium {
  margin-bottom: 4rem !important;
}

.u-margin-top-big {
  margin-top: 5rem !important;
}

body {
  font-family: "Lato", sans-serif;
  font-weight: 400;
  line-height: 1.7;
  color: #fff;
  background: #000;
}

.heading-primary {
  color: #fff;
  text-transform: uppercase;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  margin-bottom: 6rem;
}

.heading-primary--main {
  display: block;
  font-size: 6rem;
  font-weight: 400;
  letter-spacing: 3.5rem;
  -webkit-animation-name: moveInLeft;
          animation-name: moveInLeft;
  -webkit-animation-duration: 1s;
          animation-duration: 1s;
  -webkit-animation-timing-function: ease-out;
          animation-timing-function: ease-out;
  /*
        animation-delay: 3s;
        animation-iteration-count: 3;
        */
}

.heading-primary--sub {
  display: block;
  font-size: 2rem;
  font-weight: 700;
  letter-spacing: 1.75rem;
  -webkit-animation: moveInRight 1s ease-out;
          animation: moveInRight 1s ease-out;
}

.btn--white {
  background-color: #fff;
  color: #777;
}

.btn--white::after {
  background-color: #fff;
}

.btn--green {
  background: -webkit-gradient(linear, left top, right top, from(#fc466b), to(#3f5efb));
  background: linear-gradient(to right, #fc466b, #3f5efb);
  color: #fff;
}

.btn--green::after {
  background-color: #55c57a;
}

*,
*::after,
*::before {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: inherit;
          box-sizing: inherit;
}

html {
  font-size: 62.5%;
}

body {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

.section-plans {
  background-color: #000;
  padding: 2rem 0 4rem 0;
}

.card {
  -webkit-perspective: 150rem;
          perspective: 150rem;
  -moz-perspective: 150rem;
  position: relative;
  height: 52rem;
}

.card__side {
  height: 52rem;
  -webkit-transition: all 0.8s ease;
  transition: all 0.8s ease;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  border-radius: 3px;
  overflow: hidden;
  -webkit-box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.15);
          box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.15);
}

.card__side--front {
  background-color: #fff;
}

.card__side--front-1 {
  background: linear-gradient(-45deg, #304a79, #304a79);
}

.card__side--front-2 {
  background: linear-gradient(-45deg, #304a79, #304a79);
}

.card__side--front-3 {
  background: linear-gradient(-45deg, #24ff72, #9a4eff);
}

.card__side--back {
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
}

.card__side--back-1 {
  background: linear-gradient(-45deg, #64b5f6, #f403d1);
}

.card__side--back-2 {
  background: linear-gradient(-45deg, #ffec61, #f321d7);
}

.card__side--back-3 {
  background: linear-gradient(-45deg, #9a4eff, #24ff72);
}



.card__title {
  height: 10rem;
  padding: 4rem 2rem 2rem;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.card__title--1 .fas {
  font-size: 1rem;
}

.card__title--2 .fas {
  font-size: 1rem;
}

.card__title--3 .fas {
  font-size: 5rem;
}

.card__heading {
  font-size: 3rem;
  font-weight: 300;
  text-transform: uppercase;
  text-align: center;
  color: #fff;
  width: 75%;
}

.card__heading-span {
  padding: 1rem 1.5rem;
  -webkit-box-decoration-break: clone;
  box-decoration-break: clone;
}

.card__details {
  padding: 0 2rem 2rem;
}

.card__details ul {
  list-style: none;
  width: 80%;
  margin: 0 auto;
}

.card__details ul li {
  text-align: center;
  font-size: 1.5rem;
  padding: 1rem;
}

.card__details ul li:not(:last-child) {
  border-bottom: 1px solid #eee;
}

	</style>
@endsection
@section('content')


<!-- Banner Start -->
<div class="page-banner" style="background-image: url(../../Frontend/uploads/page-banner-2.jpg)">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-text">
					<h1>Agent Details</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner End -->




<section class="contact-v1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-normal">
					<h2>Contact Information</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
			
					  <div class="">
						<div class="card">
						  <div class="card__side card__side--front-1">
							<div class="card__title card__title--1">
							  {{-- <i class="fas fa-paper-plane"></i>
							  <img src="{{asset('assets/rodcem/1profile.png')}}" alt=""> --}}
							  <h4 class="card__heading">Personal Info</h4>
							</div>
			  
							<div class="card__details">
							  <ul>
								<li>{{$agent->name ?? ''}}</li>
								<li>{{$agent->phone_number ?? ''}}</li>
								<li>{{$agent->email ?? ''}}</li>
                @if ($agent && $agent->present_info) 
                  @php
                  //  dd($agent->present_info->division->name);
                  //  dd($agent->present_info->district->name);
                  //  dd($agent->present_info->->name);
                  @endphp                 
								  {{-- <li>{{$agent->present_info->divission->name}}, {{$agent->present_info->district->name}}, {{$agent->present_info->upazila->name}}, {{$agent->present_info->union->name}}</li> --}}
                @endif
		
							  </ul>
							</div>
						  </div>

						</div>
					  </div>
				
			</div>
			<div class="col-md-5">
				{{-- <h5>Shop Location</h5> --}}
				<div class="google-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84040262736!2d-74.25819605476612!3d40.70583158628177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1485712851643" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>				</div>
			</div>

		</div>
	</div>
</section>




@endsection
