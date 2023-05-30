<?php

namespace App\Models;

use App\Trait\UUID\UuidSetGlobal;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleSubscribtion extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'role_type',
        'status_payment',
    ];


    public function statusPayment() : Attribute
    {
        return Attribute::make(function($value){
            return $value > 0 ? 'PAID' : 'FREE';
        });
    }

    public static function checkRoleType(string $id) : bool{
        if(is_null(static::where('role_type', $id)->first())){
            return false;
        }
        return true;
    }
}
