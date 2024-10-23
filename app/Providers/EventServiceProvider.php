<?php

namespace App\Providers;

use App\Models\Agent;
use App\Models\Company;
use App\Models\Expert;
use App\Models\Order;
use App\Observers\AgentRegisterObserver;
use App\Observers\CompanyRegisterObserver;
use App\Observers\ExpertRegisterObserver;
use App\Observers\OrderObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        
        Order::observe(OrderObserver::class);
        Agent::observe(AgentRegisterObserver::class);
        Company::observe(CompanyRegisterObserver::class);
        Expert::observe(ExpertRegisterObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
