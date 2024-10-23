<?php

namespace App\Observers;

use App\Models\Agent;
use App\Models\Notification;

class AgentRegisterObserver
{
    /**
     * Handle the Agent "created" event.
     *
     * @param  \App\Models\Agent  $agent
     * @return void
     */
    public function created(Agent $agent)
    {
        Notification::Create([
            'title'             => "New Agent Registered!",            
            'link'              => 'super/agents',
            'guard'             => current_guard(),
            'user_id'           => auth(current_guard())->id(),
            'receiver_guard'    => 'super',
            'icon'              => 'ti-user',
        ]);
        pusher_setting('super_notification_channel', 'super_notification_event', 'message');
    }

    /**
     * Handle the Agent "updated" event.
     *
     * @param  \App\Models\Agent  $agent
     * @return void
     */
    public function updated(Agent $agent)
    {
        //
    }

    /**
     * Handle the Agent "deleted" event.
     *
     * @param  \App\Models\Agent  $agent
     * @return void
     */
    public function deleted(Agent $agent)
    {
        //
    }

    /**
     * Handle the Agent "restored" event.
     *
     * @param  \App\Models\Agent  $agent
     * @return void
     */
    public function restored(Agent $agent)
    {
        //
    }

    /**
     * Handle the Agent "force deleted" event.
     *
     * @param  \App\Models\Agent  $agent
     * @return void
     */
    public function forceDeleted(Agent $agent)
    {
        //
    }
}
