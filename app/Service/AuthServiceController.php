<?php

namespace App\Service;

use App\Http\Resources\Resource\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceController{
    
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function serviceLogin(){
         return (new ApiResponse($this->request))->mangdropship(400);
    }
}