<footer class="wpo-site-footer  justify-content-center" style="background:#333434">
    <div class="wpo-upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget about-widget">
                        <div class="logo widget-title">
                            {{-- <img src="{{asset('theme/assets')}}/images/logo-2.svg" alt="blog"> --}}
                            <img src="{{ asset('assets/rodcem/whiteLogo.png') }}" alt="blog">
                        </div>
                        <p>{{general_setting()->footer_description ?? ''}}</p>
                        <ul>
                            <li>
                                <a href="{{general_setting()->facebook ?? '' }}">
                                    <i class="ti-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{general_setting()->twitter ?? ''}}">
                                    <i class="ti-twitter-alt"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{general_setting()->instagram ?? ''}}">
                                    <i class="ti-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{general_setting()->youtube ?? '' }}">
                                    <i class="ti-youtube"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="contact-ft">
                            <ul>
                                <li><i class="fi flaticon-mail"></i>{{general_setting()->email ?? ''}}</li>
                                @if (general_setting() && general_setting()->email_secoend)
                                    <li><i class="fi flaticon-mail"></i>{{general_setting()->email_secoend ?? ''}}</li>
                                @endif
                                <li><i class="fi flaticon-phone"></i>{{general_setting()->phone ?? ''}}<br>{{general_setting()->phone_secoend ?? ''}}</li>
                                <li><i class="fi flaticon-pin"></i>{{general_setting()->address ?? ''}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-xl-3 col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Pages</h3>
                        </div>
                        <ul>
                            <li><a href="{{route('ecommerce.index')}}">Shop</a></li>
                            {{-- <li><a href="{{route('agents')}}">Agent</a></li> --}}
                            <li><a href="{{route('experts')}}">Expert</a></li>
                            <li><a href="{{route('company')}}">Comapny</a></li>
                            <li><a href="{{route('policy')}}">Privacy & Policy</a></li>
                            <li><a href="{{route('terms_condation')}}">Terms & Condation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="widget instagram">
                        <div class="widget-title">
                            <h3>Instagram</h3>
                        </div>
                        <ul class="d-flex">
                            <li><a href="project-single.html"><img src="{{asset('theme/assets')}}/images/instragram/1.jpg"
                                        alt=""></a></li>
                            <li><a href="project-single.html"><img src="{{asset('theme/assets')}}/images/instragram/2.jpg"
                                        alt=""></a></li>
                            <li><a href="project-single.html"><img src="{{asset('theme/assets')}}/images/instragram/4.jpg"
                                        alt=""></a></li>
                            <li><a href="project-single.html"><img src="{{asset('theme/assets')}}/images/instragram/3.jpg"
                                        alt=""></a></li>
                            <li><a href="project-single.html"><img src="{{asset('theme/assets')}}/images/instragram/4.jpg"
                                        alt=""></a></li>
                            <li><a href="project-single.html"><img src="{{asset('theme/assets')}}/images/instragram/1.jpg"
                                        alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <section class="footer-bottom">
        <div class="container">
            <div class="row">
                <img src="http://127.0.0.1:8000/assets/rodcem/footer.png" alt="">
        </div>
    </div></section>
    <div class="wpo-lower-footer">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <p class="copyright"> Copyright &copy; 2023  <a href="index-2.html">Rodcem.com</a>.
                        All
                        Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
