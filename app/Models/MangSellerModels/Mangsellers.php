<?php

namespace App\Models\MangSellerModels;

use App\Models\MangsellerModels\ExtendLoginSocialMedia;
use App\Models\Supllier;
use App\Trait\JwtActionTable;
use App\Trait\Table\Mangseller\useTableMangSeller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function providerLogin() : HasMany{
        return $this->hasMany(ExtendLoginSocialMedia::class, 'id_sellers', 'id');
    }

    public function supliers() : HasOne{
        return $this->hasOne(Supllier::class, 'id_sellers', 'id');
    }

    public function getProviderLogin($id){
        return $this->with(['providerLogin'])->where('id', $id)->first();
    }

    public static function findUuid(string $uuid){
        return static::where('id', $uuid)->first();
    }
}
