<?php

namespace App\Service\MangSellerServices {

    use App\Http\Resources\Mangseller\ResourceBankAccount;
    use App\Http\Resources\SubscribtionResourcesResponse;
    use App\Models\SuplierAccountBank;
    use App\Models\Supllier;
    use App\Trait\Help\ResponseMessage;
    use App\Trait\Help\useHelpAccountBank;
    use App\Trait\Validator\useValidatorMangSeller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class ServiceMangSellerAccountBank
    {

        use ResponseMessage,
            useHelpAccountBank, 
            useValidatorMangSeller;

        public function __construct(
            protected Request $request, 
            protected Supllier $supllier){}
        
        public function serviceGetAllAccountBank(){
            $bankAccount = $this->supllier->getAllBankAccount($this->request->user()->id);
            return ResourceBankAccount::make($bankAccount);
        }

        public function serviceGetShowIdAccountBank(string $id){
           
            $filter = $this->supllier->getAllBankAccount($this->request->user()->id)?->bankAccount;
            if($filter->count() > 0){
                $checkUpdate = $this->handleSelfUpdate($filter, $id);
                if($checkUpdate->count() > 0){ $this->request['id'] = $checkUpdate->first()['id'];}
                $credentials = Validator::make($this->request->all(), 
                    ['id' => ['required']], ['id' => __('messages.credential_update_account_bank')]);
                if($credentials->fails()){
                    return SubscribtionResourcesResponse::make(
                        $this->messageNotAuth(400, 'Credentials', $credentials->messages()->toArray())
                    );
                }
                return response()->json($filter->filter(function($bankAccount){
                    return $bankAccount->id === $this->request->id;
                })->values()->first(), 201, [], JSON_PRETTY_PRINT);
            }
        }

        public function serviceUpdateAccountBank($id){
            $bankAccount = $this->supllier->getAllBankAccount($this->request->user()->id)?->bankAccount;
            if($bankAccount->count() > 0){
                $checkUpdate = $this->handleSelfUpdate($bankAccount, $id);
                if($checkUpdate->count() > 0){
                    $this->request['id'] = $checkUpdate->first()['id'];
                }
                $credentials = $this->credentialUpdateAccountBank($this->request->all());
                if($credentials->fails()){
                    return SubscribtionResourcesResponse::make(
                        $this->messageNotAuth(400, 'Credentials', 
                        $credentials->messages()->toArray()));
                }
                SuplierAccountBank::where('id', $this->request->id)
                    ->update($this->request
                    ->only(['account_name', 'account_number', 'id_account_bank', 'id']));

                return SubscribtionResourcesResponse::make(
                    $this->messagesSuccess('Update Account Bank Success'))
                    ->response()
                    ->setStatusCode(201);
            }
            return SubscribtionResourcesResponse::make(
                    $this->messagesError(__('messages.messages_errors', ['type' => 'update account bank'])))
                    ->response()
                    ->setStatusCode(400);
        }

        public function serviceDeleteAccountBank($id){
            $bankAccount = $this->supllier->getAllBankAccount($this->request->user()->id)?->bankAccount;
            if($bankAccount->count() > 0){
                $checkUpdate = $this->handleSelfUpdate($bankAccount, $id);
                if($checkUpdate->count() > 0){
                     $id = $checkUpdate->first()['id'];
                     SuplierAccountBank::where('id', $id)->delete();
                     return SubscribtionResourcesResponse::make(
                        $this->messagesSuccess('Delete Account Bank Success'))
                        ->response()
                        ->setStatusCode(201);
                }
            }

            return SubscribtionResourcesResponse::make(
                $this->messagesError(__('messages.messages_errors', ['type' => 'delete account bank'])))
                ->response()
                ->setStatusCode(400);
        }
        
        public function serviceStoreAccountBank(){
            $supliers = $this->supllier->findIdSellers($this->request->user()->id); 
            $this->request['id_supliers'] = $supliers->id;

            $credentials = $this->credentialsStoreAccountBank($this->request->all());
            if($credentials->fails())
                return SubscribtionResourcesResponse::make(
                    $this->messageNotAuth(400, 'Credentials', 
                    $credentials->messages()->toArray()));
                    
            SuplierAccountBank::create(
                $this->request->only(['account_name', 'account_number', 'id_supliers', 'id_account_bank'])
            );
            return response()->json($this->messagesSuccess('Created Account Success'));
        }
    }
}
