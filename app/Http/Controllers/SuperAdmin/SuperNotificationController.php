<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class SuperNotificationController extends Controller
{
    public function all_notification()
    {
        return view('Super.notifications.notifications');
    }
    public function make_read()
    {
        $notifications = Notification::where('receiver_guard', 'super')->where('status', 'unread')->get();        
        foreach($notifications as $notification)
        {            
            $notification->status = 'read';
            $notification->save();
        }
        return response()->json(['success', 'success']);
    }
}
