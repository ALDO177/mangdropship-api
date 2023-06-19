<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV3;

class AccountBank extends Model
{
    use HasFactory;
    public $keyType = 'string';

    protected $fillable =[
        'type_bank', 'thumbnail', 'code_access', 'more'
    ];

    public $casts = [
        'more' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV3::uuid4()->toString();
            $model->code_access = md5(random_bytes(25));
        });
    }
}
