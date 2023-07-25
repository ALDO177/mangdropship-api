<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class ListMerkProdukSeller extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $keyType    = 'string';

    protected $fillable = [
        'merk_name',
        'status',
        'path',
        'position'
    ];
    protected $casts = ['status' => 'boolean'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->id = UuidV4::uuid4()->toString();
            $model->status = true;
        });
    }
}
