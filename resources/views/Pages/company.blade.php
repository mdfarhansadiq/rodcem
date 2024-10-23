@extends('layouts.front')
@section('page_title')
    Company
@endsection
@section('custom_css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="heading">
        <h2>All Company</h2>
      </div>
    </div>
  </div>

<div class="partner-logo p-tb white-sec my-5" style="background:#304a79">
    <div class="container">
        <div class="partner-logo-grid mt-2">        
            @foreach($companies as $company)
            {{-- @if($company->status == 1) --}}
              <div class="item" style="border:1px solid rgba(255,255,255,0.2)">
                <a href="{{route('product',$company->slug)}}">
                  @if ($company->logo)                    
                    <img width="100" src="{{asset('company/profile/logo/'.$company->logo)}}" alt="Brand Logo 1">
                    @else
                    <img width="100" src="{{asset('assets/rodcem/brand-logo1.png')}}" alt="Brand Logo 1">
                  @endif
                </a>
              </div> 
            {{-- @endif --}}
            @endforeach
      </div>          
    </div>
</div>


</div>


<!-- content wrapper end  -->


		<!-- seller end  -->




@endsection
