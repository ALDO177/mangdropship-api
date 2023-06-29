<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Illuminate\Support\Str;

class SubCategorys extends Model
{

    use HasFactory;
    public $keyType = 'string';

    protected $fillable =
    [
        'title_sub',
        'slugh_sub',
        'id_category',
    ];

    public $casts = ['type_publish' => 'bool'];

    public function subCategoryproduct() : HasMany{
        return $this->hasMany(
            SubCategoryProduct::class, 
            'id_sub_category', 
            'id'
        );
    }

    public function typePublish() : Attribute{
        return Attribute::make(
            fn($values) => $values ? 'enabled' : 'disabled'
        );
    }
    
    public function category() : HasOne{
        return $this->hasOne(Categorys::class, 'id', 'id_category');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
            $model->token_access_code = md5(time() . random_bytes(random_int(100, 1000)));
            $model->slugh_sub_category_name = Str::slug($model->sub_category_name);
        });
    }

    public function getGroupSubCategoryPublish(int $paginate = 20){
        return $this->with(['category'])
              ->where('type_publish', 1) // Output For Publish enable Data
              ->cursorPaginate($paginate)
              ->appends(['sort' => 'created_at']);
    }

    public function searchFindBySlughWithProduk(string $slugh){
        return $this->with(['subCategoryproduct' => ['product']])
               ->where('slugh_sub_category_name', $slugh)
               ->where('type_publish', 1) // output For Publish enable data not disable
               ->first();
    }

    public function searchSubcategory(string $searchItems){
        return $this->query()
              ->with(['category'])
              ->whereLike(
                ['slugh_sub_category_name', 
                'token_access_code', 
                'sub_category_name'], $searchItems)
              ->cursorPaginate(10);
    }
}
