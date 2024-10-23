<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentApprovalController extends Controller
{
    public function approval($slug)
    {
        $agent = Agent::whereSlug($slug)->first();
        $agent->status = 1;
        $agent->message = '';
        $agent->save();
        return redirect()->route('agents.list')->with('success', 'Agent Approved Successfull');
    }

    public function deactive(Request $request,$slug)
    {
        $agent = Agent::whereSlug($slug)->first();
        $agent->status = 10;
        $agent->message = $request->message;
        $agent->save();

        return redirect()->route('agents.list')->with('success', 'Agent Decative Successfull');
    }
}
