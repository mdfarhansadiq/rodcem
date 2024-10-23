@extends('layouts.master.frontend')
@section('title')
  Rodcem Home
@endsection
@section('custom_css')
    <style>
       /* .find_agent{
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .section-padding {
            padding: 0;
        } */
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<section class="themart-vendor-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="wpo-section-title">
                    <h2>Meet Our Expert</h2>
                    <p>We have <strong class="text-brand">{{experts()}}</strong> Expert now</p>
                </div>
            </div>
             <div class="col-lg-9">
                <div class="wpo-section-title text-center">
                    <a href="{{route('experts')}}" class="btn btn-outline-success">All Experts</a>
                    @foreach (expert_categories() as $category )
                        <a href="{{route('category.by.expert',$category->slug)}}" class="btn btn-outline-success">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="vendor-filter-wrap">
            <div class="row justify-content-between">
                <div class="col-lg-12 col-12">
                    <div class="vendor-filter-item">
                        <div class="vendor-filter-search">
                            <form action="{{route('find.expert')}}" method="get">
                                <div>
                                    <input type="text" class="form-control"  name='search' @isset(request()->search) value="{{request()->search}}" @endisset placeholder="Search By Expert Name Or Designation">
                                    @if(request()->routeIs('find.expert'))
                                     <button type="submit"><i class="ti-search"></i></button>
                                     <a class="btn btn-danger mt-2" style="float: right;" href="{{route('experts')}}"><i class="fa fa-undo" aria-hidden="true"></i> Go Back</a>
                                    @else
                                        @if(Auth()->guard('agent')->check() || Auth()->guard('company')->check() ||  Auth()->guard('expert')->check()  || Auth()->check())
                                            <button type="submit"><i class="ti-search"></i></button>
                                        @else
                                            <button type="submit"><i class="ti-search"></i></button>
                                        @endif
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      <section class="themart-category-section  section-padding">
          <div class="container">
              <div class="row">
                @foreach ($experts as $expert)
                    <div class="col-lg-3 col-12">
                        <div class="category-card">
                            {{-- <img src="{{asset('theme/assets')}}/images/category/4.jpg" alt=""> --}}
                        @if($expert->image)
                            <img style="height: 280px" src="{{asset('agent/profile/'.$expert->image)}}" alt="">
                        @else
                            <img src="{{asset('assets/rodcem/agents (2).jpg')}}" alt="">
                        @endif
                            <div class="text">
                                <h3><a href="{{route('expert.portfolio',$expert->slug)}}">Profile</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
          </div>
      </section>


@endsection
@section('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#divsision').select2();
        $('#district').select2();
        $('#upazila').select2();
        $('#union').select2();
        });
    </script>
@endsection
