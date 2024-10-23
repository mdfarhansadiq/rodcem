@extends('layouts.agentPortfolio')
@section('page_title')
   | {{$agent->name}} | Portfolio
@endsection
@section('custom_css')

    <!-- CSS Begins
    ================================================== -->
    <!-- Google Font And Custom Font Start -->
    <link href="{{asset('agent/portfolio')}}/https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">

    <!-- FONT ICONS -->
    <!-- font-awesome -->
    <link href="{{asset('agent/portfolio')}}/css/font-awesome.min.css" rel="stylesheet">
    <!-- IonIcons -->
    <link href="{{asset('agent/portfolio')}}/icon/ionicons/css/ionicons.css" rel="stylesheet">
    <!-- Elegant Icons -->
    <link href="{{asset('agent/portfolio')}}/icon/elegant-icons/style.css" rel="stylesheet">
    <!--/ FONT ICONS -->

    <!--Animate Effect-->
    <link href="{{asset('agent/portfolio')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('agent/portfolio')}}/css/hover.css" rel="stylesheet">

    <!--prettyPhoto for Image Preview-->
    <link href="{{asset('agent/portfolio')}}/css/prettyPhoto.css" rel="stylesheet">

    <!--Owl Carousel -->
    <link href="{{asset('agent/portfolio')}}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('agent/portfolio')}}/css/owl.theme.css" rel="stylesheet">
    <link href="{{asset('agent/portfolio')}}/css/owl.transitions.css" rel="stylesheet">

    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="{{asset('agent/portfolio')}}/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('agent/portfolio')}}/css/nivo-preview.css" type="text/css" media="screen" />

    <!--BootStrap -->
    <link href="{{asset('agent/portfolio')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('agent/portfolio')}}/css/normalize.css" rel="stylesheet">

    <!--Preloader -->
    <link href="{{asset('agent/portfolio')}}/css/preloader.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="{{asset('agent/portfolio')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('agent/portfolio')}}/css/responsive.css" rel="stylesheet">

    <!--DEFAULT COLOR/ CURRENTLY USING , Replace Your Color-->
    <link rel="stylesheet" href="css/colors/cyan.css">
    <!--Replace Your Color Ends-->

    <!-- Template Demo Color  Examples -->
  <!-- Switcher Styles-->
  <link rel="stylesheet" id="switcher-css" type="text/css" href="{{asset('agent/portfolio')}}/css/switcher.css" media="all" />
  <!-- END Switcher Styles -->

  <!-- Template Color Demo Examples -->
  <link rel="alternate stylesheet" type="text/css" href="{{asset('agent/portfolio')}}/css/colors/green.css" title="alternate" media="all" /><!--green Color-->
  <link rel="alternate stylesheet" type="text/css" href="{{asset('agent/portfolio')}}/css/colors/golden.css" title="next" media="all" /><!--golden Color-->
  <link rel="alternate stylesheet" type="text/css" href="{{asset('agent/portfolio')}}/css/colors/cyan.css" title="author" media="all" /><!--cyan Color-->
  <link rel="alternate stylesheet" type="text/css" href="{{asset('agent/portfolio')}}/css/colors/blue.css" title="bookmark" media="all" /><!--blue Color-->
  <link rel="alternate stylesheet" type="text/css" href="{{asset('agent/portfolio')}}/css/colors/pink.css" title="help" media="all" /><!--pink Color-->
  <link rel="alternate stylesheet" type="text/css" href="{{asset('agent/portfolio')}}/css/colors/orchid.css" title="prefetch" media="all" /><!--orchid Color-->
  <!-- END Template Color Demo Examples -->
  <style>
    .port-titl-big {
    font-size: 50px;
    letter-spacing: 7px;
    /* line-height: 101px; */
    text-transform: uppercase;
    }
    .slider-area .big-title span.title-builder {
    color: #000;
    line-height: 52px;
    text-align: center;
}
.port-titl-sml {
    font-size: 25px;
    letter-spacing: 4px;
}
  </style>
