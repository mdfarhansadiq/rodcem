<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\CustomerComment;
use App\Models\FirstLeftAdBanner;
use App\Models\FirstMiddleBanner;
use App\Models\FourthMiddlebanner;
use App\Models\SecoendMiddleAd;
use App\Models\SecondLeftAdBanner;
use App\Models\SliderBanner;
use App\Models\ThirdMiddleAd;
use Google\Service\CloudSourceRepositories\Repo;
use Illuminate\Http\Request;

class BannerAdController extends Controller
{
    public function slider_banner()
    {
        return view('Super.ad.sliderBanner', ['data' => SliderBanner::get()]);
    }

    public function slider_banner_store(Request $request)
    {
        $item = SliderBanner::Create($request->all());
        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'image-'.uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('ad/slider/banner');
            $image->move($location, $name);
            $item->image = $name;
        }
        $item->save();
        return back()->with('success', 'New Banner Add Successfull');
    }

    public function slider_banner_update(Request $request, $id)
    {
        $item = SliderBanner::find($id);
        $item->update($request->all());

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'image-'.uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('ad/slider/banner');
            $image->move($location, $name);
            $item->image = $name;
        }

        $item->save();
        return back()->with('success', 'Banner Update Successfull');
    }

    public function slider_banner_delete($id)
    {
        SliderBanner::find($id)->delete();
        return back()->with('success', 'Banner Delete Successfull');
    }

    // First Middlw Banner index
    public function first_middle_banner()
    {
        return view('Super.ad.firstMiddleBanner', ['item' => FirstMiddleBanner::first()]);
    }

    // First Middlw Banner Update or create
    public function first_middle_banner_update(Request $request)
    {
        $item = FirstMiddleBanner::first();
        if($item)
        {
            $item->update($request->all());

            if ($request->hasFile('first_banner_image')) {
                $image    = $request->file('first_banner_image');
                $name     = 'first_banner_image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/first/middle/banner');
                $image->move($location, $name);
                $item->first_banner_image = $name;
            }
            if ($request->hasFile('second_banner_image')) {
                $image    = $request->file('second_banner_image');
                $name     = 'second_banner_image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/first/middle/banner');
                $image->move($location, $name);
                $item->second_banner_image = $name;
            }
        }else{

            $item = FirstMiddleBanner::Create($request->all());
            if ($request->hasFile('first_banner_image')) {
                $image    = $request->file('first_banner_image');
                $name     = 'first_banner_image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/first/middle/banner');
                $image->move($location, $name);
                $item->first_banner_image = $name;
            }
            if ($request->hasFile('second_banner_image')) {
                $image    = $request->file('second_banner_image');
                $name     = 'second_banner_image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/first/middle/banner');
                $image->move($location, $name);
                $item->second_banner_image = $name;
            }
        }
        $item->save();
        return back()->with('success', 'New Banner Add Successfull');
    }

    // Second Middlw Banner index
    public function second_middle_banner()
    {
        return view('Super.ad.secondMiddleBanner', ['item' => SecoendMiddleAd::first()]);
    }

    // Second Middlw Banner Update or create
    public function second_middle_banner_update(Request $request)
    {
        $item = SecoendMiddleAd::first();
        if($item)
        {
            $item->update($request->all());

            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/second/middle/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }else{

            $item = SecoendMiddleAd::Create($request->all());
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/second/middle/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }
        $item->save();
        return back()->with('success', 'Banner Update Successfull');
    }

    // Third Middlw Banner index
    public function third_middle_banner()
    {
        return view('Super.ad.thirdMiddleBanner', ['item' => ThirdMiddleAd::first()]);
    }

    // Third Middlw Banner Update or create
    public function third_middle_banner_update(Request $request)
    {
        $item = ThirdMiddleAd::first();
        if($item)
        {
            $item->update($request->all());

            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/third/middle/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }else{

            $item = ThirdMiddleAd::Create($request->all());
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/third/middle/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }
        $item->save();
        return back()->with('success', 'Banner Update Successfull');
    }

    // Fourth Middlw Banner index
    public function fourth_middle_banner()
    {
        return view('Super.ad.fourthMiddleBanner', ['item' => FourthMiddlebanner::first()]);
    }

    // Fourth Middlw Banner Update or create
    public function fourth_middle_banner_update(Request $request)
    {
        $item = FourthMiddlebanner::first();
        if($item)
        {
            $item->update($request->all());

            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/fourth/middle/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }else{

            $item = FourthMiddlebanner::Create($request->all());
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/fourth/middle/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }
        $item->save();
        return back()->with('success', 'Banner Update Successfull');
    }

    // First Left Banner index
    public function first_left_banner()
    {
        return view('Super.ad.firstLeftBanneranner', ['item' => FirstLeftAdBanner::first()]);
    }

    // Fourth Middlw Banner Update or create
    public function first_left_banner_update(Request $request)
    {
        $item = FirstLeftAdBanner::first();
        if($item)
        {
            $item->update($request->all());

            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/first/left/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }else{

            $item = FirstLeftAdBanner::Create($request->all());
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/first/left/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }
        $item->save();
        return back()->with('success', 'Banner Update Successfull');
    }

    // Second Left Banner index
    public function second_left_banner()
    {
        return view('Super.ad.secondLeftBanneranner', ['item' => SecondLeftAdBanner::first()]);
    }

    // Second Left Banner Update or create
    public function second_left_banner_update(Request $request)
    {
        $item = SecondLeftAdBanner::first();
        if($item)
        {
            $item->update($request->all());

            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/second/left/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }else{

            $item = SecondLeftAdBanner::Create($request->all());
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/second/left/banner');
                $image->move($location, $name);
                $item->image = $name;
            }
        }
        $item->save();
        return back()->with('success', 'Banner Update Successfull');
    }

    //Customer Comment
    public function customer_comment()
    {
        return view('Super.ad.customerComment', ['item' => CustomerComment::first()]);
    }

    // Second Left Banner Update or create
    public function customer_comment_update(Request $request)
    {
        $item = CustomerComment::first();
        if ($item) {
            $item->update($request->all());

            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/customer/comment');
                $image->move($location, $name);
                $item->image = $name;
            }
        } else {

            $item = CustomerComment::Create($request->all());
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $name     = 'image-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('ad/customer/comment');
                $image->move($location, $name);
                $item->image = $name;
            }
        }
        $item->save();
        return back()->with('success', 'Banner Update Successfull');
    }
}
