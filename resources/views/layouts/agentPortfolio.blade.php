<!DOCTYPE html>
<html dir="ltr" lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />


	<!-- Showing the SEO related meta tags data -->
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>RodCem @yield('page_title') </title>
	  <!-- bootstrap  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	{{--    icon--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<!-- Favicon -->
	<link href="{{ asset('Frontend/uploads/favicon.png') }}" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="{{ asset('Frontend/css/custom.css') }}">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('Frontend/css/slicknav.css') }}">
	<link rel="stylesheet" href="{{ asset('Frontend/css/superfish.css') }}">
	<link rel="stylesheet" href="{{ asset('Frontend/css/animate.css') }}">

	<link rel="stylesheet" href="{{ asset('Frontend/css/jquery.bxslider.css') }}">	
	<link rel="stylesheet" href="{{ asset('Frontend/css/hover.css') }}">
	<link rel="stylesheet" href="{{ asset('Frontend/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('Frontend/css/responsive.css') }}">
	<link rel="stylesheet" href="{{ asset('Frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('Frontend/css/main.css') }}">

	<script src="{{ asset('Frontend/js/modernizr.min.js') }}"></script>
	<style>
		.header-navbar .navbar-container ul.navbar-nav li.dropdown-cart .badge.badge-up, .header-navbar .navbar-container ul.navbar-nav li.dropdown-notification .badge.badge-up {
		right: -3px;
		}
		.badge.badge-up {
			position: absolute;
			top: 32px;
			right: 12px;
			min-width: 1.429rem;
			min-height: 1.429rem;
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: center;
			-webkit-align-items: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-pack: center;
			-webkit-justify-content: center;
			-ms-flex-pack: center;
			justify-content: center;
			font-size: 0.786rem;
			line-height: 0.786;
			padding-left: 0.25rem;
			padding-right: 0.25rem;
		}
		.badge {
			color: #FFFFFF;
		}
		.badge-primary {
			color: #FFFFFF;
			background-color: #2D6CA4;
		}
		.ecommerce-card{
		padding: 0;
		/* width:50%;
		width:50%; */
		}
		.card-text {
		/* padding: 10px 15px; */
		padding: 0px;
		background: #fff;
		font-size: 14px;
		color: #2D6CA4;
		}
		.grid-view {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr 1fr ;
		-webkit-column-gap: 2rem;
		-moz-column-gap: 2rem;
		column-gap: 2rem;
		row-gap: 2rem;
		}
		.owl-carousel .owl-dot, .owl-carousel .owl-nav .owl-next, .owl-carousel .owl-nav .owl-prev{
		display: none;
		opacity: 0;
		}
		.active{
			color:#F58753;
		}
		.
element.style {
}
[type=reset], [type=submit], button, html [type=button] {
    -webkit-appearance: button;
}
.custom_btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
	</style>
	@yield('custom_css')

	  <!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>

<body>

	<div id="fb-root"></div>
	<script>
		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = "../../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<div class="page-wrapper">

		<!-- Top Bar Start -->
		@include('layouts.topbar')
		<!-- Top Bar End -->

		<!-- Header Start -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-4 logo">
						<a href="{{ route('front') }}"><img class="img-thumbnail" src="{{ asset('assets/rodcem/logo.png') }}" alt=""
								style="font: size 80px;"></a>
					</div>
					<div class="col-md-8 nav-wrapper">
					
					{{-- <img width="30" src="{{asset('assets/rodcem/logo.png')}}" alt=""> --}}
					@include('Inc.nav')

					</div>
				</div>
			</div>
		</header>
		<!-- Header End -->


		@yield('content')


		<!-- Footer Main Start -->
		@include('layouts.footer')
		<!-- Footer Main End -->


		<!-- Footer Bottom Image Start -->
		<section class="footer-bottom">
			<div class="container">
				<div class="row">
					<img src="{{asset('assets/rodcem/footer.png')}}" alt="">
			</div>
		</section>
		<!-- Footer Bottom Image End -->
		<!-- Footer Bottom  Start -->
		<section class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12 copyright" style="text-align: center;">
						Copyright@2023 all rights reserved by RodCem </div>
				</div>
			</div>
		</section>
		<!-- Footer Bottom End -->

		<a href="#" class="scrollup">
			<i class="fa fa-angle-up"></i>
		</a>

	</div>

  <!-- bootstrap js  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Scripts -->
	<script src="{{ asset('Frontend/js/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/hoverIntent.js') }}"></script>
	<script src="{{ asset('Frontend/js/superfish.js') }}"></script>
	<script src="{{ asset('Frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/owl.animate.js') }}"></script>
	<script src="{{ asset('Frontend/js/wow.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/jquery.mixitup.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/custom.js') }}"></script>
	@yield('custom_js')

	{{-- <script type="text/javascript">
		var Tawk_API = Tawk_API || {},
			Tawk_LoadStart = new Date();
		(function () {
			var s1 = document.createElement("script"),
				s0 = document.getElementsByTagName("script")[0];
			s1.async = true;
			s1.src = 'https://embed.tawk.to/5a7c31ded7591465c7077c48/default';
			s1.charset = 'UTF-8';
			s1.setAttribute('crossorigin', '*');
			s0.parentNode.insertBefore(s1, s0);
		})();
	</script> --}}

	<script>
		function showSwal(mode, message) {
		Swal.fire({
			title: message,
			icon: mode,
			toast: true,
			position: 'top-end',
			timer: '5000'
		})
		}

		if("{{ session('success') }}") showSwal('success', "{{ session('success') }}")
		if("{{ session('error') }}") showSwal('error', "{{ session('error') }}")
		if("{{ session('warning') }}") showSwal('warning', "{{ session('warning') }}")

		function destroy(url) {
		fetch(url, {
			method: "DELETE",
			headers: {
			"X-CSRF-Token": document.getElementsByName('csrf-token')[0]?.content
			}
		})
		.then(response => response.json())
		.then(data => {
			if(data == 1) location.reload()
		})
		.catch(error => console.log(error))
		}
	</script>
</body>

<!-- Mirrored from envato.arefindev.com/construct/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Dec 2022 05:17:52 GMT -->

</html>




