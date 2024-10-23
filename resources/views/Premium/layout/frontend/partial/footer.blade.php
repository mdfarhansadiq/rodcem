<footer class="section-t-space">
        <div class="container-fluid-lg">
            {{-- <div class="service-section">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="service-contain">
                            <div class="service-box">
                                <div class="service-image">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/product.svg" class="blur-up lazyloaded" alt="">
                                </div>

                                <div class="service-detail">
                                    <h5>Every Fresh Products</h5>
                                </div>
                            </div>

                            <div class="service-box">
                                <div class="service-image">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/delivery.svg" class="blur-up lazyloaded" alt="">
                                </div>

                                <div class="service-detail">
                                    <h5>Free Delivery For Order Over $50</h5>
                                </div>
                            </div>

                            <div class="service-box">
                                <div class="service-image">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/discount.svg" class="blur-up lazyloaded" alt="">
                                </div>

                                <div class="service-detail">
                                    <h5>Daily Mega Discounts</h5>
                                </div>
                            </div>

                            <div class="service-box">
                                <div class="service-image">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/svg/market.svg" class="blur-up lazyloaded" alt="">
                                </div>

                                <div class="service-detail">
                                    <h5>Best Price On The Market</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="main-footer section-b-space section-t-space">
                <div class="row g-md-4 g-3">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer-logo">
                            <div class="theme-logo">
                                <a href="{{ route('front') }}">
                                    <img src="{{ asset('premium/assets') }}/images/logo/1.png" class="blur-up lazyload"
                                        alt="">
                                </a>
                            </div>

                            <div class="footer-logo-contain">
                                <p>{{ general_setting()->footer_description ?? '' }}</p>

                                <ul class="address">
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                        <a href="javascript:void(0)">{{ general_setting()->address ?? '' }}</a>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <a href="javascript:void(0)">{{ general_setting()->email ?? '' }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-title">
                            <h4>Categories</h4>
                        </div>

                        <div class="footer-contain">
                            <ul>
                                @foreach (footer_category() as $item)
                                    <li>
                                        <a href="#" class="text-content">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl col-lg-2 col-sm-3">
                        <div class="footer-title">
                            <h4>Useful Links</h4>
                        </div>

                        <div class="footer-contain">
                            <ul>
                                <li>
                                    <a href="{{ route('front') }}" class="text-content">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}" class="text-content">Shop</a>
                                </li>
                                <li>
                                    <a href="{{ route('about.us') }}" class="text-content">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('our.blog') }}" class="text-content">News</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact.us') }}" class="text-content">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-sm-3">
                        <div class="footer-title">
                            <h4>Privacy & Policy</h4>
                        </div>

                        <div class="footer-contain">
                            <ul>
                                <li>
                                    <a href="{{route('our.policy')}}" class="text-content">Policy</a>
                                </li>
                                <li>
                                    <a href="{{route('terms.condation')}}" class="text-content">Terms & Conditions</a>
                                </li>
                                <li>
                                    <a href="{{route('cancellation.policy')}}" class="text-content">Cancellation Policy</a>
                                </li>
                                <li>
                                    <a href="{{route('return.policy')}}" class="text-content">Return Policy</a>
                                </li>
                                <li>
                                    <a href="{{route('refund.policy')}}" class="text-content">Refund Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer-title">
                            <h4>Contact Us</h4>
                        </div>

                        <div class="footer-contact">
                            <ul>
                                <li>
                                    <div class="footer-number">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        <div class="contact-number">
                                            <h6 class="text-content">Hotline 24/7 :</h6>
                                            <h5><a href="tel:{{ general_setting()->phone ?? '' }}">{{ general_setting()->phone ?? '' }}</a></h5>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="footer-number">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <div class="contact-number">
                                            <h6 class="text-content">Email Address :</h6>
                                            <h5><a href="mailto:{{ general_setting()->email ?? '' }}">{{ general_setting()->email ?? '' }}</a></h5>
                                        </div>
                                    </div>
                                </li>

                                <li class="social-app mb-0">
                                    <h5 class="mb-2 text-content">Download App :</h5>
                                    <ul>
                                        <li class="mb-0">
                                            <a href="https://play.google.com/store/apps" target="_blank">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/playstore.svg" class="blur-up lazyloaded" alt="">
                                            </a>
                                        </li>
                                        <li class="mb-0">
                                            <a href="https://www.apple.com/in/app-store/" target="_blank">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/appstore.svg" class="blur-up lazyloaded" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <section class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <img src="{{asset('assets')}}/rodcem/footer.png">
                        </div>
                    </div>
                </section>
            <div class="sub-footer section-small-space">
                <div class="reserve">
                    <h6 class="text-content">©2023 Rodcem LTD All rights reserved</h6>
                </div>

                <div class="payment">
                    {{-- <img src="../assets/images/payment/1.png" class="blur-up lazyloaded" alt=""> --}}
                    {{-- <img src="{{asset('assets')}}/rodcem/footer.png"> --}}
                    {{-- <section class="footer-bottom">
                        <div class="container">
                            <div class="row">
                                <img src="{{asset('assets')}}/rodcem/footer.png">
                            </div>
                        </div>
                    </section> --}}
                </div>

                <div class="social-link">
                    <h6 class="text-content">Stay connected :</h6>
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/Rodcembd/" target="_blank">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
