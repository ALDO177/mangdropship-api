<?php

namespace App\Models\MangSellerModels;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory, UuidSetGlobal;
    public $keyType = 'string';

    protected $fillable =[
        'name_store',
        'slugh_store',
        'path_store',
        'store_status'
    ];
}
