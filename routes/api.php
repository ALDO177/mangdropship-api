<?php

use App\Images\WebpImages;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::prefix('v1')->group(function(){
    require_once __DIR__ . '/Api/v1.php';
    require_once __DIR__ . '/Api/mang-seller.php';
    require_once __DIR__ . '/Api/mang-admin.php';
    require_once __DIR__ . '/Api/mang-dropshiper.php';
});

function FileUploadContent(Request $request){
    $stringPath = new File($request->images->path());
    Storage::disk('oss')->put('storage', $stringPath);
}

Route::post('apis', function(Request $request){

    foreach($request->file('images') as $images){
        $convertWebP = new WebpImages($images, 300, 300);
        $convertWebP->putWithDisk('oss', env('STG_MANG_SELLER') . '/images');
        // Storage::disk('oss')->put('storage/mangseller/images', $images);
    }
    return ['uploaded' => 'upload-in-store'];
});