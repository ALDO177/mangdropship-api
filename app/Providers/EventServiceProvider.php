<?php

namespace App\Providers;

use App\Events\EventAuthentication;
use App\Events\EventResetPassword;
use App\Listeners\ListenerAuthentication;
use App\Listeners\ListenerResetPassword;
use App\Models\Admin\AdminMangdropship;
use App\Models\PasswordAuthentications;
use App\Models\User;
use App\Observers\ObserverMangAdmin\MangAdmin;
use App\Observers\ObserverResetPassword;
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
        ],
        
        EventResetPassword::class => [
            ListenerResetPassword::class,
        ]
    ];

    protected $observers = [
        User::class                    => [ObserverSubcription::class],
        AdminMangdropship::class       => [MangAdmin::class],
        PasswordAuthentications::class => [ObserverResetPassword::class]
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
