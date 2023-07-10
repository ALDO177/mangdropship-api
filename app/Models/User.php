<?php

namespace App\Models;

use App\Trait\JwtActionTable;
use App\Trait\Table\useTableUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends AuthUser implements JWTSubject
{
    use HasApiTokens,
        HasFactory, 
        Notifiable, 
        useTableUsers,
        JwtActionTable;

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
        'id'    => 'string',
        'email_verified_at' => 'datetime',
    ];
}
