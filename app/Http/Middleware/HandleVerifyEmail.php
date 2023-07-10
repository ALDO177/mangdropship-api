<?php

namespace App\Http\Middleware;

use App\Exceptions\HandleErrorTokensVerified;
use App\Models\TokensVerify;
use App\Trait\Help\DateConfiguration;
use Closure;
use Illuminate\Http\Request;

class HandleVerifyEmail
{
    use DateConfiguration;

    public function handle(Request $request, Closure $next)
    {
        if(!is_null($request->mang)){
           $decode = base64_decode($request->mang);
           $verifyTokens = TokensVerify::where('tokens_type', $decode)->first();
           if(!is_null($verifyTokens)){
               if(is_null($verifyTokens->userAccount->tokens_verified)){
                  $request['tokens'] = $decode;
                  return $next($request);
               }
               if(!$this->dateExpiredTokens($verifyTokens->expired_at)){
                    throw new HandleErrorTokensVerified('Tokens Expired...');
               }
           }
           throw new HandleErrorTokensVerified('Tokens Not Found');
        }
    }

    private function dateExpiredTokens(string $date): bool{
        switch($this->dateDiff('now', $date, '%R')){
            case '-':
                return false;
            case '+':
                return true;
            default:
                break;
        }
    }   
}
