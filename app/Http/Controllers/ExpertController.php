<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    public function index()
    {   
        return view('Dashboard.expert');
    }

    public function edit()
    {
        return view('Expert.edit');
    }

    public function update(Request $request)
    {
        return $request;
        if($request->hasFile('logo')){
            //get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // GET just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            //filename to store
            $fileLogoToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('logo')->storeAs('public/company', $fileLogoToStore);

        } else {
            $fileLogoToStore = 'logo.png';
        }


        if($request->hasFile('cover')){
            //get filename with the extension
            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            // GET just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover')->getClientOriginalExtension();
            //filename to store
            $fileCoverToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover')->storeAs('public/company', $fileCoverToStore);

        } else {
            $fileCoverToStore = 'cover.png';
        }


        if($request->hasFile('doc')){
            //get filename with the extension
            $filenameWithExt = $request->file('doc')->getClientOriginalName();
            // GET just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('doc')->getClientOriginalExtension();
            //filename to store
            $fileDocToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('doc')->storeAs('public/company', $fileDocToStore);

        } else {
            $fileDocToStore = 'doc.png';
        }
    
    

        $account = Auth::guard('company')->user()->id;


        $company                = Company::find($account);
        $company->name          = $request->name;
        $company->email         = $request->email;
        $company->phone_number  = $request->phone_number;
        $company->address       = $request->address;
        $company->details       = $request->details;
        if($request->hasFile('logo')){
        $company->logo        = $fileLogoToStore;
            }
        if($request->hasFile('cover')){
        $company->cover        = $fileCoverToStore;
            }
        if($request->hasFile('doc')){
        $company->doc        = $fileDocToStore;
            }
        $company->save();

        return redirect()->back()->with('success','You have successfully updated your company info');
    }

    public function expert_list()
    {
        $experts = Expert::latest()->paginate(20);
        return view('Super.expert', compact('experts'));
    }
    
    public function expert_create()
    {
        return view('auth.expert-register');
    }

    // public function expert_store(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => 'required|min:3|max:100',
    //         'phone_number' => 'required|min:11|max:14',
    //         'email' => 'required|email',
    //         'password' => 'required|min:8|max:32'
    //     ]);
    //     $data['password'] = bcrypt($data['password']);
    //     Expert::create($data);
    //     return redirect(route('expert.list'))->with('success', 'Expert created successfully.');
    // }
}