<?php

namespace App\Observers;

use App\Models\Company;
use App\Models\Notification;

class CompanyRegisterObserver
{
    /**
     * Handle the Company "created" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function created(Company $company)
    {
        Notification::Create([
            'title'             => "New Company Registered!",            
            'link'              => 'super/companies',
            'guard'             => current_guard(),
            'user_id'           => auth(current_guard())->id(),
            'receiver_guard'    => 'super',
            'icon'              => 'ti-user',
        ]);
        pusher_setting('super_notification_channel', 'super_notification_event', 'message');
    }

    /**
     * Handle the Company "updated" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function updated(Company $company)
    {
        //
    }

    /**
     * Handle the Company "deleted" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function deleted(Company $company)
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function restored(Company $company)
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function forceDeleted(Company $company)
    {
        //
    }
}
