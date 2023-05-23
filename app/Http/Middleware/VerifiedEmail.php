<?php

namespace App\Http\Middleware;

use App\Exceptions\HandleErrorTokensVerified;
use Closure;
use Illuminate\Http\Request;

class VerifiedEmail
{
    public function handle(Request $request, Closure $next)
    {
        if(auth('api-users')->check()){
            if(is_null(auth()->user()->tokens_verified)){
                throw new HandleErrorTokensVerified('Please Verified Your Email...');
            }
            return $next($request);
        }
    }
}
