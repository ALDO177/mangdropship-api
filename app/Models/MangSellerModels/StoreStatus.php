<?php

namespace App\Models\MangSellerModels;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreStatus extends Model
{
    use HasFactory, UuidSetGlobal;
    public $keyType    = 'string';
    public $timestamps = false;

    protected $fillable = [
        'status',
        'actived_at_start',
        'actived_at_end'
    ];
}
