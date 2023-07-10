<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SuplierAccountBank extends Model
{
    use HasFactory, UuidSetGlobal;
    public $keyType = 'string';

    protected $fillable = [
        'account_name',
        'account_number',
        'id_supliers',
        'id_account_bank'
    ];

    public function bankInfo() : HasOne{
        return $this->hasOne(AccountBank::class, 'id', 'id_account_bank');
    }
}
