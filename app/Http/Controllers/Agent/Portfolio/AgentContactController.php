<?php

namespace App\Http\Controllers\Agent\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\AgentContact;
use Illuminate\Http\Request;

class AgentContactController extends Controller
{
    public function index()
    {
        return view('Agent.portfolio.contact.index', ['contacts' => AgentContact::latest()->where('agent_id', auth('agent')->id())->get()]);
    }

    public function store(Request $request)
    {
       $contact = AgentContact::Create($request->all());
       return back()->with('success', 'Thanka For Contact!');
    }

    public function delete($id)
    {
        AgentContact::find($id)->delete();
        return redirect()->route('agent.portfolio.contact.message')->with('success', 'Message Delete Successfull!');
    }
}
