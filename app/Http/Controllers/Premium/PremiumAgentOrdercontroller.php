<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;
use App\Models\AgentClient;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentSlip;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PremiumAgentOrdercontroller extends Controller
{
    // All Orders
    public function orders()
    {
        $orders = Order::whereAgentId(auth('agent')->id())->latest()->paginate(20);
        return view('Premium.layout.frontend.agent.orders', compact('orders'));
    }

    // Order Details
    public function details($id)
    {
        $order = Order::where('id', $id)->first();
        return view('Premium.layout.frontend.agent.ordersDetails', compact('order'));
    }

    //Price Set
    public function price_set(Request $request)
    {
        foreach ($request->order_details as $detail) {
            OrderDetail::find($detail)->update(['agent_price' => $request->agent_price[$detail][0]]);
        }

        $order = Order::find($request->order_id);
        if(is_user_order($order->id)->user_id != null)
        {
            $order->user_order_status = 'price_receive';
            $order->save();
        }

        return back()->with('success', 'Price Setup Suceessfull!');
    }

    // Place Order
    public function agent_place_order($id)
    {
        $order = Order::find($id);
        $order->status = 'pending';
        $order->save();

        return redirect()->route('agent.orders')->with('success', 'Order Placed Successfull!');
    }

    // order cancel
    public function order_cancel($id)
    {
        $order = Order::find($id);
        $order->status = 'cancel_by_agent';
        $order->save();
        return redirect()->route('agent.orders')->with('success', 'Order Cancel Successfull');
    }

    // paymet slip store
    public function payment_slip_store(Request $request,$id)
    {

        $request->validate([
            'slip' => 'required|image',
        ]);

        $slip = PaymentSlip::where('order_id', $id)->where('agent_id', auth('agent')->id())->first();
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
            if (is_user_order($id)->user_id != null)
            {
                $order = Order::find($id);
                $slip = PaymentSlip::Create([
                    'order_id'     => $id,
                    'agent_id'     => auth('agent')->id(),
                    'user_id'      => $order->user_id,
                ]);
            }else{
                $slip = PaymentSlip::Create([
                    'order_id'     => $id,
                    'agent_id'     => auth('agent')->id(),
                ]);
            }

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

    // order client
    public function order_client(Request $request, $id)
    {
        $client = AgentClient::where('order_id', $id)->first();
        if($client)
        {
            $client->order_id     = $id;
            $client->name         = $request->name;
            $client->phone_number = $request->phone_number;
            $client->save();
        }else{
            AgentClient::Create([
                'order_id'     => $id,
                'name'         => $request->name,
                'phone_number' => $request->phone_number,
            ]);
        }

        return back()->with('success', 'Client Create Successfull.');
    }

    // order recive
    public function product_receive($id)
    {
        $order = Order::find($id);
        $order->status = 'product_receive';
        $order->save();

        if (order_user($order->id) == 1) {
            return redirect()->route('agent.orders')->with('success', 'Product Receive Successfull!');
        }
        return redirect()->route('agent.orders')->with('success', 'Product Receive!');
    }
}
