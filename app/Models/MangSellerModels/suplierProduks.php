<?php

namespace App\Models\MangSellerModels;

use App\Models\Produk;
use App\Models\Supllier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suplierProduks extends Model
{
    use HasFactory;
    public $keyType = 'string';

    protected $fillable = [
        'id_suplier',
        'id_product'
    ];

    public function suplier(){
        return $this->hasOne(Supllier::class, 'id', 'id_suplier');
    }

    public function product(){
        return $this->hasOne(Produk::class, 'id', 'id_product');
    }
}
