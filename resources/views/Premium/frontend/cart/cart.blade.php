@extends('Premium.layout.frontend.premium')
@section('title')
    {{ config('app.name') }} | {{ auth('agent')->user()->name }}
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table" id="cart">
                                <tbody>
                                    @foreach (agent_cart_items(auth('agent')->id()) as $item)
                                        <tr class="product-box-contain">
                                            <td class="product-detail">
                                                <div class="product border-0">
                                                    <a href="{{ route('product.details', $item->product->slug) }}"
                                                        class="product-image"> <img src="{{ asset('company/products/' . $item->product->image) }}" class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-detail">
                                                        <ul>
                                                            <li class="name"> <a href="{{ route('product.details', $item->product->slug) }}">{{ Str::substr($item->product->name, 0, 15) }}</a> </li>

                                                            <li class="text-content"><span class="text-title">Sold  By:</span> {{ $item->product->company->name }}</li>

                                                            <li class="text-content"><span class="text-title">Quantity</span> - {{ $item->quentity }} {{ $item->product->unit->name }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="price">
                                                <h4 class="table-title text-content">Price</h4>
                                                <h6 class="theme-color"><i class="fa fa-turkish-lira"></i>{{ $item->product->price }}</h6>
                                            </td>

                                            <td class="quantity">
                                                <h4 class="table-title text-content">Qty</h4>
                                                <div class="quantity-price">
                                                    <div class="cart_qty">
                                                        <div class="input-group">
                                                            <button type="button" class="btn qty-left-minus" data-type="minus" data-id="{{$item->id}}" data-field=""> <i class="fa fa-minus ms-0" aria-hidden="true"></i></button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity" id="qty_input_{{$item->id}}" data-id="{{$item->id}}" value="{{ $item->quentity }}">
                                                            <button type="button" class="btn qty-right_plus" data-id="{{$item->id}}" data-field=""> <i class="fa fa-plus ms-0" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="subtotal">
                                                <h4 class="table-title text-content">Total</h4>
                                                <h5 id="product_total_{{$item->id}}"><i class="fa fa-turkish-lira"></i>{{ agent_cart_product_total($item->id) }}</h5>
                                            </td>

                                            <td class="save-remove">
                                                <h4 class="table-title text-content">Action</h4>
                                                <a class="remove close_button" href="{{ route('cart.product.remove', $item->id) }}">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <form action="{{ route('palce.order') }}" method="post">
                    @csrf
                    <div class="col-xxl-3">
                        <div class="summery-box p-sticky">
                            <div class="summery-header">
                                <h3>Delivery Location</h3>
                            </div>

                            <div class="summery-contain">
                                <div class="row g-4">
                                    <div class="col-md-3 col-xxl-4">
                                        <div class="form-floating theme-form-floating">
                                            <select class="form-select" name="division" id="divsision"
                                                aria-label="Floating label select example" required>
                                                <option selected="">Choose Division</option>
                                                @foreach (division() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Division</label>
                                            @error('division')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xxl-4">
                                        <div class="form-floating theme-form-floating">
                                            <select name="district" class="form-select" id="district"
                                                aria-label="Floating label select example" required>
                                                <option selected="">Choose District</option>
                                                @foreach (district() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">District</label>
                                            @error('district')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xxl-4">
                                        <div class="form-floating theme-form-floating">
                                            <select name="upazila" class="form-select" id="upazila"
                                                aria-label="Floating label select example" required>
                                                <option selected="">Choose Upazila</option>
                                                @foreach (upazila() as $item)
                                                    .
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Upazila</label>
                                            @error('upazila')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xxl-4">
                                        <div class="form-floating theme-form-floating">
                                            <select class="form-select" name="union" id="union"
                                                aria-label="Floating label select example" required>
                                                <option selected="">Choose Union</option>
                                                @foreach (union() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Union</label>
                                            @error('union')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xxl-4">
                                        <div class="form-floating theme-form-floating">
                                            <input type="date" class="form-control" name="delivery_date" required>
                                            <label for="floatingSelect">Delivery Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xxl-4">
                                        <div class="form-floating theme-form-floating">
                                            <textarea name="note" class="form-control" placeholder="Note" id="" rows="10"></textarea>
                                            <label for="floatingSelect">Note</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <ul class="summery-total">
                                <li class="list-total border-top-0">
                                    <h4>Total (BDT)</h4>
                                    <h4 class="price theme-color"><i class="fa fa-turkish-lira"></i>
                                        {{ cart_subtotal(auth('agent')->id()) }}</h4>
                                </li>
                            </ul>

                            <div class="button-group cart-button">
                                <ul>
                                    <li>
                                        <button type="submit" class="btn btn-animation proceed-btn fw-bold">Place
                                            Order</button>
                                    </li>

                                    <li>
                                        <button onclick="location.href = '{{ route('shop') }}';"
                                            class="btn btn-light shopping-button text-dark"> <i
                                                class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection
@section('custom_js')
    <script>
        $(function() {
            // All Divisions
            $('#divsision').change(function() {
                var division_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'get',
                    url: "{{ route('all.district') }}",
                    data: {
                        'division_id': division_id
                    },
                    success: function(response) {
                        $('#district').html(response.html);
                        $('#upazila').html(response.district_upazilas);
                        $('#union').html(response.upazilas_union);
                    },
                });
            });

            // All upazilas
            $('#district').change(function() {
                var district_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'get',
                    url: "{{ route('all.upazila') }}",
                    data: {
                        'district_id': district_id
                    },
                    success: function(response) {
                        $('#upazila').html(response.html);
                    },
                });
            });

            // All unions
            $('#upazila').change(function() {
                var upazila_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'get',
                    url: "{{ route('all.union') }}",
                    data: {
                        'upazila_id': upazila_id
                    },
                    success: function(response) {
                        $('#union').html(response.html);
                    },
                });
            });
        });
    </script>
    <script>
        $(function(){
            // increment cart quentity
            $('.qty-right_plus').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type : 'get',
                    url  : "{{route('qty.increment')}}",
                    data : {'id': id},
                    success:function(response){
                        $('#product_total_'+response.id).load(' #product_total_'+response.id);
                    }
                });
            });

            //decrement cart quentity
            $('.qty-left-minus').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type : 'get',
                    url  : "{{route('qty.decrement')}}",
                    data : {'id': id},
                    success:function(response){
                        if(response.message)
                        {
                            $('#qty_input_'+response.id).val(1);
                        }else{
                            $('#product_total_'+response.id).load(' #product_total_'+response.id);
                        }
                    }
                });
            });

            //cart value change
            $('.qty-input').keyup(function(){
                var id = $(this).attr('data-id');
                var quentity = $(this).val();
                $.ajax({
                    type : 'get',
                    url  : "{{route('qty.update')}}",
                    data : {'id': id, 'quentity':quentity},
                    success:function(response){
                        if(response.message)
                        {
                            $('#qty_input_'+response.id).val(1);
                        }else{
                            $('#product_total_'+response.id).load(' #product_total_'+response.id);
                        }
                    }
                });
            });

            $('.qty-right_plus').click(function(){
                var data_id = $(this).attr('data-id');
                $('#qty_input_'+data_id).val(parseInt($('#qty_input_'+data_id).val())+1);
            });
        });
    </script>
@endsection
