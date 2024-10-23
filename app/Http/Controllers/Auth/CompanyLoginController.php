<?php


namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyLoginController extends Controller

{

  public function __construct()
    {
      // $this->middleware('guest:company')->except('logout');
    }


  public function showLoginForm()
  {
      return view('auth.company-login');
  }

  public function login(Request $request)
  {

        if (Auth::guard('company')->attempt(['email' => $request->email_phone, 'password' => $request->password, 'status' => 1], $request->remember)) {
            return redirect()->intended(route('company.dashboard'));
        } elseif (Auth::guard('company')->attempt(['phone_number' => $request->email_phone, 'password' => $request->password, 'status' => 1], $request->remember)) {
            return redirect()->intended(route('company.dashboard'));
        } else {
            $user = Company::where('email', $request->email_phone)->first();
            if ($user) {
                $password = Hash::check($request->password, $user->password);
                if ($password == 1) {
                    auth('company')->login($user);
                    return redirect()->intended(route('company.dashboard'));
                } else {
                    return redirect()->route('login')->with('error',
                        'Incorect Password!'
                    )->with('email_phone', $request->email_phone);
                }
            } else {
                $user = Company::where('phone_number', $request->email_phone)->first();
                if ($user) {
                    $password = Hash::check($request->password, $user->password);
                    if ($password == 1) {
                        auth('company')->login($user);
                        return redirect()->intended(route('company.dashboard'));
                    } else {
                        return redirect()->route('login')->with('error', 'Incorect Password!')->with('email_phone', $request->email_phone);
                    }
                } else {
                    return redirect()->route('login')->with('error', 'Invali Credential!')->with('email_phone', $request->email_phone);
                }
            }
        }
    }

    public function logout()
      {
        Auth::guard('company')->logout();
        return  redirect()->route('login');
      }

    }
