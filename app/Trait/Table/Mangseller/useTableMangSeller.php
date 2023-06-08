<?php

namespace App\Trait\Table\Mangseller{

    trait useTableMangSeller{

        public static function findWithEmail(string $email){
            return static::where('email', $email)->first();
        }
    }
}