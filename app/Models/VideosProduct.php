<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Rfc4122\UuidV4;

class VideosProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'video_name',
        'video_description',
        'video_path',
        'video_status'
    ];

    protected $casts= [
        'video_status' => 'boolean'
    ];

    public $timestamps = false;
    public $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function(Model $model){
             $model->id = UuidV4::uuid4()->toString();
             $model->video_status = true;
        });
    }
}
