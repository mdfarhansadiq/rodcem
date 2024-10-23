<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComapnyApprovalController extends Controller
{
    public function approval($slug)
    {        
        $company = Company::whereSlug($slug)->first();
        $company->status  = 1;
        $company->message = '';
        $company->save();
        return redirect()->route('companies.list')->with('success', 'Company Approved Successfull');
    }

    public function deactive(Request $request,$slug)
    {
        $company = Company::whereSlug($slug)->first();
        $company->status  = 10;
        $company->message = $request->message;
        $company->save();

        return redirect()->route('companies.list')->with('success', 'Company Decative Successfull');
    }
}


