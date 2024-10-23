<?php

namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use App\Models\AgentService;
use App\Models\AgentServiceCategory;
use Illuminate\Http\Request;

class SuperAgentServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Super.AgentService.index',[
            'services'   => AgentService::latest()->get(),
            'categories' => AgentServiceCategory::latest()->get(),
        ]);
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
        AgentService::Create($request->all());
        return redirect()->route('super.agent.service.index')->with('success', 'Service Create Successfull');
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
        //
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
        $service = AgentService::find($id);
        $service->update($request->all());
        return redirect()->route('super.agent.service.index')->with('success', 'Service Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AgentService::find($id)->delete();
        return redirect()->route('super.agent.service.index')->with('success', 'Service Delete Successfull');
    }
}
