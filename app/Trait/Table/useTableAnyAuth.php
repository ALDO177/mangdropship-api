<?php

namespace App\Trait\Table{

    use Illuminate\Support\Facades\Hash;

    trait useTableAnyAuth{

        public static function findEmail(string $email){
            return static::where('email', $email)->first();
        }

        public function setPasswordAttribute($password) : void{
            $this->attributes['password'] = Hash::make($password);
        }
    }
}