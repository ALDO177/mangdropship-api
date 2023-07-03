<?php

namespace App\Models;

use App\Casts\MangsellerCasts\CuponsCast;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Cupons extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $keyType = 'string';

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
    protected $appends = ['cupon_options'];
    
    protected $casts = [
        'cupon_options' => CuponsCast::class
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->code_cupons = md5(time());
            $model->id = UuidV4::uuid4()->toString();
        });
    }

    public function cuponOptions() : Attribute{
        return Attribute::make(get: fn($values) => $values);
    }
}
