<?php

namespace App\Models\MangSellerModels;

use App\Models\Produk;
use App\Models\Supllier;
use App\Trait\JwtActionTable;
use App\Trait\Table\Mangseller\useTableMangSeller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class MangSellers extends Authenticable implements JWTSubject
{
    use HasApiTokens,
        HasFactory, 
        Notifiable, 
        useTableMangSeller,
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
        'email_verified_at' => 'datetime',
    ];

    public function supliers() : HasMany{
        return $this->hasMany(Supllier::class, 'id_sellers', 'id');
    }
}
