<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Service\MangSellerServices\ServiceSuplierProduk;
use App\Trait\ResponseControl\useError;
use App\Trait\Validator\useValidatorMangSeller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SuplierControllerProduk extends Controller
{   

    use useError, useValidatorMangSeller;

    public function __construct(protected ServiceSuplierProduk $serviceSuplierProduk)
    {
        $this->middleware(['auth:mang-sellers', 'localization', 'api-mang-seller-access', 'suplier']);
    }

    public function index()
    {
        return $this->serviceSuplierProduk->serviceListProduk();
    }

    public function store(Request $request) : JsonResponse
    {
        // return response()->json($request->all());
        $creadentials = $this->credentialsStoreProdukMang($request);
        if($creadentials->fails()){
            return SubscribtionResourcesResponse::make(
                $this->errValidation(400, __('error.MANG-ERROR-VLD-1'), $creadentials->messages()->toArray())
            )->response()->setStatusCode(400);
        }
        return response()->json($request->all());
    }

    public function show(string $id) : JsonResponse
    {
        $produk =  $this->serviceSuplierProduk->showIdProduk($id);
        if(is_null($produk)){
            return SubscribtionResourcesResponse::make(
                $this->errGlobalResponse(402, __('error.MANG-ERROR-NULL-TRB-1'))
            )->response()->setStatusCode(402);
        }
        return response()->json($produk);
    }   

    public function update(Request $request, $id)
    {
        
    }
    
    public function destroy($id)
    {
        //
    }
}
