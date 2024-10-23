<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertApprovalController extends Controller
{
    public function approval($slug)
    {        
        $expert = Expert::whereSlug($slug)->first();
        $expert->status  = 1;
        $expert->message = '';
        $expert->save();
        return redirect()->route('expert.list')->with('success', 'Expert Approved Successfull');
    }

    public function deactive(Request $request,$slug)
    {
        $expert = Expert::whereSlug($slug)->first();
        $expert->status  = 10;
        $expert->message = $request->message;
        $expert->save();

        return redirect()->route('expert.list')->with('success', 'Expert Decative Successfull');
    }
}
