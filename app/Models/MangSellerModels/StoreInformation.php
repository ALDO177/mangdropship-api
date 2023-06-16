<?php

namespace App\Models\MangSellerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StoreInformation extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'id_store',
        'id_status',
        'id_store_account',
        'id_store_payment',
        'id_store_expedition'
    ];

    public function status(): HasOne{
        return $this->hasOne(StoreStatus::class, 'id', 'id_status');
    }

    public function account() : HasOne{
        return $this->hasOne(StoreAccount::class, 'id', 'id_store_account');
    }

    public function storePayment() : HasOne{
        return $this->hasOne(StorePaymentBank::class, 'id', 'id_store_payment');
    }

    public function storeExpedition() : HasOne{
        return $this->hasOne(StoreShipingExpedition::class, 'id', 'id_store_expedition');
    }
}
