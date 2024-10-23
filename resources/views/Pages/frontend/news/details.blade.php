@extends('layouts.master.frontend')
@section('title')
  Rodcem News Details
@endsection
@section('content')
          <section class="wpo-blog-pg-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-8">
                        <div class="wpo-blog-content">
                                <div class="post format-standard-image {{$news->video ? 'format-video' : ''}}">
                                    <div class="entry-media {{$news->video ? 'video-holder' : ''}}">
                                        <img src="{{ asset('news/'.$news->image)}}" alt="">
                                        @if ($news->video != null)
                                            <a href="{{$news->video}}" class="video-btn"data-type="iframe">
                                                <i class="fi flaticon-play"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="fi flaticon-user"></i> By <a href="#">{{$news->writer->name}}</a> </li>
                                            <li><i class="fi flaticon-calendar-1"></i> {{$news->created_at->format('d M Y')}}</li>
                                        </ul>
                                    </div>
                                    <div class="entry-details">
                                        <h3><a href="#">{{$news->title}}</a>
                                        </h3>
                                        <p>{!!$news->description!!}</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @include('layouts.master.newsSidebar')
                </div>
            </div> <!-- end container -->
        </section>

            @include('layouts.master.subscriber')
@endsection

