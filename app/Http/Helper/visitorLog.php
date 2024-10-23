<?php

use App\Models\VisitorLog;

    function visitorLog($url)
    {
        $ip  = request()->ip();    
        // $url = url()->current();


        foreach(array_keys(config('auth.guards')) as $guard)
        {                    
            if(auth()->guard($guard)->check() && $guard != 'super') 
            {            
                VisitorLog::Create([
                    'ip'         => $ip,
                    'url'        => $url,
                    'user_id'    => auth($guard)->id(),
                    'guard'      => $guard,
                ]);              
            }       
        }
        
        if(Auth()->check() == false && auth('agent')->check() == false && auth('company')->check() == false && auth('expert')->check() == false)
        {
            VisitorLog::Create([
                'ip'         => $ip,
                'url'        => $url,
            ]);
        }
        
    }



?>