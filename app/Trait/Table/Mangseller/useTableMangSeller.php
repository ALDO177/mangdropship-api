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
        
        public static function updatePasswordAdmin($email, $password){
            $updated = static::where('email', $email)->update(['password' => $password]);
            if($updated) return true;
            return false;
        }
    }
}