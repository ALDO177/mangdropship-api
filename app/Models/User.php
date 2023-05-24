<?php

namespace App\Models;

use App\Trait\JwtActionTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends AuthUser implements JWTSubject
{
    use HasApiTokens,
        HasFactory, 
        Notifiable, 
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

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }

    public function tokensVerify(){
        return $this->hasOne(TokensVerify::class, 'id_tokens_users', 'id');
    }

    public function subscribtions(){
        return $this->hasMany(Subscribtion::class, 'id_role_subs', 'id');
    }
}
