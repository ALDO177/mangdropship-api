<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AsignGuard
{
    public function handle(Request $request, Closure $next, $guard)
    {

        return $next($request);
        // if(!is_null($guard)){
        //     auth()->shouldUse($guard);
        //     return $next($request);
        // }
        // return response()->json(['error' => true]);
    }
}
