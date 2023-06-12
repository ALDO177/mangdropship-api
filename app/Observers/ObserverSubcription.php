<?php

namespace App\Observers;

use App\Jobs\JobEmailSubscription;
use App\Models\User;
use App\VerifyTokens\VerifyTokensEmail;
use Illuminate\Support\Facades\Bus;

class ObserverSubcription
{
    public function created(User $user)
    {
        Bus::chain([
            new VerifyTokensEmail($user),
            JobEmailSubscription::dispatch($user)
        ]);
    }

    public function updated(User $user)
    {
        //
    }

    public function deleted(User $user)
    {
        //
    }

    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
