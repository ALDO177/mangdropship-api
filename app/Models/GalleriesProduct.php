<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class GalleriesProduct extends Model
{
    use HasFactory;
    public $keyType    = 'string';
    public $timestamps = false;
    
    protected $fillable =[
        'id_product',
        'image_path',
        'image_active',
    ];

    protected $casts =[
        'image_active' => 'boolean'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $models){
            $models->id = UuidV4::uuid4()->toString();
            $models->image_active = true;
        });
    }
}
