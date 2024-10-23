<?php

namespace App\Http\Controllers\Agent\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\AgentBanner;
use Illuminate\Http\Request;

class AgentBannerController extends Controller
{
    public function index()
    {
        return view('Agent.portfolio.banner.index', ['banner' => AgentBanner::where('agent_id', auth('agent')->id())->first()]);
    }
    public function update(Request $request)
    {
        $banner = AgentBanner::where('agent_id', auth('agent')->id())->first();
        if($banner)
        {
            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'agent-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/banner');
                $image->move($location, $name);
                $banner->image = $name;
            }
            if($request->hasFile('bg_image'))
            {
                $image    = $request->file('bg_image');
                $name     = 'agent-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/banner/bg');
                $image->move($location, $name);
                $banner->bg_image = $name;
            }
            $banner->save();
        }else{
            $banner = new AgentBanner();
            $banner->agent_id = auth('agent')->id();

            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'agent-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/banner');
                $image->move($location, $name);
                $banner->image = $name;
            }
            if($request->hasFile('bg_image'))
            {
                $image    = $request->file('bg_image');
                $name     = 'agent-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/banner/bg');
                $image->move($location, $name);
                $banner->bg_image = $name;
            }

            $banner->save();
        }

        return redirect()->route('agent.portfolio.banner')->with('success', 'Banner Update Successfull!');

    }
}
