<?php

use App\Http\Controllers\Mangseller\AuthMangseller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('mang-seller')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::controller(AuthMangseller::class)->group(function(){
            Route::post('login', 'login');
        });
    });

    Route::get('test-santum', function(Request $request){
        return $request->user();
    })->middleware(['auth:sanctum']);
});