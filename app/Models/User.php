<?php

namespace App\Models;

use App\Trait\JwtActionTable;
use App\Trait\Table\useTableUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends AuthUser implements JWTSubject
{
    use HasApiTokens,
        HasFactory, 
        Notifiable, 
        useTableUsers,
        JwtActionTable;

    // public $keyType = 'string';
    // public $increment = false;
    
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
        'email_verified_at' => 'datetime',
    ];

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function(Model $model){
    //         $model->id = UuidV4::uuid4()->toString();
    //     });
    // }
}
