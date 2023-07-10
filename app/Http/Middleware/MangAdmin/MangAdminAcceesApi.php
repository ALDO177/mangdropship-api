<?php

namespace App\Http\Middleware\MangAdmin;

use App\Models\MangdropshipAccessApi;
use App\Trait\Help\ResponseMessage;
use Closure;
use Illuminate\Http\Request;

class MangAdminAcceesApi
{
    use ResponseMessage;
    public function handle(Request $request, Closure $next)
    {
        if($request->hasHeader('X-API-MANG')){
            if(!is_null($request->header('X-API-MANG'))){
                if(MangdropshipAccessApi::AccessTokenApiMangAdmin($request->header('X-API-MANG'))){
                    return $next($request);
                }
            }
        }
        
        return response()
             ->json($this->messagesError(
             __('messages.messages_errors', ['type' => 'Token Admin'])),
              400, [], JSON_PRETTY_PRINT);
    }
}
