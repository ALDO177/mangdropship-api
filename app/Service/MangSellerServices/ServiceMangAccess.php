<?php

namespace App\Service\MangSellerServices{

    use App\Http\Resources\Mangseller\ResourcesStoreSellers;
    use App\Http\Resources\Mangseller\ResourceStatusSellers;
    use App\Http\Resources\Mangseller\ResouresAccessInfo;
    use App\Models\Supllier;
    use App\Trait\Help\ResponseMessage;
    use App\Trait\Help\withoutWreapArray;
    use Illuminate\Http\Request;

    class ServiceMangAccess{

        use ResponseMessage, withoutWreapArray;
        public function __construct(protected Request $request){}
        
        public function accessInfo(){
            $accessinfo = auth('mang-sellers')->user()
            ->{'with'}(['supliers' => ['store' => ['storeInformation' =>
             ['status', 'account', 'storePayment', 'storeExpedition']]]])->where('id', auth()->user()->id)->first();
             return ResouresAccessInfo::make($accessinfo);
        }

        public function infoStore(){
            $infoStore = Supllier::infoStore($this->request->user()->id);
            if(is_null($infoStore)) return response()->json($this->messagesError(__('messages.messages_supliers')), 400);
            return ResourcesStoreSellers::make($infoStore);
        }

        public function infoStatus(){
            $statusSupliers = Supllier::findInfo($this->request->user()->id);
            return ResourceStatusSellers::make($statusSupliers);
        }
    }
}