<?php

namespace App\Http\Controllers\Premium\Expert;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\ExpertLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PremiumExpertProfileController extends Controller
{
    public function dashboard()
    {
        return view('Premium.layout.frontend.expert.dashboard');
    }

    public function profile()
    {
        return view('Premium.layout.frontend.expert.profile');
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'name'            => 'required',
            // 'email'           => 'required|unique:experts,email,' . Auth('expert')->id(),
            'phone_number'    => 'required|unique:experts,phone_number,' . Auth('expert')->id(),
        ]);

        $expert = Expert::find(auth('expert')->id());
        $expert->name  = $request->name;

        if (user_exists($request->email, $request->phone_number) == 'not found') {
            $expert->phone_number = $request->phone_number;
            // $expert->email        = $request->email;
        }
        $expert->about        = $request->about;
        $expert->service_zone = $request->service_zone;
        $expert->designation  = $request->designation;

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'expert-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('expert/profile');
            $image->move($location, $name);
            $expert->image = $name;
        }
        $expert->save();
        return redirect()->route('expert.profile')->with('success', 'Profile Update Successfull.');
    }

    public function location()
    {
        return view('Premium.layout.frontend.expert.location');
    }

    public function location_update(Request $request)
    {
        $location = ExpertLocation::where('expert_id', auth('expert')->id())->first();
        if ($location) {
            $location->expert_id    = auth('expert')->id();
            $location->division_id = $request->division;
            $location->district_id = $request->district;
            $location->upazila_id  = $request->upazila;
            $location->union_id    = $request->union;
            $location->save();
        } else {
            ExpertLocation::Create([
                'expert_id'      => auth('expert')->id(),
                'division_id'   => $request->division,
                'district_id'   => $request->district,
                'upazila_id'    => $request->upazila,
                'union_id'      => $request->union,
            ]);
        }

        return redirect()->route('expert.location')->with('success', 'Location Update Successfull!');
    }

    public function password_change()
    {
        return view('Premium.layout.frontend.expert.passwordChange');
    }

    public function password_change_update(Request $request)
    {
        $request->validate([
            'current_password'  => 'required',
            'new_password'      => 'required|same:confirm_password',
            'confirm_password'  => 'required',
        ]);

        $expert = expert::find(auth('expert')->id());
        $check = Hash::check($request->current_password, $expert->password);

        if ($check == true) {
            $expert->password = Hash::make($request->new_password);
            $expert->save();
            auth('expert')->logout();
            return redirect()->route('login');
        } else {
            return redirect()->route('expert.password.change')->with('warning', 'Incorrect Current Password');
        }
    }

    public function orders()
    {
        return view('Premium.layout.frontend.expert.orders');
    }
}
