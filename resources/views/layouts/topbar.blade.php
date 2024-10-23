<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-between top-contact mt-2" style="font-size: 14px">
                <div class="list">
                     <i class="fa fa-envelope"></i>{{ general_setting()->email ?? '' }}
                </div>
                <div class="list">
                    <i class="fa fa-phone"></i> {{ general_setting()->phone ?? '' }} </div>
            </div>
            <div class="col-md-8 top-social">
                <div class="d-flex justify-content-end">
                    @php
                        // dd(Auth()->guard('agent'));
                        // if(!Auth()->guard('agent')->check() )
                        // {
                        // 	dd('y');
                        // }
                    @endphp
                        <ul class="mt-2 d-flex">
                            <li><a target="_blank" href="{{ general_setting()->facebook ?? '' }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="{{ general_setting()->twitter ?? '' }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ general_setting()->instagram ?? '' }}"><i class="fa fa-instagram"></i></a></li>									
                            <li><a target="_blank" href="{{ general_setting()->youtube ?? '' }}"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                        <div class="mt-2 d-flex">
                            @if (Auth()->check() && Auth()->user())
                                <a class="text-white font-weight-bold" href="{{route('user.profile.index')}}">{{Auth()->user()->name}}</a>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>