<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class HistoryProduct extends Model
{
    use HasFactory;

    public $keyType = 'string';
    protected $fillable =[
        'id_product',
        'message_history'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
        });
    }
}
