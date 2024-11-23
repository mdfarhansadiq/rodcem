<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="নির্মাণের সহজ সমাধান">
    <meta name="keywords" content="rodcem, construction material, rod, cement, holo block, cement">
    <meta name="author" content="নির্মাণের সহজ সমাধান">
    <link rel="icon" href="{{ asset('premium/assets') }}/images/favicon/1.png" type="image/x-icon">
    <title>@yield('title')</title>

    @include('Premium.layout.frontend.partial.css')

    <style>
        .search-box {
            position: relative;
            /* This makes the search results position relative to this box */
        }

        #search-results {
            position: absolute;
            /* Floating over the rest of the content */
            top: 100%;
            /* Positioned just below the input field */
            left: 0;
            width: 100%;
            /* Takes full width of the search box */
            max-height: 300px;
            /* Limits the height and adds scroll if necessary */
            overflow-y: auto;
            /* Allows scrolling when the content exceeds max-height */
            background-color: #fff;
            /* Sets the background color */
            border: 1px solid #ccc;
            /* Adds a border for separation */
            z-index: 1000;
            /* Ensures it's on top of other elements */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Adds a shadow for better visibility */
            padding: 10px;
            /* Adds padding for content */
        }

        .close-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            font-weight: bold;
            color: #ff0000;
        }


        /* WhatsApp Button Styles */
        .whatsapp-chat {
            position: fixed;
            bottom: 130px;
            right: 70px;
            display: flex;
            align-items: center;
            background-color: #25d366;
            /* WhatsApp green */
            color: white;
            padding: 10px 15px;
            border-radius: 50px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 16px;
            z-index: 1000;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* WhatsApp Icon */
        .whatsapp-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: #25d366;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            font-size: 20px;
        }

        /* WhatsApp Button Hover Effects */
        .whatsapp-chat:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
            color: #fff;
        }



        /* Back-to-Top Button */
        .back-to-top {
            position: fixed;
            bottom: 90px;
            /* Place above WhatsApp button */
            right: 20px;
            z-index: 999;
            /* Ensure it's visible but below WhatsApp button */
        }

        .back-to-top a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            /* background-color: #333; */
            color: #fff;
            /* border-radius: 50%; */
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .back-to-top a:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
        }
    </style>
    @yield('custom_css')
</head>

