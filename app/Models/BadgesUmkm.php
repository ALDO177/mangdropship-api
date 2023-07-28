<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramsey\Uuid\Rfc4122\UuidV4;

class BadgesUmkm extends Model
{
    use HasFactory;

    public $timestamps  = false;
    public $keyType     = 'string';
    protected $fillable = ['id_suplier', 'badges_id', 'badges_type'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
        });
    }

    public function beadgeable() : MorphTo {
        return $this->morphTo(BadgesUmkm::class, 'badges_type', 'badges_id');
    }
}
