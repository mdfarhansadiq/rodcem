<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {   
        return view('Dashboard.agent');
    }

    public function edit()
    {
        return view('Agent.edit');
    }

    public function update(Request $request)
    {
        
        if($request->hasFile('image')){
            //get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // GET just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/agent', $fileNameToStore);

        } else {
            $fileNameToStore = 'image.png';
        }


        if($request->hasFile('nid')){
            //get filename with the extension
            $filenameWithExt = $request->file('nid')->getClientOriginalName();
            // GET just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('nid')->getClientOriginalExtension();
            //filename to store
            $filePhotoToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('nid')->storeAs('public/agent', $filePhotoToStore);

        } else {
            $filePhotoToStore = 'nid.png';
        }

        $account = Auth::guard('agent')->user()->id;

        $agent                = Agent::find($account);
        $agent->name          = $request->name;
        $agent->email         = $request->email;
        $agent->phone_number  = $request->phone_number;
        $agent->address       = $request->address;
        if($request->hasFile('image')){
        $agent->image        = $fileNameToStore;
            }
        if($request->hasFile('nid')){
        $agent->nid        = $filePhotoToStore;
            }
        $agent->save();

        return redirect()->back()->with('success','You have successfully updated your agent info');
    }
}