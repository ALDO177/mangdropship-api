<?php

namespace App\Providers;

use App\Events\EventAuthentication;
use App\Listeners\ListenerAuthentication;
use App\Models\User;
use App\Observers\ObserverSubcription;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        
        EventAuthentication::class => [
            ListenerAuthentication::class
        ]
    ];

    protected $observers = [
        User::class => [ObserverSubcription::class],
    ];

    public function boot()
    {
        //
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
