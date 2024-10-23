<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Company;
use App\Models\Notification;
use App\Models\OrderCancel;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::whereAgentId(auth('agent')->id())->where('user_id', '=', null)->latest()->paginate(20);
        // return view('Agent.order.index', compact('data'));
        return view('Premium.layout.frontend.agent.orders', compact('orders'));
    }

    public function create()
    {
        // $companies = Company::all();
        // return view('Agent.order.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|max:200',
            'customer_name' => 'required|max:200',
            'image'         => '',
            'products'      => 'required',
            'company_id'    => 'required',
            'des'           => '',
            'note'          => ''
        ]);

        unset($data['products']);
        $data['agent_id'] = auth('agent')->id();

        if($request->hasFile('image')) $data['image'] = upload_file('agent/orders', $request->image);

        $order = Order::create($data);

        foreach ($request->products as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item
            ]);
        }
        return redirect(route('agent.order.index'))->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('Agent.order.orderDetails', compact('order'));
    }

    public function edit(Order $order)
    {
        return back();
    }

    public function update(Request $request, Order $order)
    {
        return back();
    }

    public function destroy(Order $order)
    {
        return back();
    }

    public function oder_delete($id)
    {
        Order::find($id)->delete();
        return redirect()->route('agent.order.index')->with('success', 'Order Delete successfully.');
    }

    public function get_products($company_ids)
    {
        $data = [];
        $products = Product::with('unit')->whereIn('company_id', explode(',', $company_ids))->get();
        foreach ($products as $item) {
            array_push($data, [
                'product_id'   => $item->id,
                'product_name' => $item->name,
                'unit'    => $item->unit->name . ' (' . $item->unit->symbol . ')'
            ]);
        }
        return response()->json($data);
    }

    public function set_products_quantities_view($order_id)
    {
        $data = OrderDetail::with('product')->whereOrderId($order_id)->get();
        return view('Agent.order.quantity_set', compact('data'));
    }

    public function set_products_quantities(Request $request)
    {
        if(count($request->except('_token')) > 0){
            foreach ($request->except('_token') as $id => $quantity) {
                $detail = OrderDetail::find($id);
                $detail->update([
                    'quantity' => $quantity
                ]);
            }
            $detail->order->update([
                'status' => 'Ordered'
            ]);
        }
        return redirect(route('agent.order.index'))->with('success', 'Products quantities saved successfully.');
    }

    public function get_company_orders()
    {
        $data = Order::latest()->where('company_id', auth('company')->id())->where('status', '!=', 'generated')->where('status', '!=', 'pending')->where('status', '!=', 'user_confirm')->where('status', '!=', 'cancel_by_admin')->where('status', '!=', 'user_cancel')->get();
        return view('Company.order.index', compact('data'));
    }

    public function set_products_prices_view($id)
    {
        $order = Order::find($id);
        $data  = OrderDetail::with('product')->whereOrderId($id)->get();
        return view('Company.order.details', compact('data', 'order'));
        // return view('Company.order.prices_set', compact('data', 'order'));
    }

    public function set_products_prices(Request $request)
    {
        // return count($request->except('_token'));

        $total_price = 0;

        if(count($request->except('_token')) > 0){
            foreach ($request->except('_token') as $id => $price) {
                $detail = OrderDetail::find($id);
                $detail->update([
                    'price'  => $price,
                ]);
                $total_price += $price;
            }
            $detail->order->update([
                'total_price' => $detail->order->total_price + $total_price,
                'status'      => 1,
            ]);
        }
        return redirect(route('company.order.index'))->with('success', 'Products prices saved successfully.');
    }

    public function approve($order_id)
    {
        Order::find($order_id)->update([
            'status' => 'Approved'
        ]);
        return redirect()->back()->with('success', 'Order approved successfully.');
    }

    public function set_delivery_time_location_view($order_id)
    {
        $data = Order::find($order_id);
        return view('Agent.order.delivery_set', compact('data'));
    }

    public function set_delivery_time_location(Request $request, $order_id)
    {
        $data = $request->validate([
            'delivery_date' => 'required',
            'delivery_location' => 'required'
        ]);
        Order::find($order_id)->update($data);
        return redirect(route('agent.order.index'))->with('success', 'Delivery date and location updated successfully.');
    }

    public function set_product_prices_view($order_id)
    {
        $data = OrderDetail::with('product')->whereOrderId($order_id)->get();
        return view('Agent.order.prices_set', compact('data'));
    }

    public function set_product_prices(Request $request)
    {
        $total_price = 0;
        if(count($request->except('_token')) > 0){
            foreach ($request->except('_token') as $id => $agent_price) {
                $detail = OrderDetail::find($id);
                $detail->update([
                    'agent_price' => $agent_price
                ]);
                $total_price += $agent_price;
            }
            $detail->order->update([
                'agent_price' => $detail->order->agent_price + $total_price
            ]);
        }
        return redirect(route('agent.order.index'))->with('success', 'Products prices saved successfully.');
    }

    //company order cancel
    public function agent_order_cancel(Request $request, $id)
    {
        $order = Order::find($id);
        if($order->status == 'approve_by_admin')
        {
            Notification::Create([
                'title'             =>"#".$order->same_order_uid." Order is Cancled By ".auth(current_guard())->user()->name,
                'link'              => 'super/order/'.$order->id,
                'guard'             => current_guard(),
                'user_id'           => auth(current_guard())->id(),
                'receiver_guard'    => 'super',
                'notification_bg'   => 'bg-danger',
            ]);
            pusher_setting('super_notification_channel', 'super_notification_event', 'message');
        }
        if($order->status == "approve_by_company")
            {
                Notification::Create([
                    'title'             => "#".$order->same_order_uid." Order Cancel",
                    'link'              => 'company/order/details/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'company',
                    'receiver_user_id'  => $order->company_id,
                    'notification_bg'   => 'bg-danger',
                ]);
                pusher_setting('company_notification_channel_'.$order->company_id, 'company_notification_event_'.$order->company_id, 'Payment done by agent');
            }

        $order->status = 'cancel_by_agent';
        $order->save();
        return redirect()->route('agent.order.index')->with('success', 'Order Cancel Successfull');
    }

    //company order cancel
    public function order_cancle(Request $request, $id)
    {
        OrderCancel::Create([
            'order_id'      => $id,
            'cancel_reason' => $request->cancel_reason,
            'company_id'    => auth('company')->id(),
        ]);

        $order = Order::find($id);
        $order->status = 'cancel_by_company';
        $order->save();

        return redirect()->route('company.order.index')->with('success', 'Order Cancel Successfull');
    }

    // Agent Price set/update
    public function agent_price_setup(Request $request)
    {
        foreach($request->order_details as $detail)
        {
             OrderDetail::find($detail)->update(['agent_price' => $request->agent_price[$detail][0]]);
        }

        return back()->with('success', 'Price Setup Suceessfull!');
    }

    //Agent Product Delete From Order
    public function delete($id)
    {

        $detail = OrderDetail::find($id);
         $order_id = $detail->order_id;
         $orders = OrderDetail::where('order_id', $order_id)->count();
         if($orders == 1)
         {
            $detail->delete();
            Order::find($order_id)->delete();
            return redirect()->route('agent.order.index')->with('success', "Order Delete Successfull!");
         }else{
            $detail->delete();
            return back()->with('success', 'Delete Successfull!');
         }
    }

    //Agent Place Order
    public function agent_place_order($id)
    {
         $order = Order::find($id);
         $order->status = 'pending';
         $order->save();

         if(order_user($order->id) == 1)
         {
            return redirect()->route('agent.user.orders')->with('success', 'Order Place Successfull!');
         }
         return redirect()->route('agent.order.index')->with('success', 'Order Place Successfull!');
    }

    //comapny order approve
    public function company_order_approve($id)
    {
        $order = Order::find($id);
        $order->status = 'approve_by_company';
        $order->save();
        return redirect()->route('company.order.index')->with('success', 'Order Approved Successfull!');
    }

    //payment recived by company
    public function payment_receive($id)
    {
        $order = Order::find($id);
        $order->status = 'company_payment_receive';
        $order->save();
        return redirect()->route('company.order.index')->with('success', 'Payment Receive Successfull!');
    }
    //deliver  by company
    public function payment_deliver($id)
    {
        $order = Order::find($id);
        $order->status = 'deliver';
        $order->save();
        return redirect()->route('company.order.index')->with('success', 'Deliver Successfull!');
    }

    //Agent Product Receive
    public function product_receive($id)
    {
        $order = Order::find($id);
        $order->status = 'product_receive';
        $order->save();

        if(order_user($order->id) == 1)
         {
            return redirect()->route('agent.user.orders')->with('success', 'Product Receive Successfull!');
         }
        return redirect()->route('agent.order.index')->with('success', 'Product Receive!');
    }
}
