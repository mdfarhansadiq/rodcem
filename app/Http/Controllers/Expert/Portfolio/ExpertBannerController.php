<?php

namespace App\Http\Controllers\Expert\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\ExpertBanner;
use Illuminate\Http\Request;

class ExpertBannerController extends Controller
{
    public function index()
    {
        $banner = ExpertBanner::where('expert_id', auth('expert')->id())->first();
        return view('Expert.portfolio.banner.index', compact('banner'));
    }

    public function update(Request $request)
    {
        
        $banner = ExpertBanner::where('expert_id', auth('expert')->id())->first();
        if($banner)
        {          
            $request->validate([
                'yourself'            => 'required',
                'profession_title'    => 'required',
                'description'         => 'required',  
             ]);

            $banner->expert_id          = auth('expert')->id();
            $banner->yourself           = $request->yourself;
            $banner->profession_title   = $request->profession_title;
            $banner->description        = $request->description;
    
             if($request->hasFile('banner_image'))
             {
                 $image    = $request->file('banner_image');
                 $name     = 'banner-image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                 $location = public_path('expert/portfolio/banner');
                 $image->move($location, $name);
                 $banner->banner_image = $name;
             }
        }else{  
            
            $request->validate([
                'yourself'            => 'required',
                'profession_title'    => 'required',
                'description'         => 'required',
                'banner_image'        => 'required|image',
             ]);

            $banner = new ExpertBanner();
            $banner->expert_id          = auth('expert')->id();
            $banner->yourself           = $request->yourself;
            $banner->profession_title   = $request->profession_title;
            $banner->description        = $request->description;
    
             if($request->hasFile('banner_image'))
             {
                 $image    = $request->file('banner_image');
                 $name     = 'banner-image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                 $location = public_path('expert/portfolio/banner');
                 $image->move($location, $name);
                 $banner->banner_image = $name;
             }
        }
 
        $banner->save();
        return redirect()->route('expert.portfolio.banner.index')->with('success','Banner Update Successfull.');
    }
}
