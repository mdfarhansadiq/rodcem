<?php

use App\Models\Order;

    function user_total_order($user_id)
    {
        return Order::where('user_id', $user_id)->count();
    }

    function user_complete_order($user_id)
    {
        return Order::where('user_id', $user_id)->where('status',"product_receive")->count();
    }

    function user_pending_order($user_id)
    {
        return Order::where('user_id', $user_id)->where('status', '!=' ,"product_receive")->count();
    }


?>
