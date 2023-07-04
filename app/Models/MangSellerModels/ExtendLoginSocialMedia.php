<?php

namespace App\Models\MangsellerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class ExtendLoginSocialMedia extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $keyType    = 'string';

    protected $fillable =[
        'id_sellers',
        'type',
        'provider_id',
        'access_tokens'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
            $model->access_tokens = md5(time());
        });
    }
}
