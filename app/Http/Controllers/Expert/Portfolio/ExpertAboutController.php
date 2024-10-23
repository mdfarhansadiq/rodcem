<?php

namespace App\Http\Controllers\Expert\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\ExpertAbout;
use Illuminate\Http\Request;

class ExpertAboutController extends Controller
{
    public function index()
    {
        $about = ExpertAbout::where('expert_id', auth('expert')->id())->first();
        return view('Expert.portfolio.about.index', compact('about'));
    }

    public function update(Request $request)
    { 
       $about = ExpertAbout::where('expert_id', auth('expert')->id())->first();
        if($about)
        {          
            $request->validate([
                'age'                 => 'required',
                'description'         => 'required',
             ]);

            $about->expert_id       = auth('expert')->id();
            $about->age             = $request->age;
            $about->height          = $request->height;
            $about->weight          = $request->weight;
            $about->blood_type      = $request->blood_type;
            $about->description     = $request->description;

             if($request->hasFile('image'))
             {
                 $image    = $request->file('image');
                 $name     = 'about-image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                 $location = public_path('expert/portfolio/about');
                 $image->move($location, $name);
                 $about->image = $name;
             }
        }else{  
            
            $request->validate([
                'age'                 => 'required',
                'description'         => 'required',
                'image'               => 'required|image',  
             ]);

            $about = new ExpertAbout();
            $about->expert_id       = auth('expert')->id();
            $about->age             = $request->age;
            $about->height          = $request->height;
            $about->weight          = $request->weight;
            $about->blood_type      = $request->blood_type;
            $about->description     = $request->description;
    
            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'about-image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('expert/portfolio/about');
                $image->move($location, $name);
                $about->image = $name;
            }
        }
 
        $about->save();
        return redirect()->route('expert.portfolio.about.index')->with('success','About Update Successfull.');
    }
}
