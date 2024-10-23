<?php

namespace App\Observers;

use App\Models\Expert;
use App\Models\Notification;

class ExpertRegisterObserver
{
    /**
     * Handle the Expert "created" event.
     *
     * @param  \App\Models\Expert  $expert
     * @return void
     */
    public function created(Expert $expert)
    {        
        Notification::Create([
            'title'             => "New Expert Registered!",            
            'link'              => 'super/expert/list',
            'guard'             => current_guard(),
            'user_id'           => auth(current_guard())->id(),
            'receiver_guard'    => 'super',
            'icon'              => 'ti-user',
        ]);
        pusher_setting('super_notification_channel', 'super_notification_event', 'message');
    }

    /**
     * Handle the Expert "updated" event.
     *
     * @param  \App\Models\Expert  $expert
     * @return void
     */
    public function updated(Expert $expert)
    {
        //
    }

    /**
     * Handle the Expert "deleted" event.
     *
     * @param  \App\Models\Expert  $expert
     * @return void
     */
    public function deleted(Expert $expert)
    {
        //
    }

    /**
     * Handle the Expert "restored" event.
     *
     * @param  \App\Models\Expert  $expert
     * @return void
     */
    public function restored(Expert $expert)
    {
        //
    }

    /**
     * Handle the Expert "force deleted" event.
     *
     * @param  \App\Models\Expert  $expert
     * @return void
     */
    public function forceDeleted(Expert $expert)
    {
        //
    }
}
