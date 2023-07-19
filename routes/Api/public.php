<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::prefix('public')->group(function(){
     Route::controller(PublicController::class)->group(function(){
         Route::get('get-category/{slugh}', 'listCategory');
         Route::get('sub-category/{slugh}', 'subCategory');
     });
});