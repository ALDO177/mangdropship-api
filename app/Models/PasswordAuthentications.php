<?php

namespace App\Models;
use App\Trait\Table\useTableResetPassword;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordAuthentications extends Model
{
    use HasFactory, useTableResetPassword, MassPrunable, SoftDeletes;

    protected $fillable = [
        'id_verify',
        'email',
        'token',
        'type',
        'status',
        'start_at',
        'end_at'
    ];

    protected $casts = [
        'start_at' => 'datetime: Y-m-d H:i:s',
        'end_at'   => 'datetime: Y-m-d H:i:s',
    ];

    public function prunable() : Builder
    {
       return static::where('end_at', '<', now()->subMinute());
    }

    protected function pruning() : void{
        //..... mysql
    }

    public function vivotTest() : void{
         $this->retrieved(function(Model $model){
             $model->email = strtoupper($model->email);
         });
    }

}
