<section class="themart-cta-section section-padding">
    <div class="container">
        <div class="cta-wrap">
            {{-- <img src="{{asset('theme/assets')}}/images/cta-bg.jpg" alt=""> --}}
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="cta-content">
                        <h2 style="color:#233D50">Subscribe & Stay With Us</h2>
                        <form action="{{route('subscriber.store')}}"  method="post">
                            @csrf
                            <div class="input-1">
                                <input type="email" name="email" class="form-control" placeholder="Your Email..."  required="">
                                <div class="submit clearfix">
                                    <button class="theme-btn-s2" type="submit">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> 