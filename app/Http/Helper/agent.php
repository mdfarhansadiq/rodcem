<?php

    // Total Order

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;

    function agent_total_orders($id)
    {
        return Order::where('agent_id', $id)->whereMonth('created_at', Carbon::now()->format('m'))->count();
    }

    //////////////// Monthly Order Staticstics Start ////////////////

    function agent_complete_order($id)
    {
        $orders = Order::where('agent_id', $id)->whereMonth('created_at',  Carbon::now()->format('m'))->get();
        $complete_orders = 0;
        foreach($orders as $order)
        {
            if($order->status == "deliver" || $order->status == "product_receive")
            {
                $complete_orders  += 1;
            }
        }
        return $complete_orders;
    }

    //total cancel
    function agent_total_cancel($id)
    {
        $orders = Order::where('agent_id', $id)->whereMonth('created_at',  Carbon::now()->format('m'))->get();
        $complete_orders = 0;
        foreach($orders as $order)
        {
            if($order->status == "cancel_by_admin" || $order->status == "cancel_by_company" || $order->status == "user_cancel" || $order->status == "agent_cancel")
            {
                $complete_orders  += 1;
            }
        }
        return $complete_orders;
    }

    //payment total
    function agent_total_payment($id)
    {
        $orders = Order::where('agent_id', $id)->whereMonth('created_at',  Carbon::now()->format('m'))->get();
        $complete_orders = 0;
        foreach($orders as $order)
        {
            if($order->status == "company_payment_receive" || $order->status == "payment_done")
            {
                $complete_orders  += 1;
            }
        }
        return $complete_orders;
    }

    //pending all order
    function agent_total_pending($id)
    {
        $orders = Order::where('agent_id', $id)->whereMonth('created_at',  Carbon::now()->format('m'))->get();
        $complete_orders = 0;
        foreach($orders as $order)
        {
            if($order->status == "pending" || $order->status == "generated")
            {
                $complete_orders  += 1;
            }
        }
        return $complete_orders;
    }


    //Current Monhty All Day Ordres Staticts
    function agent_order_of_current_month_days($id)
    {
        $order = [];
        foreach (data_range() as $date) {
            $order[] = Order::where('agent_id', $id)->whereDate('created_at', $date )->count();
        }
        return $order;
    }

    function agent_porduct_selling_count_in_month($id)
    {
        $company_ids = [];
        foreach (Company::get() as $company)
        {
            $company_ids[] = $company->id;
        }

        $company_order = [];
        foreach($company_ids as $company_id)
        {
            $comapny = Company::find($company_id);
            $company_order[$comapny->name] = Order::where('company_id', $comapny->id)->where('agent_id', $id)->count();
        }

        return $company_order;
    }
    //////////////// Monthly Order Staticstics End ////////////////


    // ///////////////////// Today Complete Order Staticstics Start //////////////

    // Agent Today Complete Order
    function agent_today_orders($id)
    {
        $agent_orders = Order::where('agent_id', $id)->whereDate('created_at', Carbon::today())->get();
        $orders = [];
        foreach($agent_orders as $order)
        {
            if($order->status == "payment_done" || $order->status == "company_payment_receive" || $order->status == "deliver" || $order->status == "product_receive")
            {
                $orders[] = $order;
            }
        }

        return $orders;
    }

    //Agent Sell in today
    function agent_total_sell_in_day($id)
    {
        $total = 0;
        foreach(agent_today_orders($id) as $order)
        {
            foreach($order->order_details as $details)
            {
                $total += $details->agent_price;
            }
        }
        return $total;
    }

    //Agent purchase in today
    function agent_total_purchase_in_day($id)
    {
        $total = 0;
        foreach(agent_today_orders($id) as $order)
        {
            foreach($order->order_details as $details)
            {
                $total += $details->price;
            }
        }
        return $total;
    }
  /////////////////////// Today Complete Order Staticstics End //////////////

  /////////////////////// This Month Complete Order Staticstics Start //////////////

    // Agent Current Month Complete Order
    function agent_current_month_orders($id)
    {
        $agent_orders = Order::where('agent_id', $id)->whereMonth('created_at', Carbon::now()->format('m'))->get();
        $orders = [];
        foreach($agent_orders as $order)
        {
            if($order->status == "payment_done" || $order->status == "company_payment_receive" || $order->status == "deliver" || $order->status == "product_receive")
            {
                $orders[] = $order;
            }
        }
        return $orders;
    }

    //Agent Sell in today
    function agent_current_month_sell_in_day($id)
    {
        $total = 0;
        foreach(agent_current_month_orders($id) as $order)
        {
            foreach($order->order_details as $details)
            {
                $total += $details->agent_price;
            }
        }
        return $total;
    }

    //Agent purchase in today
    function agent_current_month_purchase_in_day($id)
    {
        $total = 0;
        foreach(agent_current_month_orders($id) as $order)
        {
            foreach($order->order_details as $details)
            {
                $total += $details->price;
            }
        }
        return $total;
    }

  /////////////////////// This Month Complete Order Staticstics End //////////////

?>
