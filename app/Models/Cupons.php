<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Cupons extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected static function boot()
    {
        static::creating(function(Model $model){
            $model->code_cupons = md5(time() . random_bytes(100, 1000));
            $model->id = UuidV4::uuid4()->toString();
        });
    }
}
