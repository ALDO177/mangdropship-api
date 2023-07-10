<?php

namespace App\Http\Middleware\Mangseller;

use App\Http\Resources\Mangseller\ResourceJoinResponse;
use App\Models\MangSellerModels\MangSellers;
use App\Trait\Help\ResponseMessage;
use Closure;
use Illuminate\Http\Request;

class HandleSuplier
{
    use ResponseMessage;

    public function handle(Request $request, Closure $next)
    {
        if(auth('mang-sellers')->check()){
            $supliers = MangSellers::findUuid($request->user()->id);
            if(!is_null($supliers->supliers)){
                return $next($request);
            }
        }
        return  ResourceJoinResponse::make(auth('mang-sellers')->user())->response()->setStatusCode(400);
    }
}
