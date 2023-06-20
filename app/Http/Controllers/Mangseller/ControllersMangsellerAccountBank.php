<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Service\MangSellerServices\ServiceMangSellerAccountBank;
use Illuminate\Http\Request;

class ControllersMangsellerAccountBank extends Controller
{
    public function __construct(protected ServiceMangSellerAccountBank $service)
    {
        $this->middleware(
            [
                'auth:mang-sellers', 
                'localization', 
                'api-mang-seller-access', 
                'suplier'
            ]);
    }

    public function index(){
        return $this->service->serviceGetAllAccountBank();
    }

    public function store(){
        return $this->service->serviceStoreAccountBank();
    }

    public function show($id){
        return $this->service->serviceGetShowIdAccountBank($id);
    }

    public function update($id){
       return $this->service->serviceUpdateAccountBank($id);
    }

    public function destroy($id){
        return $this->service->serviceDeleteAccountBank($id);
    }
}
