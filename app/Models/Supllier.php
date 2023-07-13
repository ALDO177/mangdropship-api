<?php

namespace App\Models;

use App\Models\MangSellerModels\MangSellers;
use App\Models\MangSellerModels\Store;
use App\Models\MangSellerModels\suplierProduks;
use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supllier extends Model
{
    use HasFactory, UuidSetGlobal;
    public $timestamps = false;
    public $keyType    = 'string';

    protected $fillable =
    [
        'id_sellers',
        'id_product',
        'id_store'
    ];

    public function user(){
        return $this->hasOne(MangSellers::class, 'id', 'id_sellers');
    }

    public function store() : HasOne{
        return $this->hasOne(Store::class, 'id', 'id_store');
    }

    public function suplierProduk() : HasMany{
        return $this->hasMany(suplierProduks::class, 'id_suplier', 'id');
    }

    public function suplierProdukHasOne() : HasOne{
        RETURN $this->hasOne(suplierProduks::class, 'id_suplier', 'id');
    }

    public function cuponsList() : HasMany{
        return $this->hasMany(Cupons::class, 'id_suplier', 'id');
    }

    public function cuponsActiveProduct() : HasMany{
        return $this->hasMany(CuponsActiveSuplierProduct::class, 'id_suplliers', 'id');
    }

    public function infoStore(string $id){
        return static::with(['store'])->where('id_sellers', $id)->first();
    }

    public function listCuponsActivedProduct($idUser){
        return $this->with(['cuponsActiveProduct' => ['cupons']])->where('id_sellers', $idUser)->first();
    }

    public function storeInformation(string $id){
        return static::with(['store' => ['storeInformation']])->where('id_sellers', $id)
        ->first()?->store?->storeInformation;
    }

    public function findInfo(string $id){
        return static::with(['store' => ['storeInformation' => ['status']]])
            ->where('id_sellers', $id)
            ->first()?->store;
    }

    public function bankAccount() : HasMany{
        return $this->hasMany(SuplierAccountBank::class, 'id_supliers', 'id');
    }

    public function getAllBankAccount($id){
        return $this->with(['user', 'bankAccount' => ['bankInfo']])->where('id_sellers', $id)->first();
    }

    public function findIdSellers($id){
        return static::where('id_sellers', $id)->first();
    }
}
