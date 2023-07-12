<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleriesProduct extends Model
{
    use HasFactory, UuidSetGlobal;
    public $keyType    = 'string';
    public $timestamps = false;
    
    protected $fillable =[
        'id_product',
        'image_path',
        'image_activep',
    ];

    protected $casts =[
        'image_active' => 'boolean'
    ];
}
