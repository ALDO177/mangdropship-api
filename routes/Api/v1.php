<?php

use App\Http\Controllers\Auth\AuthControlersResources;
use App\Http\Controllers\Auth\GuestAuthentication;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::controller(GuestAuthentication::class)->group(function(){
            Route::match(['post', 'put'], 'login', 'Login');
            Route::match(['post', 'put'], 'register', 'Register');
            Route::get('logout', 'logout');
        });
    });
    
    Route::apiResources([
        'subscribtion' => AuthControlersResources::class,
    ]);
});
