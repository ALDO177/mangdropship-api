<?php

namespace App\Http\Middleware;

use App\Models\MangdropshipAccessApi;
use Closure;
use Illuminate\Http\Request;

class TokensAccessApi
{

    public function handle(Request $request, Closure $next)
    {
        if($request->hasHeader('X-API-MANG')){
            if(!is_null($request->header('X-API-MANG'))){
                if(MangdropshipAccessApi::AccessTokensApiMang($request->header('X-API-MANG'))){
                    return $next($request);
                }
            }
        }
        return response()
             ->json(
                ['message'      => 'Tokens-is-invalid',
                 'code'         => 406], 406, 
                ['X-API-ACCESS' => 'error']);
    }
}
