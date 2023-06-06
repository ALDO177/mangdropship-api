<?php

namespace App\Listeners;

use App\Events\EventAuthentication;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerAuthentication
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

    public function handle(EventAuthentication $event)
    {
         $event->passwordAuthentications->status = 'asnfuihasuf';
    }
}
