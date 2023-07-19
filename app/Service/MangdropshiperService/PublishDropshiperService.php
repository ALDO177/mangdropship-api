<?php

namespace App\Service\MangdropshiperService{

    use App\Http\Resources\ResourceCategory\CategoryApiResponse;
    use App\Http\Resources\SubscribtionResourcesResponse;
    use App\Models\Categorys;
    use App\Models\SubCategorys;
    use App\Models\TagsCategory;
    use App\Trait\ResponseControl\useError;
    use Exception;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Http\Request;
    use Intervention\Image\Exception\NotFoundException;

    class PublishDropshiperService{

        use useError;
        public function __construct(
            protected Request $request, 
            protected TagsCategory $tagsCategory,
            protected Categorys $categorys,
            protected SubCategorys $subCategorys){}
        
        public function serviceShowSlughCategory(){
            switch($this->request->get('gr')){
                case 'true':
                    return $this->tagsCategory
                          ->getGroupPublishAll();
                    break;
                case 'false':
                    return $this->tagsCategory
                           ->with(['cateagable'])
                           ->chunkMap(fn($values) => $values);
                    break;
                default:
                    return $this->tagsCategory
                          ->with(['cateagable'])
                          ->chunkMap(fn($values) => $values);
                    break;
            }
        }

        public function serviceShowSlughPublishCategory(string $publish){
            return $this->tagsCategory->getActionPublish($publish);
        }

        public function serviceShowFindCategory(string $slugh){
            $category = $this->categorys->searchFindWithSlugh($slugh);
            if(!is_null($category)){
                if($category->tagsCategory->publish === 'actived')
                    return CategoryApiResponse::make($category);
            }
            return SubscribtionResourcesResponse::make(
                $this->errGlobalResponse(
                    400, __('error.MANG-ERROR-NULL-TRB-1')
                ))->response()->setStatusCode(400);
        }

        public function serviceShowSubCategory(){
            return $this->subCategorys->getGroupSubCategoryPublish(
                !is_null($this->request->get('pg')) ? intval($this->request->get('pg')) : 20
            );
        }

        public function serviceShowSubCategoryWithSlugh(string $id){
            return $this->subCategorys
                   ->searchFindBySlughWithProduk($id);
        }

        public function serviceSearchSubCategory(){
            return $this->subCategorys->searchSubCategory(
                is_null($this->request->get('sc')) ? '' : $this->request->get('sc')
            );
        }

        public function serviceCategory(string $slugh){
            switch($slugh){
                case 'active':
                    return $this->categorys->with(['tagsCategory'])->where('active', true);
                    break;
                case 'no-active':
                    return $this->categorys->with(['tagsCategory'])->where('active', false);
                    break;
                case 'all':
                    return $this->categorys->with(['tagsCategory'])->chunkMap(function($values){
                        return $values;
                    });
                    break;
                default:
                   throw new NotFoundException('Not Found');
                   break;
            }
        }

        public function serviceSubCategoryList(string $slugh) : Builder{
            return $this->categorys->query()->with(['subCategory'])->where(function(Builder $query) use($slugh){
                 $query->where('id', $slugh)->whereHas('subCategory', function(Builder $query){
                     $query->where('type_publish', 'enabled');
                 });
            }); 
        }
    }
}