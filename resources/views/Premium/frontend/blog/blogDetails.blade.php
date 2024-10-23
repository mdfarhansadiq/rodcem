@extends('Premium.layout.frontend.premium')
@section('title')
    {{config('app.name')}} | {{$blog->title}}
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>{{$blog->title}}</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('front')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Blog</li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Details Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 col-lg-5 d-lg-block d-none">
                    <div class="left-sidebar-box">
                        <div class="left-search-box">
                            <div class="search-box">
                                <input type="search" class="form-control" id="exampleFormControlInput4"
                                    placeholder="Search....">
                            </div>
                        </div>

                        <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Recent Post
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body pt-0">
                                        <div class="recent-post-box">
                                            @foreach ($blogs as $item )
                                                <div class="recent-box">
                                                    <a href="{{route('our.blog.details',$item->slug)}}" class="recent-image">
                                                        <img src="{{asset('news/'.$item->image)}}" class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="recent-detail">
                                                        <a href="{{route('our.blog.details',$item->slug)}}">
                                                            <h5 class="recent-name">{{$item->title}}</h5>
                                                        </a>
                                                        <h6>{{$item->created_at->format('d M y')}} <i data-feather="thumbs-up"></i></h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Category
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body p-0">
                                        <div class="category-list-box">
                                            <ul>
                                                @foreach (news_categories() as $item )
                                                    <li>
                                                        <a href="#">
                                                            <div class="category-name">
                                                                <h5>{{$item->name}}</h5>
                                                                <span>{{category_news_count($item->id)}}</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        Product Tags
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body pt-0">
                                        <div class="product-tags-box">
                                            <ul>

                                                <li>
                                                    <a href="javascript:void(0)">Fruit Cutting</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">Meat</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">organic</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">cake</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">pick fruit</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">backery</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">organix food</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">Most Expensive Fruit</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFour">
                                        Trending Products
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body">
                                        <ul class="product-list product-list-2 border-0 p-0">
                                           @foreach (trending_products() as $item )
                                                <li>
                                                    <div class="offer-product">
                                                        <a href="{{ route('product.details', $item->slug) }}" class="offer-image">
                                                            <img src="{{ asset('company/products/' . $item->image) }}"
                                                                class="blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="offer-detail">
                                                            <div>
                                                                <a href="{{ route('product.details', $item->slug) }}" class="text-title">
                                                                    <h6 class="name">{{$item->name}}</h6>
                                                                </a>
                                                                <span>{{$item->porduct_category->name}}</span>
                                                                <h6 class="price theme-color">
                                                                    <i class="fa fa-turkish-lira"></i>
                                                                    @if (view_action() == 'view_right')
                                                                        {{ $item->price }}
                                                                    @else
                                                                        <span class="theme-color" data-bs-toggle="tooltip" data-bs-placement="top" title="দাম জানতে আপনার এলাকার এজেন্টের সাথে যোগাযোগ করুন ।">***<i class="fa fa-info-circle"></i></span>
                                                                    @endif
                                                                    <span class="offer theme-color">per {{ $item->unit->name }}</span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8 col-lg-7 ratio_50">
                    <div class="blog-detail-image rounded-3 mb-4">
                        <img src="{{asset('news/'.$blog->image)}}" class="bg-img blur-up lazyload" alt="">
                        <div class="blog-image-contain">
                            <ul class="contain-list">
                                {{-- <li>backpack</li>
                                <li>life style</li>
                                <li>organic</li> --}}
                            </ul>
                            <h2>{{$blog->title}}</h2>
                            <ul class="contain-comment-list">
                                <li>
                                    <div class="user-list">
                                        <i data-feather="user"></i>
                                        <span>{{$blog->writer->name}}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="user-list">
                                        <i data-feather="calendar"></i>
                                        <span>{{$blog->created_at->format('d M y')}}</span>
                                    </div>
                                </li>

                                {{-- <li>
                                    <div class="user-list">
                                        <i data-feather="message-square"></i>
                                        <span>82 Comment</span>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="blog-detail-contain">{!!$blog->description!!} </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
