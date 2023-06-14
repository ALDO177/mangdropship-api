<?php

namespace App\Service\MangSellerServices{

    use App\Http\Resources\ResorcesResponseMangAccess;
    use Illuminate\Http\Request;

    class ServiceMangAccess{

        public function __construct(protected Request $request){}
        
        public function accessInfo(){
            $accessinfo = auth('mang-sellers')->user()->{'with'}(['supliers' => ['store', 'suplierProduk' => ['product']]])
                    ->where('id', auth()
                    ->user()->id)
                    ->first();
            return ResorcesResponseMangAccess::make($accessinfo);
        }
    }
}