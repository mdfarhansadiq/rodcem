@extends('layouts.front')
@section('page_title')
    About Us
@endsection
@section('custom_css')
<link rel="stylesheet" href="{{asset('assets/team')}}/css/animate.css" type="text/css"/>
<link rel="stylesheet" href="{{asset('assets/team')}}/css/owl.carousel.min.css" type="text/css"/>
<link rel="stylesheet" href="{{asset('assets/team')}}/style.css" type="text/css"/>
<style>
  .heading h2 {
    font-family: 'Merriweather', sans-serif;
    font-size: 28px;
    text-align: center;
    font-weight: 700;
    color: rgb(54 67 91);
    margin-top:20px;
  }
</style>
@endsection
@section('content')

 <!-- Banner Start -->
<div class="page-banner" style="background-image: url({{(banner_setting() && banner_setting()->about) ? asset('super/banner/about/'.banner_setting()->about) : asset('assets/rodcem/aboutus.jpg')}})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="banner-text">
          <h1>About Us</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Banner End -->


<section class="about-v2">
  <div class="container">
    <div class="row" style="margin:80px 0 80px 0">
      <p> {!!$aboutus->description ?? ''!!}  </p>
    </div>
  </div>
</section>
<div class="benefits p-tb black-bg white-sec diamond-layout">
  <div style="background:#304a79" id="gold-tech-bg">
    {{-- <canvas class="particles-js-canvas-el" width="1303" height="1233" style="width: 100%; height: 100%;"></canvas> --}}
  </div>
  <div class="container">
      <div class="row">
        <div class="heading mb-5">
          <h2 class="text-white">Benefits of Using Our Solution</h2>
          <p  class="text-white text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt ultrices. Ut quis blandit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt ultrices. Ut quis blandit dolor.</p>
        </div>
        @foreach ($benefits as $row )          
          <div class="col-lg-4 col-md-6">
              <div class="benefit-box text-center" style="height: 386px;">
                  <div class="benefit-icon">
                      <img src="{{asset('super/benefit/'.$row->image)}}" alt="Safe and Secure">
                      {{-- <img src="{{asset('assets/rodcem/ourservices/engineer-working1.svg')}}" alt="Safe and Secure"> --}}
                  </div>
                  <div class="text">
                      <h4>{{$row->title}}</h4>
                      <p>{{$row->description}}</p>
                  </div>
              </div>
          </div>
        @endforeach

          {{-- <div class="col-lg-4 col-md-6">
              <div class="benefit-box text-center" style="height: 386px;">
                  <div class="benefit-icon">
                      <img src="{{asset('assets/rodcem/ourservices/construction.svg')}}" alt="Instant Exchange">
                  </div>
                  <div class="text">
                      <h4>Construction Material</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt ultrices. Ut quis blandit dolor. Ut laoreet sagittis arcu eu tristique.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="benefit-box text-center" style="height: 386px;">
                  <div class="benefit-icon">
                      <img src="{{asset('assets/rodcem/ourservices/taka.svg')}}" alt="World Coverage">
                  </div>
                  <div class="text">
                      <h4>Save Money</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt ultrices. Ut quis blandit dolor. Ut laoreet sagittis arcu eu tristique.</p>
                  </div>
              </div>
          </div> --}}
      </div>      
  </div>
</div>

  <!-- FAQ Section start-->
  {{-- <div class="faq-section p-tb white-bg diamond-layout" id="faq">
      <div class="container">
          <div class="text-center"><h2 class="section-heading">Frequently Asked Questions</h2></div>
          <div class="heading mb-5">
            <h2>Frequently Asked Questions</h2>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div class="accordion md-accordion style-2" id="accordionEx" role="tablist" aria-multiselectable="true">
                      <div class="card">
                          <!-- Card header -->
                          <div class="card-header" role="tab" id="headingOne1">
                              <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                  <h5 class="mb-0">
                                      When would I be able to see my token balance? <i class="fas fa-caret-down rotate-icon"></i>
                                  </h5>
                              </a>
                          </div>
                          <!-- Card body -->
                          <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                              <div class="card-body">
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt ultrices. Ut quis blandit dolor. Ut laoreet sagittis arcu eu tristique.  Ut quis blandit dolor. Ut laoreet sagittis arcu eu tristique. 
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <!-- Card header -->
                          <div class="card-header" role="tab" id="headingTwo2">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                  <h5 class="mb-0">
                                      Is it possible for the citizens or residents of the US to participate in the Token Sale? <i class="fas fa-caret-down rotate-icon text-white"></i>
                                  </h5>
                              </a>
                          </div>
                          <!-- Card body -->
                          <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                              <div class="card-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              </div>
                          </div>
                      </div>
                  </div>            
              </div>
          </div>
      </div>
  </div> --}}
  <!-- FAQ Section end-->
@endsection
