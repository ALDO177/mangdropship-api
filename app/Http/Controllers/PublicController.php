<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResourcePublicApiListCategory;
use App\Http\Resources\SubscribtionResourcesResponse;
use App\Service\MangdropshiperService\PublishDropshiperService;
use App\Trait\ResponseControl\useError;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Intervention\Image\Exception\NotFoundException;

class PublicController extends Controller
{
    use useError;
    public function __construct(protected Request $request, protected PublishDropshiperService $service){

        $this->middleware(['auth:mang-sellers', 'api-mang-seller-access'])->except(['subCategory']);
    }

    public function listCategory(string $slugh){
        try{
           $category =  $this->service->serviceCategory($slugh);
           if($category instanceof Collection){
                return ResourcePublicApiListCategory::make($category)->response()->setStatusCode(201);
           }
           if($category instanceof Builder){
                return ResourcePublicApiListCategory::make($category->get())->response()->setStatusCode(201);
           }

        }catch(NotFoundException $notfound){
            return SubscribtionResourcesResponse::make(
                $this->errGlobalResponse(400, __('error.MANG-ERROR-ATZ-HND-V1'))
            );
        }
    }

    public function subCategory(string $slugh) : JsonResponse{
         $const = $this->service->serviceSubCategoryList($slugh)->first();
         if(!is_null($const)) return SubscribtionResourcesResponse::make($const->subCategory)->response()->setStatusCode(201);
         return response()->json($this->errGlobalResponse(400,  __('error.MANG-ERROR-NULL-TRB-1')), 402);
    }
}
