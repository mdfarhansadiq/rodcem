<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RodCem</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- plugins:css -->

  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/base/vendor.bundle.base.css') }}">


  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->

  <link rel="stylesheet" href="{{ asset('Dashboard/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('Dashboard/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/rodcem/favicon.png')}}" />

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .count-indicator .count {
    position: absolute;
    left: 50%;
    width: 12px;
    height: 12px;
    border-radius: 100%;
    background: none;
    color:red;
    /* color:#248afd; */
    font-weight: bold;
    top: -7px;
    border: 1px solid #ffffff;
    }
  </style>
  @yield('custom_css')
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo me-5" style="max-width: 80px;height: 41px;" href="{{route('super.dashboard')}}"><img src="{{asset('assets/rodcem/logo.png')}}" class="me-2" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" style="max-width: 80px;height: 41px;" href="{{route('super.dashboard')}}"><img src="{{asset('assets/rodcem/logo.png')}}" class="me-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
        </ul>
        <ul class="navbar-nav navbar-nav-right" id="notification_list">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="ti-bell mx-0"></i>
              <span class="count" id="count">{{super_notification_count(current_guard())}}</span>
            </a>
            {{-- style="height: 300px;overflow:scroll " --}}
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              @foreach (super_notification(current_guard()) as $notification )
                @if($loop->index <= 4)
                  <a href="{{url($notification->link)}}" class="dropdown-item">
                    <div class="item-thumbnail">
                      <div class="item-icon {{$notification->notification_bg}}">
                        <i class="{{$notification->icon}} mx-0"></i>
                      </div>
                    </div>
                    <div class="item-content">
                      <h6 class="font-weight-normal">{{$notification->title}}</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        {{$notification->created_at->diffForHumans()}}
                      </p>
                    </div>
                  </a>
                @endif
              @endforeach
              <a href="{{route('super.all.notification')}}" class="dropdown-item">View All</a>
              {{-- <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a> --}}
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              {{-- <img src="{{ asset('Dashboard/images/faces/face28.jpg') }}" alt="profile"/> --}}
              @if (Auth()->guard('super')->user()->image)
                <img class="card-img-top" src="{{asset('super/profile/'.Auth()->guard('super')->user()->image)}}" alt="Card image cap">
              @else
                  <img class="card-img-top" src="{{asset('assets/rodcem/profile.png')}}" alt="Card image cap">
              @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{route('super.profile.index')}}">
                <i class="ti-settings text-primary"></i>
                Profile Settings
              </a>
              <a class="dropdown-item" href="{{ route('Super.logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              <form id="logout-form" action="{{ route('Super.logout') }}" method="POST" class="d-none">  @csrf </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
      @include('Inc.super-nav')
      <!-- partial -->
      @yield('content')
      </div>
      <!-- main-panel ends -->
      @stack('all_models')
    </div>
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-center ">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="{{route('front')}}" target="_blank">www.rodcem.com </a>2023</span>
        {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span> --}}
      </div>
    {{-- <audio controls>
        <source id="audio" src="{{asset('audio/notificaiton.wav')}}" >
    </audio> --}}
    <audio controls id="audio" class="d-none">
        {{-- <source src="{{asset('audio/notificaiton.wav')}}"> --}}
        <source src="{{asset('audio/Notification-wake-up.mp3')}}">
    </audio>
    {{-- <button id="audio_btn">click</button> --}}
    </footer>
    <!-- partial -->
    <!-- page-body-wrapper ends -->
  </div

  >
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('Dashboard/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('Dashboard/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('Dashboard/js/jquery.cookie.js') }}" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('Dashboard/js/off-canvas.js') }}"></script>
  <script src="{{ asset('Dashboard/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('Dashboard/js/template.js') }}"></script>
  <script src="{{ asset('Dashboard/js/todolist.js') }}"></script>
  <script src="{{ asset('Dashboard')}}/js/file-upload.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('Dashboard/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
    function showSwal(mode, message) {
      Swal.fire({
        title: message,
        icon: mode,
        toast: true,
        position: 'top-end',
        timer: '5000'
      })
    }

    if("{{ session('success') }}") showSwal('success', "{{ session('success') }}")
    if("{{ session('error') }}") showSwal('error', "{{ session('error') }}")
    if("{{ session('warning') }}") showSwal('warning', "{{ session('warning') }}")

    function destroy(url) {
      fetch(url, {
        method: "DELETE",
        headers: {
          "X-CSRF-Token": document.getElementsByName('csrf-token')[0]?.content
        }
      })
      .then(response => response.json())
      .then(data => {
        if(data == 1) location.reload()
      })
      .catch(error => console.log(error))
    }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
        cluster: 'ap2'
      });

      var channel = pusher.subscribe('super_notification_channel');
      channel.bind('super_notification_event', function(data) {
        $('#notification_list').load(location.href+ " #notification_list");
        $("#order_table").load(location.href + " #order_table");
        $('#audio').get(0).play();
      });
    </script>
    <script>
        $('#notificationDropdown').click(function(){
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                type   : 'get',
                url    : "{{route('super.notification.read')}}",
                success:function(response){
                  $('#count').text('0');
                },
            });
        });
    </script>

    <script>
            var myAudio = $("#audio")[0];

        $('#audio_btn').click(function(){
            // var src = $('#audio').attr('src');
             var audio = $('#audio').get(0).play();
            // console.log(audio);
            // // src.play();
            // audio.currentTime = 0;
            // audio.play();
        });
    </script>


    @yield('custom_js')
</body>

</html>

