<?php

namespace App\Jobs;

use App\Mail\MailForgotPassword;
use App\Models\Admin\AdminMangdropship;
use App\Models\PasswordAuthentications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobEmailMangAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public function __construct(){}

    public function handle()
    {
        $users = AdminMangdropship::findWithEmail('mangdropship123@gmail.com');
        Mail::to($users)->send(new MailForgotPassword('asdfmikamsfn asnfinfaifn'));
    }
}
