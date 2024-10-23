@extends('Premium.layout.frontend.premium')
@section('title')
    {{config('app.name')}} | Policy
@endsection
@section('content')
<section class="saller-poster-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-4 order-lg-2">
                    <div class="poster-box">
                        <div class="poster-image">
                            {{-- <img src="https://themes.pixelstrap.com/fastkart/assets/images/vendor-page/become-saller.svg" class="img-fluid" alt=""> --}}
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7">
                    <div class="seller-title h-100 d-flex align-items-center">
                        <div>
                            {{-- <h2>Become a seller on fastkart...</h2> --}}
                            <p> {!! $policy->privacy !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
