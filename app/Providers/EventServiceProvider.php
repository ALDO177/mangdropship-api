<?php

namespace App\Providers;

use App\Events\EventPasswordReset;
use App\Listeners\ListenerNotificationPassword;
use App\Models\User;
use App\Observers\ObserverSubcription;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EventPasswordReset::class => [
            ListenerNotificationPassword::class
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
