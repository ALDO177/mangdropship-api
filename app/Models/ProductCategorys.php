<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategorys extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $keyType    = 'string';

    protected $fillable = [
        'category_id',
        'produks_id'
    ];

    public function getProduct(){
        return $this->hasOne(Produk::class, 'id', 'produks_id');
    }

}