<body class="bg-effect">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    @include('Premium.layout.frontend.partial.header')
    <!-- Header End -->

    <!-- mobile fix menu start -->
    @include('Premium.layout.frontend.partial.mobileHeader')
    <!-- mobile fix menu end -->

    @yield('content')

    <!-- Footer Section Start -->
    @include('Premium.layout.frontend.partial.footer')
    <!-- Footer Section End -->

    @stack('all_models')
    <!-- Quick View Modal Box Start -->
    <div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-sm-4 g-2">
                        <div class="col-lg-6">
                            <div class="slider-image">
                                <img src="{{ asset('premium/assets') }}/images/product/category/1.jpg"
                                    class="img-fluid blur-up lazyload" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="right-sidebar-modal">
                                <h4 class="title-name">Peanut Butter Bite Premium Butter Cookies 600 g</h4>
                                <h4 class="price">$36.99</h4>
                                <div class="product-rating">
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
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <span class="ms-2">8 Reviews</span>
                                    <span class="ms-2 text-danger">6 sold in last 16 hours</span>
                                </div>

                                <div class="product-detail">
                                    <h4>Product Details :</h4>
                                    <p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love.
                                        Caramels marshmallow icing dessert candy canes I love soufflé I love toffee.
                                        Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon
                                        muffin I love carrot cake sugar plum dessert bonbon.</p>
                                </div>

                                <ul class="brand-list">
                                    <li>
                                        <div class="brand-box">
                                            <h5>Brand Name:</h5>
                                            <h6>Black Forest</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Product Code:</h5>
                                            <h6>W0690034</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Product Type:</h5>
                                            <h6>White Cream Cake</h6>
                                        </div>
                                    </li>
                                </ul>

                                <div class="select-size">
                                    <h4>Cake Size :</h4>
                                    <select class="form-select select-form-size">
                                        <option selected>Select Size</option>
                                        <option value="1.2">1/2 KG</option>
                                        <option value="0">1 KG</option>
                                        <option value="1.5">1/5 KG</option>
                                        <option value="red">Red Roses</option>
                                        <option value="pink">With Pink Roses</option>
                                    </select>
                                </div>

                                <div class="modal-button">
                                    <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md add-cart-button icon">Add
                                        To Cart</button>
                                    <button onclick="location.href = 'product-left.html';"
                                        class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                        View More Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal Box End -->

    <!-- Location Modal Start -->
    <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Alabama</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Arizona</h6>
                                    <span>Min: $150</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>California</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Colorado</h6>
                                    <span>Min: $140</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Florida</h6>
                                    <span>Min: $160</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Georgia</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Kansas</h6>
                                    <span>Min: $170</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Minnesota</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>New York</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Washington</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->

    <!-- Cookie Bar Box Start -->
    {{-- <div class="cookie-bar-box">
        <div class="cookie-box">
            <div class="cookie-image">
                <img src="{{asset('premium/assets')}}/images/cookie-bar.png" class="blur-up lazyload" alt="">
                <h2>Cookies!</h2>
            </div>

            <div class="cookie-contain">
                <h5 class="text-content">We use cookies to make your experience better</h5>
            </div>
        </div>

        <div class="button-group">
            <button class="btn privacy-button">Privacy Policy</button>
            <button class="btn ok-button">OK</button>
        </div>
    </div> --}}
    <!-- Cookie Bar Box End -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{ asset('premium/assets') }}/images/vegetable/product/10.png"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{ asset('premium/assets') }}/images/vegetable/product/11.png"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{ asset('premium/assets') }}/images/vegetable/product/12.png"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="{{ asset('premium/assets') }}/images/vegetable/product/13.png"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->

    <!-- Tap to top start -->
    <div class="theme-option">
        {{-- <div class="setting-box">
            <button class="btn setting-button">
                <i class="fa-solid fa-gear"></i>
            </button>

            <div class="theme-setting-2">
                <div class="theme-box">
                    <ul>
                        <li>
                            <div class="setting-name">
                                <h4>Color</h4>
                            </div>
                            <div class="theme-setting-button color-picker">
                                <form class="form-control">
                                    <label for="colorPick" class="form-label mb-0">Theme Color</label>
                                    <input type="color" class="form-control form-control-color" id="colorPick"
                                        value="#0da487" title="Choose your color">
                                </form>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>Dark</h4>
                            </div>
                            <div class="theme-setting-button">
                                <button class="btn btn-2 outline" id="darkButton">Dark</button>
                                <button class="btn btn-2 unline" id="lightButton">Light</button>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>RTL</h4>
                            </div>
                            <div class="theme-setting-button rtl">
                                <button class="btn btn-2 rtl-unline">LTR</button>
                                <button class="btn btn-2 rtl-outline">RTL</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <a href="https://wa.link/tw0mt2" target="_blank" class="whatsapp-chat">
            <div class="whatsapp-icon">
                <i class="fa fa-whatsapp"></i>
            </div>
            <span class="whatsapp-text">Chat with us</span>
        </a>



        <div class="back-to-top">
            <a id="back-to-top" href="#">
                {{-- <i class="fas fa-chevron-up"></i> --}}
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->


    @include('Premium.layout.frontend.partial.js')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('custom_js')


    <script>
        $(document).ready(function() {
            $('#search-input').on('input', function() {
                let query = $('#search-input').val();


                if (query.length === 0) {
                    $('#search-results').hide(); // Hide results if input is empty
                    return;
                }

                $.ajax({
                    url: "{{ route('search') }}",
                    type: 'GET',
                    data: {
                        search: query
                    },
                    success: function(response) {
                        document.getElementById("search-results").style.display = 'block';

                        let resultContainer = $('#search-results');
                        resultContainer.html(
                            '<button id="close-results" class="close-btn">x</button>'
                        ); // Add close button
                        resultContainer.show(); // Show the results section
                        const assetUrl =
                            "{{ asset('') }}"; // This will give you the base URL for your assets
                        // Make sure this element exists in the view
                        // resultContainer.html(''); // Clear previous results
                        let hasResults = false;
                        if (response.products.length > 0) {
                            hasResults = true;
                            resultContainer.append('<h3><b>Products</b></h3>');
                            response.products.forEach(function(product) {
                                let item = `<div class="card mt-2">
                                                <div class="card-body">
                                                    <h5><a href="/product/${product.slug}" target="_blank">${product.name}</a></h5>

                                                </div>
                                            </div>`;
                                resultContainer.append(item);
                            });
                        }
                        if (response.expertcategories.length > 0) {
                            hasResults = true;
                            resultContainer.append('<h3><b>Experts</b></h3>');
                            response.expertcategories.forEach(function(expertcateg) {
                                let item = `<div class="card mt-2">
                                                <div class="card-body">
                                                    <h5><a href="/expert/${expertcateg.slug}" target="_blank">${expertcateg.name}</a></h5>
                                                </div>
                                            </div>`;
                                resultContainer.append(item);
                            })
                        }
                        if (response.productcategories.length > 0) {
                            hasResults = true;
                            resultContainer.append('<h3><b>Product Categories</b></h3>');
                            response.productcategories.forEach(function(productcateg) {
                                let item = `<div class="card mt-2">
                                                <div class="card-body">
                                                    <h5><a href="/category/product/${productcateg.slug}" target="_blank">${productcateg.name}</a></h5>
                                                </div>
                                            </div>`;
                                resultContainer.append(item);
                            })
                        }

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
            $(document).on('click', '#close-results', function() {
                $('#search-results').hide(); // Hide the results section when close button is clicked
            });
        });
    </script>


</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 08:49:18 GMT -->


</html>
