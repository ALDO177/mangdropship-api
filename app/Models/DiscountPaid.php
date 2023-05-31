<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function prunable()
    {
        return static::where('expire_at_disc', '<=', now()->subMinute());
    }
}