@endsection
@section('content')
{{-- @php
    dd($agent->agent_about())
@endphp --}}
         <!-- Start: Preloader section
==========================-->
    <div id="preloader"></div>

    <!-- End: Preloader section
==========================-->
{{-- @php
dd($agent->agent_banner->image);
@endphp --}}
    <!-- Start: Header Section
=============================================-->
    <!-- slider -->
    <div class="slider-area trainer-slid" id="page-top">
        <div class="bend niceties preview-2">
            <div class="slides" id="ensign-nivoslider">
                <!-- slider image-->
                <img alt="image" src="{{asset('agent/portfolio')}}/images/slider/slide1.jpg" title="#slider-direction-1"> <img alt="image" src="{{asset('agent/portfolio')}}/images/slider/slide1.jpg" title="#slider-direction-1">
            </div>
            <!-- end : slider image-->
            <div class="t-cn slider-direction" id="slider-direction-1">
                <div class="slider-progress"></div>
                <div class="col-md-4 slid_man wow fadeInRight" data-wow-delay="0.3s" id="scene">
                    <img alt="team" class="img-responsive layer" data-depth="0.90" src="{{($agent && $agent->agent_banner) ? asset('agent/portfolio/banner/'.$agent->agent_banner->image) : asset('agent/portfolio/images/slider/slide_man.png')}}">
                </div>
                <div class="slider-content t-cn s-tb slider-1 col-lg-6 col-lg-offset-2 col-md-6 ">
                    <!-- slider content-->
                    <div class="title-container s-tb-c title-compress">

                        <div class="tp-caption big-title rs-title customin customout bg-sld-cp-primary wow fadeInDown" data-wow-delay="0.2s" data-wow-duration="2s">
                            <span class="title-builder port-titl-sml">টেনশন এখন কম</span>
                            <br>
                            <span  class="slide-tit port-titl-big wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="2s">rodcem.com</span>
                            {{-- <span style="font-size:60px" class="slide-tit port-titl-big wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="2s">rodcem.com</span> --}}
                        </div>
                    </div>
                </div>
                <!-- end : slider content-->

            </div>

        </div>
    </div>
    <!-- slider end-->
    <!-- End: Header Section
==================================================-->



    <!-- Start: About Section
==================================================-->
    <section class="about_process">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1 col-sm-6 col-xs-12">
                    <div class="abt-left">
                        <img alt="" class="" src="{{($agent && $agent->agent_about->image) ? asset('agent/portfolio/about/'.$agent->agent_about->image) : asset('agent/portfolio/images/about/ab1.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="abt-rght">
                        <p class="abt-pra">{{$agent->agent_about->heading ?? "We made a perfect site for your business Lorem ipsum dolor sit amet consectetur adipisicing elit" }} </p>
                        <p class="abt-pra2">{{$agent->agent_about->heading ?? "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting" }} </p>
                    </div>
                    <div class="abt-rght">
                        <p class="abt-pra"><i class="fa fa-map-marker" aria-hidden="true"></i> {{($agent && $agent->shop_info) ? $agent->shop_info->shop_address : 'your shop location'}}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End: About Section
==================================================-->


    <!-- Start: Service Section
==================================================-->
@if (count($services) != 0)
    <section class="medical-guide-section" id="medical-guide">
        <div class="container">
            <!-- Start: Heading -->
            <div class="base-header">
                <h3><span class="header-sign">02</span> <span class="head_title">. Services</span></h3>
            </div>
            <!-- End: Heading -->
            <div class="row">
                <ul class="nav nav-tabs" id="myTab">
                    @foreach ($services as $row )
                        <li class="{{$loop->index == 0 ? 'active' : ''}}">
                            <a data-target="#service_{{$row->id}}" data-toggle="tab">{{$row->category}} </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($services as $row )
                        <div class="tab-pane {{$loop->index == 0 ? 'active' : ''}}" id="service_{{$row->id}}">
                            <div class="guide-all-list">
                                <!-- Work Item 1 -->
                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="guide-item-img">
                                        <div class="guide-item"><img alt="" class="" src="{{($agent && $agent->agent_image) ? asset('agent/portfolio/image/'.$agent->agent_image->service_image) : asset('agent/portfolio/images/services/s1.jpg')}}">

                                        </div>
                                    </div>
                                </div>
                                <!--/ End: Work Item 1 -->
                                <!-- Work Item 2 -->
                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="guide-item">
                                        <h3 class="title" style="color:#333">{{$row->title}}</h3>
                                        <div class="guide-list" style="color: rgba(39, 39, 39, 0.7);">
                                            {!! $row->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/Item 1 -->
                        </div>
                    @endforeach
                </div>
            </div>
            <!---/.row -->
        </div>
        <!--/.container -->
    </section>
@else
    <section class="medical-guide-section" id="medical-guide">
        <div class="container">
            <!-- Start: Heading -->
            <div class="base-header">
                <h3><span class="header-sign">02</span> <span class="head_title">. Our Services</span></h3>
            </div>
            <!-- End: Heading -->
            <div class="row">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-target="#allergist" data-toggle="tab">Bisiness </a>
                    </li>
                    <li>
                        <a data-target="#neurologist" data-toggle="tab">Consulting </a>
                    </li>
                    <li>
                        <a data-target="#pathologists" data-toggle="tab">Design</a>
                    </li>
                    <li>
                        <a data-target="#physiatrist" data-toggle="tab">Development </a>
                    </li>
                    <li>
                        <a data-target="#surgeons" data-toggle="tab">Writting</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="allergist">
                        <div class="guide-all-list">
                            <!-- Work Item 1 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item-img">
                                    <div class="guide-item"><img alt="" class="" src="{{asset('agent/portfolio/images/services/s1.jpg')}}">
                                    </div>
                                </div>
                            </div>
                            <!--/ End: Work Item 1 -->
                            <!-- Work Item 2 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item">
                                    <h3 class="title">Do I have to purchase private health insurance?</h3>
                                    <!-- /.title -->
                                    <p class="description">Doctors Select Health & Medical Information for Papua New Guinea Doctors Select Health & Medical</p>
                                    <!-- /.description -->
                                    <ul class="guide-list">
                                        <li>
                                            <p>We are a network of board certified physician interventional</p>
                                        </li>
                                        <li>
                                            <p>Doctors Select Health & Medical Information for Papua New Guinea</p>
                                        </li>
                                        <li>
                                            <p>Please visit the other pages on this site to learn everything</p>
                                        </li>
                                        <li>
                                            <p>We are a network of board certified physician interventional</p>
                                        </li>
                                    </ul><a class="btn btn-one hvr-shutter-in-horizontal" href="work.html" title="View More">View More</a>
                                </div>
                            </div>
                        </div>
                        <!--/Item 1 -->
                    </div>
                    <div class="tab-pane" id="neurologist">
                        <div class="guide-all-list">
                            <!-- Work Item 1 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item-img">
                                    <div class="guide-item"><img alt="" class="" src="images/services/s1.jpg">
                                    </div>
                                </div>
                            </div>
                            <!--/ End: Work Item 1 -->
                            <!-- Work Item 2 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item">
                                    <h3 class="title">Do I have to purchase private health insurance?</h3>
                                    <!-- /.title -->
                                    <p class="description">Doctors Select Health & Medical Information for Papua New Guinea Doctors Select Health & Medical</p>
                                    <!-- /.description -->
                                    <ul class="guide-list">
                                        <li>
                                            <p>We are a network of board certified physician interventional</p>
                                        </li>
                                        <li>
                                            <p>Doctors Select Health & Medical Information for Papua New Guinea</p>
                                        </li>
                                        <li>
                                            <p>Please visit the other pages on this site to learn everything</p>
                                        </li>
                                        <li>
                                            <p>We are a network of board certified physician interventional</p>
                                        </li>
                                    </ul><a class="btn btn-one hvr-shutter-in-horizontal" href="work.html" title="View More">View More</a>
                                </div>
                            </div>
                        </div>
                        <!--/Item 2 -->
                    </div>
                    <div class="tab-pane" id="pathologists">
                        <div class="guide-all-list">
                            <!-- Work Item 1 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item-img">
                                    <div class="guide-item"><img alt="" class="" src="images/services/s1.jpg">
                                    </div>
                                </div>
                            </div>
                            <!--/ End: Work Item 1 -->
                            <!-- Work Item 2 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item">
                                    <h3 class="title">Do I have to purchase private health insurance?</h3>
                                    <!-- /.title -->
                                    <p class="description">Doctors Select Health & Medical Information for Papua New Guinea Doctors Select Health & Medical</p>
                                    <!-- /.description -->
                                    <ul class="guide-list">
                                        <li>
                                            <p>We are a network of board certified physician interventional</p>
                                        </li>
                                        <li>
                                            <p>Doctors Select Health & Medical Information for Papua New Guinea</p>
                                        </li>
                                        <li>
                                            <p>Please visit the other pages on this site to learn everything</p>
                                        </li>
                                        <li>
                                            <p>We are a network of board certified physician interventional</p>
                                        </li>
                                    </ul><a class="btn btn-one hvr-shutter-in-horizontal" href="work.html" title="View More">View More</a>
                                </div>
                            </div>
                        </div>
                        <!--/Item 3 -->
                    </div>
                    <div class="tab-pane" id="physiatrist">
                        <div class="guide-all-list">
                            <!-- Work Item 1 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item-img">
                                    <div class="guide-item"><img alt="" class="" src="images/services/s1.jpg">
                                    </div>
                                </div>
                            </div>
                            <!--/ End: Work Item 1 -->
                            <!-- Work Item 2 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item">
                                    <h3 class="title">Do I have to purchase private health insurance?</h3>
                                    <!-- /.title -->
                                    <p class="description">Doctors Select Health & Medical Information for Papua New Guinea Doctors Select Health & Medical</p>
                                    <!-- /.description -->
                                    <ul class="guide-list">
                                        <li>
                                            <p>We are a network of board certified physician interventional</p>
                                        </li>
                                        <li>
                                            <p>Doctors Select Health & Medical Information for Papua New Guinea</p>
                                        </li>
                                        <li>
                                            <p>Please visit the other pages on this site to learn everything</p>
                                        </li>
                                        <li>
                                            <p>We are a network of board certified physician interventional</p>
                                        </li>
                                    </ul><a class="btn btn-one hvr-shutter-in-horizontal" href="work.html" title="View More">View More</a>
                                </div>
                            </div>
                        </div>
                        <!--/Item 4 -->
                    </div>
                    <div class="tab-pane" id="surgeons">
                        <div class="guide-all-list">
                            <!-- Work Item 1 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item-img">
                                    <div class="guide-item"><img alt="" class="" src="images/services/s1.jpg">
                                    </div>
                                </div>
                            </div>
                            <!--/ End: Work Item 1 -->
                            <!-- Work Item 2 -->
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="guide-item">
                                    <h3 class="title">Jeff , One of the best Consulting Center.</h3>
                                    <!-- /.title -->
                                    <p class="description">Body Builder Perfect There are many things to consider when deciding on a new garage or addition: size, the relationship to the home, traffic flow, </p>
                                    <!-- /.description -->
                                    <ul class="guide-list">
                                        <li>
                                            <p>Renovation services interventional</p>
                                        </li>
                                        <li>
                                            <p>Loren ipsum dolor sit amet, consectetur adipiscing elit sed do </p>
                                        </li>
                                        <li>
                                            <p>Loren ipsum dolor sit amet, consectetur adipiscing elit sed do </p>
                                        </li>
                                        <li>
                                            <p>Loren ipsum dolor sit amet, consectetur adipiscing elit sed do </p>
                                        </li>
                                    </ul><a class="btn btn-one hvr-shutter-in-horizontal" href="work.html" title="View More">Take this</a>
                                </div>
                            </div>
                        </div>
                        <!--/Item 5 -->
                    </div>
                </div>
            </div>
            <!---/.row -->
        </div>
        <!--/.container -->
    </section>
@endif
    <!-- End: Service Section
==================================================-->

    <!-- Start: Get Touch Section
==================================================-->
    <section class="get-touch-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 get-touch-text">
                    <div class="get-touch-warper">
                        <h3 class="hs1">Reserve Trial</h3>
                        <h4 class="lp5">Shape your body and improve your health</h4>
                        <p>Loren ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipiscing elit, sed do adipiscing eiusmod</p>
                    </div>
                    <!--End: get-touch-warper-->
                    {{-- <div class="get-touch-button text-center">
                        <a class="btn btn-one" href="contact.html" title="Read More">Free Trial</a>
                    </div> --}}
                    <!--End: get-touch-button-->
                </div>
            </div>
        </div>
    </section>
    <!-- End: Get Touch Section
==================================================-->


    <!-- Start: Choose Us Section
==================================================-->
    @if ($agent && $agent->agent_chooes->count() != 0)
        <section class="chooseus-section">
            <div class="container">
                <div class="row">
                    <div class="chooseus-warper col-lg-6 col-sm-7 col-xs-12">
                        <div class="base-header">
                            <h3><span class="header-sign">03</span> <span class="head_title">. Choose Me ? </span></h3>
                        </div>
                        <div class="chooseus-warper2">
                                @foreach ($agent->agent_chooes as $chooes )
                                    <div class="col-lg-12 chooseus-item">
                                        <div class="chooseus-icon">
                                            <img width="60" src="{{asset('agent/portfolio/choose/icon.svg')}}" alt="">
                                        </div>
                                        <div class="chooseus-content">
                                            <h5><a href="#">{{$chooes->title}}</a></h5>
                                            <p>{{$chooes->description}}</p>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12">
                        <div class="chooseus-left"><img alt="choose" src="{{($agent && $agent->agent_image) ? asset('agent/portfolio/image/'.$agent->agent_image->choose_us_image) : asset('agent/portfolio/images/background/choose-trainr.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="chooseus-section">
            <div class="container">
                <div class="row">
                    <div class="chooseus-warper col-lg-6 col-sm-7 col-xs-12">
                        <!-- Start: Heading -->
                        <div class="base-header">
                            <h3><span class="header-sign">04</span> <span class="head_title">. Choose Us ? </span></h3>
                        </div>
                        <!-- End: Heading -->
                        <div class="chooseus-warper2">
                            <!-- Start: .chooseus-item -->
                            <div class="col-lg-12 chooseus-item">
                                <div class="chooseus-icon">
                                    <a href="#"><i class="icon_cloud_alt"></i></a>
                                </div>
                                <div class="chooseus-content">
                                    <h5><a href="#">Expert Trainer</a></h5>
                                    <p>Loren ipsum dolor consectetur adipiscing elit, sed do eiusmod tempor incididunt know you</p>
                                </div>
                            </div>
                            <!-- End: .chooseus-item  -->
                            <!-- Start: .chooseus-item -->
                            <div class="col-lg-12 chooseus-item">
                                <div class="chooseus-icon">
                                    <a href="#"><i class="icon_lightbulb_alt"></i></a>
                                </div>
                                <div class="chooseus-content">
                                    <h5><a href="#">Professional Builder</a></h5>
                                    <p>Loren ipsum dolor consectetur adipiscing elit, sed do eiusmod tempor incididunt know you</p>
                                </div>
                            </div>
                            <!-- End: .chooseus-item  -->
                        </div>
                    </div>
                    <!-- /.chooseus-warper-->

                    <div class="col-lg-6 col-sm-5 col-xs-12">
                        <div class="chooseus-left">
                            <img alt="choose" src="{{asset('agent/portfolio/images/background/choose-trainr.jpg')}}">
                        </div>
                        <!-- End: chooseus-left -->
                    </div>
                </div>
                <!-- /. row -->
            </div>
            <!-- /. container -->
        </section>
    @endif

    <!-- End: Choose Us Section
==================================================-->

    <!-- Start: contact  Section
==================================================-->
<section class="contact-section" id="contact">
  <div class="container">
      <div class="row">
          <div class="contact-form-warper">
              <div class="col-lg-10 col-lg-offset-1 col-sm-12 col-xs-12 contact-warper">
                  <div class="base-header">
                      <h3><span class="header-sign">04</span><span class="head_title"> . Get In Tuch</span></h3>
                  </div>
                  <!--  Contact Form  -->
                  <div class="contact-form">
                      <form action="{{route('agent.portfolio.contact.store')}}" id="contactForm" method="post" name="contactForm">
                        @csrf
                            <input type="hidden" name="agent_id" value="{{$agent->id ?? ''}}">
                          <div class="form-group col-lg-4">
                              <input class="form-control" id="Name" name="name" placeholder="Name :" type="text">
                          </div>
                          <div class="form-group col-lg-4">
                              <input class="form-control" id="Email" name="email" placeholder="Email :" type="text">
                          </div>
                          <div class="form-group col-lg-4">
                              <input class="form-control" id="Tel" name="phone_number" placeholder="Number :" type="text" required>
                          </div>
                          <div class="form-group col-lg-12">
                              <textarea class="form-control" id="Message" name="message" placeholder="Message :" required></textarea>
                          </div>
                          <input class="submit-button btn" name="submit" value="Submit" type="submit">
                      </form>
                  </div>
                  <!-- End:Contact Form  -->
              </div>
          </div>
      </div>
      <!-- row /- -->
  </div>
  <!-- container /- -->
</section>
<!--End Contact Section
==================================================-->
@endsection

@section('custom_js')
      <!-- Scripts
========================================-->
    <!-- jquery -->
    <script src="{{asset('agent/portfolio')}}/js/vendor/jquery-3.0.min.js" type="text/javascript"></script>
    <!-- Modernizer -->
    <script src="{{asset('agent/portfolio')}}/js/vendor/modernizr-2.6.2.min.js" type="text/javascript"></script>
    <!-- plugins -->
    <script src="{{asset('agent/portfolio')}}/js/plugins.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('agent/portfolio')}}/js/bootstrap.min.js"></script>
    <!-- Use For Animation -->
    <script src="{{asset('agent/portfolio')}}/js/wow.min.js"></script>
    <!-- Use For jquery Easing -->
    <script src="{{asset('agent/portfolio')}}/js/jquery.easing.js"></script>
    <script src="{{asset('agent/portfolio')}}/js/jquery.easing.compatibility.js"></script>
    <!-- Use For carousel -->
    <script src="{{asset('agent/portfolio')}}/js/owl.carousel.min.js"></script>
    <!-- Use For mixitup gallery -->
    <script src="{{asset('agent/portfolio')}}/js/jquery.mixitup.min.js"></script>
    <!-- Use For Image Peview -->
    <script src="{{asset('agent/portfolio')}}/js/jquery.prettyPhoto.js"></script>
    <!-- Use For single Page Nav -->
    <script src="{{asset('agent/portfolio')}}/js/jquery.singlePageNav.min.js"></script>
    <!-- Use For nivo slider -->
    <script src="{{asset('agent/portfolio')}}/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="{{asset('agent/portfolio')}}/js/nivo-home.js" type="text/javascript"></script>
    <!-- Use For parallax -->
    <script src="{{asset('agent/portfolio')}}/js/parallax.min.js"></script>
    <!--fswit Switcher   -->
	 <script src="{{asset('agent/portfolio')}}/js/fswit.js"></script>
    <!-- Custom Scripts
========================================-->
    <script src="{{asset('agent/portfolio')}}/js/main.js"></script>
@endsection
