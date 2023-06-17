<?php

namespace App\Http\Middleware\Mangseller;

use App\Models\MangSellerModels\MangSellers;
use Closure;
use Illuminate\Http\Request;

class HandleSuplier
{
    public function handle(Request $request, Closure $next)
    {
        if(auth('mang-sellers')->check()){
            $supliers = MangSellers::findUuid($request->user()->id);
            if(!is_null($supliers->supliers)){
                return $next($request);
            }
        }

        return response()->json(['error' => true, 'message' => 'Error Supliers']);
    }
}
