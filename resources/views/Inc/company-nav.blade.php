<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <li class="nav-item">
            <a class="nav-link" href="{{route('company.shop',auth('company')->user()->slug)}}">
              <i class="ti-eye menu-icon"></i>
              <span class="menu-title">View Website</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('company.dashboard')}}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('company.proposal')}}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Proposals</span>
            </a>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link" href="{{ route('company.unit.index') }}">
              <i class="ti-palette mr-3"></i>
              <span class="menu-title">Units</span>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('company.category.index') }}">
              <i class="ti-layers-alt mr-3"></i>
              <span class="menu-title">Sub Categories</span>
            </a>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link" href="{{ route('company.product.index') }}">
              <i class="ti-notepad mr-3"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('company.product.price.index') }}">
              <i class="ti-notepad mr-3"></i>
              <span class="menu-title">Price Update</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('company.order.index') }}">
              <i class="ti-list mr-3"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('company.banner.setting.index') }}">
              <i class="ti-list mr-3"></i>
              <span class="menu-title">Banner Setting</span>
            </a>
          </li> --}}


        </ul>
      </nav>
