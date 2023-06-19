<?php

namespace App\Models\MangSellerModels;

use App\Models\AccountBank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SuplierAccountBank extends Model
{
    use HasFactory;
    public $keyType    = 'string';

    protected $fillable =[
        'account_name',
        'account_number',
        'id_store_account_bank',
        'id_account_bank'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
          
        }); 
    }

    public function bankAccount() : HasOne{
        return $this->hasOne(AccountBank::class, 'id', 'id_account_bank');
    }
    
}
