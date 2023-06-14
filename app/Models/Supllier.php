<?php

namespace App\Models;

use App\Models\MangSellerModels\Store;
use App\Models\MangSellerModels\suplierProduks;
use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supllier extends Model
{
    use HasFactory, UuidSetGlobal;
    public $timestamps = false;
    public $keyType = 'string';

    protected $fillable =
    [
        'id_sellers',
        'id_product',
        'id_store'
    ];

    public function store() : HasOne{
        return $this->hasOne(Store::class, 'id', 'id_store');
    }

    public function suplierProduk() : HasMany{
        return $this->hasMany(suplierProduks::class, 'id_suplier', 'id');
    }
}
