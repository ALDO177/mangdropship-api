<?php

use App\Models\Categorys;
use App\Models\MangSellerModels\MangSellers;
use App\Models\SubCategorys;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    require_once __DIR__ . '/Api/v1.php';
    require_once __DIR__ . '/Api/mang-seller.php';
    require_once __DIR__ . '/Api/mang-admin.php';
});

Route::get('test', function () {

    // return Categorys::with(['subCategory' => ['getProduct']])->get();
    return MangSellers::with(['supliers' => ['product' => ['images']]])->chunkMap(function($supliers){
        return $supliers;
    });
});