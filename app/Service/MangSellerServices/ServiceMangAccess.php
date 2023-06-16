<?php

namespace App\Service\MangSellerServices{

    use App\Http\Resources\Mangseller\ResouresAccessInfo;
    use App\Models\Supllier;
    use Illuminate\Http\Request;

    class ServiceMangAccess{

        public function __construct(protected Request $request){}
        
        public function accessInfo(){
            $accessinfo = auth('mang-sellers')->user()
            ->{'with'}(['supliers' => ['store' => ['storeInformation' =>
             ['status', 'account', 'storePayment', 'storeExpedition']]]])->where('id', auth()->user()->id)->first();
            return ResouresAccessInfo::make($accessinfo);
        }

        public function infoStore(){
            return Supllier::infoStore(auth('mang-sellers')->user()->id);
        }
    }
}