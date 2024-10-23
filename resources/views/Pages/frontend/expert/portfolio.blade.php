@extends('layouts.expertPortfolio')

@section('content')



{{-- <div class="preloader bg_primary">
	<div class="preloader_area">
		<div class="loader">Loading...</div>
	</div>
</div> --}}

<section id="home_area" class="full_row p_0">
    <div class="container-fluid">
        <div class="row">  
            {{-- @if(expert_approval($expert->id)->status == 0 && !Auth('super')->check())
            <div class="form-group col-12" style="position:absolute;z-index:2;left:0;right:0">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{expert_approval($expert->id)->message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif --}}
			<div class="slider">
                {{-- @if ($banner && $banner->banner_image)                    
				    <img src="{{asset('expert/portfolio/banner/'.$banner->banner_image)}}" alt="...">
				@else --}}
                <div style="position: relative">
                    <img src="{{asset('assets/expert/portfolio')}}/images//width/1.png" alt="...">
                </div>
                <div class="" style="position: absolute; bottom:0;right:0">       
                    @if ($banner && $banner->banner_image)                                            
                        <img style="width:80%;" src="{{asset('expert/portfolio/banner/'.$banner->banner_image)}}" alt="">
                    @else
                        <img style="width:80%;" src="{{asset('assets/rodcem/defaultPortfolioImage.png')}}" alt="">
                    @endif
                </div>
				<div class="slider-caption1">
					<div class="container">
						<div class="identity">
							<div class="hello backimg bg_icon_4">
								<h4 class="color_white text-center">Hello</h4>
							</div>
							<h4 class="color_white pb-5">{{$banner->yourself ?? 'I’m Automotive Engineer.'}}.</h4>
							<h3 class="color_white pb-3">{{$banner->profession_title ?? 'Repair and Service your automobiles and vehicles '}}</h3>
							<p class="color_white pb-3">{{$banner->description ?? 'According to the research firm Frost  Sullivan, the estimated size of the North American' }}</p>
						</div>
					</div>
				</div>
             
                <div>                
                </div>
            </div>
        </div>
    </div>
</section>

<!--about us section start-->
<section id="about" class="full_row bg_img_6 style_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
				<div class="intro-video">
					<a class="video-popup" href="https://www.youtube.com/embed/bllBDoHPNK4" title="video popup">
						<div class="round_border">
							{{-- <i class="fas fa-play"></i> --}}
							<i class="fa fa-play-circle"></i>                            
						</div>
					</a>
					<!-- Use youtube or Vimeo video link in href, first open the video and just copy the link from url and past here -->
				</div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="section_title_2 mb-4">
                    <h2 class="line_left title"><span class="mb-2 color_default">About</span>Who am I?</h2>
                </div>
                <div class="text_block_1 mt-2 d-inline-block">
                    <h4 class="color_default mb_20">{{$expert->name ?? 'Hi I’m Nikel Jack'}}</h4>
                    <p>{{$about->description ?? 'Augue quam. Primis facilisis quis magnis lacinia ac natoque nonummy non posuere neque diam per phasellus, eleifend potenti leo massa accumsan malesuada eget ridiculus, nostra erat apibus elit aliquam lorem arcu Neque elementum in sollicitudin eleifend natoque quisque cum dapibus primis dolor eget ipsum pretium. Nonummy hymenaeos Mi dolor. Conubia semper nisi conubia magnis magna duis scelerisque potenti elementum pharetra venenatis. Condimentum semper dictum praesent nam vel bendum elit nisl sagittis Eu iaculis enim aptent a aptent euismod posuere rutrum'}}.</p>
                </div>
                <table class="man_details">
                    <tr>
                        @if ($about && $about->age)                            
                            <td>Age:</td>
                            <td>{{$about->age}} years old</td>
                        @else
                            <td>Age:</td>
                            <td>45 years old</td>
                        @endif
                    </tr>
                    <tr>
                        @if ($about &&  $about->height) 
                            <td>Height:</td>
                            <td>{{$about->height}}</td>
                        @else
                        <td>Height:</td>
                        <td>5' 7" (169 centimeters)</td>
                             
                        @endif
                    </tr>
                    <tr>
                        @if ($about && $about->blood_type)                            
                            <td>Age:</td>
                            <td>{{$about->blood_type}}</td>
                        @else
                            <td>Bloog Group</td>
                            <td>B+</td>
                        @endif
                    </tr>
                </table>
                <div class="mt-5">
                    {{-- <a href="#" class="btn btn-primary radius">Download Resume</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<section id="education" class="full_row style_3 pt_0">
    <div class="container">
        <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="section_title_2 text-center mb-5 mx-auto">
                    <h2 class="title">Education and Experience</h2>
                    <span class="sub_title mt-3">Magna metus metus auctor. Hymenaeos luctus tincidunt natoque quisque praesent class tempor metus pellentesque ullamcorper sem curae.</span>
                </div>
			</div>
        </div>
		<div class="row mt-4">
			<div class="col-lg-12 col-md-12">
                <div class="tab_menu_3 mt-2">
                    <ul class="nav nav-pills color_white_a mb-5 mx_auto" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-mortarboard" role="tab" aria-controls="pills-home-tab" aria-selected="true">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-trophy" role="tab" aria-controls="pills-profile-tab" aria-selected="false">Experience</a>
                        </li>
                    </ul>
                    <div class="tab-content mt_80" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-mortarboard" role="tabpanel" aria-labelledby="pills-home-tab">
                           @if (count($educations) != 0)
                                @foreach ($educations as $item )                                                                 
                                    <div class="education {{$loop->index != 0 ? 'mt-5' : ''}}">
                                        <span class="passing_year bg_default color_white">  {{$item->duration}}</span>
                                        <div class="education_info d-table">
                                            <h4 class="inner_title">{{$item->title}}</h4>
                                            <span class="institute_name mt_10 mb-3">{{$item->institute_name}}</span>
                                            <p>
                                                {{$item->description}}
                                            </p>
                                        </div>
                                    </div>       
                                @endforeach 
                            @else
                            <div class="education">
                                <span class="passing_year bg_default color_white"> Jan 1996 - Feb 2008 </span>
								<div class="education_info d-table">
									<h4 class="inner_title">School Education</h4>
									<span class="institute_name mt_10 mb-3">Jonior Harbad High School, Oraldo</span>
									<p>Aenean metus quisque mauris quisque nascetur platea aenean mattis, venenatis per sociis magna malesuada natoque. Vehicula. Sociis vulputate elit. Eleifend torquent. Ante senectus, sit vulputate elit etiam, massa. Aliquet aliquet ornare penatibus vulputate molestie mollis. Varius varius mus montes ullamcorper.</p>
								</div>
                            </div>
                            <div class="education mt-5">
                                <span class="passing_year bg_default color_white"> Feb 2008 - June 2015 </span>
								<div class="education_info d-table">
									<h4 class="inner_title">Electrical Engineering</h4>
									<span class="institute_name mt_10 mb-3">Jonior Harbad High School, Oraldo</span>
									<p>Aenean metus quisque mauris quisque nascetur platea aenean mattis, venenatis per sociis magna malesuada natoque. Vehicula. Sociis vulputate elit. Eleifend torquent. Ante senectus, sit vulputate elit etiam, massa. Aliquet aliquet ornare penatibus vulputate molestie mollis. Varius varius mus montes ullamcorper.</p>
								</div>
                            </div>
                            <div class="education mt-5">
                                <span class="passing_year bg_default color_white"> Feb 2008 - June 2015 </span>
								<div class="education_info d-table">
									<h4 class="inner_title">Training Cource On Electrical</h4>
									<span class="institute_name mt_10 mb-3">Jonior Harbad High School, Oraldo</span>
									<p>Aenean metus quisque mauris quisque nascetur platea aenean mattis, venenatis per sociis magna malesuada natoque. Vehicula. Sociis vulputate elit. Eleifend torquent. Ante senectus, sit vulputate elit etiam, massa. Aliquet aliquet ornare penatibus vulputate molestie mollis. Varius varius mus montes ullamcorper.</p>
								</div>
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="pills-trophy" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @if (count($experiences) != 0)
                            @foreach ($experiences as $item )                                                                 
                                <div class="education {{$loop->index != 0 ? 'mt-5' : ''}}">
                                    <span class="passing_year bg_default color_white"> {{$item->duration}}</span>
                                    <div class="education_info d-table">
                                        <h4 class="inner_title">{{$item->title}}</h4>
                                        <span class="institute_name mt_10 mb-3">{{$item->institute_name}}</span>
                                        <p>
                                            {{$item->description}}
                                        </p>
                                    </div>
                                </div>       
                            @endforeach 
                        @else
                            <div class="education">
                                <span class="passing_year bg_default color_white"> 2008 - 2010 </span>
								<div class="education_info d-table">
									<h4 class="inner_title">Upwork Market</h4>
									<span class="institute_name mt_10 mb-3">Jonior Harbad High School, Oraldo</span>
									<p>Aenean metus quisque mauris quisque nascetur platea aenean mattis, venenatis per sociis magna malesuada natoque. Vehicula. Sociis vulputate elit. Eleifend torquent. Ante senectus, sit vulputate elit etiam, massa. Aliquet aliquet ornare penatibus vulputate molestie mollis. Varius varius mus montes ullamcorper.</p>
								</div>
                            </div>
                            <div class="education mt-5">
                                <span class="passing_year bg_default color_white"> 2011 - 2015 </span>
								<div class="education_info d-table">
									<h4 class="inner_title">W3 Schools</h4>
									<span class="institute_name mt_10 mb-3">Jonior Harbad High School, Oraldo</span>
									<p>Aenean metus quisque mauris quisque nascetur platea aenean mattis, venenatis per sociis magna malesuada natoque. Vehicula. Sociis vulputate elit. Eleifend torquent. Ante senectus, sit vulputate elit etiam, massa. Aliquet aliquet ornare penatibus vulputate molestie mollis. Varius varius mus montes ullamcorper.</p>
								</div>
                            </div>
                            <div class="education mt-5">
                                <span class="passing_year bg_default color_white"> 2016 - Still </span>
								<div class="education_info d-table">
									<h4 class="inner_title">Themeforest Market</h4>
									<span class="institute_name mt_10 mb-3">Jonior Harbad High School, Oraldo</span>
									<p>Aenean metus quisque mauris quisque nascetur platea aenean mattis, venenatis per sociis magna malesuada natoque. Vehicula. Sociis vulputate elit. Eleifend torquent. Ante senectus, sit vulputate elit etiam, massa. Aliquet aliquet ornare penatibus vulputate molestie mollis. Varius varius mus montes ullamcorper.</p>
								</div>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--about us section end-->

<!--services section start-->
<section id="service" class="full_row bg_gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title_2 mb-5">
                    <h2 class="line_left title"><span class="mb-2 color_default">Service</span>What I Do</h2>
                    <span class="sub_title mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</span>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @if(count($services) != 0)
                @foreach ($services as $service )                
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service_box_2 mb_60 bg-white flat_medium">
                        <div class="shape bg_icon_2">
                            <i class="flaticon-service"></i>
                            {{-- <a href="https://www.flaticon.com/free-icons/work" title="work icons">Work icons created by srip - Flaticon</a> --}}
                            {{-- <img width="20" src="{{asset('expert/portfolio/service/'.$service->image)}}" alt=""> --}}
                        </div>
                        <h4 class="mb-4 mt-4 title">{{$service->title}}</h4>
                        <p>{{Str::limit($service->description, 110)}}</p>
                        <a href="#" class="btn-link color_default">Read More</a>
                    </div>
                </div>
                @endforeach
            @else                
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service_box_2 mb_60 bg-white flat_medium">
                        <div class="shape bg_icon_2"><i class="flaticon-service"></i></div>
                        <h4 class="mb-4 mt-4 title">Automobile Service</h4>
                        <p>Magna metus metus auctor. Hymenaeos luctus tincidunt natoque quisq praesent class tempor metus pellentesque.</p>
                        <a href="#" class="btn-link color_default">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service_box_2 mb_60 bg-white flat_medium">
                        <div class="shape bg_icon_2"><i class="flaticon-engine"></i></div>
                        <h4 class="mb-4 mt-4 title">Engine Repeiar</h4>
                        <p>Magna metus metus auctor. Hymenaeos luctus tincidunt natoque quisq praesent class tempor metus pellentesque.</p>
                        <a href="#" class="btn-link color_default">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service_box_2 mb_60 bg-white flat_medium">
                        <div class="shape bg_icon_2"><i class="flaticon-help"></i></div>
                        <h4 class="mb-4 mt-4 title">Car Upgradation</h4>
                        <p>Magna metus metus auctor. Hymenaeos luctus tincidunt natoque quisq praesent class tempor metus pellentesque.</p>
                        <a href="#" class="btn-link color_default">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service_box_2 mb_60 bg-white flat_medium">
                        <div class="shape bg_icon_2"><i class="flaticon-car"></i></div>
                        <h4 class="mb-4 mt-4 title">Design Vehicles</h4>
                        <p>Magna metus metus auctor. Hymenaeos luctus tincidunt natoque quisq praesent class tempor metus pellentesque.</p>
                        <a href="#" class="btn-link color_default">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service_box_2 mb_60 bg-white flat_medium">
                        <div class="shape bg_icon_2"><i class="flaticon-spray-paint"></i></div>
                        <h4 class="mb-4 mt-4 title">Vehicles Painting</h4>
                        <p>Magna metus metus auctor. Hymenaeos luctus tincidunt natoque quisq praesent class tempor metus pellentesque.</p>
                        <a href="#" class="btn-link color_default">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service_box_2 mb_60 bg-white flat_medium">
                        <div class="shape bg_icon_2"><i class="flaticon-smart-key"></i></div>
                        <h4 class="mb-4 mt-4 title">Techinical Setup</h4>
                        <p>Magna metus metus auctor. Hymenaeos luctus tincidunt natoque quisq praesent class tempor metus pellentesque.</p>
                        <a href="#" class="btn-link color_default">Read More</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!--services section end-->

<!--qualified section start-->
<section id="hiring" class="full_row bg_img_5 overlay_1 style_2">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="text_area">
                    <h2 class="mb-4 color_white">Explain Your Problem</h2>
                    <p class="color_white">Commodo elementum Dignissim. Elit metus litora maecenas integer mattis nisl
                        metus praesent. A class vivamus integer. </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="color_white h4 phone_num">+{{$expert->phone_number}} <span> Or</span>
                    <a class="btn btn-primary radius" href="#">Live Chat</a></div>

            </div>
        </div>
    </div>
</section>

<!--qualified section end-->

<!--Portfolio section start-->
<section id="portfolio" class="portfolio_2 full_row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title_2 mb-5">
                    <h2 class="line_left title"><span class="mb-2 color_default">Portfolio</span>Recent Projects</h2>
                    <span class="sub_title mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Gallery Section-->
                <div class="gallery-section style_2">
					<!--Filter-->
					<div class="filters mb-5">
						<ul class="filter-tabs filter-btns clearfix anim-3-all">
                            @if (count($categories) != 0)
							    <li class="active filter" data-role="button" data-filter="all">All</li>
                                @foreach ($categories as $category )
                                    <li class="filter" data-role="button" data-filter=".category_{{$category->id}}">{{$category->name}}</li>
                                @endforeach
                            @else
                                <li class="active filter" data-role="button" data-filter="all">All</li>
                                <li class="filter" data-role="button" data-filter=".automobile">Automobiles</li>
                                <li class="filter" data-role="button" data-filter=".engine_repair">Engine Repair</li>
                                <li class="filter" data-role="button" data-filter=".painting">Painting</li>
                                <li class="filter" data-role="button" data-filter=".upgration">Upgration</li>
                            @endif
						</ul>
					</div>
					<!--Filter List-->

                 @if (count($categories) != 0)
                 <div class="row filter-list clearfix">
                    @foreach ($projects as $project )                            
                        <div class="column mix mix_all all col-lg-4 col-md-6">
                            <!--Default Portfolio Item-->
                            <div class="portfolio_item_2">
                                <div class="inner-box">
                                    <!--Image Box-->
                                    <a href="images/square/2.png" data-fancybox="images" data-width="2048" data-height="1365">
                                        <figure class="image-box"><img src="{{asset('expert/portfolio/project/'.$project->image)}}" alt=""></figure>
                                    </a>
                                    <div class="content_bottom mt-2">
                                        <h5 class="inner_title">{{$project->title}}</h5>
                                        <span class="designation">{{$project->description}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @foreach ($categories as $category )
                    <div class="row filter-list clearfix">
                        @foreach ($category->projects as $project )                                
                            <div class="column mix mix_all category_{{$category->id}} col-lg-4 col-md-6">
                                <!--Default Portfolio Item-->
                                <div class="portfolio_item_2">
                                    <div class="inner-box">
                                        <!--Image Box-->
                                        <a href="{{asset('expert/portfolio/project/'.$project->image)}}" data-fancybox="images" data-width="2048" data-height="1365">
                                            <figure class="image-box"><img src="{{asset('expert/portfolio/project/'.$project->image)}}" alt=""></figure>
                                        </a>
                                        <div class="content_bottom mt-2">
                                            <h5 class="inner_title">{{$project->title}}</h5>
                                            <span class="designation">{{$project->description}}</span>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                @else
                    <div class="row filter-list clearfix">
                        <div class="column mix mix_all upgration engine_repair col-lg-4 col-md-6">
                            <!--Default Portfolio Item-->
                            <div class="portfolio_item_2">
                                <div class="inner-box">
                                    <!--Image Box-->
                                    <a href="{{asset('assets/expert/portfolio')}}/images/square/2.png" data-fancybox="images" data-width="2048" data-height="1365">
                                        <figure class="image-box"><img src="{{asset('assets/expert/portfolio')}}/images//square/2.png" alt=""></figure>
                                    </a>
                                    <div class="content_bottom mt-2">
                                        <h5 class="inner_title">Raceing car engine repair</h5>
                                        <span class="designation">Engine . Fixing . Servicing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column mix mix_all automobile painting col-lg-4 col-md-6">
                            <!--Default Portfolio Item-->
                            <div class="portfolio_item_2">
                                <div class="inner-box">
                                    <!--Image Box-->
                                    <a href="{{asset('assets/expert/portfolio')}}/images/square/3.png" data-fancybox="images" data-width="2048" data-height="1365">
                                        <figure class="image-box"><img src="{{asset('assets/expert/portfolio')}}/images//square/3.png" alt=""></figure>
                                    </a>
                                    <div class="content_bottom mt-2">
                                        <h5 class="inner_title">Install new technology</h5>
                                        <span class="designation">Engine . Fixing . Servicing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column mix mix_all upgration automobile col-lg-4 col-md-6">
                            <!--Default Portfolio Item-->
                            <div class="portfolio_item_2">
                                <div class="inner-box">
                                    <!--Image Box-->
                                    <a href="{{asset('assets/expert/portfolio')}}/images/square/4.png" data-fancybox="images" data-width="2048" data-height="1365">
                                        <figure class="image-box"><img src="{{asset('assets/expert/portfolio')}}/images//square/4.png" alt=""></figure>
                                    </a>
                                    <div class="content_bottom mt-2">
                                        <h5 class="inner_title">Fuel system upgration</h5>
                                        <span class="designation">Engine . Fixing . Servicing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column mix mix_all painting engine_repair automobile col-lg-4 col-md-6">
                            <!--Default Portfolio Item-->
                            <div class="portfolio_item_2">
                                <div class="inner-box">
                                    <!--Image Box-->
                                    <a href="{{asset('assets/expert/portfolio')}}/images/square/5.png" data-fancybox="images" data-width="2048" data-height="1365">
                                        <figure class="image-box"><img src="{{asset('assets/expert/portfolio')}}/images//square/5.png" alt=""></figure>
                                    </a>
                                    <div class="content_bottom mt-2">
                                        <h5 class="inner_title">Car cooling system repair</h5>
                                        <span class="designation">Engine . Fixing . Servicing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column mix mix_all automobile engine_repair col-lg-4 col-md-6">
                            <!--Default Portfolio Item-->
                            <div class="portfolio_item_2">
                                <div class="inner-box">
                                    <!--Image Box-->
                                    <a href="{{asset('assets/expert/portfolio')}}/images/square/6.png" data-fancybox="images" data-width="2048" data-height="1365">
                                        <figure class="image-box"><img src="{{asset('assets/expert/portfolio')}}/images//square/6.png" alt=""></figure>
                                    </a>
                                    <div class="content_bottom mt-2">
                                        <h5 class="inner_title">Cargo truck body redesign</h5>
                                        <span class="designation">Engine . Fixing . Servicing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column mix mix_all painting engine_repair col-lg-4 col-md-6">
                            <!--Default Portfolio Item-->
                            <div class="portfolio_item_2">
                                <div class="inner-box">
                                    <!--Image Box-->
                                    <a href="{{asset('assets/expert/portfolio')}}/images/square/7.png" data-fancybox="images" data-width="2048" data-height="1365">
                                        <figure class="image-box"><img src="{{asset('assets/expert/portfolio')}}/images//square/7.png" alt=""></figure>
                                    </a>
                                    <div class="content_bottom mt-2">
                                        <h5 class="inner_title">Vehicles body painting</h5>
                                        <span class="designation">Engine . Fixing . Servicing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--awesome work section end-->




<!--get started start-->
{{-- <section id="features" class="full_row bg_gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title_2 text-center mb-5 mx-auto">
                    <h2 class="title"><span class="mb-2 line_double mx-auto color_default">Features</span>How to get started</h2>
                    <span class="sub_title mt-3">Vestibulum lobortis euismod posuere class Egestas, nullam augue ligula libero netus convallis ipsum curae commodo elit pellentesque.</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="feature_box_1 text-center flat_medium pb_80">
                    <div class="icon_img bullet_line_right bg_icon_1 text-center">
                        <span>1</span>
                        <i class="flaticon-discuss-issue"></i>
                    </div>
                    <h4 class="my-4">Discussion</h4>
                    <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature_box_1 text-center flat_medium pb_80">
                    <div class="icon_img bullet_line_right bg_icon_1 text-center">
                        <span>2</span>
                        <i class="flaticon-clipboard"></i>
                    </div>
                    <h4 class="my-4">Reviews</h4>
                    <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature_box_1 text-center flat_medium pb_80">
                    <div class="icon_img bg_icon_1 text-center">
                        <span>3</span>
                        <i class="flaticon-agreement"></i>
                    </div>
                    <h4 class="my-4">Acquire</h4>
                    <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature_box_1 text-center flat_medium">
                    <div class="icon_img bullet_line_left bg_icon_1 text-center">
                        <span>4</span>
                        <i class="flaticon-money"></i>
                    </div>
                    <h4 class="my-4">Collect</h4>
                    <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature_box_1 text-center flat_medium">
                    <div class="icon_img bullet_line_left bg_icon_1 text-center">
                        <span>5</span>
                        <i class="flaticon-money-1"></i>
                    </div>
                    <h4 class="my-4">Survey</h4>
                    <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature_box_1 text-center flat_medium">
                    <div class="icon_img bg_icon_1 text-center">
                        <span>6</span>
                        <i class="flaticon-worker"></i>
                    </div>
                    <h4 class="my-4">Management</h4>
                    <p>Nascetur cubilia sociosqu aliquet ut elit nascetur nullam duis tincidunt nisl non quisque vestibulum platea ornare ridiculus.</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--Get started end-->

<!--News section start-->
{{-- <section id="news" class="full_row style_3">
    <div class="container">
        <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="section_title_3 ">
					<h2 class="title line_left"><span class="color_default mb-2">What’s News?</span> Recent Articles</h2>
					<span class="sub_title ml-0">Eros proin mus. Nascetur pharetra, venenatis neque est aliquet urna ac At netus amet morbi. Ipsum. Risus ante tincidunt enim.</span>
				</div>
			</div>
        </div>
		<div class="row mt-4">
			<div class="col-lg-3 col-md-6 news_item">
				<div class="overflow_hidden"><img src="{{asset('assets/expert/portfolio')}}/images//square/5.png" alt=""></div>
				<span class="posted my-3"><b class="color_default">By</b> Jhon Smith</span>
				<a href="#"><h6 class="inner_title mb_25">Install Power Backup System</h6></a>
				<span class="date color_default">Nov 11, 2018</span>
			</div>
			<div class="col-lg-3 col-md-6 news_item">
				<div class="overflow_hidden"><img src="{{asset('assets/expert/portfolio')}}/images//square/2.png" alt=""></div>
				<span class="posted my-3"><b class="color_default">By</b> Admin</span>
				<a href="#"><h6 class="inner_title mb_25">House Power Protection</h6></a>
				<span class="date color_default">Nov 02, 2018</span>
			</div>
			<div class="col-lg-3 col-md-6 news_item">
				<div class="overflow_hidden"><img src="{{asset('assets/expert/portfolio')}}/images//square/3.png" alt=""></div>
				<span class="posted my-3"><b class="color_default">By</b> Admin</span>
				<a href="#"><h6 class="inner_title mb_25">Install Power Controler</h6></a>
				<span class="date color_default">Oct 30, 2018</span>
			</div>
			<div class="col-lg-3 col-md-6 news_item">
				<div class="overflow_hidden"><img src="{{asset('assets/expert/portfolio')}}/images//square/4.png" alt=""></div>
				<span class="posted my-3"><b class="color_default">By</b> Admin</span>
				<a href="#"><h6 class="inner_title mb_25">Solor Sysem Repeair</h6></a>
				<span class="date color_default">Oct 21, 2018</span>
			</div>
			<div class="col-lg-12 text-center mt-5"><a href="blog.html" class="btn btn-primary">View All Post</a></div>
		</div>
    </div>
</section> --}}
<!--News section end-->

@endsection
