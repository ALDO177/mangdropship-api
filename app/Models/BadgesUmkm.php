<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgesUmkm extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = ['id_list_brand', 'id_product'];
}
