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
            $responses = $this->messageNotAuth(400, 'error-validations', $credentials->messages()->toArray());
            return response()->json($responses);

        // Authorization Validation
        if (!$tokens = auth('api-users')->attempt($this->request->only(['email', 'password']))) {
            return SubscribtionResourcesResponse::make($this->AccAuthentication($tokens))
                ->response()
                ->setStatusCode(201);
        }
        return SubscribtionResourcesResponse::make($this->AccAuthentication($tokens));
    }

    public function serviceResetPassword()
    {
        $creadentials = Validator::make($this->request->all(), ['email' => ['required', 'email']]);
        if ($creadentials->fails())
                return ApiResponseJson::make($this->wreap($creadentials->messages()
                ->toArray()))
                ->response()
                ->setStatusCode(403);

        if(PasswordAuthentications::DuplicatedResetPassword($this->request->email)){
            return SubscribtionResourcesResponse::make(
                ['code' => 201, 'error' => false, 'messagesd' => 'Account Password Reset Success']
            );
        }

        $konditions = PasswordAuthentications::CreateResetPassword('reset', $this->request->email);
        if ($konditions) return SubscribtionResourcesResponse::make(
            ['code' => 201, 'error' => false, 'messages' => 'Account Password Reset Success']);

        return SubscribtionResourcesResponse::make(
            $this->messageAuth(400, 'Reset password error', fn() => ['url' => env('APP_SERVER_APPLICATION')]))
            ->response()->setStatusCode(400);
    }

    public function serviceLogout()
    {
        auth()->logout();
        return SubscribtionResourcesResponse::make(
            [
                'code'    => 200,
                'message' => 'logout success'
            ]
        );
    }

    public function serviceRegister()
    {
        $credentials = Validator::make($this->request->all(), [
            'name'          => ['max:20', 'min:3', 'required', 'unique:users,name'],
            'email'         => ['email', 'unique:users,email', 'required'],
            'password'      => [
                'required', 'confirmed', 'min:6', 'string',
                'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ]
        ]);
        if ($credentials->fails())
            return SubscribtionResourcesResponse::make(
                $this->messageNotAuth(400, 'error-validations', $credentials->messages()->toArray()))
                ->response()
                ->setStatusCode(400);

        User::create($this->request->only(['name', 'email', 'password']));
            return SubscribtionResourcesResponse::make($this->messageAuth(201, 'Ok', fn() => ['url' => env('APP_SERVER_APPLICATION')]))
                ->response()
                ->setStatusCode(201);
    }
}
