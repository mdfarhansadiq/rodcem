<?php

use App\Models\Agent;
use App\Models\Company;
use App\Models\Expert;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

    // user exists
    function user_exists($email, $phone_number)
    {
        if(User::where('email', $email)->exists())
        {
            return back()->with('user_email_exists', 'This Email Already Exists!');
        }else{
            if (User::where('phone_number', $phone_number)->exists())
            {
                return back()->with('user_phone_exists', 'This Phone Number Already Exists!');
            }else{
                if (Agent::where('email', $email)->exists()) {
                    return back()->with('user_email_exists', 'This Email Already Exists!');
                }else{
                    if (Agent::where('phone_number', $phone_number)->exists())
                    {
                        return back()->with('user_phone_exists', 'This Phone Number Already Exists!');
                    }else{
                        if(Expert::where('email', $email)->exists())
                        {
                            return back()->with('user_email_exists', 'This Email Already Exists!');
                        }else{
                            if(Expert::where('phone_number', $phone_number)->exists())
                            {
                                return back()->with('user_phone_exists', 'This Phone Number Already Exists!');
                            }else{
                                if (Company::where('email', $email)->exists()) {
                                    return back()->with('user_email_exists', 'This Email Already Exists!');
                                }else{
                                    if (Company::where('phone_number', $phone_number)->exists())
                                    {
                                        return back()->with('user_phone_exists', 'This Phone Number Already Exists!');
                                    }else{
                                        return 'not found';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


    }

    // send opt
    function send_opt($receiver)
    {
        $opt = rand(0, 999999);
        $response = Http::get('https://sysadmin.muthobarta.com/api/v1/send-sms-get?token=96431ad8f5ee04c7da12326ba00d22d9aabf6e86&sender_id=8809601002712&receiver='.$receiver.'&message=Your Verificaton code '.$opt.'&remove_duplicate=true');
        if($response['code'] == '200')
        {
            Session::put('opt', $opt);
            Session::put('phone_number', $receiver);
            return redirect()->route('otp.form');
        }else{
            return $response['code'];
        }
    }

    // session forget
    function forget_sessiong()
    {
        Session::forget('opt');
        Session::forget('phone_number');
    }
?>
