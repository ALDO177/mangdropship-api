<?php

use App\Http\Controllers\MangAdmin\MangAdminAccessController;
use App\Http\Controllers\MangAdmin\MangdropshipAdminControllers;
use App\Images\WebpImages;
use App\Models\Admin\ListMerkProdukSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('mang-admin')->group(function(){
    
    Route::prefix('auth')->group(function(){
        Route::controller(MangdropshipAdminControllers::class)->group(function(){
            Route::post('login', 'login');
            Route::post('register', 'register');
            Route::get('logout', 'logout')->middleware(['auth:admins']);
            Route::post('reset-password', 'resetPassword');
            Route::post('confirm-reset-password', 'confirmResetPassword');
            Route::post('forget-password', 'forgetPassword');
        });
    });

    Route::controller(MangAdminAccessController::class)->group(function(){
        Route::get('info', 'info');
    });

    Route::post('store-brand', function(Request $request){

        $webp = new WebpImages($request->file('path_merk'), 250, 250);
        $webp->putWithDisk('oss', env('STG_MANG_ADMIN') . '/brand');
        ListMerkProdukSeller::create([
            'merk_name' => $request->get('merk_name'),
            'path'      => $webp->filename,
            'position'  => $request->position
        ]);

        return response()->json(['message' => 'success']);
    });

    Route::get('list-brand', function(Request $request){
        return response()->json(ListMerkProdukSeller::all());
    });
});