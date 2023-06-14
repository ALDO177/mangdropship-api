<?php

use App\Models\Supllier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    require_once __DIR__ . '/Api/v1.php';
    require_once __DIR__ . '/Api/mang-seller.php';
    require_once __DIR__ . '/Api/mang-admin.php';
});