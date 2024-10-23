<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="contact-intro">
                    <span>A Marketplace Initiative by Rodcem.com - We Porvide Construction Materail</span>
                </div>
            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="contact-info">
                    <ul>
                        <li><a href="tel:01909680765"><span>Need help? Call Us:</span>{{general_setting()->phone ?? ''}}</a></li>
                        {{-- <li>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    English
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">English</a></li>
                                    <li><a class="dropdown-item" href="#">Germany</a></li>
                                    <li><a class="dropdown-item" href="#">Turki</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    USD
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item" href="#">AUD</a></li>
                                    <li><a class="dropdown-item" href="#">EUR</a></li>
                                    <li><a class="dropdown-item" href="#">CNY</a></li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end topbar -->
<!--  start header-middle -->
<div class="header-middle">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('front')}}"><img width="50%" src="{{ asset('assets/rodcem/logo.png') }}" alt="logo"></a>
                    {{-- <a class="navbar-brand" href="index-2.html"><img src="{{asset('theme/assets')}}/images/logo.svg" alt="logo"></a> --}}
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <form action="{{route('front.search')}}" class="middle-box">
                    <div class="category">
                        <select name="service" class="form-control">
                            <option disabled="disabled" selected=""><i class="fi flaticon-user-profile"></i> All Category</option>
                            {{-- <option value="agent">Agent</option> --}}
                            <option value="company">Comapny</option>
                            <option value="expert">Expert</option>
                            <option value="shop">Shop</option>
                        </select>
                    </div>
                    <div class="search-box">
                        <div class="input-group">
                            <input type="search" class="form-control" id="search" name="search" placeholder="What are you looking for?">
                            <button class="search-btn" type="submit"> <i class="fi flaticon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-12">
                <div class="middle-right">
                    <ul>

                        <li>
                            @if (Auth()->check() && Auth()->user())
                                {{-- <a href="{{route('login')}}"><img width="30" class="mr-2" src="{{asset('assets/rodcem/1profile.png')}}" alt=""><span>{{Auth()->user()->name}}</span></a>   --}}
                                <a href="{{route('login')}}"><i class="fi flaticon-user-profile"></i><span>{{Auth()->user()->name}}</span></a>
                            @elseif (auth('agent') && auth('agent')->user())
                                <a href="{{route('agent.dashboard')}}"><i class="fi flaticon-user-profile"></i><span>{{Auth('agent')->user()->name}}</span></a>
                            @elseif (auth('company') && auth('company')->user())
                                <a href="{{route('company.dashboard')}}"><i class="fi flaticon-user-profile"></i><span>{{Auth('company')->user()->name}}</span></a>
                            @elseif (auth('expert') && auth('expert')->user())
                                <a href="{{route('expert.dashboard')}}"><i class="fi flaticon-user-profile"></i><span>{{Auth('expert')->user()->name}}</span></a>
                            @elseif (auth('super') && auth('super')->user())
                                <a href="{{route('super.dashboard')}}"><i class="fi flaticon-user-profile"></i><span>{{Auth('super')->user()->name}}</span></a>
                            @else
                                <a href="{{route('login')}}"><i class="fi flaticon-user-profile"></i><span>Login</span></a>
                            @endif
                        </li>
                        <li>

                        </li>
                        <li>
                            @if (Auth()->check() || auth('agent')->check())
                            <div class="mini-cart">
                                    <button class="cart-toggle-btn"> <i class="fi flaticon-add-to-cart"></i>
                                    <span class="cart-count">
                                        @if (Auth()->check())
                                             {{user_cart_count(Auth()->id())}}
                                        @endif
                                        @if (auth('agent')->check())
                                            {{agent_cart_count(auth('agent')->id())}}
                                        @endif
                                    </span></button>
                                    @if(Auth()->user())
                                        <div class="mini-cart-content">
                                            <button class="mini-cart-close"><i class="ti-close"></i></button>
                                            <div class="mini-cart-items">
                                                @foreach (user_cart_items(auth()->id()) as $item )
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="product.html"><img src="{{asset('company/products/'.$item->product->image)}}" alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="{{route('product', $item->product->slug)}}">{{$item->product->name}}</a>
                                                            <span class="mini-cart-item-price">{{$item->quentity}} {{$item->product->unit->name}}</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="mini-cart-action clearfix">
                                                {{-- <span class="mini-checkout-price">Subtotal: <span>$390</span></span> --}}
                                                <div class="mini-btn">
                                                    {{-- <a href="checkout.html" class="view-cart-btn s1">Checkout</a> --}}
                                                    <a href="{{route('cart',Auth()->id())}}" class="view-cart-btn">View Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(Auth('agent')->check())
                                        <div class="mini-cart-content">
                                            <button class="mini-cart-close"><i class="ti-close"></i></button>
                                            <div class="mini-cart-items">
                                                @foreach (agent_cart_items(auth('agent')->id()) as $item )
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="product.html"><img src="{{asset('company/products/'.$item->product->image)}}" alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="{{route('product', $item->product->slug)}}">{{$item->product->name}}</a>
                                                            <span class="mini-cart-item-price"> {{$item->product->price}} <sup>Tk</sup> X {{$item->quentity}} {{$item->product->unit->name}}</span>
                                                            {{-- <span class="mini-cart-item-quantity"><a href="#"><i class="ti-close"></i>100</a></span> --}}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="mini-cart-action clearfix">
                                                {{-- <span class="mini-checkout-price">Subtotal: <span>$390</span></span> --}}
                                                <div class="mini-btn">
                                                    <a href="{{route('cart',Auth('agent')->id())}}" class="view-cart-btn">View Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                            </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  end header-middle -->
