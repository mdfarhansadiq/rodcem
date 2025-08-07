<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\SuperAdmin;


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



    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $admin = SuperAdmin::where('google_id', $googleUser->id)->first();

            if (!$admin) {
                $admin = SuperAdmin::where('email', $googleUser->email)->first();
            }

            if (!$admin) {
                $existingGoogleAdmins = SuperAdmin::whereNotNull('google_id')->count();

                if ($existingGoogleAdmins == 0) {
                    $admin = SuperAdmin::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'google_token' => $googleUser->token,
                        'google_refresh_token' => $googleUser->refreshToken,
                    ]);
                } else {
                    return redirect()->route('super.login')
                        ->with('error', 'This Google account is not linked to any super admin account.');
                }
            } else {
                $admin->update([
                    'google_id' => $googleUser->getId(),
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);
            }

            Auth::guard('super')->login($admin);

            return redirect()->intended(route('super.dashboard'));
        } catch (Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            dd($e->getMessage());
            return redirect()->route('super.login')->with('error', 'Something went wrong. Please try again.');
        }
    }


    public function logout()
    {
        Auth::guard('super')->logout();
        return  redirect()->route('super.login')->with('success', 'You have been logged out successfully.');
    }
}
