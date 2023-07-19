<?php

use App\Images\WebpImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    require_once __DIR__ . '/Api/v1.php';
    require_once __DIR__ . '/Api/mang-seller.php';
    require_once __DIR__ . '/Api/mang-admin.php';
    require_once __DIR__ . '/Api/mang-dropshiper.php';
    require_once __DIR__ . '/Api/public.php';
});

Route::post('apis', function(Request $request){
    foreach($request->file('gambar') as $images){   
        $webp = new WebpImages($images, 300, 300);
        $webp->putWithDisk('oss', env('STG_MANG_SELLER') . '/images');
    }
    return ['uploaded' => 'upload-in-store ashfuiah'];
});