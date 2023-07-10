<?php

namespace App\Models\MangSellerModels;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreShipingExpedition extends Model
{
    use HasFactory, UuidSetGlobal;
    public $timestamps = false;
    public $keyType    = 'string';

    protected $fillable = [
        'city', 
        'regency', 
        'subdistrict'
    ];
}
