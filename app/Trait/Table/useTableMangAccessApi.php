<?php

namespace App\Trait\Table{
    
    use Ramsey\Uuid\Uuid;

    trait useTableMangAccessApi{

        protected static function boot() : void{
            parent::boot();
            static::creating(function($model){
                $bytes                = random_bytes(20);
                $model->uuid          = Uuid::uuid4();
                $model->access_tokens = md5($bytes);
            });
        }
        
        public static function AccessTokensApiMang(string $tokens) : bool{

            $accessTokens = static::where('access_tokens', $tokens)->first();
            if(!is_null($accessTokens) && !is_null($accessTokens->verified_at) 
                && $accessTokens->for === 'seller') return true;
            return false;
        }

        public static function AccessTokensApiMangSeller(string $tokens): bool{
            $accessTokens = static::where('access_tokens', $tokens)->first();
            if(!is_null($accessTokens) && !is_null($accessTokens->verified_at) 
                && $accessTokens->for === 'mangseller') return true;
            return false;
        }
    }
}