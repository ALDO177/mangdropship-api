<?php

namespace App\Models\MangSellerModels;

use App\Trait\Table\Mangseller\Store\useTableStore;
use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Rfc4122\UuidV3;

class Store extends Model
{
    use HasFactory, useTableStore;
    public $keyType = 'string';

    protected $fillable =[
        'name_store',
        'slugh_store',
        'path_store',
        'store_status'
    ];

    protected $casts = [
        'store_status' => 'bool'
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function(Model $model){
            $model->id = UuidV3::uuid4()->toString();
            $model->name_store  = Str::upper($model->name_store);
            $model->slugh_store = Str::slug($model->name_store);
        });

        static::updating(function(Model $model){
            $model->name_store  = Str::upper($model->name_store);
            $model->slugh_store = Str::slug($model->name_store);
        });
    }

    public static function findOrUpdate(bool $options = true, string $id, array $attr){
        if($options){
            $find = static::where('id', $id)->first();
            return $find;
        }
        return static::where('id', $id)->update($attr);
    }

    public function pathStore() : Attribute{
        return Attribute::make(function($values, $attr){
            if(strpos($values, 'http')){
                return $values;
            }
            return Storage::disk(env('DISK_KEY_IMG'))->url($values);
        });
    }
}
