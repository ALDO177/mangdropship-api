<?php

namespace App\Exceptions;

use App\Trait\Help\ResponseMessage;
use App\Trait\ResponseControl\useError;
use ErrorException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ResponseMessage, useError;

    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    protected function errorHandleAuthNotFound(string $errorMessages) : array{
       return !is_bool(strpos($errorMessages, '[login]')) ? __('error.MANG-ERROR-ATZ-HND-V1')  :  [];
    }

    public function register()
    {
        $this->reportable(function (Throwable $e) {});

        $this->renderable(function(RouteNotFoundException $error, Request $request){
           if($request->is('api/v1/*')){
            return response()->json(
                $this->errGlobalResponseAdditional(
                    401, __('error.MANG-ERROR-RNFN-HND-V1'), 
                    ['information' => $this->errorHandleAuthNotFound($error->getMessage())]), 401);
           }
        });
        
        $this->renderable(function(HandleErrorTokensVerified $error, Request $request){
            if($request->is('api/v1/*')){
                return response()->json(['users' => $request->user(), 'message' => $error->getMessage()], 401);
            }else{
                abort(403, $error->getMessage());
            }
         });

         $this->renderable(function(ErrorException $error, Request $request){
            if($request->is('api/mang-seller/*')){
                return response()->json(['users' => $request->user(), 'message' => $error->getMessage()], 400);
            }else{
                return response()->json(
                    $this->errGlobalResponseAdditional(
                        401, __('error.MANG-ERROR-RNFN-HND-V1'), 
                        ['information' => $this->errorHandleAuthNotFound($error->getMessage())]), 401
                );
            }
         });

        $this->renderable(function(ErrorException $errors, Request $request){
            if($request->is('emails/*')){
                abort(500, $errors->getMessage());
            }
        });

        $this->renderable(function(PostTooLargeException $error, Request $request){
            if($request->is('api/*')){
                return response()->json($this->errGlobalResponse(413, __('error.MANG-ERROR-LARGE-LONG')), 413);
            }
        });
    }
}
