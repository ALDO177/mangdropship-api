<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantValues extends Model
{
    use HasFactory, UuidSetGlobal;
    public $timestamps = false;

    protected $fillable = [
        'variant_name', 
        'variant_quantity', 
        'variant_price'
    ];
}
