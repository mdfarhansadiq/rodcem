<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('shop.dashboard')}}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="{{ route('shop.unit.index') }}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Units</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('shop.category.index') }}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('shop.product.index') }}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('shop.order') }}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
        </ul>
      </nav>
