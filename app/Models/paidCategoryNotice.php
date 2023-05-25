<?php

namespace App\Models;

use App\Trait\Table\useTablePaidCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paidCategoryNotice extends Model
{
    use HasFactory, useTablePaidCategory;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'data',
        'paid_price',
        'paid_category'
    ];

    protected $casts = [
        'data' => 'array'
    ];

}
