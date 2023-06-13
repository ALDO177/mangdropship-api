<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategorys extends Model
{
    use HasFactory, UuidSetGlobal;
    public $keyType = 'string';

    protected $fillable =[
        'title_sub',
        'slugh_sub',
        'category_id',
    ];

    public function product(){
        return $this->hasMany(ProductCategorys::class, 'category_id', 'id');
    }
}
