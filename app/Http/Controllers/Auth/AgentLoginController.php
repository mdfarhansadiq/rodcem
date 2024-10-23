<?php


namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentLoginController extends Controller

{

  public function __construct()
    {
      $this->middleware('guest:agent')->except('logout');
    }

    public function test()
    {
        return 'hi';
    }
  public function showLoginForm()
  {
      return view('auth.agent-login');
  }

  public  function login($request)
  {
        // return $request->email;
      //validate the form data
    //   $this->validate($request, [
    //     'email' => 'required|email',
    //     'password' => 'required|min:8'
    //   ]);

    if (Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 0], $request->remember))
    {
         return redirect()->intended(route('agent.dashboard'));
     }elseif(Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember))
     {
       return redirect()->intended(route('agent.dashboard'));
     }
     else{
       $user = Agent::where('email', $request->email)->first();
       if($user)
       {
         $password = Hash::check($request->password, $user->password);
         if($password == 1)
         {
          //  return back();
          return redirect()->route('agent.login')->with('deactive','Your Accout Is Deactivated!');
         }
       }else{
           return redirect()->route('agent.login')->with('error','Incorect Email Or Password!');
       }
     }


    }

    public function logout()
    {
        Auth::guard('agent')->logout();
        return  redirect('/agent/login');
    }

}
