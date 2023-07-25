<?php

namespace App\Http\Controllers\Mangseller;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Images\WebpImages;
use App\Models\GalleriesProduct;
use App\Models\VideosProduct;
use App\Trait\ResponseControl\useError;
use App\Trait\ResponseControl\useSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaProdukSellerController extends Controller
{
    use useError, useSuccess;
    public function __construct(protected Request $request){}

    public function uploadProdukFile()
    {
        $credentials = Validator::make($this->request->all(), [
            'galleries'  => ['required', 'array'],
            'videos'     => ['required', 'array']
        ]);

        if ($credentials->fails()) {
            return SubscribtionResourcesResponse::make(
                $this->errAuthWithValidation(
                    400,
                    __('error.MANG-ERROR-VLD-1'),
                    $credentials->messages()->toArray()
                ))->response()->setStatusCode(400);
        }

        foreach($this->request->allFiles()['galleries'] as $images){
            $webp = new WebpImages($images, 300, 300);
            $webp->putWithDisk('oss', env('STG_MANG_SELLER') . '/images'); 
            GalleriesProduct::create([
                'id_product' => $this->request->id_product,
                'image_path' => $webp->filename,
            ]);
        }

        foreach($this->request->allFiles()['videos'] as $videos){
            $filenames = Storage::disk('oss')->put(env('STG_MANG_SELLER') .'/video', $videos);
            $videoName = $videos->getClientOriginalName();
            VideosProduct::create([
                'id_product'  => $this->request->id_product,
                'video_name'  => $videoName,
                'video_path'  => $filenames,
            ]);
        }
        return response()->json($this->successGlobalResponse(201, __('success.MANG-SUCCESS-MDA-DT')), 201, [], JSON_PRETTY_PRINT);
    }
}
