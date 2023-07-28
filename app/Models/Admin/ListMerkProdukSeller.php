<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class ListMerkProdukSeller extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'merk_name',
        'type',
        'status',
        'path',
        'position'
    ];
    protected $casts = ['status' => 'boolean'];
    
    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
            $model->type  = ListMerkProdukSeller::class;
        });
    }
}
