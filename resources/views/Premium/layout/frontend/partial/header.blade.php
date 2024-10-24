 <header class="pb-md-4 pb-0">
     <div class="header-top">
         <div class="container-fluid-lg">
             <div class="row">
                 {{-- <div class="col-xxl-3 d-xxl-block d-none">
                        <div class="top-left-header">
                            <i class="iconly-Location icli text-white"></i>
                            <span class="text-white">1418 Riverwood Drive, CA 96052, US</span>
                        </div>
                    </div> --}}

                 <div class="col-xxl-12 col-lg-12 d-lg-block">
                     <div class="header-offer">
                         <marquee behavior="" direction="">{!! headline()->content ?? '' !!}</marquee>
                     </div>
                 </div>

                 {{-- <div class="col-lg-3">
                        <ul class="about-list right-nav-about">
                            <li class="right-nav-list">
                                <div class="dropdown theme-form-select">
                                    <button class="btn dropdown-toggle" type="button" id="select-language"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('premium/assets')}}/images/country/united-states.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <span>English</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" id="english">
                                                <img src="{{asset('premium/assets')}}/images/country/united-kingdom.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <span>English</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" id="france">
                                                <img src="{{asset('premium/assets')}}/images/country/germany.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <span>Germany</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" id="chinese">
                                                <img src="{{asset('premium/assets')}}/images/country/turkish.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <span>Turki</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="right-nav-list">
                                <div class="dropdown theme-form-select">
                                    <button class="btn dropdown-toggle" type="button" id="select-dollar"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>USD</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end sm-dropdown-menu"
                                        aria-labelledby="select-dollar">
                                        <li>
                                            <a class="dropdown-item" id="aud" href="javascript:void(0)">AUD</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="eur" href="javascript:void(0)">EUR</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="cny" href="javascript:void(0)">CNY</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
             </div>
         </div>
     </div>

     <div class="top-nav top-header sticky-header">
         <div class="container-fluid-lg">
             <div class="row">
                 <div class="col-12">
                     <div class="navbar-top">
                         <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                             data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                             <span class="navbar-toggler-icon">
                                 <i class="fa-solid fa-bars"></i>
                             </span>
                         </button>
                         <a href="{{ route('front') }}" class="web-logo nav-logo">
                             <img height="200" src="{{ asset('premium/assets') }}/images/logo/1.png"
                                 class="img-fluid blur-up lazyload" alt="">
                         </a>

                         <div class="middle-box">
                             {{-- <div class="location-box">
                                    <button class="btn location-button" data-bs-toggle="modal"
                                        data-bs-target="#locationModal">
                                        <span class="location-arrow">
                                            <i data-feather="map-pin"></i>
                                        </span>
                                        <span class="locat-name">Your Location</span>
                                        <i class="fa-solid fa-angle-down"></i>
                                    </button>
                                </div> --}}

                             {{-- <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="I'm searching for..."
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn" type="button" id="button-addon2">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div> --}}
                             <div class="container mt-5">
                                 <div class="search-box position-relative"> <!-- Make the parent relative -->
                                     <div class="input-group">
                                         <input type="search" id="search-input" class="form-control"
                                             placeholder="I'm searching for..." aria-label="Search"
                                             aria-describedby="button-addon2">
                                         <button class="btn btn-primary" type="button" id="button-addon2">
                                             <i data-feather="search"></i> Search
                                         </button>
                                     </div>

                                     <!-- Floating search results -->
                                     <div id="search-results" class="search-results" style="display: none; border-radius: 10px;">
                                         <button id="close-results" class="close-btn" style="display: none">x</button> <!-- Close button -->
                                         <!-- Results will be injected here dynamically -->
                                     </div>
                                 </div>
                             </div>

                         </div>

                         <div class="rightside-box">
                             <div class="search-full">
                                 <div class="input-group">
                                     <span class="input-group-text">
                                         <i data-feather="search" class="font-light"></i>
                                     </span>
                                     <input type="text" class="form-control search-type" placeholder="Search here..">
                                     <span class="input-group-text close-search">
                                         <i data-feather="x" class="font-light"></i>
                                     </span>
                                 </div>
                             </div>
                             <ul class="right-side-menu" style="list-style: none">
                                 <li class="right-side">
                                     <div class="delivery-login-box">
                                         <div class="delivery-icon">
                                             <div class="search-box">
                                                 <i data-feather="search"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="right-side">
                                     <a href="{{ route('contact.us') }}" class="delivery-login-box">
                                         <div class="delivery-icon">
                                             <i data-feather="phone-call"></i>
                                         </div>
                                         <div class="delivery-detail">
                                             <h6>24/7 Support</h6>
                                             <h5>{{ general_setting()->phone ?? '' }}</h5>
                                         </div>
                                     </a>
                                 </li>
                                 {{--
                                    <li class="right-side ">
                                        <div class="onhover-dropdown header-badge">
                                            <button type="button" class="btn p-0 position-relative header-wishlist">
                                                <i data-feather="bell"></i>
                                                <span class="position-absolute top-0 start-100 translate-middle badge">2
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>

                                            <div class="onhover-div">
                                                <ul class="cart-list">
                                                    <li class="product-box-contain">
                                                        <div class="drop-cart">
                                                            <a href="product-left-thumbnail.html" class="drop-image">
                                                                <img src="{{asset('premium/assets')}}/images/vegetable/product/1.png"
                                                                    class="blur-up lazyload" alt="">
                                                            </a>

                                                            <div class="drop-contain">
                                                                <a href="product-left-thumbnail.html">
                                                                    <h5>Fantasy Crunchy Choco Chip Cookies</h5>
                                                                </a>
                                                                <h6><span>1 x</span> $80.58</h6>
                                                                <button class="close-button close_button">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="product-box-contain">
                                                        <div class="drop-cart">
                                                            <a href="product-left-thumbnail.html" class="drop-image">
                                                                <img src="{{asset('premium/assets')}}/images/vegetable/product/2.png"
                                                                    class="blur-up lazyload" alt="">
                                                            </a>

                                                            <div class="drop-contain">
                                                                <a href="product-left-thumbnail.html">
                                                                    <h5>Peanut Butter Bite Premium Butter Cookies 600 g
                                                                    </h5>
                                                                </a>
                                                                <h6><span>1 x</span> $25.68</h6>
                                                                <button class="close-button close_button">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li> --}}

                                 <li class="right-side">
                                     @if (cart_action() == 'cart_right')
                                         <div class="onhover-dropdown header-badge">
                                             <button type="button" class="btn p-0 position-relative header-wishlist">
                                                 <i data-feather="shopping-cart"></i>
                                                 <span class="position-absolute top-0 start-100 translate-middle badge">
                                                     @if (Auth()->check())
                                                         {{ user_cart_count(Auth()->id()) }}
                                                     @endif
                                                     @if (auth('agent')->check())
                                                         {{ agent_cart_count(auth('agent')->id()) }}
                                                     @endif
                                                     <span class="visually-hidden">unread messages</span>
                                                 </span>
                                             </button>

                                             @if (Auth()->check())
                                                 <div class="onhover-div">
                                                     <ul class="cart-list">
                                                         @foreach (user_cart_items(auth()->id()) as $item)
                                                             <li class="product-box-contain">
                                                                 <div class="drop-cart">
                                                                     <a href="{{ route('product.details', $item->product->slug) }}"
                                                                         class="drop-image">
                                                                         <img width="20"
                                                                             src="{{ asset('company/products/' . $item->product->image) }}"
                                                                             class="blur-up lazyload" alt="">
                                                                     </a>

                                                                     <div class="drop-contain">
                                                                         <a href="product-left-thumbnail.html">
                                                                             <h5>{{ $item->product->name }}</h5>
                                                                         </a>
                                                                         <h6><span>{{ $item->quentity }} x</span><i
                                                                                 class="fa fa-turkish-lira"></i> ***
                                                                         </h6>
                                                                         <button class="close-button close_button">
                                                                             <i class="fa-solid fa-xmark"></i>
                                                                         </button>
                                                                     </div>
                                                                 </div>
                                                             </li>
                                                         @endforeach
                                                     </ul>

                                                     <div class="price-box">
                                                         <h5>Total :</h5>
                                                         <h4 class="theme-color fw-bold"> <i
                                                                 class="fa fa-turkish-lira"></i> ***</h4>
                                                     </div>

                                                     <div class="button-group">
                                                         <a href="{{ route('cart') }}"
                                                             class="btn btn-sm cart-button">View Cart</a>
                                                         <a href="{{ route('cart') }}"
                                                             class="btn btn-sm cart-button theme-bg-color text-white">Checkout</a>
                                                     </div>
                                                 </div>
                                             @endif
                                             @if (auth('agent')->check())
                                                 <div class="onhover-div">
                                                     <ul class="cart-list">
                                                         @foreach (agent_cart_items(auth('agent')->id()) as $item)
                                                             <li class="product-box-contain">
                                                                 <div class="drop-cart">
                                                                     <a href="{{ route('product.details', $item->product->slug) }}"
                                                                         class="drop-image">
                                                                         <img width="20"
                                                                             src="{{ asset('company/products/' . $item->product->image) }}"
                                                                             class="blur-up lazyload" alt="">
                                                                     </a>

                                                                     <div class="drop-contain">
                                                                         <a href="product-left-thumbnail.html">
                                                                             <h5>{{ $item->product->name }}</h5>
                                                                         </a>
                                                                         <h6><span>{{ $item->quentity }} x</span><i
                                                                                 class="fa fa-turkish-lira"></i>
                                                                             {{ $item->product->price }}</h6>
                                                                         <button class="close-button close_button">
                                                                             <i class="fa-solid fa-xmark"></i>
                                                                         </button>
                                                                     </div>
                                                                 </div>
                                                             </li>
                                                         @endforeach
                                                     </ul>

                                                     <div class="price-box">
                                                         <h5>Total :</h5>
                                                         <h4 class="theme-color fw-bold"><i
                                                                 class="fa fa-turkish-lira"></i>
                                                             {{ cart_subtotal(auth('agent')->id()) }}</h4>
                                                     </div>

                                                     <div class="button-group">
                                                         <a href="{{ route('cart') }}"
                                                             class="btn btn-sm cart-button">View Cart</a>
                                                         <a href="{{ route('cart') }}"
                                                             class="btn btn-sm cart-button theme-bg-color text-white">Checkout</a>
                                                     </div>
                                                 </div>
                                             @endif
                                         </div>
                                 </li>
                                 @endif
                                 @if (cart_action() == 'guest')
                                     <button onclick="location.href = '{{ route('login') }}';"
                                         class="btn p-0 position-relative header-wishlist">
                                         <i data-feather="shopping-cart"></i>
                                         <span class="position-absolute top-0 start-100 translate-middle badge">
                                             0
                                             <span class="visually-hidden">unread messages</span>
                                         </span>
                                     </button>
                                 @endif
                                 <li class="right-side onhover-dropdown">
                                     <div class="delivery-login-box">
                                         <div class="delivery-icon">
                                             <i data-feather="user"></i>
                                         </div>
                                         <div class="delivery-detail">
                                             {{-- <h6>Hello,</h6> --}}
                                             <h5>My Account</h5>
                                         </div>
                                     </div>

                                     @if (is_auth() == 'guest')
                                         <div class="onhover-div onhover-div-login">
                                             <ul class="user-box-name">
                                                 <li class="product-box-contain">
                                                     <i></i>
                                                     <a href="{{ route('login') }}">Log In</a>
                                                 </li>

                                                 <li class="product-box-contain">
                                                     <a href="{{ route('register') }}">User Register</a>
                                                     <a href="{{ route('agent.register') }}">Agent Register</a>
                                                     <a href="{{ route('expert.register') }}">Expert Register</a>
                                                     <a href="{{ route('company.register') }}">Company Register</a>
                                                 </li>
                                             </ul>
                                         </div>
                                     @else
                                         <div class="onhover-div onhover-div-login">
                                             <ul class="user-box-name">
                                                 <li class="product-box-contain">
                                                     <i></i>
                                                     <a href="{{ route('login') }}">My Account</a>
                                                 </li>
                                             </ul>
                                         </div>
                                     @endif
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="container-fluid-lg">
         <div class="row">
             <div class="col-12">
                 <div class="header-nav">
                     <div class="header-nav-left">
                         <button class="dropdown-category">
                             <i data-feather="align-left"></i>
                             <span>All Categories</span>
                         </button>

                         <div class="category-dropdown">
                             <div class="category-title">
                                 <h5>Categories</h5>
                                 <button type="button" class="btn p-0 close-button text-content">
                                     <i class="fa-solid fa-xmark"></i>
                                 </button>
                             </div>

                             <ul class="category-list">
                                 @foreach (product_categories() as $item)
                                     <li class="onhover-category-list">
                                         <a href="javascript:void(0)" class="category-name">
                                             <img width="20"
                                                 src="{{ asset('product/category/' . $item->image) }}"
                                                 class="blur-up lazyload" alt="">
                                             <h6>{{ $item->name }}</h6>
                                             <i class="fa-solid fa-angle-right"></i>
                                         </a>

                                         <div class="onhover-category-box">
                                             @foreach ($item->products->chunk(10) as $product)
                                                 <div class="list-1">
                                                     <div class="category-title-box">
                                                     </div>
                                                     <ul>
                                                         @foreach ($product as $item)
                                                             <li>
                                                                 <a
                                                                     href="{{ route('product.details', $item->slug) }}">{{ $item->name }}</a>
                                                             </li>
                                                         @endforeach
                                                     </ul>
                                                 </div>
                                             @endforeach

                                             {{-- <div class="list-2">
                                                    <div class="category-title-box">
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0)">Banana & Papaya</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)">Kiwi, Citrus Fruit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)">Apples & Pomegranate</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)">Seasonal Fruits</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)">Mangoes</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)">Fruit Baskets</a>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                         </div>
                                     </li>
                                 @endforeach
                             </ul>
                         </div>
                     </div>

                     <div class="header-nav-middle">
                         <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                             <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                 <div class="offcanvas-header navbar-shadow">
                                     <h5>Menu</h5>
                                     <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                         aria-label="Close"></button>
                                 </div>
                                 <div class="offcanvas-body">
                                     <ul class="navbar-nav">
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('front') }}">Home</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('companies') }}">Companies</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('experts') }}">Expert</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('our.blog') }}">News</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('about.us') }}">About</a>
                                         </li>
                                         <li class="nav-item dropdown">
                                             <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                 data-bs-toggle="dropdown">Join With Us</a>
                                             <ul class="dropdown-menu">
                                                 <li>
                                                     <a class="dropdown-item"
                                                         href="{{ route('agent.register') }}">Become a Agent</a>
                                                 </li>
                                                 <li>
                                                     <a class="dropdown-item"
                                                         href="{{ route('expert.register') }}">Become a Expert</a>
                                                 </li>
                                                 <li>
                                                     <a class="dropdown-item"
                                                         href="{{ route('company.register') }}">Company Register</a>
                                                 </li>
                                             </ul>
                                         </li>

                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="header-nav-right">
                         {{-- <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box"> --}}
                         <button class="btn deal-button">
                             <i data-feather="zap"></i>
                             <span>Deal Today</span>
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
