<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyBannerSettingController extends Controller
{
    public function index()
    {
        return view('Company.banner.index', ['banner' => CompanyBanner::where('company_id', Auth::guard('company')->id())->first()]);
    }

    public function sidebar(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $company = Company::find(Auth('company')->id());
        $banner = CompanyBanner::where('company_id', $company->id)->first();
        
        if($banner)
        {
            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'sidebar-banner-'.uniqid(51) . '.' . $image->getClientOriginalExtension();
                $location = public_path('company/banner/sidebar');
                $image->move($location, $name);
                $banner->sidebar_banner = $name;
            }
            $banner->save();
        }else{
            $banner = new CompanyBanner();
            $banner->company_id = $company->id;
    
            if($request->hasFile('image'))
            {
                $image    = $request->file('image');
                $name     = 'sidebar-banner-'.uniqid(51) . '.' . $image->getClientOriginalExtension();
                $location = public_path('company/banner/sidebar');
                $image->move($location, $name);
                $banner->sidebar_banner = $name;                
            }  
            $banner->save();  
        }
  
        return back()->with('success', 'Banner Update Successfull!');
    }


    // small banner 
    public function small_banner(Request $request)
    {
        $company = Company::find(Auth('company')->id());
        $banner  = CompanyBanner::where('company_id', $company->id)->first();
        


        if($banner)
        {
            if($request->hasFile('small_banner_one'))
            {
                $image    = $request->file('small_banner_one');
                $name     = 'small_banner_one-'.uniqid(51) . '.' . $image->getClientOriginalExtension();
                $location = public_path('company/banner/small_banner_one');
                $image->move($location, $name);
                $banner->small_banner_one = $name;
            }
            if($request->hasFile('small_banner_two'))
            {
                $image    = $request->file('small_banner_two');
                $name     = 'small_banner_two-'.uniqid(51) . '.' . $image->getClientOriginalExtension();
                $location = public_path('company/banner/small_banner_two');
                $image->move($location, $name);
                $banner->small_banner_two = $name;
            }
            if($request->hasFile('small_banner_three'))
            {
                $image    = $request->file('small_banner_three');
                $name     = 'small_banner_three-'.uniqid(51) . '.' . $image->getClientOriginalExtension();
                $location = public_path('company/banner/small_banner_three');
                $image->move($location, $name);
                $banner->small_banner_three = $name;
            }
            $banner->save();
        }else{
            $banner = new CompanyBanner();
            $banner->company_id = $company->id;
    
            if($request->hasFile('small_banner_one'))
            {
                $image    = $request->file('small_banner_one');
                $name     = 'small_banner_one-'.uniqid(51) . '.' . $image->getClientOriginalExtension();
                $location = public_path('company/banner/small_banner_one');
                $image->move($location, $name);
                $banner->small_banner_one = $name;
            }
            if($request->hasFile('small_banner_two'))
            {
                $image    = $request->file('small_banner_two');
                $name     = 'small_banner_two-'.uniqid(51) . '.' . $image->getClientOriginalExtension();
                $location = public_path('company/banner/small_banner_two');
                $image->move($location, $name);
                $banner->small_banner_two = $name;
            }
            if($request->hasFile('small_banner_three'))
            {
                $image    = $request->file('small_banner_three');
                $name     = 'small_banner_three-'.uniqid(51) . '.' . $image->getClientOriginalExtension();
                $location = public_path('company/banner/small_banner_three');
                $image->move($location, $name);
                $banner->small_banner_three = $name;
            }
            $banner->save();        
        }
        return back()->with('success', 'Banner Update Successfull!');
    }
}
