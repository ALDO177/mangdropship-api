<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\AuthServiceController;

class AuthControllers extends Controller
{
    public function __construct(private AuthServiceController $authService)
    {
        
    }
    
    public function Login(){
        return $this->authService->serviceLogin();
    }
}
