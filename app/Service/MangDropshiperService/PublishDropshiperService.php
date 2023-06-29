<?php

namespace App\Service\MangdropshiperService{

    use App\Http\Resources\ResourceCategory\CategoryApiResponse;
    use App\Http\Resources\SubscribtionResourcesResponse;
    use App\Models\Categorys;
    use App\Models\SubCategorys;
    use App\Models\TagsCategory;
    use App\Trait\ResponseControl\useError;
    use Illuminate\Http\Request;

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
    }
}