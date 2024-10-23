<?php

use App\Models\Notification;
use Pusher\Pusher;

    //common puser setting
    function pusher_setting($channel, $event, $pusher_message)
    {        
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
            );
            $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
            );        
            $data['message'] = $pusher_message;
            $pusher->trigger($channel, $event, $data);
    }

    ///////////Start Super Admin Notification //////////
    function super_notification($guard)
    {
        return Notification::where('receiver_guard', $guard)->latest()->get();
    }
    function super_all_notification($guard)
    {
        return Notification::where('receiver_guard', $guard)->latest()->get();
    }

    function super_notification_count($guard)
    {
        return Notification::where('receiver_guard', $guard)->where('status', 'unread')->latest()->count();
    }
    ///////////Start Super Admin Notification //////////


    ///////////Start Agent Notification //////////
    function agent_notification($guard, $user)
    {
        return Notification::where('receiver_guard', $guard)->where('receiver_user_id', $user)->latest()->get();
    }
    function agent_all_notification($guard,$user)
    {
        return  Notification::where('receiver_guard', $guard)->where('receiver_user_id', $user)->latest()->get();
   
    }

    function agent_notification_count($guard, $user)
    {
       return  $count = Notification::where('receiver_guard', $guard)->where('receiver_user_id', $user)->where('status', 'unread')->latest()->count();
        
    }
    ///////////End Agent Notification //////////

    ///////////Start Company Notification //////////
    function company_notification($guard, $user)
    {
        return Notification::where('receiver_guard', $guard)->where('receiver_user_id', $user)->latest()->get();
    }
    function company_all_notification($guard,$user)
    {
        return  Notification::where('receiver_guard', $guard)->where('receiver_user_id', $user)->latest()->get();
   
    }

    function company_notification_count($guard, $user)
    {
       return  $count = Notification::where('receiver_guard', $guard)->where('receiver_user_id', $user)->where('status', 'unread')->latest()->count();
        
    }
    ///////////End Company Notification //////////
?>