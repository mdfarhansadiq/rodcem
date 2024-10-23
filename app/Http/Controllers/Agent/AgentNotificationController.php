<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class AgentNotificationController extends Controller
{
    public function all_notification()
    {
        return view('Agent.notifications.notifications');
    }
    public function make_read()
    {        
        $notifications = Notification::where('receiver_guard', 'agent')->where('receiver_user_id', auth('agent')->id())->where('status', 'unread')->get();        
        foreach($notifications as $notification)
        {            
            $notification->status = 'read';
            $notification->save();
        }
        return response()->json(['success', 'success']);
    }
}
