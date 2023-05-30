<?php

namespace App\Jobs;

use App\Mail\SubscribtionMailSending;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobEmailSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function __construct(protected User $user)
    {
        //
    }
    
    public function handle()
    {
        $base64 = base64_encode($this->user->tokensVerify->tokens_type);
        Mail::to($this->user)->send(new SubscribtionMailSending($base64));
    }
}
