<?php

namespace App\Models\MangSellerModels;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreStatus extends Model
{
    use HasFactory, UuidSetGlobal;
    public $keyType    = 'string';
    public $timestamps = false;

    protected $fillable = [
        'status',
        'actived_at_start',
        'actived_at_end'
    ];

    public static function findOrUpdate(bool $options = true, string $id, array $attr){
        if($options){
            $find = static::where('id', $id)->first();
            return $find;
        }
        return static::where('id', $id)->update($attr);
    }
}
