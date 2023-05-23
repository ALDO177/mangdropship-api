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
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
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
            return response()->json($this->messageNotAuth(), 401);
           }
        });
        
        $this->renderable(function(HandleErrorTokensVerified $error, Request $request){
            if($request->is('api/v1/*')){
                return response()->json(['users' => $request->user(), 'message' => $error->getMessage()], 401);
            }else{
                abort(403, $error->getMessage());
            }
         });

        $this->renderable(function(ErrorException $errors, Request $request){
            if($request->is('emails/*')){
                abort(500, $errors->getMessage());
            }
        });
    }
}
