<?php

namespace App\Listeners;

use App\Events\EventPasswordReset;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerNotificationPassword
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventPasswordReset  $event
     * @return void
     */
    public function handle(EventPasswordReset $event)
    {
        //
    }
}
