<?php

namespace App\Models\Admin;

use App\Trait\JwtActionTable;
use App\Trait\Table\MangAdmin\useTableMangAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authentication;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AdminMangdropship extends Authentication implements JWTSubject
{
    use HasFactory, useTableMangAdmin, JwtActionTable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'id'                => 'string',
        'email_verified_at' => 'datetime',
    ];
}
