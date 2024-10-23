<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.details', Auth('agent')->user()->slug)}}">
              <i class="ti-eye menu-icon"></i>
              <span class="menu-title">View Portfolio</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('ecommerce.index')}}">
              <i class="ti-eye menu-icon"></i>
              <span class="menu-title">view Shop</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.dashboard')}}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.order.index')}}">
              <i class="ti-list mr-3"></i>
              <span class="menu-title">Order</span>
            </a>
          </li>                       
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.user.orders')}}">
              <i class="ti-list mr-3"></i>
              <span class="menu-title">User Orders</span>
            </a>
          </li>                       
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.subscription.index')}}">
              <i class="ti-money mr-3"></i>
              <span class="menu-title">Subscription</span>
            </a>
          </li>                       
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.document.index', Auth('agent')->user()->slug)}}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Document</span>
            </a>
          </li>   
          <hr>  
          <h6>Portfolio setting</h6>
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.portfolio.banner')}}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Banner</span>
            </a>
          </li>                    
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.portfolio.about')}}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">About</span>
            </a>
          </li>                    
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('agent.portfolio.category')}}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Service Category</span>
            </a>
          </li>                     --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('agent.portfolio.service')}}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Service</span>
            </a>
          </li>                     --}}
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.portfolio.chooes.index')}}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Choose Us</span>
            </a>
          </li>                    
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.portfolio.contact.message')}}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Contact Message</span>
            </a>
          </li>                    
          <li class="nav-item">
            <a class="nav-link" href="{{route('agent.portfolio.image')}}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Image Setting</span>
            </a>
          </li>                    
        </ul>
      </nav>