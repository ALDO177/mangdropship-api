<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class BadgesUmkm extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $keyType = 'string';
    protected $fillable = ['id_list_brand', 'id_product', 'name_brand'];


    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
        });
    }
}
