<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('front') }}" target="_blank">
                    <i class="ti-eye menu-icon"></i>
                    <span class="menu-title">View Website</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('super.dashboard') }}">
                    <i class="ti-shield menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#companyMenu" aria-expanded="false"
                    aria-controls="companyMenu">
                    <i class="ti-bar-chart-alt mr-3"></i>
                    <span class="menu-title">Company</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="companyMenu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ request()->is('super/company/register') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('super.company.register.form') }}">Add New Company</a>
                        </li>
                        <li class="nav-item {{ request()->is('super/companies') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('companies.list') }}">Company List</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#agentMenu" aria-expanded="false"
                    aria-controls="agentMenu">
                    <i class="ti-agenda mr-3"></i>
                    <span class="menu-title">Agents</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="agentMenu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('super.agent.register.form') }}">Add New Agent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agents.list') }}">Agent List</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#expertMenu" aria-expanded="false"
                    aria-controls="expertMenu">
                    <i class="ti-user mr-3"></i>
                    <span class="menu-title">Experts</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="expertMenu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('super.expert.register.form') }}">Add New Expert</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('expert.list') }}">Expert List</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('super.contact.index') }}">
                    <i class="ti-comment-alt mr-3"></i>
                    <span class="menu-title">Contact</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('super.subscriber.index') }}">
                    <i class="ti-comment-alt mr-3"></i> <span class="menu-title">Subscribers</span>
                </a>
            </li>

            {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('super.portfolio.approval.index')}}">
              <i class="ti-comment-alt mr-3"></i>
              <span class="menu-title">Portfolio Approval</span>
            </a>
          </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="{{ route('super.order.index') }}">
                    <i class="ti-list mr-3"></i>
                    <span class="menu-title">Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#subscription_setting" aria-expanded="false"
                    aria-controls="slider">
                    <i class="ti-layers mr-3"></i>
                    <span class="menu-title">Subscripion Setting</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="subscription_setting">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('one.time.paymnet.setting.index') }}">One Time Payment</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.subscription.setting.index') }}">Subscription</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#slider" aria-expanded="false"
                    aria-controls="slider">
                    <i class="ti-layers mr-3"></i>
                    <span class="menu-title">Slider</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="slider">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('super.slider.index') }}">Slider
                                List</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#about_us" aria-expanded="false"
                    aria-controls="slider">
                    <i class="ti-layers mr-3"></i>
                    <span class="menu-title">About Us</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="about_us">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('super.about.us') }}">About Us</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('super.privacy') }}">Privacy</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('super.terms.condation') }}">Terms
                                & Condation</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.cancellation.policy') }}">Cancellation Policy</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('super.return.policy') }}">Return
                                Policy</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('super.refund.policy') }}">Refund
                                Policy</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="ti-palette menu-icon"></i>
                    <span class="menu-title">Categories</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="category">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.product.category.index') }}">Product Category</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.company.category.index') }}">Company Category</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.expert.category.index') }}">Expert Category</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#news" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="ti-book mr-3"></i>
                    <span class="menu-title">News</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="news">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('super.headline') }}">Headlines</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('newscategory.index') }}">News
                                Category</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('news.index') }}">News</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#image_setting" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="ti-settings mr-3"></i>
                    <span class="menu-title">Image Setting</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="image_setting">
                    <ul class="nav flex-column sub-menu">
                        {{-- <li class="nav-item"> <a class="nav-link" href="{{route('super.image.setting.index')}}">Service Image</a></li> --}}
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.join.us.image.index') }}">Registraiton Image</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#banner_ad" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="ti-settings mr-3"></i>
                    <span class="menu-title">Banner Ad</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="banner_ad">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.ad.slider.banner') }}">Slider Banner Ad</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.ad.first.middle.banner') }}">First Middle Ad</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.ad.second.middle.banner') }}">Second Middle Ad</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.ad.third.middle.banner') }}">Third Middle Ad</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.ad.fourth.middle.banner') }}">Fourth Middle Ad</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.ad.first.left.banner') }}">First Left Ad</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.ad.second.left.banner') }}">Second Left Ad</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ route('super.ad.customer.comment') }}">Customer Comment</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#join_with_us" aria-expanded="false"
                    aria-controls="join_with_us">
                    <i class="ti-user mr-3"></i>
                    <span class="menu-title">Join With Us</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="join_with_us">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('become.agent') }}">Becom Agent</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('become.expert') }}">Becom
                                Expert</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('become.company') }}">Becom
                                Company</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('agent.why.selll') }}">Why Agent
                                Sell</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('agent.business.info') }}">Business
                                Info</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('general.setting.index') }}">
                    <i class="ti-settings mr-3"></i>
                    <span class="menu-title">General Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('videos.index') }}">
                    <i class="ti-list mr-3"></i>
                    <span class="menu-title">Videos</span>
                </a>
            </li>
            
            {{-- <li class="nav-item"> <a class="nav-link" href="{{route('benifit.index')}}"> <i class="ti-settings mr-3"></i> <span class="menu-title">Benefit</span></a></li> --}}
            {{-- <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}"> <i class="ti-settings mr-3"></i> <span class="menu-title">Product Category</span></a></li> --}}
            {{-- <hr>
          <h6>Agent Service Setting</h6>
          <li class="nav-item">
            <a class="nav-link" href="{{route('super.agent.service.index')}}">
              <i class="ti-receipt menu-icon"></i>
              <span class="menu-title">Services</span>
            </a>
          </li> --}}
        </ul>
    </nav>
