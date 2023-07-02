<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideosProduct extends Model
{
    use HasFactory, UuidSetGlobal;

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
}
