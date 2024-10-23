<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAgentController extends Controller
{
    public function agent_register_form()
    {
        return view('Super.Agent.register');
    }

    public function agent_register(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255', 'unique:companies'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'  => ['required', 'unique:agents'],
        ]);

        Agent::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'category'      => $request->category,
            'password'      => Hash::make($request->password),
        ]);

        return redirect()->route('agents.list')->with('success', 'New Agent Added Successfull!');
    }

    public function agent_view($id)
    {
        $agent = Agent::find($id);
        auth('agent')->login($agent);
        return redirect()->route('agent.dashboard');
    }

    public function agent_delete($id)
    {
        $agent = Agent::find($id);
        //Order Delete;
        foreach ($agent->orders as $order) {

            if ($order && $order->status != 'payment_done' && $order->status != 'agent_payment_receive' && $order->status != 'deliver') {
                foreach ($order->order_details as $detais) {
                    $detais->delete();
                }
                if ($order->order_location) {
                    $order->order_location->delete();
                }
                if ($order->order_cancel) {
                    $order->order_cancel->delete();
                }
                if ($order->payment_slip) {
                    $order->payment_slip->delete();
                }
                if ($order->client) {
                    $order->client->delete();
                }
                $order->delete();
            } else {
                return back()->with('error', 'You Can\'t Delete This Agent');
            }
        }

        if($agent->location)
        {
            $agent->location->delete();
        }
        if($agent->present_info)
        {
            $agent->present_info->delete();
        }
        if($agent->parmanent_info)
        {
            $agent->parmanent_info->delete();
        }
        if($agent->nominee_info)
        {
            $agent->nominee_info->delete();
        }
        if($agent->shop_info)
        {
            $agent->shop_info->delete();
        }
        if($agent->agent_banner)
        {
            $agent->agent_banner->delete();
        }
        if($agent->agent_image)
        {
            $agent->agent_image->delete();
        }

        if(count($agent->agent_chooes) != 0)
        {
            $agent->agent_chooes->each->delete();
        }
        if(count($agent->agent_contacts) != 0)
        {
            $agent->agent_contacts->each->delete();
        }

        $agent->delete();
        return back()->with('success', 'Agent Delete Successfull!');
    }
}
