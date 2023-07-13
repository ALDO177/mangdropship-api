<?php

namespace App\Models\MangSellerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class infoShipingProduct extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $keyType = 'string';


    protected $fillable = [
        'id_product',
        'heavy_product',
        'remember_token',
        'package_size'
    ];

    protected $casts = ['package_size' => 'array'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
            $model->remember_token = md5(time() . random_int(10, 1000));
        });
    }
}
