<?php

namespace App\Observers;

use App\Models\paidNoticeMangAccount;

class ObserverPaidMangAccount
{
    public function created(paidNoticeMangAccount $paidNoticeMangAccount)
    {
        //
    }

    /**
     * Handle the paidNoticeMangAccount "updated" event.
     *
     * @param  \App\Models\paidNoticeMangAccount  $paidNoticeMangAccount
     * @return void
     */
    public function updated(paidNoticeMangAccount $paidNoticeMangAccount)
    {
        //
    }

    /**
     * Handle the paidNoticeMangAccount "deleted" event.
     *
     * @param  \App\Models\paidNoticeMangAccount  $paidNoticeMangAccount
     * @return void
     */
    public function deleted(paidNoticeMangAccount $paidNoticeMangAccount)
    {
        //
    }

    /**
     * Handle the paidNoticeMangAccount "restored" event.
     *
     * @param  \App\Models\paidNoticeMangAccount  $paidNoticeMangAccount
     * @return void
     */
    public function restored(paidNoticeMangAccount $paidNoticeMangAccount)
    {
        //
    }

    /**
     * Handle the paidNoticeMangAccount "force deleted" event.
     *
     * @param  \App\Models\paidNoticeMangAccount  $paidNoticeMangAccount
     * @return void
     */
    public function forceDeleted(paidNoticeMangAccount $paidNoticeMangAccount)
    {
        //
    }
}
