<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{
    use HasFactory;

    protected $fillable = [
         'subscription_role_id',
         'id_role_subs'
    ];

    public function roleSubscribtions(){
        return $this->hasOne(RoleSubscribtion::class, 'id', 'subscription_role_id');
    }
}
