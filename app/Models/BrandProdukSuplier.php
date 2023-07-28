<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProdukSuplier extends Model
{
    use HasFactory;
    protected $fillable = ['id_badges', 'id_produks'];
}
