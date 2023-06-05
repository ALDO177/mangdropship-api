<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiHandleEndPoint
{
    public function handle(Request $request, Closure $next)
    {
        if($request->route()->named('mang.reset.password')){
            return $next($request);
        }
        abort(404);
    }
}
