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
        'id_product',
        'time_publish',
        'max_usage_cupons'
    ];

    // protected $appends = [
    //     'info_publish'
    // ];

    // protected $casts = [
    //     'info_publish'
    // ];

    public function cupons(){
        return $this->hasOne(Cupons::class, 'id', 'id_cupons');
    }

    public function products(){
        return $this->hasOne(Produk::class, 'id', 'id_product');
    }
}
