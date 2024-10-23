<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperProfileController extends Controller
{
    public function index()
    {        
        return view('Super.profile.index');
    }

    public function update(Request $request)
    {
         $request->validate([
            'name'            => 'required',
            'email'           => 'required|unique:super_admins,email,'.Auth('super')->id(),
            'phone_number'    => 'required|unique:super_admins,phone_number,'.Auth('super')->id(),
         ]);
         
         $super = SuperAdmin::find(auth('super')->id());
         $super->name         = $request->name;
         $super->phone_number = $request->phone_number;
         $super->email        = $request->email;

         if($request->hasFile('image'))
         {
             $image    = $request->file('image');
             $name     = 'super-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
             $location = public_path('super/profile');
             $image->move($location, $name);
             $super->image = $name;
         }
 
         $super->save();
         return redirect()->route('super.profile.index')->with('success','Profile Update Successfull.');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'current_password'  =>'required',
            'new_password'      =>'required|same:confirm_password',
            'confirm_password'  =>'required',
        ]);

        $super = SuperAdmin::find(auth('super')->id()); 
        $check = Hash::check($request->current_password, $super->password);
        
        if($check == true)
        {
            // return $request->new_password;
            $super->password = Hash::make($request->new_password);
            $super->save();
            auth('super')->logout();
            return redirect()->route('Super.login');
            // return redirect()->route('super.profile.index')->with('success','Password Change Successfull.');
        }else{
            return redirect()->route('super.profile.index')->with('warning','Incorrect Current Password');            
        }
    }
}
