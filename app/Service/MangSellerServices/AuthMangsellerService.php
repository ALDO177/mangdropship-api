<?php

namespace App\Service\MangSellerServices{

    use App\Http\Resources\SubscribtionResourcesResponse;
    use App\Models\MangsellerModels\ExtendLoginSocialMedia;
    use App\Models\MangSellerModels\MangSellers;
    use App\Models\PasswordAuthentications;
    use App\Trait\ResponseControl\useError;
    use App\Trait\Help\ResponseMessage;
    use App\Trait\ResponseControl\useSuccess;
    use App\Trait\Validator\useValidatorMangSeller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;

    class AuthMangsellerService{

        use ResponseMessage, 
            useError, 
            useValidatorMangSeller,
            useSuccess;
            
        public function __construct(protected Request $request, protected MangSellers $mangSellers){}

        public function login(){
            
            $credentials = Validator::make($this->request->all(), [
                'email'     => ['required', 'email', 'exists:mang_sellers,email'],
                'password'  => ['required']
            ]);

            if($credentials->fails())
                return SubscribtionResourcesResponse::make(
                    $this->errAuthWithValidation(
                         400,
                         __('error.MANG-ERROR-AUTH-TR1'), 
                         $credentials->messages()->toArray()
                    )
                )->response()->setStatusCode(400);
            $users = MangSellers::findWithEmail($this->request->email);
        
            if( !$users || !Hash::check($this->request->password, $users->password)){
                return response()->json(
                   $this->errGlobalResponse(400, __('error.MANG-ERROR-WPWD-TR1'))
                );
            }

            $tokens = auth('mang-sellers')->setTTL(4200)->login($users);
            return SubscribtionResourcesResponse::make(
                $this->successAuthenticationWithToken(
                    $tokens, 201, __('success.MANG-SUCCESS-AUTH-TR1'), ['user' => $users->only(['email', 'name'])]),
                    ['type' => 'mang-seller'])->response()->setStatusCode(201);
        }

        public function register(){

            $credentials = Validator::make($this->request->all(), [
                'name'          => ['max:20',   'min:3', 'required'],
                'email'         => ['email',    'unique:mang_sellers,email', 'required'],
                'password'      => ['required', 'confirmed', 'min:6', 'string', 
                'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/']
            ]);
    
            if ($credentials->fails())
                return SubscribtionResourcesResponse::make(
                  $this->errValidation(
                    400, 
                    __('error.MANG-ERROR-VLD-1'), 
                    $credentials->messages()->toArray()))
                    ->response()
                    ->setStatusCode(400);
            
            $createdAdminAccount = MangSellers::create($this->request->only(['name', 'email', 'password']));
            if($createdAdminAccount){
                return SubscribtionResourcesResponse::make(
                    $this->messageAuth(201, __('messages.messages_success', ['name' => 'Register Mangseller']), 
                    fn() => ['url' => 'http://api/mang-admin/auth/login'])
                );
            }

            return response()->json(
                $this->messagesError(
                __('messages.messages_errors', ['type' => 'Register'])));
        }

        public function resetPassword(){
            $credentials = Validator::make($this->request->all(), [
                'email' => ['required', 'exists:mang_sellers,email']
            ]);
            if($credentials->fails()){
                return SubscribtionResourcesResponse::make(
                    $this->errValidation(
                        400, 
                        __('error.MANG-ERROR-VLD-1'), 
                        $credentials
                        ->messages()
                        ->toArray()
                    )
                )->response()->setStatusCode(400);
            }

            if (PasswordAuthentications::DuplicatedResetPassword($this->request->email, 'mangseller')) {
                return SubscribtionResourcesResponse::make(
                    $this->messagesSuccess(__('messages.messages_success', ['name' => 'Reset Password']))
                );
            }

            $konditions = PasswordAuthentications::CreateResetPassword('reset', $this->request->email, 'mangseller');
            if ($konditions)
                return SubscribtionResourcesResponse::make(
                $this->messagesSuccess(
                    __('messages.messages_success',
                      ['name' => 'Update Reset Password'])));
    
            return SubscribtionResourcesResponse::make(
                $this->messageAuth(400, 'Reset password error',
                fn () => ['url' => env('APP_SERVER_APPLICATION')]))
                ->response()->setStatusCode(400);
        }

