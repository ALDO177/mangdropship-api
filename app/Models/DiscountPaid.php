<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class DiscountPaid extends Model
{
    use HasFactory, Prunable;
    public $timestamps   = false;
    public $incrementing = false;

    protected $fillable =[
        'paid_discount',
        'create_at_disc',
        'expire_at_disc',
        'offers_id'
    ];

    // protected $casts = [
    //     'expire_at_disc' => 'datetime:l, d-M-y H:i:s T',
    //     'create_at_disc' => 'datetime:l, d-M-y H:i:s T'
    // ];

    public function prunable()
    {
        return static::where('expire_at_disc', '<=', now()->subMinute());
    }
}
