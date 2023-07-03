<?php

namespace App\Service\MangSellerServices{

    use App\Http\Resources\Mangseller\ResourceCuponsActived;
    use App\Http\Resources\Mangseller\ResourceCuponsSeller;
    use App\Models\CuponsActiveSuplierProduct;
    use App\Models\Supllier;
    use App\Trait\ResponseControl\useError;
    use App\Trait\ResponseControl\useSuccess;
    use App\Trait\Validator\useValidatorMangSeller;
    use Illuminate\Http\Request;


    class ServiceCuponsMangseller{

        use useError, 
            useValidatorMangSeller, 
            useSuccess;

        public function __construct(
            protected Request $request,
            public Supllier $suplier){
        }

        public function serviceListGetCupons(){
            $cuponsList = $this->suplier->with(['cuponsList'])
                ->where('id_sellers', $this->request->user()->id)
                ->first()?->cuponsList;
                
            if($cuponsList?->count() < 1){
                return response()->json(
                    $this->errGlobalResponse(
                        201, __('error.MANG-ERROR-NULL-TRB-1'))
                    );
            }
            return ResourceCuponsSeller::make($cuponsList)
                  ->response()
                  ->setStatusCode(201);
        }

        public function serviceAddCuponsActive(){
            $suplierProduct = $this->suplier
                ->with(['suplierProduk', 'cuponsList'])
                ->where('id_sellers', $this->request->user()->id)
                ->first();
           $credentials = $this->creadentialsStoreCupponsActive($this->request->all(), $suplierProduct);

            if($credentials->fails()){
                return response()->json(
                    $this->errGlobalResponse(402, $credentials->messages()->toArray())
                , 402, [], JSON_PRETTY_PRINT);
            }
            $created = CuponsActiveSuplierProduct::create(
                $this->request->only(
                    ['id_suplliers', 'id_cupons',
                     'id_product', 'time_publish', 
                     'max_usage_cupons']));

            return response()->json(
                $this->successGlobalResponseAdditional(
                    201, __('success.MANG-SUCCESS-VLD-1'), ['created' => $created]), 201, [], JSON_PRETTY_PRINT);
        }

        public function serviceListProdukCuponsActived(){
            $cupponsActive = $this->suplier->listCuponsActivedProduct($this->request->user()->id);
            if($cupponsActive->cuponsActiveProduct->count() > 1){
                return ResourceCuponsActived::make(
                    $cupponsActive->makeHidden(['id_store']))
                    ->response()->setStatusCode(201);
            }
            return response()->json($this->successGlobalResponse(
                200, __('error.MANG-ERROR-NULL-TRB-1')),
                200, [], JSON_PRETTY_PRINT);
        }
    }
}