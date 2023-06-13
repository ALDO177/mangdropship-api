<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supllier extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $keyType = 'string';

    protected $fillable =
    [
        'id_sellers',
        'id_product'
    ];

    public function product(){
        return $this->hasOne(Produk::class, 'id', 'id_product');
    }
}
