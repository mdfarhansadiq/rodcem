<?php

namespace App\Http\Controllers\Agent\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentChooseUs;
use Illuminate\Http\Request;

class AgentChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Agent.portfolio.chooseus.index', ['chooes' => AgentChooseUs::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                 
        $choose = AgentChooseUs::Create($request->all());
        $choose->agent_id = auth('agent')->id();
        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'agent-image-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('agent/portfolio/choose');
            $image->move($location, $name);
            $choose->image = $name;
        }
        $choose->save();
        return redirect()->route('agent.portfolio.chooes.index')->with('success', 'Portfolio Create Successfull!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $choose = AgentChooseUs::find($id);
        $choose->update($request->all());
        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'agent-image-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('agent/portfolio/choose');
            $image->move($location, $name);
            $choose->image = $name;
        }
        $choose->save();
        return redirect()->route('agent.portfolio.chooes.index')->with('success', 'Portfolio Update Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AgentChooseUs::find($id)->delete();
        return redirect()->route('agent.portfolio.chooes.index')->with('success', 'Portfolio Delete Successfull!');
    }
}
