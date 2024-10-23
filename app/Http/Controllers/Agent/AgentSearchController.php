<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AgentSearchController extends Controller
{
    public function order_search(Request $request)
    {
        $data = Order::where('same_order_uid', 'like',  '%'.$request->search.'%')->where('agent_id', auth('agent')->id())->where('user_id', '=', null)->latest()->paginate(20);
        if(count($data) != 0)
        {
            return view('Agent.order.index', compact('data'));
        }else{
            return back()->with('error', 'No Data Found');
        }
    }

    public function order_date_filter(Request $request)
    {
        $data = Order::whereBetween('created_at',[$request->start_date, $request->end_date])->where('agent_id', auth('agent')->id())->where('user_id', '=', null)->latest()->paginate(20);
        if(count($data) != 0)
        {
            return view('Agent.order.index', compact('data'));
        }
        else{
            return back()->with('error', 'No Data Found');
        }
    }
}
