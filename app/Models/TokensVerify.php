<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TokensVerify extends User
{
    public $timestamps = FALSE;
    use HasFactory;

    protected $fillable = [
        'tokens_type',
        'tokens_id',
        'id_tokens_users',
    ];

    protected $casts = [
        'create_at'  => 'datetime:Y-m-d H:i:s',
        'expired_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function userAccount(){
        return $this->hasOne(User::class, 'id', 'id_tokens_users');
    }
}
