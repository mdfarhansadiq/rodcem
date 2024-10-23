<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\JoinUsImage;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class SuperImageSettingController extends Controller
{
    public function index()
    {
        $service_image = ServiceImage::first();
        return view('Super.imageSetting.index', compact('service_image'));
    }

    public function service_image_update(Request $request)
    {

        $service_image = ServiceImage::first();

        if ($request->hasFile('company')) {
            $image    = $request->file('company');
            $name     = 'company-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('serviceImage');
            $image->move($location, $name);
            $service_image->company = $name;
        }
        if ($request->hasFile('agent')) {
            $image    = $request->file('agent');
            $name     = 'agent-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('serviceImage');
            $image->move($location, $name);
            $service_image->agent = $name;
        }
        if ($request->hasFile('expert')) {
            $image    = $request->file('expert');
            $name     = 'expert-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('serviceImage');
            $image->move($location, $name);
            $service_image->expert = $name;
        }

        $service_image->save();
        return back()->with('success', 'Service Image Update Successfull!');
    }


    public function join_us_image_index()
    {
        $join_us_image = JoinUsImage::first();
        return view('Super.imageSetting.joinus', compact('join_us_image'));
    }

    public function join_us_image_update(Request $request)
    {

        $join_us = JoinUsImage::first();

        if($join_us)
        {
            if ($request->hasFile('agent')) {
                $image    = $request->file('agent');
                $name     = 'agent-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('imageSetting/joinUs');
                $image->move($location, $name);
                $join_us->agent = $name;
            }
            if ($request->hasFile('expert')) {
                $image    = $request->file('expert');
                $name     = 'expert-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('imageSetting/joinUs');
                $image->move($location, $name);
                $join_us->expert = $name;
            }
            if ($request->hasFile('company')) {
                $image    = $request->file('company');
                $name     = 'company-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('imageSetting/joinUs');
                $image->move($location, $name);
                $join_us->company = $name;
            }
            if ($request->hasFile('ad')) {
                $image    = $request->file('ad');
                $name     = 'ad-'. uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('imageSetting/joinUs');
                $image->move($location, $name);
                $join_us->ad = $name;
            }
        }else{

            $join_us = new JoinUsImage();
            if ($request->hasFile('agent')) {
                $image    = $request->file('agent');
                $name     = 'agent-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('imageSetting/joinUs');
                $image->move($location, $name);
                $join_us->agent = $name;
            }
            if ($request->hasFile('expert')) {
                $image    = $request->file('expert');
                $name     = 'expert-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('imageSetting/joinUs');
                $image->move($location, $name);
                $join_us->expert = $name;
            }
            if ($request->hasFile('company')) {
                $image    = $request->file('company');
                $name     = 'company-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('imageSetting/joinUs');
                $image->move($location, $name);
                $join_us->company = $name;
            }
            if ($request->hasFile('ad')) {
                $image    = $request->file('ad');
                $name     = 'ad-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('imageSetting/joinUs');
                $image->move($location, $name);
                $join_us->ad = $name;
            }
        }

        $join_us->save();
        return back()->with('success', 'Service Image Update Successfull!');
    }


}
