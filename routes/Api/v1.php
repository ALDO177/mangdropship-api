<?php

use App\Http\Controllers\Auth\AuthControllers;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::controller(AuthControllers::class)->group(function(){
        Route::match(['put', 'post'], 'login', 'Login');
    });
});
