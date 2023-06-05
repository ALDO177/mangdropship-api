<?php

namespace App\Trait\Table{

    use Illuminate\Support\Facades\Hash;
    use App\Models as DataModels;

    trait useTableUsers{


        public function setPasswordAttribute($password) : void{
            $this->attributes['password'] = Hash::make($password);
        }
    
        public function tokensVerify(){
            return $this->hasOne(DataModels\TokensVerify::class, 'id_tokens_users', 'id');
        }
    
        public function subscribtions(){
            return $this->hasMany(DataModels\Subscribtion::class, 'id_role_subs', 'id');
        }

        public static function findEmail(string $email){
            return static::where('email', $email)->first();
        }
    }
}
