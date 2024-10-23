<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SuperAdmin\SubscriptionSettingController;
use App\Models\AgentSubscription;
use App\Models\AgentSubscriptionSetting;
use Illuminate\Http\Request;

class AgentSubscriptionController extends Controller
{
    public function index()
    {
        return view('Agent.subscription.index', ['subscriptions' => AgentSubscriptionSetting::latest()->get()]);
    }
}
