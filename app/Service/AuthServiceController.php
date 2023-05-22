<?php

namespace App\Service;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Jobs\JobEmailSubscription;
use App\Models\User;
use App\Trait\Help\ResponseMessage;
use App\Trait\Help\withoutWreapArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthServiceController{

    use withoutWreapArray, ResponseMessage;
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function serviceIndex(){
        JobEmailSubscription::dispatch(auth('api-users')->user());
        return new SubscribtionResourcesResponse(auth('api-users')->user());
    }

    public function serviceLogin(){

        $credentials = Validator::make($this->request->all(), [
            'email'       => ['required', 'email', 'exists:users,email'],
            'password'    => ['required']
        ]);

        if($credentials->fails())
            return SubscribtionResourcesResponse::make($this->wreap($credentials->messages()
                ->toArray()))
                ->response()
                ->setStatusCode('400');

        // Authorization Validation
        if(!$tokens = auth('api-users')->attempt($this->request->only(['email', 'password']))){
            return SubscribtionResourcesResponse::make($this->messageNotAuth())
                ->response()
                ->setStatusCode(401);
        }
        return SubscribtionResourcesResponse::make($this->AccAuthentication($tokens));
    }

    public function serviceLogout(){
        auth()->logout();
        return SubscribtionResourcesResponse::make(['code' => 200, 'message' => 'logout success']);
    }

    public function serviceRegister(){

        $credentials = Validator::make($this->request->all(), [
            'name'              => ['max:20', 'min:3', 'required', 'unique:users,name'],
            'email'             => ['email', 'unique:users,email', 'required'],
            'password'          => ['required', 'confirmed', 'min:6', 'string',
                                    'regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/',
                                    'regex:/[@$!%*#?&]/',]]);
        if($credentials->fails()) 
            return SubscribtionResourcesResponse::make($this->wreap($credentials->messages()
                    ->toArray()))
                    ->response()
                    ->setStatusCode(402);

        $createRegister = User::create($this->request->only(['name', 'email', 'password']));
        return SubscribtionResourcesResponse::make($createRegister)
                ->response()
                ->setStatusCode(201);
    }
}