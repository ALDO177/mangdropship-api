<?php

namespace App\Jobs;

use App\Models\Produk;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class JobOberverProduk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public Produk $produks;
    protected $request;

    public function __construct($request){
        $this->request = $request;
    }

    public function handle(Request $request) : void
    {
         Storage::disk('oss')->put('storage', $request->file('images'));
    }

    public function fail($exception = null)
    {
        echo $exception;
    }
}
