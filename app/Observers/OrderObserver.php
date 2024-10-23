<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Order;
use Pusher\Pusher;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */

    public function created(Order $order)
    {

    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
            // dd($order->status);
            if($order->status == 'pending')
            {
                Notification::Create([
                    'title'             => "New Order Created By ".auth(current_guard())->user()->name,            
                    'link'              => 'super/order/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'super',        
                ]);
                pusher_setting('super_notification_channel', 'super_notification_event', 'message');
            }elseif($order->status == "approve_by_admin")
            {
                Notification::Create([
                    'title'             => "New Order",            
                    'link'              => 'company/order/details/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'company',        
                    'receiver_user_id'  => $order->company_id,        
                ]);                
                pusher_setting('company_notification_channel_'.$order->company_id, 'company_notification_event_'.$order->company_id, 'message');
            }elseif($order->status == "cancel_by_admin" || $order->status == 'cancel_by_company')
            {
                Notification::Create([
                    'title'             => "#".$order->same_order_uid." Order is Cancled",            
                    'link'              => 'agent/order/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'agent',        
                    'receiver_user_id'  => $order->agent_id,     
                    'notification_bg'   => 'bg-danger',                    
                ]);                           
                pusher_setting('agent_notification_channel_'.$order->agent_id, 'agent_notification_event_'.$order->agent_id, 'message');            
            }elseif($order->status == "approve_by_company")
            {
                // dd('order_approved');
                Notification::Create([
                    'title'             => "#".$order->same_order_uid." Order is Approved",            
                    'link'              => 'agent/order/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'agent',        
                    'receiver_user_id'  => $order->agent_id,     
                    'notification_bg'   => 'bg-success',                    
                    'icon'              => 'ti-thumb-up',                    
                ]);
                pusher_setting('agent_notification_channel_'.$order->agent_id, 'agent_notification_event_'.$order->agent_id, 'order approved');            
            }elseif($order->status == "payment_done")
            {            
                Notification::Create([
                    'title'             => "#".$order->same_order_uid." Payment Done",            
                    'link'              => 'company/order/details/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'company',        
                    'receiver_user_id'  => $order->company_id,     
                    'notification_bg'   => 'bg-success',                    
                    'icon'              => 'ti-ticket',                    
                ]);
                pusher_setting('company_notification_channel_'.$order->company_id, 'company_notification_event_'.$order->company_id, 'Payment done by agent');            
            }elseif($order->status == "company_payment_receive")
            {            
                Notification::Create([
                    'title'             => "#".$order->same_order_uid." Payment Received",            
                    'link'              => 'agent/order/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'agent',        
                    'receiver_user_id'  => $order->agent_id,                        
                    'icon'              => 'ti-ticket',                    
                ]);
                pusher_setting('agent_notification_channel_'.$order->agent_id, 'agent_notification_event_'.$order->agent_id, 'Payment Received');
            }elseif($order->status == "deliver")
            {            
                Notification::Create([
                    'title'             => "#".$order->same_order_uid." Order's Delivered",            
                    'link'              => 'agent/order/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'agent',        
                    'receiver_user_id'  => $order->agent_id, 
                    'notification_bg'   => 'bg-info',                        
                    'icon'              => 'ti-truck',                    
                ]);
                pusher_setting('agent_notification_channel_'.$order->agent_id, 'agent_notification_event_'.$order->agent_id, 'Order Delivered');
            }elseif($order->status == "product_receive")
            {            
                Notification::Create([
                    'title'             => "#".$order->same_order_uid." Product Received",            
                    'link'              => 'company/order/details/'.$order->id,
                    'guard'             => current_guard(),
                    'user_id'           => auth(current_guard())->id(),
                    'receiver_guard'    => 'company',        
                    'receiver_user_id'  => $order->company_id,     
                    'notification_bg'   => 'bg-success',                    
                    'icon'              => 'ti-ticket',                    
                ]);
                pusher_setting('company_notification_channel_'.$order->company_id, 'company_notification_event_'.$order->company_id, 'Payment done by agent');            
            }
            else{

            }


            // $notification = new Notification();
            // if($order->status == 'pending')
            // {
            //     $notification->title            = "New Order Created By ".auth(current_guard())->user()->name; 
            //     $notification->link             = 'super/order/'.$order->id;
            //     $notification->receiver_guard   = 'super'; 
            // }
            
        
                // $options = array(
                //     'cluster' => 'ap2',
                //     'useTLS' => true
                //     );
                //     $pusher = new Pusher(
                //     env('PUSHER_APP_KEY'),
                //     env('PUSHER_APP_SECRET'),
                //     env('PUSHER_APP_ID'),
                //     $options
                //     );        
                //     $data['message'] = 'new notification';
                //     $pusher->trigger('super_new_notification_channel', 'super_new_notification_event', $data);
       
        
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
