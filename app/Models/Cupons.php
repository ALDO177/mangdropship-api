<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Cupons extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable  =[
        'id_suplier',
        'code_cupons',
        'code_description',
        'discount_value',
        'discount_type',
        'time_usage',
        'max_usage',
        'cupons_start_at',
        'cupons_end_at'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->code_cupons = md5(time());
            $model->id = UuidV4::uuid4()->toString();
        });
    }
}
