<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('expert.portfolio', Auth('expert')->user()->slug)}}" target="_blank">
                <i class="ti-eye menu-icon"></i>
                <span class="menu-title">View Portfolio</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('expert.dashboard')}}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="{{ route('expert.portfolio.banner.index') }}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">Banner</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('expert.portfolio.about.index') }}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">About</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('expert.portfolio.education.index') }}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">Educational Qualification</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{ route('expert.portfolio.experience.index') }}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">Experience</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('expert.portfolio.service.index') }}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">Services</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#project" aria-expanded="false" aria-controls="ui-basic">
                <i class="ti-bar-chart-alt mr-3"></i>
                <span class="menu-title">Project</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="project">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('expert.portfolio.project.category.index')}}">Category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('expert.portfolio.project.index')}}">Project</a></li>
                </ul>
              </div>
            </li>
           {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('expert.portfolio.project.index') }}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">Project</span>
              </a>
            </li> --}}
          </ul>
        </nav>