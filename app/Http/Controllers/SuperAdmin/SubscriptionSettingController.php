<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentSubscriptionSetting;
use Illuminate\Http\Request;

class SubscriptionSettingController extends Controller
{
    public function index()
    {
        return view('Super.subscription.index',['subscriptions'=> AgentSubscriptionSetting::latest()->get()] );
    }

    public function store(Request $request)
    {
        
        // $subscripiton = AgentSubscriptionSetting::first();
        // if($subscripiton)
        // {
        //     $subscripiton->update($request->all());            
        // }else{
        // }
        
        AgentSubscriptionSetting::Create($request->all());
        return redirect()->route('super.subscription.setting.index')->with('success', 'Subscription Create Successfull.');
    }

    public function update(Request $request, $id)
    {
        $subscripiton = AgentSubscriptionSetting::find($id);
        $subscripiton->update($request->all());
        return redirect()->route('super.subscription.setting.index')->with('success', 'Subscription Update Successfull.');
    }
    
    public function delete($id)
    {
           $subscripiton = AgentSubscriptionSetting::find($id)->delete();
           return redirect()->route('super.subscription.setting.index')->with('success', 'Subscription Delete Successfull.');
    }

}
