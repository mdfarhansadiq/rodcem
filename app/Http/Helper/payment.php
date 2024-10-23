<?php

use App\Models\AgentOneTimeSubscription;
use App\Models\AgentSubscription;
use App\Models\AgentSubscriptionDeadLine;
use App\Models\OneTimePayment;
use App\Models\SubscriptionType;

    //one time paymnent setting
    function one_time_paymet()
    {
        return OneTimePayment::first();
    }


    //agent one time payment
    function agent_one_time_payment()
    {
        return AgentOneTimeSubscription::whereAgentId(auth('agent')->id())->first();
    }

    //agent Has one time payment
    function AgentHasOneTimePayment()
    {
        return AgentOneTimeSubscription::whereAgentId(auth('agent')->id())->exists();
    }

    //Subscription Type
    function subscription_type()
    {
        return SubscriptionType::where('id', '!=', 1)->get();
    }

    // agent subscription deadline
    function subsctiption_deadline()
    {
        return AgentSubscriptionDeadLine::where('agent_id', auth('agent')->id())->first();
    }

    // agent has subscriptoin
    function agentHasSubscriptin()
    {
        return AgentSubscriptionDeadLine::where('agent_id', auth('agent')->id())->exists();
    }

    // Agent get any subscription
    function agentGetAnySubscriptionBefore()
    {
        return AgentSubscription::whereAgentId(auth('agent')->id())->exists();
    }


?>
