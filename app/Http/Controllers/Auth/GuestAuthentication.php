<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Listeners\ListenerNotificationPassword;
use App\Service\AuthServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GuestAuthentication extends Controller
{
    public function __construct(protected AuthServiceController $authService)
    {
        $this->middleware(['guest', 'api-mang-access', 'localization'], ['except' => 'logout']);
    }

    public function Login(Request $request){
        
        if($request->routeIs('mang.login')){
            return $this->authService->serviceLogin();
        }
    }

    public function ResetPassword(){
        return $this->authService->serviceResetPassword();
    }

    public function Register(){
        return $this->authService->serviceRegister();
    }

    public function logout(){
        return $this->authService->serviceLogout();
    }
}
