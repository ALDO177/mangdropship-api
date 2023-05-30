<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\AuthServiceController;
use Illuminate\Http\Request;

class GuestAuthentication extends Controller
{
    public function __construct(protected AuthServiceController $authService)
    {
        $this->middleware(['guest', 'api-mang-access'], ['except' => 'logout']);
    }

    public function Login(Request $request){
        if($request->routeIs('mang.login')){
            return $this->authService->serviceLogin();
        }
    }

    public function Register(){
        return $this->authService->serviceRegister();
    }

    public function logout(){
        return $this->authService->serviceLogout();
    }
}
