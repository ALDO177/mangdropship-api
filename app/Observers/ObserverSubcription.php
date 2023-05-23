<?php

namespace App\Observers;

use App\Jobs\JobEmailSubscription;
use App\Models\User;

class ObserverSubcription
{
    public function created(User $user)
    {
        JobEmailSubscription::dispatch($user);
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
