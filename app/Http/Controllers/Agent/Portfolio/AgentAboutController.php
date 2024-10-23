<?php

namespace App\Http\Controllers\Agent\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\AgentAbout;
use Illuminate\Http\Request;

class AgentAboutController extends Controller
{
    public function index()
    {
        return view('Agent.portfolio.about.index', ['about' => AgentAbout::where('agent_id', auth('agent')->id())->first()]);
    }
    public function update(Request $request)
    {
        $about = AgentAbout::where('agent_id', auth('agent')->id())->first();
        if($about)
        {
            $about->heading   = $request->heading;           
            $about->paragraph = $request->paragraph;
            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'agent-about-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/about');
                $image->move($location, $name);
                $about->image = $name;
            }
           
            $about->save();
        }else{

            $about = new AgentAbout();
            $about->agent_id = auth('agent')->id();
            $about->heading   = $request->heading;           
            $about->paragraph = $request->paragraph;

            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'agent-about-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/about');
                $image->move($location, $name);
                $about->image = $name;
            }
            $about->save();
        }

        return redirect()->route('agent.portfolio.about')->with('success', 'About Update Successfull!');

    }
}
