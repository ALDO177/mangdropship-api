<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Images\WebpImages;
use App\Models\MangSellerModels\ListBrandProduk;
use App\Service\MangSellerServices\ServiceBrandProduk;
use Illuminate\Http\Request;
use App\Trait\ResponseControl\useError;
use App\Trait\ResponseControl\useSuccess;
use App\Trait\Validator\useValidatorMangSeller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BrandProdukController extends Controller
{
    use useError, useSuccess, useValidatorMangSeller;
    public function __construct(protected Request $request, protected ServiceBrandProduk $serviceBrandProduk)
    {
        $this->middleware([
            'auth:mang-sellers', 
            'localization', 
            'api-mang-seller-access', 
            'suplier'
        ]);
    }

    public function index() : JsonResponse
    {
        $listBrand = $this->serviceBrandProduk->supllier::getListBrandProduk($this->request->user()->id);
        if($listBrand->count() >= 1) return response()->json($listBrand->sortDesc()->values(), 201);
        return response()->json($this->errGlobalResponse(200, __('error.MANG-ERROR-NULL-TRB-1')));
    }

    public function store(Request $request)
    {
         $credentials = $this->validationBrandStoreProduk($request->all());
            if($credentials->fails()){
                return SubscribtionResourcesResponse::make($this->errAuthWithValidation(
                    401, __('error.MANG-ERROR-VLD-1'), 
                    $credentials->messages()->toArray()));
            }

            $suplier   = $this->serviceBrandProduk->supllier->findIdSellers($request->user()->id);
            $webImages = new WebpImages($request->file('path'), 100, 100);
            $webImages->putWithDisk('oss', env('STG_MANG_SELLER') . '/brand');

             ListBrandProduk::create([
                'id_suplier' => $suplier->id,
                'merk_name'  => $request->merk_name,
                'status'     => $request->status,
                'position'   => $request->position,
                'path'       => $webImages->filename,
            ]);

            return response()->json(
                $this->successGlobalResponse(
                    201, __('success.MANG-SUCCESS-CRT-MG', ['name' => 'brand'])), 201);
    }
    
    public function show($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $credentials = Validator::make(['id' => $id], [
            'id' => ['required', 'exists:list_brand_produks,id', 'numeric']
        ]);
        if($credentials->fails()){
            return SubscribtionResourcesResponse::make($this->errAuthWithValidation(
                401, __('error.MANG-ERROR-VLD-1'), 
                $credentials->messages()->toArray()));
        }
        if($this->serviceBrandProduk->destroyBrand($id)){
            return response()->json($this->successGlobalResponse(201, __('success.MANG-SUCCESS-DEL', ['name' => 'Brand'])));
        }
        return response()->json($this->errGlobalResponse(400, __('error.MANG-ERROR-ATZ-HND-V1')));
    }
}
