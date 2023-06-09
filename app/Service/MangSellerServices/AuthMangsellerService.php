<?php

namespace App\Service\MangSellerServices{

    use App\Http\Resources\SubscribtionResourcesResponse;
    use App\Models\MangSellerModels\MangSellers;
    use App\Trait\Help\ResponseMessage;
    use App\Trait\Help\withoutWreapArray;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;

    class AuthMangsellerService{

        use ResponseMessage, withoutWreapArray;
        public function __construct(protected Request $request){}

        public function serviceLogin(){
            
            $credentials = Validator::make($this->request->all(), [
                'email'         => ['required', 'email'],
                'password'      => ['required'],
            ]);
            
            if($credentials->fails()) 
                return SubscribtionResourcesResponse::make(
                  $this->messageNotAuth(400, 
                  __('messages.messages_errors', ['type' => 'Mangsellers']),
                    $credentials->messages()->toArray()))->response()->setStatusCode(400);
            
            if(Auth::guard('mang-sellers')){
                 $users  = MangSellers::findWithEmail($this->request->email);
                 if(!is_null($users)){
                    $tokens = auth('mang-sellers')->{'setTTL'}(intval(env('MANG_SELLER_EXPIRED_TOKEN')))
                              ->login($users);
                    return SubscribtionResourcesResponse::make(
                        $this->AccAuthentication($tokens, __('messages.messages_success',
                        ['name' => 'Login Mangseller']))
                    );
                 }
            }

            return response()->json(
                $this->messagesError(__('messages.messages_errors', 
                   ['type' => __('messages.wrong_email_pass')]))
            );
        }
    }
}