<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\District;
use App\Models\Division;
use App\Models\Expert;
use App\Models\ExpertLocation;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ExpertProfileController extends Controller
{
    public function index()
    {
        $divissions = Division::orderBy('name', 'asc')->get();
        $districts  = District::orderBy('name', 'asc')->get();
        $upazilas   = Upazila::orderBy('name', 'asc')->get();
        $unions     = Union::orderBy('name', 'asc')->get();

        $location = ExpertLocation::find(auth('expert')->id());
        return view('Expert.profile.index',compact('divissions', 'districts', 'upazilas', 'unions', 'location'));
    }

    public function update(Request $request)
    {
         $request->validate([
            'name'            => 'required',
            'email'           => 'required|unique:experts,email,'.Auth('expert')->id(),
            'phone_number'    => 'required|unique:experts,phone_number,'.Auth('expert')->id(),
            'designation'     => 'required',
         ]);

         $agent = Expert::find(auth('expert')->id());
         $agent->name         = $request->name;
         $agent->designation  = $request->designation;
         $agent->service_zone = $request->service_zone;
         $agent->phone_number = $request->phone_number;
         $agent->email        = $request->email;

         if($request->hasFile('image'))
         {
             $image    = $request->file('image');
             $name     = 'expert-'.uniqid(50) . '.' . $image->getClientOriginalExtension();
             $location = public_path('expert/profile');
             $image->move($location, $name);
             $agent->image = $name;
         }

         $agent->save();
         return redirect()->route('expert.profile.index')->with('success','Profile Update Successfull.');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'current_password'  =>'required',
            'new_password'      =>'required|same:confirm_password',
            'confirm_password'  =>'required',
        ]);

        $agent = Expert::find(auth('expert')->id());
        $check = Hash::check($request->current_password, $agent->password);

        if($check == true)
        {
            // return $request->new_password;
            $agent->password = Hash::make($request->new_password);
            $agent->save();
            auth('expert')->logout();
            return redirect()->route('expert.login');
            // return redirect()->route('expert.profile.index')->with('success','Password Change Successfull.');
        }else{
            return redirect()->route('expert.profile.index')->with('warning','Incorrect Current Password');
        }
    }

    public function location(Request $request)
    {

        $location = ExpertLocation::find(auth('expert')->id());
        if($location)
        {
            $location->agent_id    = auth('expert')->id();
            $location->division_id = $request->division;
            $location->district_id = $request->district;
            $location->upazila_id  = $request->upazila;
            $location->union_id    = $request->union;
            $location->save();
        }else{

            ExpertLocation::Create([
                'expert_id'     => auth('expert')->id(),
                'division_id'   => $request->division,
                'district_id'   => $request->district,
                'upazila_id'    => $request->upazila,
                'union_id'      => $request->union,
            ]);
        }
        return redirect()->route('expert.profile.index')->with('success','Location Update Successfull!');
    }
}
