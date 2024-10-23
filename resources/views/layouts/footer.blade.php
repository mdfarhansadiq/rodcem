<section class="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 footer-col">
                <h3>About Us</h3>
                {{-- <p>
                    <p>
                        {{ website_setting('about') }}
                    </p>
                    <br />
                </p> --}}
                <a href="{{route('about')}}" class="text-light">ABOUT US</a><BR>
                <a href="{{route('contact')}}" class="text-light">CONTACT US</a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 footer-col">
                <h3>Our Privacy & Policy</h3>
                <a href="{{route('policy')}}" class="text-light">OUR POLICY</a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 footer-col">
                <h3>Popular News</h3>
                @foreach (latest_three() as $item )
                    <div class="news-item">
                        <div class="news-title"><a  href="{{route('news.details', $item->slug)}}">{!!Str::limit($item->short_description, 180)!!}</a></div>
                    </div>
                @endforeach
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 footer-col">
                <h3>Contact Us</h3>
                <div class="contact-item">
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <div class="text">{{ general_setting()->address ?? '' }}</div>
                </div>
                <div class="contact-item">
                    <div class="icon"><i class="fa fa-fax"></i></div>
                    <div class="text">{{ general_setting()->phone ?? ''}}</div>
                </div>
                <div class="contact-item">
                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                    <div class="text">{{ general_setting()->email ?? ''}}</div>
                </div>
            </div>
        </div>
    </div>
</section>
