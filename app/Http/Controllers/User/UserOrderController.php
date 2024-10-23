<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\District;
use App\Models\Division;
use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\OrderLocation;
use App\Models\PaymentSlip;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\UserLocation;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function order_generate(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::select('comapny_id')->where('user_id', $user->id)->get();
            $comapnys = [];
            foreach($carts as $cart)
            {
                array_push($comapnys, $cart->comapny_id);
            }

            $uniq_comapny = array_unique($comapnys);

            foreach($uniq_comapny as $comapny_id )
            {
                //order create
                $order = Order::Create([
                    'agent_id'        => $request->agent_id,
                    'user_id'         => $user->id,
                    'same_order_uid'  => time(),
                    'delivery_date'   => $request->delivery_date,
                    'company_id'      => $comapny_id,
                    'note'            => $request->note,
                ]);

                $carts = Cart::where('user_id', $user->id)->where('comapny_id', $comapny_id)->get();
                //order details
                foreach ($carts as $cart) {
                    OrderDetail::create([
                        'order_id'   => $order->id,
                        'product_id' => $cart->product_id,
                        'agent_id'   => $request->agent_id,
                        'company_id' => get_product($cart->product_id)->company_id,
                        'quantity'   => $cart->quentity,
                        'price'      => agent_cart_product_total($cart->id),
                    ]);
                }

                //delivery locatrion
                OrderLocation::create([
                    'order_id'      => $order->id,
                    'division_id'   => $user->location->divission->id,
                    'district_id'   => $user->location->district->id,
                    'upazila_id'    => $user->location->upazila->id,
                    'union_id'      => $user->location->union->id,
                ]);

               $carts->each->delete();

            }

    //   return redirect(route('user.orders'))->with('success', 'Ordered Generate successfully.');
      return redirect(route('user.order.details',$order->id))->with('success', 'Ordered Generate successfully.');
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth()->id())->latest()->get();
        return view('Premium.layout.frontend.user.orders', compact('orders'));
    }

    public function details($id)
    {
        $order = Order::where('id', $id)->first();
        // return view('user.orderDetails', compact('order'));
        return view('Premium.layout.frontend.user.ordersDetails', compact('order'));
    }

    public function cancel($id)
    {
        $order = Order::find($id);

        if($order->status == "generated")
        {
            Notification::Create([
                'title'             => "#".$order->same_order_uid." Order's Canceled",
                'link'              => 'agent/user/order/details/'.$order->id,
                'guard'             => current_guard(),
                'user_id'           => auth(current_guard())->id(),
                'receiver_guard'    => 'agent',
                'receiver_user_id'  => $order->agent_id,
                'notification_bg'   => 'bg-danger',
            ]);
            pusher_setting('agent_notification_channel_'.$order->agent_id, 'agent_notification_event_'.$order->agent_id, 'Order Canceled');
        }

        $order->status = 'user_cancel';
        $order->save();
        return redirect()->route('user.orders')->with('success', 'Order Cancel');
    }

    public function confirm($id)
    {
        $order = Order::find($id);
        if($order->status == "generated")
        {
            Notification::Create([
                'title'             => "#".$order->same_order_uid." Order's Confirmed",
                'link'              => 'agent/user/order/details/'.$order->id,
                'guard'             => current_guard(),
                'user_id'           => auth(current_guard())->id(),
                'receiver_guard'    => 'agent',
                'receiver_user_id'  => $order->agent_id,
            ]);
            pusher_setting('agent_notification_channel_'.$order->agent_id, 'agent_notification_event_'.$order->agent_id, 'Order Canceled');
        }
        $order->status = 'user_confirm';
        $order->save();
        return redirect()->route('user.orders')->with('success', 'Order Confirm');
    }

    // NearBy Agent
    public function agents()
    {

        $divissions = Division::orderBy('name', 'asc')->get();
        $districts  = District::orderBy('name', 'asc')->get();
        $upazilas   = Upazila::orderBy('name', 'asc')->get();
        $unions     = Union::orderBy('name', 'asc')->get();

        $location = UserLocation::where('user_id', Auth()->id())->first();
        $agents = UserNearAgent($location);

        return view("user.agents", compact('agents','divissions', 'districts', 'upazilas', 'unions'));
    }

    // paymet slip store
    public function payment_slip_store(Request $request, $id)
    {

        $request->validate([
            'slip' => 'required|image',
        ]);

        $order = Order::find($id);
        $slip = PaymentSlip::where('order_id', $id)->where('user_id', auth()->id())->where('agent_id', $order->agent_id)->first();
        if ($slip) {
            if ($request->hasFile('slip')) {
                $image    = $request->file('slip');
                $name     = 'payment_slip' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/slip');
                $image->move($location, $name);
                $slip->slip = $name;
                $slip->save();
            }
        } else {
            $slip = PaymentSlip::Create([
                'order_id'     => $id,
                'agent_id'     => $order->agent_id,
                'user_id'      => auth()->id(),
            ]);

            if ($request->hasFile('slip')) {
                $image    = $request->file('slip');
                $name     = 'payment_slip' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/slip');
                $image->move($location, $name);
                $slip->slip = $name;
                $slip->save();
            }

            Order::find($id)->update([
                'status' => 'payment_done',
            ]);
        }

        return back()->with('success', 'Panyment Slip Upload Successfull!');
    }

    // order recive
    public function product_receive($id)
    {
        $order = Order::find($id);
        $order->status = 'product_receive';
        $order->save();

        return redirect()->route('user.orders')->with('success', 'Product Receive!');
    }
}
