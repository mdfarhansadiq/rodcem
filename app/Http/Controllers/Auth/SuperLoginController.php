<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuperLoginController extends Controller

{

  public function __construct()

    {
      // $this->middleware('guest:super')->except('logout');
    }


  public function showLoginForm()
  {
      return view('auth.super-login');
  }

  public function login(Request $request)
  {
      //validate the form data
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
      ]);

      // attemp to log the admin in
      if (Auth::guard('super')->attempt($request->only(['email', 'password']), $request->get('remember'))) {
        return redirect()->intended(route('super.dashboard'));
      }

      // if ussuccesssful then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'Invalid email or password']);
    }


      public function logout()
        {
          Auth::guard('super')->logout();
          return  redirect('/super/login');
        }

      }
