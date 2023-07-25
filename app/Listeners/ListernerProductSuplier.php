<?php

namespace App\Listeners;

use App\Events\StoreProductSupplier;
use Throwable;

class ListernerProductSuplier
{

    public $connection = 'database';
    public $queue = 'listeners';
    public $afterCommit = true;

    public function __construct()
    {
        
    }

    public function handle(StoreProductSupplier $event)
    {
        $event->produk->product_weight = 90;
        $event->produk->save();
    }

    public function failed(StoreProductSupplier $event, Throwable $exception): void
    {
        echo 'Failed Bos';
    }
}
