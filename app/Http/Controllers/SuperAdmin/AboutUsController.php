<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Policy;
use App\Models\Privacy;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about_us()
    {

        return view('Super.about_us.index', ['about_us' => AboutUs::first()]);
    }

    public function update(Request $request)
    {
        $aboutus  = AboutUs::first();
        if($aboutus)
        {
            $aboutus->update($request->all());
            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'aboutus-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('about/us');
                $image->move($location, $name);
                $aboutus->image = $name;
                $aboutus->save();
            }
        }else{
           $aboutus = AboutUs::Create($request->all());
            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'aboutus-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('about/us');
                $image->move($location, $name);
                $aboutus->image = $name;
                $aboutus->save();
            }
            }
        return redirect()->route('super.about.us')->with('success', 'About Update Successfull!');
    }

    //privacy index
    public function privacy()
    {
        return view('Super.about_us.privacy', ['privacy' => Privacy::first()]);
    }

    public function privacy_update(Request $request)
    {
        $privacy = Privacy::first();
        if($privacy)
        {
            $privacy->update($request->all());
        }else{
            Privacy::Create($request->all());
        }

        return back()->with('success', 'Privacy Update Successfull.');
    }

    //Cancellation index
    public function cancellation_policy()
    {
        return view('Super.about_us.cancellationPolicy');
    }

    public function cancellation_policy_update(Request $request)
    {
        $item = Policy::first();
        if($item)
        {
            $item->update($request->all());
        }else{
            Policy::Create($request->all());
        }

        return back()->with('success', 'Cancellation Update Successfull.');
    }

    //Refund index
    public function refund_policy()
    {
        return view('Super.about_us.refundPolicy');
    }

    public function refund_policy_update(Request $request)
    {
        $item = Policy::first();
        if($item)
        {
            $item->update($request->all());
        }else{
            Policy::Create($request->all());
        }

        return back()->with('success', 'Refund Update Successfull.');
    }

    //privacy index
    public function return_policy()
    {
        return view('Super.about_us.returnPolicy');
    }

    public function return_policy_update(Request $request)
    {
        $item = Policy::first();
        if($item)
        {
            $item->update($request->all());
        }else{
            Policy::Create($request->all());
        }

        return back()->with('success', 'Return Update Successfull.');
    }
}
