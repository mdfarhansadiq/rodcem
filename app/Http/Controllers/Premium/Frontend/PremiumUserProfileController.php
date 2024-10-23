<?php

namespace App\Http\Controllers\Premium\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PremiumUserProfileController extends Controller
{
    public function dashboard()
    {
        return view('Premium.layout.frontend.user.dashboard');
    }

    public function profile()
    {
        return view('Premium.layout.frontend.user.profile');
    }

    public function profile_update(Request $request)
    {

        $request->validate([
            'name'            => 'required',
            'phone_number'    => 'required|min:11|max:11',
        ]);

        $user = User::find(auth()->id());
        $user->name  = $request->name;

        if (user_exists($request->email, $request->phone_number) == 'not found') {
            $user->phone_number = $request->phone_number;
        }

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $name     = 'user-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('user/profile');
            $image->move($location, $name);
            $user->image = $name;
        }
        $user->save();
        return redirect()->route('user.profile')->with('success', 'Profile Update Successfull.');
    }

    public function location()
    {
        return view('Premium.layout.frontend.user.location');
    }

    public function location_update(Request $request)
    {
        $location = UserLocation::where('user_id', auth()->id())->first();
        if ($location) {
            $location->user_id     = auth()->id();
            $location->division_id = $request->division;
            $location->district_id = $request->district;
            $location->upazila_id  = $request->upazila;
            $location->union_id    = $request->union;
            $location->save();
        } else {
            UserLocation::Create([
                'user_id'       => auth()->id(),
                'division_id'   => $request->division,
                'district_id'   => $request->district,
                'upazila_id'    => $request->upazila,
                'union_id'      => $request->union,
            ]);
        }

        return redirect()->route('user.location')->with('success', 'Location Update Successfull!');
    }

    public function password_change()
    {
        return view('Premium.layout.frontend.user.passwordChange');
    }

    public function password_change_update(Request $request)
    {
        $request->validate([
            'current_password'  => 'required',
            'new_password'      => 'required|same:confirm_password',
            'confirm_password'  => 'required',
        ]);

        $user = User::find(auth()->id());
        $check = Hash::check($request->current_password, $user->password);

        if ($check == true) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            auth()->logout();
            return redirect()->route('login');
        } else {
            return redirect()->route('user.password.change')->with('warning', 'Incorrect Current Password');
        }
    }

    public function orders()
    {
        return view('Premium.layout.frontend.user.orders');
    }
}
