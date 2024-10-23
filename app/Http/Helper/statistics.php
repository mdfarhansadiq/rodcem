<?php

use App\Models\Agent;
use App\Models\Company;
use App\Models\Expert;
use App\Models\Order;
use App\Models\Subscriber;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;

    //Comapny
    function active_company()
    {
        return  Company::whereStatus(1)->count();
    }

    function deactive_compnay()
    {
        return  Company::whereStatus(10)->count();
    }

    function pending_company()
    {
        return  Company::whereStatus(0)->count();
    }

    //Agent
    function active_agent()
    {
        return  Agent::whereStatus(1)->count();
    }

    function deactive_agent()
    {
        return  Agent::whereStatus(10)->count();
    }

    function pending_agent()
    {
        return  Agent::whereStatus(0)->count();
    }

    //agent total order
    function total_order()
    {

        $orders = Order::whereAgentId(auth('agent')->id())->get();
        $complete_orders = 0;
        foreach ($orders as $order) {
            if ($order->status == "payment_done" || $order->status == 'company_payment_receive' ||  $order->status == 'deliver' || $order->status == 'product_receive') {
                $complete_orders  += 1;
            }
        }
        return $complete_orders;
    }

    //agent total pending order
    function total_pending_order()
    {

        $orders = Order::whereAgentId(auth('agent')->id())->get();
        $complete_orders = 0;
        foreach ($orders as $order) {
            if ($order->status == 'pending' ||  $order->status == 'approve_by_company' || $order->status == 'approve_by_admin') {
                $complete_orders  += 1;
            }
        }
        return $complete_orders;
    }

    //Expert
    function active_expert()
    {
        return  Expert::whereStatus(1)->count();
    }

    function deactive_expert()
    {
        return  Expert::whereStatus(10)->count();
    }

    function pending_expert()
    {
        return  Expert::whereStatus(0)->count();
    }

    //Subscribers count
    function total_subscriber()
    {
        return Subscriber::count();
    }

    // Total Order
    function total_orders()
    {
        return Order::whereMonth('created_at', Carbon::now()->format('m'))->count();
    }

    // Monthly Order Staticstics
    //////////////// Monthly Order Staticstics Start ////////////////
    function complete_order()
    {
        $orders = Order::whereMonth('created_at',  Carbon::now()->format('m'))->get();
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

    function total_cancel()
    {
        $orders = Order::whereMonth('created_at',  Carbon::now()->format('m'))->get();
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

    //total payment
    function total_payment()
    {
        $orders = Order::whereMonth('created_at',  Carbon::now()->format('m'))->get();
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
    function total_pending()
    {
        $orders = Order::whereMonth('created_at',  Carbon::now()->format('m'))->get();
        $complete_orders = 0;
        foreach($orders as $order)
        {
            if($order->status == "pending")
            {
                $complete_orders  += 1;
            }
        }
        return $complete_orders;
    }
    //////////////// Monthly Order Staticstics End ////////////////


    //Now Month
    function now_month()
    {
        return Carbon::now()->format('M-Y');
    }

    //date range
    function data_range()
    {
        $start_date = Carbon::now()->startOfMonth()->toDateString();
        $end_date   = Carbon::now()->endOfMonth()->toDateString();
        return CarbonPeriod::create($start_date, $end_date);
    }

    //Current Monty All Day Ordres Staticts
    function all_day_current_month()
    {

        $days = [];
        foreach (data_range() as $date) {
            $days[] = $date->format('d');
        }
            return $dates = $days;
    }

    function order_of_current_month_days()
    {
        $start_date = Carbon::now()->startOfMonth()->toDateString();
        $end_date   = Carbon::now()->endOfMonth()->toDateString();
        $period     = CarbonPeriod::create($start_date, $end_date);



        $order = [];
        foreach (data_range() as $date) {
            $formated_date = $date->format('Y-m-d');
            $order[] = Order::whereDate('created_at', $date )->count();
        }
        return $order;
    }

    function company_total_order_in_month()
    {
        $company_ids = [];
        foreach (Company::get() as $company)
        {
            $company_ids[] = $company->id;
        }

        $company_order = [];
        foreach($company_ids as $id)
        {

            $comapny = Company::find($id);
             $company_order[$comapny->name] = Order::where('company_id', $id)->count();
        }

        return $company_order;
    }






?>
