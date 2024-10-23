@extends('layouts.master.frontend')
@section('title')
  Rodcem Home
@endsection

@section('content')
            <!-- start themart-vendor-section -->
            <section class="themart-vendor-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="wpo-section-title">
                                <h2>Company List</h2>
                                <p>We have <strong class="text-brand">{{companies()}}</strong> company now</p>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="wpo-section-title text-center">
                                <a href="{{route('company')}}" class="btn btn-outline-success">All Companies</a>
                                @foreach (company_categories() as $category )                                                                        
                                    <a href="{{route('category.by.company',$category->slug)}}" class="btn btn-outline-success">{{$category->name}}</a>
                                @endforeach
                            </div>                            
                        </div>
                    </div>
                    <div class="vendor-filter-wrap">
                        <div class="row justify-content-between">
                            <div class="col-lg-12 col-12">
                                <div class="vendor-filter-item">
                                    <div class="vendor-filter-search">
                                        <form action="{{route('companySearch')}}" method="get">
                                            <div>
                                                <input name="search" type="text" class="form-control" placeholder="Search By Comapny Name">
                                                {{-- @if (request()->RouteIs('companySearch'))                                                     --}}
                                                    <button type="submit"><i class="ti-search"></i></button>
                                                {{-- @endif --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-7 col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="vendor-filter-item">
                                            <div class="vendor-filter-short-by">
                                                <ul>
                                                    <li>
                                                       Show:
                                                    </li>
                                                    <li>
                                                        <select name="show">
                                                            <option value="">200</option>
                                                            <option value="">100</option>
                                                            <option value="">50</option>
                                                            <option value="">20</option>
                                                            <option value="">160</option>
                                                            <option value="">80</option>
                                                            <option value="">All</option>
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="vendor-filter-item">
                                            <div class="vendor-filter-short-by">
                                                <ul>
                                                    <li>
                                                        Sort by:
                                                    </li>
                                                    <li>
                                                        <select name="show">
                                                            <option value="">Default Sorting</option>
                                                            <option value="">Popularity</option>
                                                            <option value="">Average Rating</option>
                                                            <option value="">Newness</option>
                                                            <option value="">Low To High</option>
                                                            <option value="">High To Low</option>
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="vendor-wrap">
                        <div class="row">
                            @foreach ($companies as $company )                                
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="vendor-item">
                                        {{-- <span class="hot">Preferred</span> --}}
                                        <div class="images">
                                            {{-- <img src="{{asset('theme/assets')}}/images/vendor/img-1.png" alt=""> --}}
                                            <a href="{{route('product',$company->slug)}}">
                                                @if ($company->logo)                    
                                                  <img width="100" src="{{asset('company/profile/logo/'.$company->logo)}}" alt="Brand Logo 1">
                                                @else
                                                  <img width="70" src="{{asset('assets/rodcem/defaultlogo.png')}}" alt="Brand Logo 1">
                                                @endif
                                              </a>
                                        </div>
                                        <div class="content">
                                            <span class="mb-1">Since {{$company->since ?? '1990'}}</span> <br>
                                             <h2 class="mb-2"><a href="{{route('product',$company->slug)}}">{{$company->name}}</a></h2>
                                            {{--<div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div> --}}
                                            <div class="all-prodact">
                                                {{company_products_count($company->slug)}} products
                                            </div>
                                            <div class="contact-ft">
                                                <ul>
                                                    <li><i class="fi flaticon-mail"></i>{{$company->email}}</li>
                                                    {{-- <li><i class="fi flaticon-phone"></i>(208) 555-0112,(704) 555-0127</li> --}}
                                                    <li><i class="fi flaticon-pin"></i>{{$company->address ?? 'Your Address'}}</li>
                                                </ul>
                                            </div>
                                            <a class="theme-btn" href="{{route('product',$company->slug)}}">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="pagination-wrapper s2">
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
            </section>
            <!-- end themart vendor section -->
        
            <!-- start of themart-cta-section -->
            @include('layouts.master.subscriber')
            <!-- end of themart-cta-section -->
@endsection
