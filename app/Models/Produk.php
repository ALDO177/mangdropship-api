<?php

namespace App\Models;

use App\Models\MangSellerModels\infoShipingProduct;
use App\Models\MangSellerModels\suplierProduks;
use App\Trait\Table\useTableProduct;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

use Ramsey\Uuid\Rfc4122\UuidV4;

class Produk extends Model
{
    use HasFactory, useTableProduct;

    public $keyType    = 'string';
    protected $hidden  = ['created_at', 'updated_at'];
    protected $appends = ['path_img'];

    protected $fillable = [
        'product_name',
        'slugh_produk',
        'SKU',
        'amount_received',
        'regular_price',
        // 'discount_price',
        'quantity',
        'short_description',
        'product_description',
        // 'product_weight',
        'product_note',
        'order_min',
        'published'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
            $model->slugh_produk = Str::slug($model->product_name);
            $model->published = true;
            $model->order_min = is_null($model->order_min) ? 1 : $model->order_min;
            $model->amount_received = $model->regular_price * 0.99;
            $model->pre_order = is_null($model->pre_order) ? 0 : 1;
        });
    }

    public function published() : Attribute{
        return Attribute::make(function($values){
            return $values ? true : false;
        });
    }

    public function pathImg() : Attribute{
        return Attribute::make(function($values, array $attributte){
            return GalleriesProduct::where('id_product', $attributte['id'])->first()?->image_path;
        });
    }

    public function suplier() : HasOne{
        return $this->hasOne(suplierProduks::class, 'id_product', 'id');
    }

    public function variantProduk() : HasMany{
        return $this->hasMany(VariantProducts::class, 'id_product', 'id');
    }

    public function suplierProduk() : HasOne{
        return $this->hasOne(suplierProduks::class, 'id_product', 'id');
    }

    public function subcategory() : HasOne{
        return $this->hasOne(SubCategoryProduct::class, 'id_product', 'id');
    }

    public function galleries() :HasMany{
        return $this->hasMany(GalleriesProduct::class, 'id_product', 'id');
    }

    public function videos() : HasMany{
        return $this->hasMany(VideosProduct::class, 'id_product', 'id');
    }

    public function cupons() : HasMany{
        return $this->hasMany(CuponsActiveSuplierProduct::class, 'id_product', 'id');
    }

    public  function tagsProduk() : HasOne{
        return $this->hasOne(TagsProduct::class, 'id_product', 'id');
    }

    public function badgesUmkn() : HasMany{
        return $this->hasMany(BadgesUmkm::class, 'id_product', 'id');
    }
    public function infoShipingProduct() : HasOne{
        return $this->hasOne(infoShipingProduct::class, 'id_product', 'id');
    }

    public function historyProduct() : HasMany{
        return $this->hasMany(HistoryProduct::class, 'id_product', 'id');
    }

}
