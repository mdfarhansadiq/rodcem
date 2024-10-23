<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\AgentClient;
use Illuminate\Http\Request;

class AgentClientController extends Controller
{
    public function store(Request $request, $id)
    {
        AgentClient::Create([

            'order_id'     => $id,
            'name'         => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        return back()->with('success', 'Client Create Successfull.');
    }
}
