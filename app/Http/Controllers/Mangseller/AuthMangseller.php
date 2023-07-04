<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\AuthMangsellerService;

class AuthMangseller extends Controller
{
    public function __construct(protected AuthMangsellerService $services){
        $this->middleware(['api-mang-seller-access', 'localization']);
        $this->middleware(['guest'])->except('logout');
    }

    public function login(){
        return $this->services->login();
    }

    public function register(){
        return $this->services->register();
    }

    public function resetPassword(){
        return $this->services->resetPassword();
    }

    public function confirmPassword(){
        return $this->services->serviceConfirmResetPassword();
    }

    public function logout(){
        return $this->services->logout();
    }

    public function extendProviderAccount(string $path){
        return $this->services->providersLogin($path);
    }

    public function loginWithProviders(string $type){
        return $this->services->serviceLoginProvider($type);
    }
}
