<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\BannerSetting;
use Illuminate\Http\Request;

class BannerSettingController extends Controller
{
    public function index()
    {
        return view('Super.bannerSetting.index', ['banner' => BannerSetting::first()]);
    }

    public function update(Request $request)
    {
        {
            $banner = BannerSetting::first();
            if($banner)
            {
                if($request->hasFile('about'))
                {
                    $image    = $request->file('about');
                    $name     = 'about-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                    $location = public_path('super/banner/about');
                    $image->move($location, $name);
                    $banner->about = $name;
                }
                if($request->hasFile('contact'))
                {
                    $image    = $request->file('contact');
                    $name     = 'contact-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                    $location = public_path('super/banner/contact');
                    $image->move($location, $name);
                    $banner->contact = $name;
                }
                $banner->save();
            }else{
                $banner = new BannerSetting();
              
                if($request->hasFile('about'))
                {
                    $image    = $request->file('about');
                    $name     = 'about-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                    $location = public_path('super/banner/about');
                    $image->move($location, $name);
                    $banner->about = $name;
                }
                if($request->hasFile('contact'))
                {
                    $image    = $request->file('contact');
                    $name     = 'contact-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                    $location = public_path('super/banner/contact');
                    $image->move($location, $name);
                    $banner->contact = $name;
                }
                $banner->save();
            }
    
            return redirect()->route('banner.setting.index')->with('success', 'Banner Update Successfull!');
    
        }
    }
}
