<!-- Nav Start -->
	<div class="nav">
	<ul class="sf-menu">

		<li>
			<a href="{{route('front')}}">
				<span class="menu-title">
					Home </span>
			</a>
		</li>
		<li><a href="{{ route('company') }}">
				<span class="menu-title">
					COMPANY
				</span>
			</a>
		</li>
		<li>
			<a href="{{route('experts')}}">
				<span class="menu-title">
					Expert
				</span>
			</a>
		</li>
		{{-- <li>
			<a class="active" href="{{route('agents')}}">
				<span class="menu-title">
					Agent
				</span>
			</a>
		</li> --}}
		<li>
			<a href="{{route('about')}}">
				<span class="menu-title">
					ABOUT US
				</span>
			</a>
		</li>
		<li>
			<a href="{{route('contact')}}">
				<span class="menu-title">
					Contact Us
				</span>
			</a>
		</li>
		{{-- <li>
			<a href="{{ route('cart') }}">
				<span class="menu-title">
					<span>1</span>
					<img src="{{asset('assets/rodcem/icon/shopping-cart.svg')}}" alt="">
				</span>
			</a>
		</li> --}}
		{{-- @if (Auth()->guard('agent')->user())
			<li class="nav-item dropdown dropdown-cart mr-25 show">
					<a class="nav-link" href="{{ route('cart', Auth()->guard('agent')->user()->id) }}" >
					<img src="{{asset('assets/rodcem/icon/shopping-cart.svg')}}" alt="">
					<span class="badge badge-pill badge-primary badge-up cart-item-count">{{cart_items(Auth()->guard('agent')->user()->id)}}</span>
				</a>
			</li>
		@endif --}}
	</ul>
	</div>
<!-- Nav End -->
