<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceMangAccess;
use Illuminate\Http\Request;

class MangsellerSettingController extends Controller
{
    public function __construct(protected ServiceMangAccess $service)
    {
        $this->middleware(['auth:mang-sellers', 'localization', 'api-mang-seller-access', 'suplier']);
    }

    public function infoStore(){
        return $this->service->infoStore();
    }

    public function infoStatus(){
        return $this->service->infoStatus();
    }

    public function infoBankAccount(){
        return $this->service->serviceBankInfoAccount();
    }

    public function updateStore(){
        return $this->service->serviceUpdateStore();
    }

    public function updateStatus(string $id){
        return $this->service->serviceUpdateStatus($id);
    }

}
