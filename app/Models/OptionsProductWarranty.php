<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsProductWarranty extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'name_warranty',
        'time_to_days'
    ];
}
