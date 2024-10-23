@extends('layouts.master.ecommerce')
@section('title')
Shopping Cart
@endsection

@section('custom_css')
    <style>
    .cart-total-wrap .form-element {
        width: 100%;
        border-radius: 5px;
    }
    </style>
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
        <div class="cart-area-s2 section-padding" >
            <div class="container" style="margin-bottom:150px" style="margin-bottom:150px">
              @if(Auth()->check())
                <div class="row">
                    <div class="col-12">
                        <div class="single-page-title">
                            <h2>Your Cart</h2>
                            <p>There are <span class="text-success">{{user_cart_count(auth()->id())}} products</span>  in this list</p>
                        </div>
                    </div>
                </div>
                  <div class="cart-wrapper">
                      <div class="row">
                          <div class="col-lg-8 col-12">
                              <form action="{{route('cart.update', Auth()->id())}}" method="post">
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
                                            @foreach (user_cart_items(auth()->id()) as $item )
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
                                                  <td class="ptice">***<sup>Tk</sup></td>
                                                  <td class="td-quantity">
                                                    <input type="hidden" name="items[]" value="{{$item->id}}">
                                                      <div class="quantity cart-plus-minus">
                                                          <input class="text-value quentity" name="quentity[{{$item->id}}][]"  type="text" value="{{$item->quentity}}">
                                                          <div class="dec qtybutton">-</div>
                                                          <div class="inc qtybutton quentiy_increment">+</div>
                                                      </div>
                                                  </td>
                                                  <td class="ptice">***<sup>Tk</sup></td>
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
                                    @if (user_cart_count(auth()->id()) !=0)
                                        <button class="theme-btn-s2" style="border:none" type="submit"><i class="fi flaticon-refresh"></i> Update Cart</button>
                                    @else
                                        <h6>Your Cart is empty! Go to <a  href="{{route('ecommerce.index')}}">SHOP</a></h6>
                                    @endif
                                  </div>
                              </form>
                          </div>
                        @if (user_cart_count(auth()->id()) !=0)
                            <div class="col-lg-4 col-12">
                                <div class="cart-total-wrap">
                                    <h3>Nearby Agent</h3>
                                    @if($location && count(UserNearAgent($location)) != 0)
                                        <form action="{{route('user.order.generate')}}" method="post" id="order_form">
                                            @csrf
                                            <div class="sub-total">
                                                @foreach (UserNearAgent($location) as $agent )
                                                    <input type="radio" id="html" name="agent_id" value="{{$agent->id}}" {{$loop->index == 0 ? 'checked' : ''}}>
                                                    @if($agent->image)
                                                        <img width="40" height="40" src="{{asset('agent/profile/'.$agent->image)}}" alt="">
                                                    @else
                                                        <img width="40" height="40" src="{{asset('assets/rodcem/agents (2).jpg')}}" alt="">
                                                    @endif
                                                    <h6>{{$agent->name}}</h6> <br>
                                                    {{-- <h6>{{$agent->phone_number}}</h6> --}}
                                                    <h6><a href="{{route('agent.details', $agent->slug)}}" class="text-success">view</a></h6>
                                                @endforeach
                                            </div>
                                            <div class="note-area pt-2">
                                                <label for="">Delivery Date</label>
                                                <input type="date" class="form-control" name="delivery_date" required>
                                            </div>
                                            <div class="note-area pb-2">
                                                <label for="">Note</label>
                                                <textarea  name="note" class="form-element" placeholder="Additional Information"></textarea>
                                            </div>
                                            <button style="border:none" class="theme-btn-s2">Generate Order</button style="border:none">
                                        </form>
                                    @else
                                        <div class="shipping-option"> </div>
                                        <h5>No Agent Found!</h5>
                                        <small>  Plateas go to your profile and set your location to find your areas agent.</small>
                                        <a  class="theme-btn-s2" href="{{route('user.profile.index')}}">Find Agent</a>
                                    @endif
                                </div>
                            </div>
                        @endif

                      </div>
                  </div>
              @endif
            </div>
        </div>
        <!-- cart-area end -->
@endsection
