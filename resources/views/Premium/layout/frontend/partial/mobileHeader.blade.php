 <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul style="list-style: none;">
            <li class="">
                <a href="{{route('front')}}">
                    <img  src="{{asset('premium/assets/images/vegetable/category/home.png')}}" alt="">
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="{{route('shop')}}" class="search-box">
                     <img  src="{{asset('premium/assets/images/vegetable/category/store.png')}}" alt="">
                    <span>shop</span>
                </a>
            </li>

            <li>
                <a href="{{route('our.blog')}}" class="notifi-wishlist">
                    <img  src="{{asset('premium/assets/images/vegetable/category/newspaper.png')}}" alt="">
                    <span>News</span>
                </a>
            </li>

            @if (cart_action() == 'cart_right')
            <li>
                 <a href="{{route('cart')}}" class="btn p-0 position-relative header-wishlist text-white">
                    <i data-feather="shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge">
                        @if (Auth()->check())
                            {{user_cart_count(Auth()->id())}}
                        @endif
                        @if (auth('agent')->check())
                            {{agent_cart_count(auth('agent')->id())}}
                        @endif
                    </span>
                    <span>Cart</span>
                </a>
            </li>
            @endif
            @if (cart_action() == 'guest')
            <li>
                 <a href="{{route('login')}}" class="btn p-0 position-relative header-wishlist text-white">
                    <i data-feather="shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge"> 0</span>
                    <span>Cart</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
