<div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-lg-none dl-block">
                                <div class="mobail-menu">
                                    <button type="button" class="navbar-toggler open-btn">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar first-angle"></span>
                                        <span class="icon-bar middle-angle"></span>
                                        <span class="icon-bar last-angle"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-6 col-sm-5 col-6 d-block d-lg-none">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="index-2.html"><img width="70" src="{{ asset('assets/rodcem/logo.png') }}"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-3">
                                <div class="header-shop-item">
                                    <button class="header-shop-toggle-btn"><span>Shop By Category</span> </button>
                                    <div class="mini-shop-item">
                                        <ul id="metis-menu">
                                            @foreach (product_categories() as $category )
                                                <li class="header-catagory-item">
                                                    <a  @if(count($category->sub_category) !=0)class=" menu-down-arrow" @else href="{{route('category.product',$category->slug)}}" @endif >{{$category->name}}</a>
                                                    @if(count($category->sub_category) !=0)
                                                    <ul class="header-catagory-single">
                                                        @foreach ($category->sub_category as $subCategory )
                                                            <li><a href="{{route('company.category.product',$subCategory->slug)}}">{{$subCategory->sub_category}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li> <a class="active" href="{{route('front')}}">Home</a></li>
                                        <li><a class="active" href="{{route('ecommerce.index')}}">Shop</a></li>
                                        <li><a class="" href="{{route('company')}}">Company</a>  </li>
                                        {{-- <li><a href="{{route('agents')}}">Agent</a> </li> --}}
                                        <li><a href="{{route('experts')}}">Expert</a> </li>
                                        <li><a href="{{route('news')}}">News</a> </li>
                                        <li><a href="{{route('about')}}">About</a></li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>

                                        @if (Auth()->check())
                                            <li><a href="{{route('cart',Auth()->id())}}">Cart</a></li>
                                        @endif
                                        @if (Auth('agent')->check())
                                            <li><a href="{{route('cart',Auth('agent')->id())}}">Cart</a></li>
                                        @endif
                                    </ul>
                                </div><!-- end of nav-collapse -->
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
