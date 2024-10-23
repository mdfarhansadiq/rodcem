<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderCancel;
use Illuminate\Http\Request;

class SuperOrderController extends Controller
{
    public function index()
    {
        return view('Super.order.index', ['data' => Order::where('status', '!=', 'generated')->where('status', '!=', 'user_confirm')->where('status', '!=', 'user_cancel')->latest()->paginate(20)]);
    }

    public function details($id)
    {
        // dd(Order::find($id));
        return view('Super.order.details', ['order' => Order::find($id)]);
    }

    public function approved($id)
    {
        $order = Order::find($id);
        $order->status = 'approve_by_admin';
        $order->save();
        return redirect()->route('super.order.index')->with('success', 'Order Approved Successfull!');
    }

    //order cancel 
    public function order_cancel($id, Request $request)
    {
        $order = Order::find($id);
        $order->status = 'cancel_by_admin';
        $order->save();

        OrderCancel::Create([
            'order_id'       => $order->id,
            'cancel_reason'  => $request->cancel_reason,
            'super_admin_id' => auth('super')->id(),
        ]);
        return redirect()->route('super.order.index')->with('success', 'Order Cancel Successfull!');
    }
}
