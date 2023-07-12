<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceMangAccess;
use Illuminate\Http\Request;

class MangsellerAccess extends Controller
{

    public function __construct(protected ServiceMangAccess $serviceMangAccess)
    {
        $this->middleware(['auth:mang-sellers', 'localization', 'api-mang-seller-access', 'suplier']);
    }

    public function info(ServiceMangAccess $acces){
        return $acces->accessInfo();
    }

    public function infoMember(){
        return $this->serviceMangAccess->infoMember();
    }

    public function listCupons(){
        return $this->serviceMangAccess->serviceListGetCupons();
    }

    public function infoStore(ServiceMangAccess $acces){
        return $acces->infoStore();
    }

    public function infoStatus(ServiceMangAccess $access, Request $request){
        return $access->infoStatus();
    }

    public function providerLogin(){
        return $this->serviceMangAccess->serviceProviderLoginList();
    }
}
