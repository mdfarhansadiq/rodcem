<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {   
        // return company_porduct_selling_count_in_month(auth('company')->id());
        return view('Dashboard.company');
    }

    public function edit()
    {
        return view('Company.edit');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required'
        ]);

        // if($request->file('logo')) { 
        //     remove_file('company/documents', auth('company')->user()->logo);
        //     $data['logo'] = upload_file('company/documents', $request->logo);
        // }
        if($request->file('cover')) {
            if(auth('company')->user()->cover) remove_file('company/documents', auth('company')->user()->cover);
            $data['cover'] = upload_file('company/documents', $request->cover);
        }

        Company::find(auth('company')->id())->update($data);

        return redirect()->back()->with('success','You have successfully updated your profile.');
    }

    public function proposal()
    {   
        $proposals = Proposal::where('company_id', '=', Auth::guard('company')->user()->id)->get();
        return view('Company.proposal-list', compact('proposals'));
    }
}