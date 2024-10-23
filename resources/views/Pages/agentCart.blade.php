@extends('layouts.master.ecommerce')
@section('title')
Shopping Cart
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

        <!-- cart-area-s2 start -->
        <div class="cart-area-s2 section-padding">
            <div class="container"  style="margin-bottom:150px">       
                <div class="row">
                    <div class="col-12">
                        <div class="single-page-title">
                            <h2>Your Cart</h2>
                            <p>There are <span class="text-success">{{agent_cart_count(auth()->id($agent->id))}} products</span>  in this list</p>
                        </div>
                    </div>
                </div>                       
                  <div class="cart-wrapper">
                      <div class="row">
                          <div class="col-lg-8 col-12">
                              <form action="{{route('cart.update', $agent->id)}}" method="post">
                                @csrf
                                  <div class="cart-item">
                                      <table class="table-responsive cart-wrap">
                                          <thead>
                                              <tr>
                                                  <th class="images images-b">Product</th>
                                                  <th class="ptice">Price</th>
                                                  <th class="stock">Quantity</th>
                                                  <th class="ptice total">Subtotal</th>
                                                  <th class="remove remove-b">Remove</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            @foreach (agent_cart_items($agent->id) as $item )  
                                              <tr class="wishlist-item">
                                                  <td class="product-item-wish">
                                                      <div class="check-box"><input type="checkbox"
                                                              class="myproject-checkbox">
                                                      </div>
                                                      <div class="images">
                                                          <span>
                                                              <img src="{{asset('company/products/'.$item->product->image)}}" alt="">
                                                          </span>
                                                      </div>
                                                      <div class="product">
                                                          <ul>
                                                              <li class="first-cart">
                                                                <a href="{{route('product.details',$item->product->slug)}}">{{$item->product->name}} (<small class="text-primary">{{$item->product->unit->name}})</small></a>                                                                
                                                              </li>                                                           
                                                          </ul>
                                                      </div>
                                                  </td>
                                                  <td class="ptice">{{$item->product->price}}<sup>Tk</sup></td>
                                                  <td class="td-quantity">
                                                    <input type="hidden" name="items[]" value="{{$item->id}}">
                                                      <div class="quantity cart-plus-minus">
                                                          <input class="text-value quentity" name="quentity[{{$item->id}}][]"  type="text" value="{{$item->quentity}}">
                                                          <div class="dec qtybutton">-</div>
                                                          <div class="inc qtybutton quentiy_increment">+</div>
                                                      </div>
                                                  </td>
                                                  <td class="ptice">{{agent_cart_product_total($item->id)}}<sup>Tk</sup></td>
                                                  <td class="action">
                                                      <ul>
                                                          <li class="w-btn"><a data-bs-toggle="tooltip"  data-bs-html="true" title="" href="{{route('cart.product.remove',$item->id)}}" data-bs-original-title="Remove from Cart" aria-label="Remove from Cart">
                                                            <i class="fi ti-trash"></i></a>
                                                          </li>
                                                      </ul>
                                                  </td>
                                              </tr>
                                            @endforeach                                           
                                          </tbody>

                                      </table>
                                  </div>
                                  <div class="cart-action">
                                      {{-- <div class="apply-area">
                                          <input type="text" class="form-control" placeholder="Enter your coupon">
                                          <button class="theme-btn-s2" type="submit">Apply</button>
                                      </div> --}}
                                      <button class="theme-btn-s2" style="border:none" type="submit"><i class="fi flaticon-refresh"></i> Update Cart</button>
                                  </div>
                              </form>
                          </div>

                          <div class="col-lg-4 col-12">
                            <div class="cart-total-wrap">
                                <h3>Cart Totals</h3>
                                <div class="sub-total">
                                    <h4>Total</h4>
                                    <span>{{cart_subtotal($agent->id)}} <sup>Tk</sup></span>
                                </div>                          
                                <div class="shipping-option">
                                    {{-- <span>Shipping</span>                                     --}}
                                </div>                              
                                <!-- Start Calculate Shipping -->  
                                @if($agent->location)
                                    <a class="theme-btn-s2" href="{{route('checkout',$agent->id)}}">Proceed To CheckOut</a>
                                @else
                                <div class="danger ">
                                    <p><strong class="text-warning">Warning!</strong> Your Loctain Not Set Yet...</p> <br>
                                </div>
                                <a class="theme-btn-s2" href="{{route('agent.profile.index',$agent->slug)}}">Set Your Location</a>               
                                @endif
                            </div>
                        </div>
                          
                      </div>
                  </div>                               
            </div>
        </div>
        <!-- cart-area end -->
@endsection
