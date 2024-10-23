<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyProfileController extends Controller
{
    public function index()
    {        
        return view('Company.profile.index');
    }

    public function update(Request $request)
    {
 
         $request->validate([
            'name'            => 'required',
            'email'           => 'required|unique:companies,email,'.Auth('company')->id(),
            'phone_number'    => 'required|unique:companies,phone_number,'.Auth('company')->id(),
         ]);
         
         $company = Company::find(auth('company')->id());
         $company->name         = $request->name;
         $company->category     = $request->category;
         $company->phone_number = $request->phone_number;
         $company->email        = $request->email;
         $company->address      = $request->address;
         $company->about        = $request->about;
         $company->since        = $request->since;

         if($request->hasFile('logo'))
         {
             $image    = $request->file('logo');
             $name     = 'company-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
             $location = public_path('company/profile/logo');
             $image->move($location, $name);
             $company->logo = $name;
         }

         if($request->hasFile('cover'))
         {
             $image    = $request->file('cover');
             $name     = 'company-'. uniqid(51) . '.' . $image->getClientOriginalExtension();
             $location = public_path('company/profile/cover');
             $image->move($location, $name);
             $company->cover = $name;
         }
 
         $company->save();
         return redirect()->route('company.profile.index')->with('success','Profile Update Successfull.');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'current_password'  =>'required',
            'new_password'      =>'required|same:confirm_password',
            'confirm_password'  =>'required',
        ]);

        $company = Company::find(auth('company')->id()); 
        $check = Hash::check($request->current_password, $company->password);
        
        if($check == true)
        {
            // return $request->new_password;
            $company->password = Hash::make($request->new_password);
            $company->save();
            auth('company')->logout();
            return redirect()->route('company.login');
            // return redirect()->route('company.profile.index')->with('success','Password Change Successfull.');
        }else{
            return redirect()->route('company.profile.index')->with('warning','Incorrect Current Password');            
        }
    }
}
