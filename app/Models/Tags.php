<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Tags extends Model
{
    use HasFactory;
    public $keyType = 'string';
    
    protected $fillable =[
        'tags_name_product',
        'slugh_name_product',
    ];

    protected static function boot()
    {
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
            $model->slugh_name_product = $model->tags_name_product;
        }); 
    }
}
