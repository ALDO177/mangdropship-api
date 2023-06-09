<?php

namespace App\Trait\Table\Mangseller{

    use Illuminate\Support\Facades\Hash;
    
    trait useTableMangSeller{

        public function setPasswordAttribute($password) : void{
            $this->attributes['password'] = Hash::make($password);
        }

        public static function findWithEmail(string $email){
            return static::where('email', $email)->first();
        }
    }
}