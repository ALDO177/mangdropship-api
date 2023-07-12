<?php

namespace App\Jobs;

use App\Models\Produk;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobOberverProduk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public Produk $produks;
    public $request;

    public function __construct(Produk $model, $request){
        $this->produks = $model->withoutRelations();
        $this->request = $request;
    }

    public function handle() : void
    {
        $this->produks->product_weight = intval($this->request->get('product_weight'));
        $this->produks->save();
    }
}
