<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleriesVariantProduct extends Model
{
    use HasFactory;
    
    public $timestamps  = false;
    public $increment   = false;

    protected $fillable = [
        'id_variant',
        'path'
    ];
}
