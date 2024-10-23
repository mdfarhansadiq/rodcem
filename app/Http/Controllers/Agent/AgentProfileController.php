<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentLocation;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentProfileController extends Controller
{
    public function index()
    {
        $divissions = Division::orderBy('name', 'asc')->get();
        $districts  = District::orderBy('name', 'asc')->get();
        $upazilas   = Upazila::orderBy('name', 'asc')->get();
        $unions     = Union::orderBy('name', 'asc')->get();


        $location = AgentLocation::where('agent_id',auth('agent')->id())->first();
        return view('Agent.profile.index',compact('divissions', 'districts', 'upazilas', 'unions', 'location'));
    }

    public function update(Request $request)
    {

         $request->validate([
            'name'            => 'required',
            'email'           => 'required|unique:agents,email,'.Auth('agent')->id(),
            'phone_number'    => 'required|unique:agents,phone_number,'.Auth('agent')->id(),
         ]);

         $agent = Agent::find(auth('agent')->id());
         $agent->name         = $request->name;
         $agent->phone_number = $request->phone_number;
         $agent->email        = $request->email;

         if($request->hasFile('image'))
         {
             $image    = $request->file('image');
             $name     = 'agent-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
             $location = public_path('agent/profile');
             $image->move($location, $name);
             $agent->image = $name;
         }

         $agent->save();
         return redirect()->route('agent.profile.index')->with('success','Profile Update Successfull.');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'current_password'  =>'required',
            'new_password'      =>'required|same:confirm_password',
            'confirm_password'  =>'required',
        ]);

        $agent = Agent::find(auth('agent')->id());
        $check = Hash::check($request->current_password, $agent->password);

        if($check == true)
        {
            $agent->password = Hash::make($request->new_password);
            $agent->save();
            auth('agent')->logout();
            return redirect()->route('agent.login');
        }else{
            return redirect()->route('agent.profile.index')->with('warning','Incorrect Current Password');
        }
    }

    public function location(Request $request)
    {

        $location = AgentLocation::where('agent_id', auth('agent')->id())->first();
        if($location)
        {
            $location->agent_id    = auth('agent')->id();
            $location->division_id = $request->division;
            $location->district_id = $request->district;
            $location->upazila_id  = $request->upazila;
            $location->union_id    = $request->union;
            $location->save();
        }else{

            AgentLocation::Create([
                'agent_id'      => auth('agent')->id(),
                'division_id'   => $request->division,
                'district_id'   => $request->district,
                'upazila_id'    => $request->upazila,
                'union_id'      => $request->union,
            ]);
        }
        return redirect()->route('agent.profile.index')->with('success','Location Update Successfull!');
    }
}
