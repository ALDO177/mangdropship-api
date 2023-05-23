<?php

use App\Http\Controllers\Auth\AuthControlersResources;
use App\Http\Controllers\Auth\GuestAuthentication;
use App\Models\TokensVerify;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('test', function(User $users){
   return $users->find(1)->tokensVerify;
});
Route::prefix('v1')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::controller(GuestAuthentication::class)->group(function(){
            Route::match(['post', 'put'], 'login', 'Login');
            Route::match(['post', 'put'], 'register', 'Register');
            Route::get('logout', 'logout')->middleware(['auth:api-users', 'token_verified']);
        });
    });
    
    Route::apiResources([
        'subscribtion' => AuthControlersResources::class,
    ]);
});
