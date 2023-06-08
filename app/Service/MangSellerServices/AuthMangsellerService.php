<?php

namespace App\Service\MangSellerServices{

    use App\Http\Resources\SubscribtionResourcesResponse;
    use App\Models\MangSeller\Admin;
    use App\Models\User;
    use App\Trait\Help\ResponseMessage;
    use App\Trait\Help\withoutWreapArray;
    use Illuminate\Http\Request;
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
                  __('messages.messages_errors', ['type' => 'Mangseller']),
                    $credentials->messages()->toArray()))->response()->setStatusCode(400);

            $admins = Admin::findWithEmail($this->request->email);
        
            if(!is_null($admins)){
                $tokens = auth('logins')->login($admins);
                return SubscribtionResourcesResponse::make(
                    $this->AccAuthentication($tokens, 
                    __('messages.messages_success', ['name' => 'Login Admin']))
                );
            }
            return response()->json($this->messagesError(
                   __('messages.messages_errors', ['type' => __('messages.wrong_email_pass')])));
        }
    }
}