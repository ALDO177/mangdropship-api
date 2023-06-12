<?php

namespace App\Http\Controllers\MangAdmin;

use App\Http\Controllers\Controller;
use App\Service\ServiceMangAdmin\AuthServiceMangAdmin;

class MangdropshipAdminControllers extends Controller
{
    
    public function __construct(protected AuthServiceMangAdmin $serviceAdmin)
    {
        $this->middleware(['api-mang-admin-access', 'localization']);
        $this->middleware(['guest'])->except('logout');
    }

    public function login(){

        return $this->serviceAdmin->login();
    }

    public function register(){
        return $this->serviceAdmin->register();
    }

    public function resetPassword(){
        return $this->serviceAdmin->resetPassword();
    }

    public function confirmResetPassword(){
        
        return $this->serviceAdmin->serviceConfirmResetPassword();
    }

    public function logout(){

        return $this->serviceAdmin->logout();
    }
}
