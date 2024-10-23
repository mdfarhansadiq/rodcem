<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\PortfolioApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExpertLoginController extends Controller
{
  public function __construct()
  {
    // $this->middleware('guest:expert')->except('logout');
  }

  public function showRegisterForm()
  {
      return view('auth.expert-register');
  }

  public function register(Request $request)
  {
    $request->validate([
        'name'         => 'required|min:3|max:100',
        'phone_number' => 'required|min:11|max:14|unique:experts,phone_number',
        'email'        => 'required|unique:experts,email',
        'password'     => 'required|min:8|max:32',
        'designation' => 'required',
    ]);

    $expert = new Expert();
    $expert->name         = $request->name;
    $expert->slug         = Str::slug($request->name);
    $expert->email        = $request->email;
    $expert->designation  = $request->designation;
    $expert->service_zone = $request->service_zone;
    $expert->phone_number = $request->phone_number;
    $expert->password     = bcrypt($request->password);
    $expert->save();

    $portfolio_approval = PortfolioApproval::create([
      'expert_id' => $expert->id,
    ]);

    return redirect()->route('expert.dashboard');
}


  public function showLoginForm()
  {
      return view('auth.expert-login');
  }

  public function login(Request $request)
  {
    // $this->validate($request, [
    //   'email' => 'required|email',
    //   'password' => 'required|min:8'
    // ]);
     if (Auth::guard('expert')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 0], $request->remember))
     {
        return redirect()->intended(route('expert.dashboard'));
    }elseif(Auth::guard('expert')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember))
    {
      return redirect()->intended(route('expert.dashboard'));
    }
    else{
      $user = Expert::where('email', $request->email)->first();
      if($user)
      {
        $password = Hash::check($request->password, $user->password);
        if($password == 1)
        {
          return redirect()->route('expert.login')->with('deactive','Your Accout Is Deactivated!');
        }else{
            return redirect()->route('login')->with('error', 'Incorect Email Or Password!')->with('email',$request->email);
        }
      }else{
        return redirect()->route('expert.login')->with('error','Incorect Email Or Password!');
      }
    }
  }

  public function logout()
  {
    Auth::guard('expert')->logout();
    return  redirect('/expert/login');
  }

}
