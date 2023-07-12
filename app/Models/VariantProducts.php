<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Rfc4122\UuidV4;

class VariantProducts extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $increment  =  false;
    public $keyType = 'string';
    
    protected $fillable = [
        'id_product',
        'variant_type_name', 
        'variant_type_names',
        'variant_options'
    ];

    protected $casts = [
        'variant_options' => 'array'
    ];  

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
        });
    }

    public function galleries() : HasMany{
        return $this->hasMany(GalleriesVariantProduct::class, 'id_variant', 'id');
    }
}
