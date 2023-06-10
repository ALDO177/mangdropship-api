<?php

use App\Http\Controllers\MangAdmin\MangAdminAccessController;
use App\Http\Controllers\MangAdmin\MangdropshipAdminControllers;
use Illuminate\Support\Facades\Route;

Route::prefix('mang-admin')->group(function(){
    
    Route::prefix('auth')->group(function(){
        Route::controller(MangdropshipAdminControllers::class)->group(function(){
            Route::post('login', 'login');
            Route::post('register', 'register');
            Route::get('logout', 'logout')->middleware(['auth:admins']);
            Route::post('reset-password', 'resetPassword');
            Route::post('forget-password', 'forgetPassword');
        });
    });

    Route::controller(MangAdminAccessController::class)->group(function(){
        Route::get('info', 'info');
    });

});