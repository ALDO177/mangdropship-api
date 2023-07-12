<?php

use App\Jobs\JobOberverProduk;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\File as FacadesFile;
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

    // return FacadesFile::get($request->images->path());

    foreach($request->file('images') as $images){
        Storage::disk('oss')->put('storage', $images);
    }
    // dispatch(new JobOberverProduk($_FILES));
    // Bus::chain([
    //      function() use($request){
    //         echo 'asfijaisjof';
    //      }
    // ])->dispatch()->afterResponse();
    return ['uploaded' => 'upload-in-store'];
});