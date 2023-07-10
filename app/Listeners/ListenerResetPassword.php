<?php

namespace App\Listeners;

use App\Events\EventResetPassword;
use App\Mail\MailForgotPassword;
use App\Models\Admin\AdminMangdropship;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ListenerResetPassword implements ShouldQueue
{
    use InteractsWithQueue;

    public $connection  = 'database';
    public $queue       = 'listeners';
    public $delay       = 60;
    public $afterCommit = true;

    public function __construct()
    {
        //
    }

    public function viaConnection(): string
    {
        return 'database';
    }

    public function viaQueue(): string
    {
        return md5(random_bytes(16));
    }

    
    public function handle(EventResetPassword $event) : void
    {
        $user = AdminMangdropship::findWithEmail($event->passwordAuthentications->email);
        Mail::to($user)->send(new MailForgotPassword($event->passwordAuthentications->token));
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
