<?php

namespace App\Models\MangSellerModels;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StorePaymentBank extends Model
{
    use HasFactory, UuidSetGlobal;
    public $keyType = 'string';

    protected $fillable = [
        'altern_code',
    ];

    public function accounts() : HasMany{
        return $this->hasMany(SuplierAccountBank::class, 'id_store_account_bank', 'id');
    }
}
