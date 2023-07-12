<?php

namespace App\Observers;

use App\Models\Produk;

class ObserverProduk
{
    public function created(Produk $produk)
    {
        //
    }

    /**
     * Handle the Produk "updated" event.
     *
     * @param  \App\Models\Produk  $produk
     * @return void
     */
    public function updated(Produk $produk)
    {
        //
    }

    /**
     * Handle the Produk "deleted" event.
     *
     * @param  \App\Models\Produk  $produk
     * @return void
     */
    public function deleted(Produk $produk)
    {
        //
    }

    /**
     * Handle the Produk "restored" event.
     *
     * @param  \App\Models\Produk  $produk
     * @return void
     */
    public function restored(Produk $produk)
    {
        //
    }

    /**
     * Handle the Produk "force deleted" event.
     *
     * @param  \App\Models\Produk  $produk
     * @return void
     */
    public function forceDeleted(Produk $produk)
    {
        //
    }
}
