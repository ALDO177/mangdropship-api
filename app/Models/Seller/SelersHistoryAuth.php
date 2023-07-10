<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelersHistoryAuth extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'info_messages',
        'data',
        'user_id'
    ];

    protected $casts = [
        'data' => 'array',
    ];

}
