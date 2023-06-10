<?php

namespace App\Trait\Table\MangAdmin{

    use Illuminate\Support\Facades\Hash;

    trait useTableMangAdmin{
        
        public function setPasswordAttribute($password) : void{
            $this->attributes['password'] = Hash::make($password);
        }

        public static function findWithEmail(string $email){
            return static::where('email', $email)->first();
        }
    }
}