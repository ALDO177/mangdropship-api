<?php

namespace App\Jobs;

use App\Mail\MailForgotPassword;
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
    public string $email;
    public string $tokens;

    public function __construct(PasswordAuthentications $passwordAuthentications){
        $this->email  = $passwordAuthentications->email;
        $this->tokens = $passwordAuthentications->token;
    }
    
    public function handle(): void
    {
        Mail::to($this->email)->send(new MailForgotPassword($this->tokens));
    }
}
