<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    require_once __DIR__ . '/Api/v1.php';
    require_once __DIR__ . '/Api/mang-seller.php';
    require_once __DIR__ . '/Api/mang-admin.php';
    require_once __DIR__ . '/Api/mang-dropshiper.php';
    require_once __DIR__ . '/Api/public.php';
});