<?php

use App\Http\Controllers\Mangseller\AuthMangseller;
use App\Http\Controllers\Mangseller\MangsellerAccess;
use App\Http\Controllers\Mangseller\SuplierStatusController;
use App\Http\Controllers\Mangseller\SuplierStoreControllers;
use Illuminate\Support\Facades\Route;

Route::prefix('mang-seller')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::controller(AuthMangseller::class)->group(function(){
            Route::post('login', 'login');
            Route::post('register', 'register');
            Route::post('reset-password', 'resetPassword');
            Route::post('confirm-password', 'confirmPassword');
            Route::get('logout', 'logout')->middleware(['auth:mang-sellers']);
        });
    });

    Route::controller(MangsellerAccess::class)->group(function(){
        Route::get('info', 'info');
    });
    
   Route::prefix('find')->group(function(){
        Route::apiResources([
            'store'    => SuplierStoreControllers::class,
            'status'   => SuplierStatusController::class,
        ]);
   });
});