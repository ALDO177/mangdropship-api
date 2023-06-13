<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Categorys extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slugh'
    ];

    public function subCategory() : HasOneThrough{

        return $this->hasOneThrough(
            ProductCategorys::class, 
            SubCategorys::class, 
            'category_id', 
            'category_id', 'id', 
            'id');
    }
}
