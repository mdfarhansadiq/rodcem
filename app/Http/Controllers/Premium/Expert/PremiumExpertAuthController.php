<?php

namespace App\Http\Controllers\Premium\Expert;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PremiumExpertAuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('expert')->attempt(['email' => $request->email_phone, 'password' => $request->password, 'status' => 1], $request->remember)) {
            return redirect()->intended(route('expert.dashboard'));
        } elseif (Auth::guard('expert')->attempt(['phone_number' => $request->email_phone, 'password' => $request->password, 'status' => 1], $request->remember)) {
            return redirect()->intended(route('expert.dashboard'));
        } else {
            $user = Expert::where('email', $request->email_phone)->first();
            if ($user) {
                $password = Hash::check($request->password, $user->password);
                if ($password == 1) {
                    auth('expert')->login($user);
                    return redirect()->intended(route('expert.dashboard'));
                } else {
                    return redirect()->route('login')->with('error', 'Incorect Password!')->with('email_phone', $request->email_phone);
                }
            } else {
                $user = Expert::where('phone_number', $request->email_phone)->first();
                if ($user) {
                    $password = Hash::check($request->password, $user->password);
                    if ($password == 1) {
                        auth('expert')->login($user);
                        return redirect()->intended(route('expert.dashboard'));
                    } else {
                        return redirect()->route('login')->with('error', 'Incorect Password!')->with('email_phone', $request->email_phone);
                    }
                } else {
                    return redirect()->route('login')->with('error', 'Invali Credential!')->with('email_phone', $request->email_phone);
                }
            }
        }
    }

    public function register(Request $request)
    {

        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'phone_number' => 'required | min:11 | max:11',
            'password'     => 'required|string|min:8|same:password_confirmation',
        ]);

        if (user_exists($request->email, $request->phone_number) == 'not found') {
            $expert = new Expert();
            $expert->name         = $request->name;
            $expert->designation  = $request->designation;
            $expert->slug         = Str::slug($request->name) . uniqid(10);
            $expert->email        = $request->email;
            $expert->phone_number = $request->phone_number;
            $expert->service_zone = $request->service_zone;
            $expert->password     = Hash::make($request->password);
            $expert->save();
            return redirect()->route('login');
        }else{
           return user_exists($request->email, $request->phone_number);
        }
    }

    public function logout()
    {
        Auth::guard('expert')->logout();
        return  redirect('login');
    }
}
