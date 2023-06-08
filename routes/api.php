<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){

    require_once __DIR__ . '/Api/v1.php';
    require_once __DIR__ . '/Api/mang-seller.php';
});


Route::group(['prefix' => 'admin', 'middleware' => ['asign.guard:admins', 'jwt.auth']], function(){
    Route::get('demo', function(){
        return response()->json(['messaeges' => 'Okehh']);
    });
});