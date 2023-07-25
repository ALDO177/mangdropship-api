<?php

namespace App\Http\Middleware;

use App\Trait\ResponseControl\useError;
use Closure;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;

class HandleLongSizeReques
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    use useError;
    public function handle(Request $request, Closure $next)
    {
        try{
            return $next($request);
        }
        catch(PostTooLargeException $longRequest){
            return response()->json($this->errGlobalResponse(400, ['error' => $longRequest->getMessage()]));
        }
    }
}
