<?php

namespace App\Service\MangSellerServices{
    use App\Models\MangSellerModels\ListBrandProduk;
    use App\Models\Supllier;
    use App\Trait\ResponseControl\useError;
    use App\Trait\Validator\useValidatorMangSeller;

    class ServiceBrandProduk{

        use useValidatorMangSeller;
        use useError;

        public function __construct(public Supllier $supllier){}

        public function ListBrandProduk($idseller){
            return $this->supllier->with(['listBrandProduk'])->where('id_sellers', $idseller)->chunkMap(function($list){
                return $list;
            });
        }

        public function storeBrand(array $data){
            return $this->supllier->create($data);
        }
        
        public function destroyBrand($id){
            return ListBrandProduk::where('id', $id)->delete();
        }
    }
}