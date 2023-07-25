<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Models\BadgesUmkm;
use App\Models\MangSellerModels\infoShipingProduct;
use App\Models\MangSellerModels\suplierProduks;
use App\Models\OptionGaransiProduk;
use App\Models\Produk;
use App\Models\SubCategoryProduct;
use App\Models\Supllier;
use App\Models\VariantProducts;
use App\Service\MangSellerServices\ServiceSuplierProduk;
use App\Trait\ResponseControl\useError;
use App\Trait\ResponseControl\useSuccess;
use App\Trait\Validator\useValidatorMangSeller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SuplierControllerProduk extends Controller
{   

    use useError, useValidatorMangSeller, useSuccess;

    public function __construct(
        protected ServiceSuplierProduk $serviceSuplierProduk,
        protected Supllier $supllier){
        $this->middleware(['auth:mang-sellers', 'localization', 'api-mang-seller-access', 'suplier']);
    }

    public function index()
    {
        $produk =  $this->serviceSuplierProduk->serviceListProduk();
        if(!is_null($produk)){
            if($produk->suplierProduk->count() < 1){
                return response()->json(
                    $this->errGlobalResponseAdditional(
                        400, __('error.MANG-ERROR-ARRAY-ZERO'), 
                       ['data' => $produk->suplierProduk]), 400
                    );
            }
            return SubscribtionResourcesResponse::make($produk->suplierProduk)->response()->setStatusCode(201);
        }
    }

    public function store(Request $request) : JsonResponse
    {

        $creadentials = $this->credentialsStoreProdukMang($request);
        $variantProduk = [];

        if($creadentials->fails()){
            return SubscribtionResourcesResponse::make(
                $this->errValidation(400, __('error.MANG-ERROR-VLD-1'), 
                $creadentials->messages()->toArray())
            )->response()->setStatusCode(400);
        }
        $createProduk = Produk::create($request->product);
        $produk = Produk::where('slugh_produk', $createProduk->slugh_produk)->first();

        if($produk){  
            $supllier = $this->supllier->findIdSellers($request->user()->id);
            if($request->brand_produk){
                if(!is_null($request->brand_produk['id_list_brand'])){
                    BadgesUmkm::create([
                        'name_brand'    => $request->brand_produk['name_brand'],
                        'id_list_brand' => $request->brand_produk['id_list_brand'],
                        'id_product'    => $produk->id,
                    ]);
                }
            }

            SubCategoryProduct::create([
                'id_sub_category' => $request->category_produk['subcategory'], 
                'id_product'      => $produk->id]);

            suplierProduks::create(['id_suplier' => $supllier->id, 'id_product' => $produk->id]);

            OptionGaransiProduk::create([
                'id_product'    => $produk->id,
                'name'          => $request->option_garansi_product['name'],
                'count_days'    => $request->option_garansi_product['count_days'],
            ]);

            infoShipingProduct::create([
                'id_product'        => $produk->id,
                'heavy_product'     => $request->info_shiping_product['heavy'],
                'package_size'      => $request->info_shiping_product['package_size']
            ]);

            if($request->options_variasi){
                foreach($request->variant_produk as $dataVariant){
                    array_push($variantProduk, [
                        'id_product'         => $produk->id,
                        'variant_type_name'  => $dataVariant['variant_type_name'],
                        'variant_type_names' => $dataVariant['variant_type_names'],
                        'variant_options'    => $dataVariant['variant_options']
                    ]);
                }
                foreach($variantProduk as $data){
                    VariantProducts::create($data);
                }
            }
            return SubscribtionResourcesResponse::make(
                $this->successGlobalResponseAdditional(
                    201, 
                    __('success.MANG-SUCCESS-PRD-LG'),  
                    ['created' => $produk]))->response()->setStatusCode(201);
        }
        return response()
              ->json($this->errGlobalResponse(
                400, __('error.MANG-ERROR-AUTH-TR1')), 400, [], JSON_PRETTY_PRINT);
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
