<?php

namespace App\Http\Controllers\Agent\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\AgentImage;
use Illuminate\Http\Request;

class AgentImageController extends Controller
{
    public function index()
    {
        return view('Agent.portfolio.image.index', ['image' => AgentImage::where('agent_id', auth('agent')->id())->first()]);
    }
    public function update(Request $request)
    {
        $imagesetting = AgentImage::where('agent_id', auth('agent')->id())->first();
        if($imagesetting)
        {
            if($request->hasFile('about_image'))
            {
                $image    = $request->file('about_image');
                $name     = 'agent-about_image-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/image');
                $image->move($location, $name);
                $imagesetting->about_image = $name;
            }
            if($request->hasFile('service_image'))
            {
                $image    = $request->file('service_image');
                $name     = 'agent-service_image-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/image');
                $image->move($location, $name);
                $imagesetting->service_image = $name;
            }
            if($request->hasFile('choose_us_image'))
            {
                $image    = $request->file('choose_us_image');
                $name     = 'agent-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/image/');
                $image->move($location, $name);
                $imagesetting->choose_us_image = $name;
            }
            $imagesetting->save();
        }else{
            $imagesetting = new AgentImage();
            $imagesetting->agent_id = auth('agent')->id();

            if($request->hasFile('about_image'))
            {
                $image    = $request->file('about_image');
                $name     = 'agent-about_image-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/image');
                $image->move($location, $name);
                $imagesetting->about_image = $name;
            }
            if($request->hasFile('service_image'))
            {
                $image    = $request->file('service_image');
                $name     = 'agent-service_image-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/image');
                $image->move($location, $name);
                $imagesetting->service_image = $name;
            }
            if($request->hasFile('choose_us_image'))
            {
                $image    = $request->file('choose_us_image');
                $name     = 'agent-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('agent/portfolio/image/');
                $image->move($location, $name);
                $imagesetting->choose_us_image = $name;
            }

            $imagesetting->save();
        }

        return redirect()->route('agent.portfolio.image')->with('success', 'Banner Update Successfull!');

    }
}
