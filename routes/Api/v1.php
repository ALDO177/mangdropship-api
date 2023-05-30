<?php

use App\Http\Controllers\Auth\AuthControlersResources;
use App\Http\Controllers\Auth\GuestAuthentication;
use App\Http\Controllers\Paid\PaidAccountControllers;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::controller(GuestAuthentication::class)->group(function(){
            Route::match(['post', 'put'], 'login', 'Login')
            ->name('mang.login');
            Route::match(['post', 'put'], 'register', 'Register')->name('mang.register');
            Route::get('logout', 'logout')
            ->middleware(['auth:api-users', 'token_verified'])
            ->name('mang.logout');
        });
    });

    Route::prefix('paid-mang-account')->group(function(){
        Route::controller(PaidAccountControllers::class)->group(function(){
            Route::get('list', 'List')->whereIn('sort', ['asc', 'desc'])->where(['sort' => '[a-z]+']);
            Route::get('find', 'Find');
        });
    });
    
    Route::apiResources([
        'subscribtion' => AuthControlersResources::class,
    ]);
});
