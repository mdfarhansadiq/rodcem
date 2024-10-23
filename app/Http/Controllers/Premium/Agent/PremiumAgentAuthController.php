<?php

namespace App\Http\Controllers\Premium\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PremiumAgentAuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('agent')->attempt(['email' => $request->email_phone, 'password' => $request->password, 'status' => 1], $request->remember))
        {
            return redirect()->intended(route('agent.dashboard'));
        }
        elseif (Auth::guard('agent')->attempt(['phone_number' => $request->email_phone, 'password' => $request->password, 'status' => 1], $request->remember))
        {
            return redirect()->intended(route('agent.dashboard'));
        }
        else{
            $user = Agent::where('email', $request->email_phone)->first();
            if ($user)
            {
                $password = Hash::check($request->password, $user->password);
                if ($password == 1)
                {
                    auth('agent')->login($user);
                    return redirect()->intended(route('agent.dashboard'));
                }else{
                    return redirect()->route('login')->with('error', 'Incorect Password!')->with('email_phone',$request->email_phone);
                }
            }else {
                $user = Agent::where('phone_number', $request->email_phone)->first();
                if ($user) {
                    $password = Hash::check($request->password, $user->password);
                    if ($password == 1) {
                        auth('agent')->login($user);
                        return redirect()->intended(route('agent.dashboard'));
                    } else {
                        return redirect()->route('login')->with('error', 'Incorect Password!')->with('email_phone', $request->email_phone);
                    }
                }else{
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

        if(user_exists($request->email, $request->phone_number) == 'not found')
        {
             Agent::create([
                'name'          => $request->name,
                'slug'          => Str::slug($request->name) . uniqid(10),
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'phone_number'  => $request->phone_number,
            ]);
            return redirect()->route('login');
        }else{
            return user_exists($request->email, $request->phone_number);
        }

    }

    public function logout()
    {
        Auth::guard('agent')->logout();
        return  redirect('login');
    }
}
