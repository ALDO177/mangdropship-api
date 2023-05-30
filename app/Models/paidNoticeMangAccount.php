<?php

namespace App\Models;

use App\Trait\Table\useTablePaidAccount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paidNoticeMangAccount extends Model
{
    use HasFactory, useTablePaidAccount;
    public $timestamps   = false;

    protected static function booted()
    {
        static::retrieved(function(Model $model){
            $model->id === 5 ? 100 : $model->id;
        });
    }
}
