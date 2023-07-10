<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountPaid extends Model
{
    use HasFactory, MassPrunable, SoftDeletes;

    protected $fillable  =
    [
        'paid_discount',
        'create_at_disc',
        'expire_at_disc',
        'offers_id'
    ];

    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subMinute());
    }
    
    protected function pruning() : void{

    }
}
