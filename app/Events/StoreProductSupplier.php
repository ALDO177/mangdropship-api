<?php

namespace App\Events;

use App\Models\Produk;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class StoreProductSupplier
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public function __construct(public Produk $produk, public Request $request)
    {
        
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
