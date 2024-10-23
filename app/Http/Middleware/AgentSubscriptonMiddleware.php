<?php

namespace App\Http\Middleware;

use App\Models\Agent;
use App\Models\AgentSubscriptionDeadLine;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class AgentSubscriptonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth('agent')->check() && subsctiption_deadline() && Carbon::parse(subsctiption_deadline()->deadline)->lte(Carbon::today()))
        {
            // $dealine = Carbon::parse(subsctiption_deadline()->deadline)

            AgentSubscriptionDeadLine::whereAgentId(auth('agent')->id())->delete();
            Agent::find(auth('agent')->id())->update([
                "status" => 110,
            ]);
        }
        return $next($request);
    }
}
