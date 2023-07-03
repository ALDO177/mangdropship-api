<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuponsActiveSuplierProduct extends Model
{
    use HasFactory;

    public $increments = false;
    public $timestamps = false;

    protected $fillable = [
        'id_suplliers',
        'id_cupons',
        'id_product'
    ];
}
