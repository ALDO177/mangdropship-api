<?php

namespace App\Models;

use App\Trait\Table\useTableMangAccessApi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangdropshipAccessApi extends Model
{
    use HasFactory, useTableMangAccessApi;
    protected $guarded = [
        'verify_at',
    ];

}
