@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | Blogs
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Blog Grid</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Grid</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                    <div class="row g-4 ratio_65">
                        @foreach ($blogs as $item)
                            <div class="col-xxl-4 col-sm-6">
                                <div class="blog-box wow fadeInUp">
                                    <div class="blog-image">
                                        <a href="{{ route('our.blog.details', $item->slug) }}">
                                            <img src="{{ asset('news/' . $item->image) }}" class="bg-img blur-up lazyload"
                                                alt="">
                                        </a>
                                    </div>

                                    <div class="blog-contain">
                                        <div class="blog-label">
                                            <span class="time"><i data-feather="clock"></i>
                                                <span>{{ $item->created_at->format('d M y') }}</span></span>
                                            <span class="super"><i data-feather="user"></i>
                                                <span>{{ $item->writer->name }}</span></span>
                                        </div>
                                        <a href="{{ route('our.blog.details', $item->slug) }}">
                                            <h3>{{ $item->title }}</h3>
                                        </a>
                                        <button onclick="location.href = '{{ route('our.blog.details', $item->slug) }}';"
                                            class="blog-button">Read More
                                            <i class="fa-solid fa-right-long"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item" aria-current="page">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                </div>

                @include('Premium.frontend.blog.sidebar')
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
