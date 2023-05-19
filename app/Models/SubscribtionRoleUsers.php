<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribtionRoleUsers extends User
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable =[
        'subscribe',
        'status',
        'create_at',
        'expired_at'
    ];

    protected $castc = [
        'status'     => 'boolean',
        'create_at'  => 'datetime:Y-m-d H:i:s',
        'expired_at' => 'datetime:Y-m-d H:i:s'
    ];
} 
