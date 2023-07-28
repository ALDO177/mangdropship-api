<?php

use App\Http\Controllers\Mangseller\AuthMangseller;
use App\Http\Controllers\Mangseller\BrandProdukController;
use App\Http\Controllers\Mangseller\ControllersMangsellerAccountBank;
use App\Http\Controllers\Mangseller\CuponsActiveProductControllers;
use App\Http\Controllers\Mangseller\CuponsSellerController;
use App\Http\Controllers\Mangseller\MangsellerAccess;
use App\Http\Controllers\Mangseller\MangsellerSettingController;
use App\Http\Controllers\Mangseller\MediaProdukSellerController;
use App\Http\Controllers\Mangseller\SuplierControllerProduk;
use Illuminate\Support\Facades\Route;

Route::prefix('mang-seller')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::controller(AuthMangseller::class)->group(function(){
            Route::post('login', 'login');
            Route::post('register', 'register');
            Route::post('reset-password', 'resetPassword');
            Route::post('confirm-password', 'confirmPassword');
            Route::post('extend-providers/{path}', 'extendProviderAccount');
            Route::post('login-providers/{type}', 'loginWithProviders');
            Route::get('logout', 'logout')->middleware(['auth:mang-sellers']);
        });
    });

    Route::controller(MangsellerAccess::class)->group(function(){
        Route::get('info-member', 'infoMember');
        Route::get('info', 'info');
        Route::get('provider', 'providerLogin');
    });

    Route::prefix('find')->group(function(){
        Route::controller(MangsellerSettingController::class)->group(function(){
            Route::get('store', 'infoStore');
            Route::get('status', 'infoStatus');
            Route::get('account-bank', 'infoBankAccount');
            Route::match(['put', 'patch'], 'status/{id}', 'updateStatus');
            Route::match(['put', 'patch', 'post'], 'store',  'updateStore');
        });
    });
    
    Route::controller(MediaProdukSellerController::class)->group(function(){
        Route::post('upload-media', 'uploadProdukFile');
    });
    
    Route::apiResources([
        'bank'          => ControllersMangsellerAccountBank::class,
        'cupons'        => CuponsSellerController::class,
        'cupons-produk' => CuponsActiveProductControllers::class,
        'produk'        => SuplierControllerProduk::class,
        'brand/{path}'         => BrandProdukController::class,
    ]);
});