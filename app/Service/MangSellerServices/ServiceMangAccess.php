<?php

namespace App\Service\MangSellerServices{

    use App\Http\Resources\Mangseller\ResourceBankAccount;
    use App\Http\Resources\Mangseller\ResourcesStoreSellers;
    use App\Http\Resources\Mangseller\ResourceStatusSellers;
    use App\Http\Resources\Mangseller\ResouresAccessInfo;
    use App\Http\Resources\SubscribtionResourcesResponse;
    use App\Models\MangSellerModels\StoreStatus;
    use App\Models\Supllier;
    use App\Trait\Help\ResponseMessage;
    use App\Trait\Help\withoutWreapArray;
    use App\Trait\Validator\useValidatorMangSeller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class ServiceMangAccess{

        use ResponseMessage, 
            withoutWreapArray, 
            useValidatorMangSeller;

        public function __construct(
            protected Request $request, 
            protected Supllier $suplier
            ){}
        
        public function accessInfo(){
            $accessinfo = auth('mang-sellers')->user()
            ->{'with'}(['supliers' => ['bankAccount' => ['bankInfo'],'store' => ['storeInformation' =>
             ['status', 'account', 'storeExpedition']]]])->where('id', auth()->user()->id)->first();
             return ResouresAccessInfo::make($accessinfo);
        }

        public function infoStore(){
            $infoStore = $this->suplier->infoStore($this->request->user()->id);
            if(is_null($infoStore)) return response()->json($this->messagesError(__('messages.messages_supliers')), 400);
            return ResourcesStoreSellers::make($infoStore);
        }

        public function infoStatus(){
            $statusSupliers = $this->suplier->findInfo($this->request->user()->id);
            return ResourceStatusSellers::make($statusSupliers);
        }

        public function serviceUpdateStore(){

            $credentials = $this->creadentialsStore($this->request->all());
            if($credentials->fails()){
                return SubscribtionResourcesResponse::make(
                    $this->messageNotAuth(400, 'Credential', $credentials->messages()->toArray())
                );
            }

            $suplierStore  = $this->suplier->infoStore($this->request->user()->id);
            $path = $this->LengthSlashPath(intval(env('LENGTH_SLASH')), $suplierStore->store->path_store);
            Storage::disk(env('DISK_KEY_IMG'))->delete(env('DISK_KEY_IMG') . '/' . $path);
            
            $putFileImage  = Storage::disk(env('DISK_KEY_IMG'))->put(env('DISK_KEY_IMG'), $this->request->file('path_store'));
            $fileName = explode('/', $putFileImage)[1];
            $suplierStore->store->name_store   = $this->request->name_store;
            $suplierStore->store->path_store   = $fileName;
            $suplierStore->store->store_status = false;

            if($suplierStore->store->save()) return response()->json(['update store' => 'success']);
            return response()->json(['update store' => 'gagal'], 400, [], JSON_PRETTY_PRINT);
        }   

        public function serviceUpdateStatus(string $uuid){
            $credentials = $this->creadentialsStatus($this->request->all());
            if($credentials->fails()){
                 return SubscribtionResourcesResponse::make($this->messageNotAuth(400, 'Credentials',
                 $credentials->messages()->toArray()))->response()->setStatusCode(400);
            }
            $storeStatus = StoreStatus::findOrUpdate(false, $uuid, $this->request->only(['status', 'actived_at_start', 'actived_at_start']));
            return $storeStatus;
        }

        public function serviceBankInfoAccount(){
             //
        }

        public function serviceUpdateExpedition(){

        }
    }
}