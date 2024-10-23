@extends('layouts.master.frontend')
@section('title')
  Rodcem News
@endsection
@section('content')
          <section class="wpo-blog-pg-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-12">
                        <div class="wpo-blog-content">
                            @foreach ($news as $item )
                                <div class="post format-standard-image {{$item->video ? 'format-video' : ''}}">
                                <div class="entry-media {{$item->video ? 'video-holder' : ''}}">
                                    <img src="{{ asset('news/'.$item->image)}}" alt="">
                                    @if ($item->video != null)
                                        <a href="{{$item->video}}" class="video-btn"data-type="iframe">
                                            <i class="fi flaticon-play"></i>
                                        </a>
                                    @endif
                                </div>
                                </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="fi flaticon-user"></i> By <a href="{{route('news.details', $item->slug)}}">{{$item->writer->name}}</a> </li>
                                            <li><i class="fi flaticon-calendar-1"></i> {{$item->created_at->format('d M Y')}}</li>
                                        </ul>
                                    </div>
                                    <div class="entry-details">
                                        <h3><a href="{{route('news.details', $item->slug)}}">{{$item->title}}</a>
                                        </h3>
                                        <p>{!!Str::limit($item->description, 300)!!}</p>
                                        <a href="{{route('news.details', $item->slug)}}" class="read-more">READ MORE...</a>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="pagination-wrapper pagination-wrapper-left">
                                <ul class="pg-pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <i class="fi ti-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <i class="fi ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    {{-- @include('layouts.master.newsSidebar') --}}
                </div>
            </div> <!-- end container -->
        </section>

            @include('layouts.master.subscriber')
@endsection

