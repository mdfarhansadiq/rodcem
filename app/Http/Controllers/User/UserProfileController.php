<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentLocation;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {   
        $divissions = Division::orderBy('name', 'asc')->get();
        $districts  = District::orderBy('name', 'asc')->get();
        $upazilas   = Upazila::orderBy('name', 'asc')->get();
        $unions     = Union::orderBy('name', 'asc')->get();

        $user = Auth::user(); 

        $location = UserLocation::where('user_id', Auth()->id())->first();
        if($location) 
        {
            $agents = UserNearAgent($location);
        }

        return view('usaer.userProfile',compact('divissions', 'districts', 'upazilas', 'unions', 'location','user')); 
    }

    public function update(Request $request)
    {
 
         $request->validate([
            'name'            => 'required',
            'email'           => 'required|unique:agents,email,'.Auth()->id(),
            'phone_number'    => 'required|unique:agents,phone_number,'.Auth()->id(),
         ]);
         
         $user = User::find(Auth()->id());
         $user->name         = $request->name;
         $user->phone_number = $request->phone_number;
         $user->email        = $request->email;

         if($request->hasFile('image'))
         {        
             $image    = $request->file('image');
             $name     = 'user-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
             $location = public_path('user/profile');
             $image->move($location, $name);
             $user->image = $name;
         }
 
         $user->save();
         return redirect()->route('user.profile.index')->with('success','Profile Update Successfull.');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'current_password'  =>'required',
            'new_password'      =>'required|same:confirm_password',
            'confirm_password'  =>'required',
        ]);

        $user = User::find(Auth()->id()); 
        $check = Hash::check($request->current_password, $user->password);
        
        if($check == true)
        {
            // return $request->new_password;
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth()->logout();
            return redirect()->route('login');
            // return redirect()->route('user.profile.index')->with('success','Password Change Successfull.');
        }else{
            return redirect()->route('user.profile.index')->with('warning','Incorrect Current Password');            
        }
    }

    public function location(Request $request)
    {
        
       $location = UserLocation::where('user_id',Auth()->id())->first();
        if($location)
        {                 
            $location->user_id     = Auth()->id();
            $location->division_id = $request->division;
            $location->district_id = $request->district;
            $location->upazila_id  = $request->upazila;
            $location->union_id    = $request->union;
            $location->save();

            $agents = UserNearAgent($location);
            // if($agent) 
            // {
            //     User::where('id', auth()->id())->update(['agent_id' => $agent->id]);  
            // }else{
            //     User::where('id', auth()->id())->update(['agent_id' => null]); 
            // }                    
        }else{          
          $location = UserLocation::Create([
                'user_id'       => Auth()->id(),
                'division_id'   => $request->division,
                'district_id'   => $request->district,
                'upazila_id'    => $request->upazila,
                'union_id'      => $request->union,
            ]);


                // $agent = UserNearAgent($location);  
                // if($agent) 
                // {
                //     User::where('id', auth()->id())->update(['agent_id' => $agent->id]);  
                // }else{
                //     User::where('id', auth()->id())->update(['agent_id' => null]); 
                // }  
            
        }
        return redirect()->route('user.profile.index')->with('success','Location Update Successfull!');  
    }
}
