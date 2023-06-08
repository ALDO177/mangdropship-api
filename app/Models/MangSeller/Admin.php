<?php

namespace App\Models\MangSeller;

use App\Trait\JwtActionTable;
use App\Trait\Table\Mangseller\useTableMangSeller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Admins;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Admins implements JWTSubject
{
    use HasFactory, 
        Notifiable, 
        JwtActionTable, 
        useTableMangSeller;

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

    public function setPasswordAttribute($password) : void{
        $this->attributes['password'] = Hash::make($password);
    }
}
