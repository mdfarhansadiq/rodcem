<div class="col-lg-4">
    <div class="shop-filter-wrap">
        <div class="filter-item">
            <div class="shop-filter-item">
                <div class="shop-filter-search">
                    <form method="get" action="{{route('front.product.search')}}">
                        <div>
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search..">                                                   
                                <button type="submit"><i class="ti-search"></i></button>                                                         
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="filter-item">
            <div class="shop-filter-item category-widget">
                <h2>Categories</h2>
                <ul>
                    @foreach (product_categories() as $category )
                        @if (category_product($category->id) !=0)
                            <li><a href="{{route('category.product',$category->slug)}}">{{$category->name}}<span>({{category_product($category->id)}})</span></a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="filter-item">
            <div class="shop-filter-item new-product">
                <h2>New Products</h2>
                <ul>
                    @foreach (new_products() as $item )
                        <li>
                            <div class="product-card">
                                <div class="card-image">
                                    <div class="image">
                                        <img height="100" src="{{asset('company/products/'.$item->image)}}" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a href="{{route('product.details',$item->slug)}}">{{$item->name}}</a></h3>
                                    <h5><a href="{{route('product',$item->company->slug)}}"><small>{{$item->company->name}}</small></a></h5>
                                    <div class="price">
                                        @if (auth('company')->user() || auth('agent')->user() || auth('super')->user())
                                            <span class="present-price">{{$item->price}}<sup>Tk</sup></span>
                                        @else
                                            {{-- <span class="present-price">****<sup>Tk</sup></span>                                                             --}}
                                        @endif
                                        {{-- <span class="present-price">{{$item->price}} <sup>Tk</sup></span> --}}
                                        {{-- <del class="old-price">$200.00</del> --}}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="filter-item">
            <div class="shop-filter-item tag-widget">
                <h2>Popular Tags</h2>
                <ul>
                    @foreach (popular_sub_category() as $item )
                        <li><a href="{{route('company.category.product',$item->slug)}}">{{$item->sub_category}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
