<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Company;
use App\Models\Expert;
use App\Models\Order;
use Illuminate\Http\Request;

class SuperAdminSearchController extends Controller
{
    // Order Search 
    public function order_search(Request $request)
    {
        $data = Order::where('same_order_uid', 'like',  '%'.$request->search.'%')->where('status', '!=', 'generated')->latest()->paginate(20);
        if(count($data) != 0)
        {
            return view('Super.order.index', compact('data'));
        }else{
            return back()->with('error', 'No Data Found');
        }
    }

    //Order date filte
    public function order_date_filter(Request $request)
    {
        $data = Order::whereBetween('created_at',[$request->start_date, $request->end_date])->where('status', '!=', 'generated')->latest()->paginate(20);
        if(count($data) != 0)
        {
            return view('Super.order.index', compact('data'));
        }
        else{
            return back()->with('error', 'No Data Found');
        }
    }

    //Company Search
    public function company_search(Request $request)
    {
        $companies = Company::where('name', 'like',  '%'.$request->search.'%')->orWhere('email', 'like',  '%'.$request->search.'%')->orWhere('phone_number', 'like',  '%'.$request->search.'%')->latest()->paginate(20);
        if(count($companies) != 0)
        {
            return view('Super.company', compact('companies'));
        }else{
            return back()->with('error', 'No Data Found');
        }
    }

    //Agent Search
    public function agent_search(Request $request)
    {
        $agents = Agent::where('name', 'like',  '%'.$request->search.'%')->orWhere('email', 'like',  '%'.$request->search.'%')->orWhere('phone_number', 'like',  '%'.$request->search.'%')->latest()->paginate(20);
        if(count($agents) != 0)
        {
            return view('Super.agent', compact('agents'));
        }else{
            return back()->with('error', 'No Data Found');
        }
    }

    //Expert Search
    public function expert_search(Request $request)
    {
        $experts = Expert::where('name', 'like',  '%'.$request->search.'%')->orWhere('email', 'like',  '%'.$request->search.'%')->orWhere('phone_number', 'like',  '%'.$request->search.'%')->latest()->paginate(20);
        if(count($experts) != 0)
        {
            return view('Super.expert', compact('experts'));
        }else{
            return back()->with('error', 'No Data Found');
        }
    }
    
}