        public function serviceConfirmResetPassword(){

            $credentials  = Validator::make($this->request->all(), [
                'token'      => ['required'],
                'password'   => ['required', 'confirmed', 'min:6', 'string',
                    'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/']]);
            
            if($credentials->fails())
                return SubscribtionResourcesResponse::make(
                    $this->errValidation(
                        400, __('error.MANG-ERROR-VLD-1'), 
                        $credentials->messages()->toArray())
                );

            $checkTokens = PasswordAuthentications::where('token', $this->request->token)
                           ->where('status', 'mangseller')
                           ->first();

            if(!is_null($checkTokens)){
                $tokens = PasswordAuthentications::CheckTokenAndExpiredToken($this->request->token);
                if(!is_null($tokens)){
                    return SubscribtionResourcesResponse::make(
                        $this->errGlobalResponse(400, __('error.MANG-ERROR-TEXP-ETR-V1'))
                    );
                }
                
                if(MangSellers::updatePasswordAdmin($checkTokens->email, Hash::make($this->request->password))){
                    PasswordAuthentications::deleteTokens($checkTokens->uuid);
                    return SubscribtionResourcesResponse::make(
                        $this->messagesSuccess(__('messages.messages_success', ['name' => 'Reset Password']))
                    );
                }
            }

            return SubscribtionResourcesResponse::make(
                $this->errGlobalResponse(400, __('error.MANG-ERROR-RPWD-RTR-V1')))
                ->response()
                ->setStatusCode(400);
        }

        public function providersLogin(string $typeProvider){
            $credentials = $this->creadentialsLoginProvider($this->request->all());
            if($credentials->fails()){
                return SubscribtionResourcesResponse::make(
                    $this->errAuthWithValidation(402, __('error.MANG-ERROR-VLD-1'), $credentials->messages()->toArray())
                );
            }

            $created = ExtendLoginSocialMedia::create($this->request->only(['email', 'name', 'type', 'id_sellers']));
            return SubscribtionResourcesResponse::make(
                $this->successGlobalResponse(201,
                array_merge_recursive(
                    __('success.MANG-SUCCESS-PRD-LG', 
                    $created->toArray())))
            );
        }

        public function logout(){
            auth('mang-sellers')->logout();
            return SubscribtionResourcesResponse::make(
                $this->messagesSuccess(
                __('messages.messages_success', ['name' => 'Logout Mangsellers']), 201))
                ->response()
                ->setStatusCode(201);
        }
        public function serviceLoginProvider(string $type){
            $credentials = Validator::make($this->request->all(), [
                'email'         => ['required', 'exists:mang_sellers,email'],
                'provider_id'   => ['required']
            ]);

            if($credentials->fails()){
                return SubscribtionResourcesResponse::make(
                    $this->errAuthWithValidation(402, __('error.MANG-ERROR-ATZ-HND-V1'), $credentials->messages()->toArray())
                )->response()->setStatusCode(402);
            }
            $users = $this->mangSellers->findWithEmail($this->request->email);

            if(is_null($users)){
                return SubscribtionResourcesResponse::make(
                    $this->errAuthWithoutValidation(402, __('error.MANG-ERROR-AUTH-TR1'))
                );
            }

            if($users->providerLogin->count() > 0){
                $loginProvider = MangSellers::LoginProviderSociate($this->request->email, $this->request->provider_id);
                if($loginProvider){
                    $tokens = auth('mang-sellers')->setTTL(4200)->login($loginProvider);
                    return SubscribtionResourcesResponse::make(
                        $this->successAuthenticationWithToken(
                            $tokens, 201, __('success.MANG-SUCCESS-AUTH-TR1'), 
                            ['user' => $users->only(['email', 'name'])]),
                            ['type' => 'mang-seller'])->response()->setStatusCode(201);
                }
                return SubscribtionResourcesResponse::make(
                    $this->errAuthWithoutValidation(402, __('error.MANG-ERROR-AUTH-TR1'))
                );
            }

            $created = ExtendLoginSocialMedia::create(
                array_merge_recursive(
                    ['type' => $type, 'id_sellers' => $users->id],
                     $this->request->only(['email', 'provider_id']))
                );
            if($created){
                $tokens = auth('mang-sellers')->setTTL(4200)->login($users);
                return SubscribtionResourcesResponse::make(
                    $this->successAuthenticationWithToken(
                        $tokens, 201, __('success.MANG-SUCCESS-AUTH-TR1'), 
                        ['user' => $users->only(['email', 'name'])]),
                        ['type' => 'mang-seller'])->response()->setStatusCode(201);
            }
        }
    }
}