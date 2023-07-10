<?php

namespace App\Models\MangSellerModels;

use App\Models\Produk;
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

    public function product(){
        return $this->hasOne(Produk::class, 'id', 'id_product');
    }
}
