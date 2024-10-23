  <!-- latest jquery-->
    <script src="{{asset('premium/assets')}}/js/jquery-3.6.0.min.js"></script>

    <!-- jquery ui-->
    <script src="{{asset('premium/assets')}}/js/jquery-ui.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('premium/assets')}}/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="{{asset('premium/assets')}}/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="{{asset('premium/assets')}}/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="{{asset('premium/assets')}}/js/feather/feather.min.js"></script>
    <script src="{{asset('premium/assets')}}/js/feather/feather-icon.js"></script>

    <!-- Lazyload Js -->
    <script src="{{asset('premium/assets')}}/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="{{asset('premium/assets')}}/js/slick/slick.js"></script>
    <script src="{{asset('premium/assets')}}/js/slick/slick-animation.min.js"></script>
    <script src="{{asset('premium/assets')}}/js/slick/custom_slick.js"></script>

    <!-- Auto Height Js -->
    <script src="{{asset('premium/assets')}}/js/auto-height.js"></script>

    <!-- Timer Js -->
    <script src="{{asset('premium/assets')}}/js/timer1.js"></script>

    <!-- Fly Cart Js -->
    <script src="{{asset('premium/assets')}}/js/fly-cart.js"></script>

    <!-- Quantity js -->
    <script src="{{asset('premium/assets')}}/js/quantity-2.js"></script>

    <!-- WOW js -->
    <script src="{{asset('premium/assets')}}/js/wow.min.js"></script>
    <script src="{{asset('premium/assets')}}/js/custom-wow.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- script js -->
    <script src="{{asset('premium/assets')}}/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- thme setting js -->
 <script src="{{asset('premium/assets')}}/js/theme-setting.js"></script>
    {{-- toastr  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        toastr.options.progressBar = true;
        toastr.options.closeMethod = 'fadeOut';
        toastr.options.closeDuration = 300;
        toastr.options.closeEasing = 'swing';
    </script>
    @if (session('success'))
        <script>
              toastr.info("{{session("success")}}");
        </script>
    @endif
    @if (session('error'))
        <script>
              toastr.error("{{session("error")}}");
        </script>
    @endif
    @if (session('warning'))
        <script>
              toastr.warning("{{session("warning")}}");
        </script>
    @endif
    {{-- @if (session('user_email_exists'))
        <script>
              toastr.warning("{{session("user_email_exists")}}");
        </script>
    @endif
    @if (session('user_phone_exists'))
        <script>
              toastr.warning("{{session("user_phone_exists")}}");
        </script>
    @endif --}}
