<?php

namespace App\Http\Controllers\Premium\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentLocation;
use App\Models\AgentShopInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PremiumAgentController extends Controller
{
    public function dashboard()
    {
        return view('Premium.layout.frontend.agent.dashboard');
    }

    public function profile()
    {
        return view('Premium.layout.frontend.agent.profile');
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'name'            => 'required',
            // 'email'           => 'required|unique:agents,email,' . Auth('agent')->id(),
            'phone_number'    => 'required|unique:agents,phone_number,' . Auth('agent')->id(),
        ]);

        $agent = Agent::find(auth('agent')->id());
        $agent->name  = $request->name;

        if(user_exists($request->email, $request->phone_number) == 'not found')
        {
            $agent->phone_number = $request->phone_number;
            // $agent->email        = $request->email;
        }

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'agent-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('agent/profile');
            $image->move($location, $name);
            $agent->image = $name;
        }
        $agent->save();

        $shopInfo = new AgentShopInfo();
        $shopInfo->agent_id     = auth('agent')->id();
        $shopInfo->shop_name    = $request->shop_name;
        $shopInfo->shop_address = $request->shop_address;
        $shopInfo->save();

        return redirect()->route('agent.profile')->with('success', 'Profile Update Successfull.');
    }

    public function location()
    {
        return view('Premium.layout.frontend.agent.location');
    }

    public function location_update(Request $request)
    {
        $location = AgentLocation::where('agent_id', auth('agent')->id())->first();
        if ($location) {
            $location->agent_id    = auth('agent')->id();
            $location->division_id = $request->division;
            $location->district_id = $request->district;
            $location->upazila_id  = $request->upazila;
            $location->union_id    = $request->union;
            $location->save();
        } else {
            AgentLocation::Create([
                'agent_id'      => auth('agent')->id(),
                'division_id'   => $request->division,
                'district_id'   => $request->district,
                'upazila_id'    => $request->upazila,
                'union_id'      => $request->union,
            ]);
        }

        return redirect()->route('agent.location')->with('success', 'Location Update Successfull!');
    }

    public function password_change()
    {
        return view('Premium.layout.frontend.agent.passwordChange');
    }

    public function password_change_update(Request $request)
    {
        $request->validate([
            'current_password'  => 'required',
            'new_password'      => 'required|same:confirm_password',
            'confirm_password'  => 'required',
        ]);

        $agent = Agent::find(auth('agent')->id());
        $check = Hash::check($request->current_password, $agent->password);

        if ($check == true) {
            $agent->password = Hash::make($request->new_password);
            $agent->save();
            auth('agent')->logout();
            return redirect()->route('login');
        } else {
            return redirect()->route('agent.password.change')->with('warning', 'Incorrect Current Password');
        }
    }

    // public function orders()
    // {
    //     return view('Premium.layout.frontend.agent.orders');
    // }
}
