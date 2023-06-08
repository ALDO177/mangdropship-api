<?php

namespace App\Service;

use App\Http\Resources\ApiResponseJson;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Models\PasswordAuthentications;
use App\Models\User;
use App\Trait\Help\ResponseMessage;
use App\Trait\Help\withoutWreapArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthServiceController
{
    use withoutWreapArray, ResponseMessage;
    public function __construct(protected Request $request){}

    public function serviceIndex()
    {
        return new SubscribtionResourcesResponse(auth('api-users')->user());
    }

    public function serviceLogin()
    {
        $credentials = Validator::make($this->request->all(), [
            'email'       => ['required', 'email', 'exists:users,email'],
            'password'    => ['required']
        ]);

        if ($credentials->fails())
            $response = $this->messageNotAuth(400,
                __('messages.messages_errors', ['type' => 'Login']),
                $credentials->messages()->toArray()
            ); 
             
            return response()->json([$response]);

        if (!$tokens = auth('api-users')->attempt($this->request->only(['email', 'password']))) {
            return SubscribtionResourcesResponse::make(
                $this->AccAuthentication($tokens, __('messages.messages_success', ['name' => 'Login Users'])))
                ->response()
                ->setStatusCode(201);
        }
        return SubscribtionResourcesResponse::make(['error' => true])
            ->response()
            ->setStatusCode('400');
    }

    public function serviceResetPassword()
    {
        $creadentials = Validator::make($this->request->all(), ['email' => ['required', 'email']]);
        if ($creadentials->fails())
            return ApiResponseJson::make($this->wreap($creadentials->messages()
                ->toArray()))
                ->response()
                ->setStatusCode(403);

        if (PasswordAuthentications::DuplicatedResetPassword($this->request->email)) {
            return SubscribtionResourcesResponse::make(
                $this->messagesSuccess(__('messages.messages_success', ['name' => 'Reset Password']))
            );
        }

        $konditions = PasswordAuthentications::CreateResetPassword('reset', $this->request->email);
        if ($konditions)
            return SubscribtionResourcesResponse::make(
                $this->messagesSuccess(__('messages.messages_success', ['name' => 'Update Reset Password']))
            );

        return SubscribtionResourcesResponse::make(
            $this->messageAuth(400, 'Reset password error',
            fn () => ['url' => env('APP_SERVER_APPLICATION')]))
            ->response()->setStatusCode(400);
    }

    public function serviceLogout()
    {
        auth()->logout();
        return SubscribtionResourcesResponse::make(
            $this->messagesSuccess(__('messages.messages_success', ['name' => 'Logout']))
        );
    }

    public function serviceRegister()
    {
        $credentials = Validator::make($this->request->all(), [
            'name'          => ['max:20', 'min:3', 'required', 'unique:users,name'],
            'email'         => ['email', 'unique:users,email', 'required'],
            'password'      => ['required', 'confirmed', 'min:6', 'string',
                'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ]
        ]);

        if ($credentials->fails())
            return SubscribtionResourcesResponse::make(
                $this->messageNotAuth(400, __('messages.messages_errors', ['type' => 'Register']), 
                $credentials->messages()->toArray()))
                ->response()
                ->setStatusCode(400);
                
        User::create($this->request->only(['name', 'email', 'password']));
        return SubscribtionResourcesResponse::make($this->messageAuth(201, 'Ok', 
               fn () => ['url' => env('APP_SERVER_APPLICATION')]))
               ->response()
               ->setStatusCode(201);
    }
}
