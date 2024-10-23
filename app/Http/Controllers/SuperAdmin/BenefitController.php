<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Super.benefit.index', ['benefits' => Benefit::latest()->get()]);
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
        $benefit = Benefit::Create($request->all());
        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'agent-image-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('super/benefit');
            $image->move($location, $name);
            $benefit->image = $name;
        }
        $benefit->save();
        return redirect()->route('benifit.index')->with('success', 'Benefit Create Successfull!'); 
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
        $benefit = Benefit::find($id);
        $benefit->update($request->all());
        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'agent-image-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('super/benefit');
            $image->move($location, $name);
            $benefit->image = $name;
        }
        $benefit->save();
        return redirect()->route('benifit.index')->with('success', 'Benefit Update Successfull!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Benefit::find($id)->delete();
        return redirect()->route('benifit.index')->with('success', 'Benefit Delete Successfull!');
    }
}
