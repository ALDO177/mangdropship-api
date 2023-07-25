<?php

namespace App\Models\MangSellerModels\Activation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class ordersProduk extends Model
{
    use HasFactory;
    public $keyType    = 'string';
    public $timestamps = 'string';


    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
            $model->token_order = md5(time());
        });
    }

}
