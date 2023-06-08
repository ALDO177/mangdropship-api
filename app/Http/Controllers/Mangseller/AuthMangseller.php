<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\AuthMangsellerService;
use Illuminate\Http\Request;

class AuthMangseller extends Controller
{
    public function __construct(protected AuthMangsellerService $services){
        $this->middleware([ 'guest', 'api-mang-seller-access', 'localization']);
    }

    public function login(){
        return $this->services->serviceLogin();
    }
}
