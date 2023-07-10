<?php

namespace App\Models\MangSellerModels;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreAccount extends Model
{
    use HasFactory, UuidSetGlobal;
    public $timestamps = false;
    public $keyType    = 'string';

    protected $fillable =[
        'name_comnpany',
        'field_company',
        'company_info',
        'resi_company'
    ];
}
