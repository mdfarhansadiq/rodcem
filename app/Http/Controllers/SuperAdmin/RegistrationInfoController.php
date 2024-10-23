<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\BusinessInfo;
use App\Models\JoinWithUs;
use App\Models\WhySell;
use Illuminate\Http\Request;

class RegistrationInfoController extends Controller
{
    public function become_agent()
    {
        return view('Super.joinWithUs.becomeAgent',[ 'item' => JoinWithUs::first()]);
    }

    public function become_agent_update(Request $request)
    {
        $item = JoinWithUs::first();
        if($item)
        {
            $item->become_agent = $request->become_agent;
        }else{
            $item = new JoinWithUs();
            $item->become_agent = $request->become_agent;
        }

        $item->save();
        return back()->with('success', 'Update Successfull!');
    }

    public function become_expert()
    {
        return view('Super.joinWithUs.becomeExpert',[ 'item' => JoinWithUs::first()]);
    }

    public function become_expert_update(Request $request)
    {
        $item = JoinWithUs::first();
        if($item)
        {
            $item->become_expert = $request->become_expert;
        }else{
            $item = new JoinWithUs();
            $item->become_expert = $request->become_expert;
        }

        $item->save();
        return back()->with('success', 'Update Successfull!');
    }

    public function become_company()
    {
        return view('Super.joinWithUs.becomeCompany',[ 'item' => JoinWithUs::first()]);
    }

    public function become_company_update(Request $request)
    {
        $item = JoinWithUs::first();
        if($item)
        {
            $item->become_company = $request->become_company;
        }else{
            $item = new JoinWithUs();
            $item->become_company = $request->become_company;
        }

        $item->save();
        return back()->with('success', 'Update Successfull!');
    }

    public function why_sell()
    {
        return view('Super.joinWithUs.why_sell', ['why_sell' => WhySell::first()]);
    }

    public function why_sell_update(Request $request)
    {
       $item = WhySell::first();
       if($item)
       {
            $item->update($request->all());

            if ($request->hasFile('image_one')) {
                $image    = $request->file('image_one');
                $name     = 'agent-why-sell-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('why/sell');
                $image->move($location, $name);
                $item->image_one = $name;
            }
            if ($request->hasFile('image_two')) {
                $image    = $request->file('image_two');
                $name     = 'agent-why-sell-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('why/sell');
                $image->move($location, $name);
                $item->image_two = $name;
            }
            if ($request->hasFile('image_three')) {
                $image    = $request->file('image_three');
                $name     = 'agent-why-sell-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('why/sell');
                $image->move($location, $name);
                $item->image_three = $name;
            }
            if ($request->hasFile('image_four')) {
                $image    = $request->file('image_four');
                $name     = 'agent-why-sell-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('why/sell');
                $image->move($location, $name);
                $item->image_four = $name;
            }
       }else{
           $item = WhySell::Create($request->all());
            if ($request->hasFile('image_one')) {
                $image    = $request->file('image_one');
                $name     = 'agent-why-sell-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('why/sell');
                $image->move($location, $name);
                $item->image_one = $name;
            }
            if ($request->hasFile('image_two')) {
                $image    = $request->file('image_two');
                $name     = 'agent-why-sell-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('why/sell');
                $image->move($location, $name);
                $item->image_two = $name;
            }
            if ($request->hasFile('image_three')) {
                $image    = $request->file('image_three');
                $name     = 'agent-why-sell-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('why/sell');
                $image->move($location, $name);
                $item->image_three = $name;
            }
            if ($request->hasFile('image_four')) {
                $image    = $request->file('image_four');
                $name     = 'agent-why-sell-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
                $location = public_path('why/sell');
                $image->move($location, $name);
                $item->image_four = $name;
            }
       }
       $item->save();
       return back()->with('success', 'update successfull');
    }

    public function business_info()
    {
        return view('Super.joinWithUs.businessInfo', ['business_info' => BusinessInfo::first()]);
    }

    public function business_info_update(Request $request)
    {
       $business_info = BusinessInfo::first();
       if($business_info)
       {
            $business_info->update($request->all());
       }else{
            BusinessInfo::Create($request->all());
       }
       return back()->with('success', 'update successfull');
    }
}
