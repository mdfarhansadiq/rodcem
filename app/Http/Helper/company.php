<?php

    // Total Order 

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Carbon;

    function company_total_orders($id)
    {
        return Order::where('company_id', $id)->where('status', '!=', 'generated')->whereMonth('created_at', Carbon::now()->format('m'))->count();        
    }

    //////////////// Monthly Order Staticstics Start ////////////////

    function company_complete_order($id)
    {        
        $orders = Order::where('company_id', $id)->whereMonth('created_at',  Carbon::now()->format('m'))->get();
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
    function company_total_cancel($id)
    {        
        $orders = Order::where('company_id', $id)->whereMonth('created_at',  Carbon::now()->format('m'))->get();
        $complete_orders = 0; 
        foreach($orders as $order)
        {
            if($order->status == "cancel_by_admin" || $order->status == "cancel_by_company" || $order->status == "user_cancel" || $order->status == "company_cancel")
            {
                $complete_orders  += 1;
            }   
        }
        return $complete_orders;
    }

    //payment total
    function company_total_payment($id)
    {        
        $orders = Order::where('company_id', $id)->whereMonth('created_at',  Carbon::now()->format('m'))->get();
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

    // pending all order
    function company_total_pending($id)
    {        
        $orders = Order::where('company_id', $id)->where('status', 'approve_by_admin')->whereMonth('created_at',  Carbon::now()->format('m'))->get();
        $complete_orders = 0; 
        foreach($orders as $order)
        {
            $complete_orders  += 1;              
        }
        return $complete_orders;
    }



    //Current Monhty All Day Ordres Staticts 
    function company_order_of_current_month_days($id)
    {
        $comany_order = [];
        foreach (data_range() as $date) {                        
            $orders = Order::where('company_id', $id)->whereDate('created_at', $date )->get();
            $count = 0;
            foreach($orders as $order)
            {
                if($order->status == "cancel_by_admin" || $order->status == "cancel_by_company" || $order->status == "user_cancel" || $order->status == "company_cancel" || $order->status == "approve_by_admin" || $order->status == "approve_by_company" || $order->status == "payment_done" || $order->status == "company_payment_receive" || $order->status == "deliver" || $order->status == "product_receive" )
                {
                    $count += 1;
                }
            }
            $comany_order[] = $count;
            $count = 0;
        }
        return $comany_order;
    }
    
    function comapny_payment_done_orders($id)
    {

        $orders = Order::where('company_id', $id)->whereMonth('created_at', Carbon::now()->format('m'))->get();          
        $company_order = [];
        foreach($orders as $order)
        {               
            if($order->status == "payment_done" || $order->status == "company_payment_receive" || $order->status == "deliver" || $order->status == "product_receive")
            {
                $company_order[] = $order;
            }                    
        }
        
        return $company_order;
    }

    function company_porduct_selling_count_in_month($id)
    {
        // $product = [];
        // foreach(comapny_payment_done_orders($id) as $order)
        // {
        //     foreach($order->order_details as $details)
        //     {
        //         // return $details->product;
        //         if($details->product->name )
        //          $product [$details->product->name] = $details->quantity;
        //     }
        // }
        // return $product;

        // $order_details = OrderDetail::where('company_id', $id)->whereMonth('created_at', Carbon::now()->format('m'))->get();
        // $product_id = [];
        // foreach($order_details as $details)
        // {            
        //     $product_id[] = $details->product_id;            
        // }
        // $company_product_ids = array_unique($product_id);


        // $products = [];
        // foreach($company_product_ids as $company_product_id)
        // {
        //     $order_details = OrderDetail::where('product_id', $company_product_id)->whereMonth('created_at', Carbon::now()->format('m'))->get();
        //     foreach($order_details as $details)
        //     {
        //         if($details->order->status == "payment_done" || $details->order->status == "company_payment_receive" || $details->order->status == "deliver" || $details->order->status == "product_receive")
        //         {
        //             $quentity = OrderDetail::where('product_id', $company_product_id)->whereMonth('created_at', Carbon::now()->format('m'))->sum('quantity');
        //             $product  = Product::find($company_product_id);
        //             $products[$product->name] = $quentity ." ". $product->unit->name;
        //         }
        //     }
        // }
        // return $products;
    }
    //////////////// Monthly Order Staticstics End ////////////////


    // ///////////////////// Today Complete Order Staticstics Start //////////////

    // Company Today Complete Order 
    function company_today_orders($id)
    {
        $company_orders = Order::where('company_id', $id)->whereDate('created_at', Carbon::today())->get();
        $orders = [];
        foreach($company_orders as $order)
        {
            if($order->status == "payment_done" || $order->status == "company_payment_receive" || $order->status == "deliver" || $order->status == "product_receive")
            {
                $orders[] = $order;
            }
        }
        return $orders;
    }

    //Company Sell in today 
    function company_total_sell_in_day($id)
    {
        $total = 0;
        foreach(company_today_orders($id) as $order)
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

    // Company Current Month Complete Order 
    function company_current_month_orders($id)
    {
        $company_orders = Order::where('company_id', $id)->whereMonth('created_at', Carbon::now()->format('m'))->get();
        $orders = [];
        foreach($company_orders as $order)
        {
            if($order->status == "payment_done" || $order->status == "company_payment_receive" || $order->status == "deliver" || $order->status == "product_receive")
            {
                $orders[] = $order;
            }
        }
        return $orders;
    }

    //Company Sell in today 
    function company_current_month_sell_in_day($id)
    {     
        $total = 0;
        foreach(company_current_month_orders($id) as $order)
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