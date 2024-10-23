                    <div class="col col-lg-4">
                        <div class="blog-sidebar">
                            <div class="widget search-widget">
                                <form>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Search Post..">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget category-widget">
                                <h3>Categories</h3>
                                <ul>
                                    @foreach ($categories as $item )
                                        <li><a href="#">{{$item->name}}<span>{{category_news_count($item->id)}}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget recent-post-widget">
                                <h3>Related Posts</h3>
                                <div class="posts">
                                @foreach (all_news() as $item )
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="{{ asset('news/'.$item->image)}}" alt="">
                                        </div>
                                        <div class="details">
                                            <h4><a href="{{route('news.details', $item->slug)}}">{{$item->title}}</a>
                                            </h4>
                                            <span class="date">{{$item->created_at->format('d M Y')}}</span>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
