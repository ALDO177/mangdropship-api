<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory, UuidSetGlobal;
    public $keyType = 'string';

    public function published() : Attribute{
        return Attribute::make(function($values){
            return $values ? true : false;
        });
    }

    public function images(){
        return $this->hasMany(GalleriesProduct::class, 'id_product', 'id');
    }
}
