<?php

namespace App\Exceptions;

use App\Trait\Help\ResponseMessage;
use ErrorException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ResponseMessage;

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

    public function register()
    {
        $this->reportable(function (Throwable $e) {});

        $this->renderable(function(RouteNotFoundException $error, Request $request){
           if($request->is('api/v1/*')){
            return response()->json($this->messageNotAuth(401, 'Route Not Found', ['error' => true]), 401);
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
                    $this->messagesError(
                        __('messages.error_exception',
                        ['name' => env('APP_URL') . '/api/mang-seller/*'])), 401
                );
            }
         });

        $this->renderable(function(ErrorException $errors, Request $request){
            if($request->is('emails/*')){
                abort(500, $errors->getMessage());
            }
        });
    }
}
