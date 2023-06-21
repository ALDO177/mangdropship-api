<?php

use App\Http\Controllers\MangDropshiper\PublishDropshiper;
use Illuminate\Support\Facades\Route;

Route::prefix('dropshiper')->group(function(){
    Route::controller(PublishDropshiper::class)->group(function(){
        Route::get('slugh-category', 'showSlughCategory');
        Route::get('slugh-category/{publish}', 'showSlughPublishCategory');
    }); 
});