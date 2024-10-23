<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class CompanyNotificationController extends Controller
{
    public function all_notification()
    {
        return view('Company.notifications.notifications');
    }
    public function make_read()
    {        
        $notifications = Notification::where('receiver_guard', 'company')->where('receiver_user_id', auth('company')->id())->where('status', 'unread')->get();        
        foreach($notifications as $notification)
        {            
            $notification->status = 'read';
            $notification->save();
        }
        return response()->json(['success', 'success']);
    }
}
