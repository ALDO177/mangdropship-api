<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Models\Supllier;
use App\Service\MangSellerServices\ServiceMangAccess;
use Illuminate\Http\Request;

class MangsellerAccess extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:mang-sellers', 'localization', 'api-mang-seller-access', 'suplier']);
    }

    public function info(ServiceMangAccess $acces){
        return $acces->accessInfo();
    }

    public function infoStore(ServiceMangAccess $acces){
        return $acces->infoStore();
    }

    public function infoStatus(ServiceMangAccess $access, Request $request){
        return $access->infoStatus();
    }
}
