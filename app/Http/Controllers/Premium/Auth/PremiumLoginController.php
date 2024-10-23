<?php

namespace App\Http\Controllers\Premium\Auth;

use App\Http\Controllers\Auth\AgentLoginController;
use App\Http\Controllers\Auth\CompanyLoginController;
use App\Http\Controllers\Auth\ExpertLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Premium\Agent\PremiumAgentAuthController;
use App\Http\Controllers\Premium\Expert\PremiumExpertAuthController;
use App\Models\Agent;
use App\Models\Company;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Foundation\Auth\Agent as AuthAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\str;
use Laravel\Ui\Presets\React;

use function PHPUnit\Framework\returnSelf;

class PremiumLoginController extends Controller
{

    public function login_form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email_phone'  => 'required',
            'password'     => 'required|min:8'
        ]);

        if(User::where('email',$request->email_phone)->exists() || User::where('phone_number', $request->email_phone)->exists())
        {
            $user = User::where('email', $request->email_phone)->first();
            if($user)
            {
                $password = Hash::check($request->password, $user->password);
                if ($password == 1) {
                    auth()->login($user);
                    return redirect()->intended(route('user.dashboard'));
                } else {
                    return redirect()->route('login')->with('error', 'Incorect Password!')->with('email_phone', $request->email_phone);
                }
            }else{
                $user = User::where('phone_number', $request->email_phone)->first();
                if ($user) {
                    $password = Hash::check($request->password, $user->password);
                    if ($password == 1) {
                        auth()->login($user);
                        return redirect()->intended(route('user.dashboard'));
                    } else {
                        return redirect()->route('login')->with('error', 'Incorect Password!')->with('email_phone', $request->email_phone);
                    }
                }
            }

        }
        elseif(Agent::where('email',$request->email_phone)->exists() || Agent::where('phone_number', $request->email_phone)->exists())
        {
            $agent = new PremiumAgentAuthController();
            return $agent->login($request);
        }
        elseif(Expert::where('email',$request->email_phone)->exists() || Expert::where('phone_number', $request->email_phone)->exists())
        {
            $expert = new PremiumExpertAuthController();
            return $expert->login($request);
        }
        elseif(Company::where('email',$request->email_phone)->exists() || Company::where('phone_number', $request->email_phone)->exists())
        {
            $company = new CompanyLoginController();
            return $company->login($request);
        }else{
            return back()->with('email_not_found', 'These credentials do not match our records.')->with('email_phone',$request->email_phone);
        }
    }

    public function register_form()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'phone_number' => 'required | min:11 | max:11',
            'password'     => 'required|string|min:8|same:password_confirmation',
        ]);

        if(user_exists($request->email, $request->phone_number) != 'not found')
        {
            return user_exists($request->email, $request->phone_number);
        }else{
            $user =  User::create([
                'name'          => $request->name,
                'slug'          => Str::slug($request->name) . uniqid(10),
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'phone_number'  => $request->phone_number,
            ]);

            return redirect()->route('login');
        }
    }

    // forget password Form
    public function forget_password_form()
    {
        return view('auth.forget_password');
    }

    //forget password
    public function forget_password(Request $request)
    {
        $request->validate([
             'phone_number' => 'required | min:11 | max:11',
        ]);

        if (User::where('phone_number', $request->phone_number)->exists()) {
            return send_opt($request->phone_number);
        } elseif (Agent::where('phone_number', $request->phone_number)->exists()) {
            return send_opt($request->phone_number);
        } elseif (Expert::where('phone_number', $request->phone_number)->exists()) {
            return send_opt($request->phone_number);
        } elseif (Company::where('phone_number', $request->phone_number)->exists()) {
            return send_opt($request->phone_number);
        } else {
            return back()->with('not_found', 'Incorrect Phone Number.')->with('phone_number', $request->phone_number);
        }
    }


    // otp form
    public function otp_form()
    {
        return view('auth.otp_form');
    }

    // otp
    public function otp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);

        $generated_otp = Session::get('opt');
        $given_otp = $request->otp;
        if(!$generated_otp)
        {
            return back()->with('expaired', 'Code Expaired!');
        }else{
            if($generated_otp != $given_otp)
            {
                return back()->with('invalid', 'Invalid Code!');
            }else{
                return redirect()->route('resert.password');
            }
        }
    }

    // reset password form
    public function resert_password_form()
    {
        return view('auth.reset_password');
    }

    // reset password
    public function resert_password(Request $request)
    {

        $request->validate([
            'password'     => 'required|string|min:8|same:password_confirmation',
        ]);

        $phone_number = Session::get('phone_number');

        if (User::where('phone_number', $phone_number)->exists()) {
            User::where('phone_number', $phone_number)->update([
                'password' => Hash::make($request->password),
            ]);
            forget_sessiong();
            return redirect()->route('login');
        } elseif (Agent::where('phone_number', $phone_number)->exists()) {
            Agent::where('phone_number', $phone_number)->update([
                'password' => Hash::make($request->password),
            ]);
            forget_sessiong();
            return redirect()->route('login');

        } elseif (Expert::where('phone_number', $phone_number)->exists()) {
            Expert::where('phone_number', $phone_number)->update([
                'password' => Hash::make($request->password),
            ]);
            forget_sessiong();
            return redirect()->route('login');
        } elseif (Company::where('phone_number', $phone_number)->exists()) {
            Company::where('phone_number', $phone_number)->update([
                'password' => Hash::make($request->password),
            ]);
            forget_sessiong();
            return redirect()->route('login');
        } else {
            return back()->with('not_found', 'Incorrect Phone Number.')->with('phone_number', $phone_number);
        }

    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('front');
    }

}
