<?php

namespace App\Service\ServiceMangAdmin{

    use App\Http\Resources\SubscribtionResourcesResponse;
    use App\Models\Admin\AdminMangdropship;
    use App\Models\PasswordAuthentications;
    use App\Trait\Help\ResponseMessage;
    use App\Trait\Help\withoutWreapArray;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;

    class AuthServiceMangAdmin{

        use withoutWreapArray, ResponseMessage;
        public function __construct(protected Request $request){}

        public function login(){

            $credentials = Validator::make($this->request->all(), [
                'email'     => ['required', 'email'],
                'password'  => ['required']
            ]);

            if($credentials->fails())
                return SubscribtionResourcesResponse::make(
                    $this->messageNotAuth(400, 
                    __('messages.messages_errors', 
                    ['type' => 'Login Admin']), $credentials->messages()->toArray())
                )->response()->setStatusCode(400);

            $users = AdminMangdropship::findWithEmail($this->request->email);
        
            if( !$users || !Hash::check($this->request->password, $users->password)){
                return response()->json(
                    $this->messagesError(
                        __('messages.messages_errors', ['type' =>
                        __('messages.wrong_email_pass')]), 400), 400, [], JSON_PRETTY_PRINT
                );
            }

            $tokens = auth('admins')->login($users);
            return SubscribtionResourcesResponse::make($this->AccAuthentication($tokens, 
                __('messages.messages_success', ['name' => 'Login Admin']))
            )->response()->setStatusCode(201);
        }

        public function register(){

            $credentials = Validator::make($this->request->all(), [
                'name'          => ['max:20', 'min:3', 'required'],
                'email'         => ['email', 'unique:admin_mangdropships,email', 'required'],
                'password'      => ['required', 'confirmed', 'min:6', 'string',
                    'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/',
                ]
            ]);
    
            if ($credentials->fails())
                return SubscribtionResourcesResponse::make(
                    $this->messageNotAuth(400, __('messages.messages_errors', 
                    ['type' => 'Register Admin']), 
                    $credentials->messages()->toArray()))->response()->setStatusCode(400);
            
            $createdAdminAccount = AdminMangdropship::create($this->request->only(['name', 'email', 'password']));
            if($createdAdminAccount){
                return SubscribtionResourcesResponse::make(
                    $this->messageAuth(201, __('messages.messages_success', ['name' => 'Register Admin']), 
                    fn() => ['url' => 'http://api/mang-admin/auth/login'])
                );
            }

            return response()->json(
                $this->messagesError(
                __('messages.messages_errors', ['type' => 'Register'])));
        }

        public function resetPassword(){
            $credentials = Validator::make($this->request->all(), [
                'email' => ['required', 'exists:admin_mangdropships,email']
            ]);

            if($credentials->fails()){
                return SubscribtionResourcesResponse::make(
                    $this->messageNotAuth(400, 'Bad Request', $credentials->messages()->toArray()));
            }

            if (PasswordAuthentications::DuplicatedResetPassword($this->request->email, 'admins')) {
                return SubscribtionResourcesResponse::make(
                    $this->messagesSuccess(__('messages.messages_success', ['name' => 'Reset Password']))
                );
            }
            $konditions = PasswordAuthentications::CreateResetPassword('reset', $this->request->email, 'admins');

            if ($konditions)
                return SubscribtionResourcesResponse::make(
                $this->messagesSuccess(__('messages.messages_success', ['name' => 'Update Reset Password'])));
    
            return SubscribtionResourcesResponse::make(
                $this->messageAuth(400, 'Reset password error',
                fn () => ['url' => env('APP_SERVER_APPLICATION')]))
                ->response()->setStatusCode(400);
        }

        public function serviceConfirmResetPassword(string $tokens){

        }

        public function logout(){
            auth('admins')->logout();
            return SubscribtionResourcesResponse::make(
                $this->messagesSuccess(
                __('messages.messages_success', ['name' => 'Logout Admin']), 201)
            )->response()->setStatusCode(201);
        }
    }
}