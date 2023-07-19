<?php

namespace App\Models\MangSellerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBrandProduk extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [ 'id', 'id_suplier', 'name_brand', 'path_img' ];
    protected $hidden = ['id_suplier'];
}
