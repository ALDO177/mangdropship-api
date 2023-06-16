<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceMangAccess;

class MangsellerAccess extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth:mang-sellers', 'localization', 'api-mang-seller-access']);
    }

    public function info(ServiceMangAccess $acces){
        return $acces->accessInfo();
    }

    public function infoStore(ServiceMangAccess $acces){
        return $acces->infoStore();
    }
}
