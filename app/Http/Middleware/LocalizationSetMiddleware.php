<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class LocalizationSetMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        App::setLocale($request->header('Accept-Language'));
        return $next($request); // notepad
    }
}
