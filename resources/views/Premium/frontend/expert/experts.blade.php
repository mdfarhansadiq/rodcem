@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | Experts
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Search</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Search</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Search Bar Section Start -->
    <section class="search-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 mx-auto">
                    <div class="title d-block text-center">
                        <h2>Search for Experts</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                    </div>

                    <div class="container mt-5" style="max-width: 600px; margin: 0 auto;">
                        <div class="search-box position-relative" style="position: relative; width: 100%;">
                            <div class="input-group" style="display: flex;">
                                <input type="text" id="expert-name-search" class="form-control"
                                    placeholder="Search with the expert name..." aria-label="Search input"
                                    style="border-radius: 0; box-shadow: none; border: 1px solid #ccc; flex-grow: 1;">
                                <button class="btn theme-bg-color text-white m-0" type="button" id="button-addon1"
                                    style="border-radius: 5px; background-color: #007bff; color: white;">Search</button>
                            </div>

                            <!-- Floating search results -->
                            <div id="search-results-expert" class="search-results"
                                style="display: none; position: absolute; top: 100%; left: 0; width: 100%; max-height: 300px; overflow-y: auto; background-color: #fff; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 10px; z-index: 1000;">
                                <button id="close-results-expert" class="close-btnn"
                                    style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; cursor: pointer; font-weight: bold; color: #333;">x</button>
                                <!-- Results will be injected here dynamically -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Bar Section End -->

    <!-- Product Section Start -->
    <section class="section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="search-product product-wrapper">
                        @foreach (Expert() as $item)
                            <div>
                                <div class="product-box-3 h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ route('expert.details', $item->slug) }}">
                                                @if ($item->image)
                                                    <img src="{{ asset('expert/profile/' . $item->image) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                @else
                                                    <img src="{{ asset('premium/assets') }}/images/expert/1.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">{{ $item->expert_designation->name ?? ''}}</span>
                                            <a href="{{ route('expert.details', $item->slug) }}">
                                                <h5 class="name">{{ $item->name }}</h5>
                                            </a>
                                            <div class="product-rating mt-2">
                                                <ul class="rating">
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                </ul>
                                                <span>(5.0)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
@section('custom_js')
    <script>
        $(document).ready(function() {
            $('#button-addon1').on('click', function() {
                let query = $('#expert-name-search').val();


                $.ajax({
                    url: "{{ route('seach.expert.name.all.category') }}",
                    type: 'GET',
                    data: {
                        search: query
                    },
                    success: function(response) {
                        document.getElementById("search-results-expert").style.display =
                        'block';

                        let resultContainer = $('#search-results-expert');
                        resultContainer.html(
                            '<button id="close-results-expert" class="close-btn">x</button>'
                        ); // Add close button
                        resultContainer.show(); // Show the results section
                        const assetUrl =
                            "{{ asset('') }}"; // This will give you the base URL for your assets
                        // Make sure this element exists in the view
                        // resultContainer.html(''); // Clear previous results
                        let hasResults = false;


                        hasResults = true;
                        resultContainer.append('<h3><b>Expert</b></h3>');
                        response.forEach(function(expert) {

                            let item = `<div class="card mt-2">
                                            <div class="card-body">
                                                <h5><a href="/expert/details/${expert.slug}" target="_blank">${expert.name} || ${expert.expert_designation.name}</a></h5>
                                            </div>
                                        </div>`;
                            resultContainer.append(item);
                        });


                        if (hasResults == false) {
                            resultContainer.append('<p>No results found</p>');
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });


            });

            // Close button functionality
            $(document).on('click', '#close-results-expert', function() {
                $('#search-results-expert').hide(); // Hide the results section when close button is clicked
            });
        });
    </script>
@endsection
