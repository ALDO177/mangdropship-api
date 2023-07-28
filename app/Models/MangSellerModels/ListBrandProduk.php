<?php

namespace App\Models\MangSellerModels;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBrandProduk extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [ 'id_suplier', 'merk_name', 'status', 'position', 'path', 'type'];

    protected static function boot() : void{
        parent::boot();
        static::creating(function(Model $model){
            $model->type = ListBrandProduk::class;
        });
    }

    public function path() : Attribute{
        return Attribute::make(function($values){
            return env('END_POINT_STG') .'mangseller/brand/' . $values;
        });
    }

    public function status() : Attribute{
        return Attribute::make(function($values){
            return $values ? 'Enabled' : 'Disabled';
        }); 
    }
}
