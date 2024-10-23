@extends('layouts.master.ecommerce')
@section('title')
Shopping Checkout
@endsection
@section('custom_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
          <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <h2 class="d-none">Hide</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="{{route('front')}}">Home</a></li>
                                <li><a href="{{route('ecommerce.index')}}">Shop</a></li>
                                <li>Cart</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

                <!-- wpo-checkout-area start-->
                <div class="wpo-checkout-area section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="single-page-title">
                                    <h2>Your Checkout</h2>
                                    <p>There are <span class="text-success">{{agent_cart_count($agent->id)}} products </span> in this list</p>
                                </div>
                            </div>
                        </div>                      
                            <div class="checkout-wrap">
                                <div class="row">
                                    <div class="col-lg-8 col-12">                            
                                        <div class="caupon-wrap s3">
                                            <div class="biling-item">
                                                <div class="billing-adress">
                                                    <div class="contact-form form-style">
                                                        <h2 style="margin-bottom: 0px">Delevery Address</h2>     
                                                        <form action="{{route('palce.order')}}" method="post">                                                        
                                                            @csrf
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleFormControlSelect3">Division</label>
                                                                    <select name="division" class="form-control form-control-sm js-example-basic-single" id="divsision" required>
                                                                        <option value="">Select Divission</option>
                                                                        @foreach ($divissions as $division )                  
                                                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div> 
                                                                    <div class="form-group col-md-6">
                                                                    <label for="exampleFormControlSelect3">District</label>
                                                                    <select name="district" class="form-control form-control-sm js-example-basic-single_district" id="district" required>
                                                                        <option value="">Select District</option>
                                                                        @foreach ($districts as $district )                  
                                                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div> 
                                                                    <div class="form-group col-md-6">
                                                                    <label for="exampleFormControlSelect3">Upazila</label>
                                                                    <select name="upazila" class="form-control form-control-sm js-example-basic-single_upazila" id="upazila" required>
                                                                        <option value="">Select Upazila</option>
                                                                        @foreach ($upazilas as $upazila )                  
                                                                        <option value="{{$upazila->id}}">{{$upazila->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div> 
                                                                    <div class="form-group col-md-6">
                                                                    <label for="exampleFormControlSelect3">Union</label>
                                                                    <select name="union" class="form-control form-control-sm js-example-basic-single_upazila" id="union" required>
                                                                        <option value="">Select Union</option>
                                                                        @foreach ($unions as $union )                  
                                                                        <option value="{{$union->id}}">{{$union->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>                                                                                                                              
                                                                <div class="col-lg-12 col-md-12 col-12 mt-2">
                                                                    <div class="note-area">
                                                                        <label for="">Delivery Date</label>
                                                                        <input type="date" name="delivery_date" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-12 mt-2">
                                                                    <div class="note-area">
                                                                        <label for="">Note</label>
                                                                        <textarea name="note"  placeholder="Write Addational Information.."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-12">
                                                                    <button type="submit" class="btn btn-success mr-2 mt-3">Generate  Order</button>
                                                                </div>
                                                            </div>                                                                                                                            
                                                        </form>                                              
                                                    </div>
                                                </div>
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="cout-order-area">
                                            <h3>Your Order</h3>
                                            <div class="oreder-item">
                                                <div class="title">
                                                    <h2>Products <span>Subtotal</span></h2>
                                                </div>
                                                @foreach (agent_cart_items($agent->id) as $item )                                                    
                                                    <div class="oreder-product">
                                                        <div class="images">
                                                            <span>
                                                                <img src="{{asset('company/products/'.$item->product->image)}}" alt="">
                                                            </span>
                                                        </div>
                                                        <div class="product">
                                                            <ul>
                                                                <li class="first-cart">{{$item->product->name}}(x{{$item->quentity}})</li>
                                                            </ul>
                                                        </div>
                                                        <span>{{$item->product->price}}</span><sup>Tk</sup>
                                                    </div>
                                                @endforeach                                    
                                                <div class="title s2">
                                                    <h2>Total<span>{{cart_subtotal($agent->id)}} <sup>Tk</sup></span></h2>
                                                </div>
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                            </div>                    
                    </div>
                </div>
                <!-- wpo-checkout-area end-->
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
        {{-- Location  --}}
        <script>
            $(function(){
                // All Divisions
                $('#divsision').change(function(){
                    var division_id = $(this).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type   : 'get',
                        url    : "{{route('all.district')}}",
                        data   : {'division_id' : division_id},
                        success:function(response){
                         $('#district').html(response.html);
                         $('#upazila').html(response.district_upazilas);
                         $('#union').html(response.upazilas_union);  
                        },
                    });
                });
    
                // All upazilas
                $('#district').change(function(){
                    var district_id = $(this).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type   : 'get',
                        url    : "{{route('all.upazila')}}",
                        data   : {'district_id' : district_id},
                        success:function(response){
                         $('#upazila').html(response.html);
                        },
                    });
                });
    
                 // All unions
                    $('#upazila').change(function(){
                    var upazila_id = $(this).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type   : 'get',
                        url    : "{{route('all.union')}}",
                        data   : {'upazila_id' : upazila_id},
                        success:function(response){
                         $('#union').html(response.html);
                        },
                    });
                });
            });
        </script>
@endsection
