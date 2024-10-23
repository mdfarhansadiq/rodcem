<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wpocean.com/html/tf/themart/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Feb 2023 15:00:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    {{-- <link rel="shortcut icon" type="image/png" href="{{asset('theme/assets')}}/images/favicon.png"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('Frontend/uploads/favicon.png') }}">
    <title>@yield('title')</title>
    <link href="{{asset('theme/assets')}}/css/themify-icons.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/flaticon_ecommerce.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/owl.theme.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/slick.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/slick-theme.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/swiper.min.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/owl.transitions.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/jquery.fancybox.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/css/odometer-theme-default.css" rel="stylesheet">
    <link href="{{asset('theme/assets')}}/sass/style.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <style>
        .ui-menu{
            background: #FFF8EE;
            width:200px;
            left:400.172px;
        }
        .preloader{
            background-color: #333434;
        }
    </style>
    @yield('custom_css')
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    {{-- <img src="{{asset('theme/assets')}}/images/preloader.png" alt=""> --}}
                    {{-- <img width="90" src="{{ asset('assets/rodcem/logo.png') }}" alt=""> --}}
                    <img width="90" src="{{ asset('assets/rodcem/whiteLogo.png') }}" alt="blog">
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- start header -->
        <header id="header">
            @include('Pages.frontend.ecommerce.header')
            @include('Pages.frontend.ecommerce.menu')
        </header>
        <!-- end of header -->

        @yield('content')

        <!-- start of wpo-site-footer-section -->
        @include('layouts.master.footer')
        <!-- end of wpo-site-footer-section -->
        @stack('all_models')
    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{asset('theme/assets')}}/js/jquery.min.js"></script>
         {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{asset('theme/assets')}}/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="{{asset('theme/assets')}}/js/modernizr.custom.js"></script>
    <script src="{{asset('theme/assets')}}/js/jquery.dlmenu.js"></script>
    <script src="{{asset('theme/assets')}}/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="{{asset('theme/assets')}}/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

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

    <script>
        var availableTags = [];
        $.ajax({
            type   : 'get',
            url    : '{{route("front.search.items")}}',
            success:function(response){
                items(response)
            }
        });

        function items(availableTags)
        {
            $( "#search" ).autocomplete({
            source: availableTags
            });
        }
  </script>
    @yield('custom_js')
</body>


<!-- Mirrored from wpocean.com/html/tf/themart/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Feb 2023 15:00:28 GMT -->
</html>
