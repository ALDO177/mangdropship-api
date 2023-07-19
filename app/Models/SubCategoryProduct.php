<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubCategoryProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $increment  = false;

    protected $fillable = ['id_sub_category', 'id_product'];

    public function subcategory() : HasOne{
        return $this->hasOne(SubCategorys::class, 'id', 'id_sub_category');
    }
    
    public function product() : HasOne{
        return $this->hasOne(Produk::class, 'id', 'id_product');
    }
}
