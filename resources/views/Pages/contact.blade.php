@extends('layouts.front')
@section('page_title')
    Contact
@endsection
@section('content')

<!-- Banner Start -->
<div class="page-banner" style="background-image: url({{(banner_setting() && banner_setting()->contact) ? asset('super/banner/contact/'.banner_setting()->contact) : asset('assets/rodcem/contactus.jpg')}})">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="banner-text">
					<h1>Contact Us</h1>
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
					<h2>Contact Form</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">




				<form action="{{route('contact.store')}}" class="form-horizontal cform-1" method="post">
					@csrf
					<div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
							@error('name')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{old('email')}}">
							@error('email')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{{old('phone_number')}}">
							@error('phone_number')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Message">{{old('message')}}</textarea>
							@error('message')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </div>
                    </div>
                    <div class="form-group">
	                    <div class="col-sm-12">
	                        <input type="submit" value="Save" class="btn btn-success" name="form_contact">
	                    </div>
	                </div>
				</form>
			</div>
			<div class="col-md-5">
				<div class="google-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84040262736!2d-74.25819605476612!3d40.70583158628177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1485712851643" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>				</div>
			</div>

		</div>
	</div>
</section>




@endsection
