<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsProduct extends Model
{
    use HasFactory; 
    public $timestamps = false;
    public $increment  = false;

    protected $fillable =['id_tags_product', 'id_product'];
}
