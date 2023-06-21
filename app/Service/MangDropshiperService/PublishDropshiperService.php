<?php

namespace App\Service\MangdropshiperService{

    use App\Models\TagsCategory;
    use Illuminate\Http\Request;

    class PublishDropshiperService{

        public function __construct(
            protected Request $request, 
            protected TagsCategory $tagsCategory){}
        
        public function serviceShowSlughCategory(){
            switch($this->request->get('gr')){
                case 'true':
                    return $this->tagsCategory->getGroupPublishAll();
                    break;
                case 'false':
                    return $this->tagsCategory->with(['cateagable'])->chunkMap(fn($values) => $values);
                    break;
                default:
                    return $this->tagsCategory->with(['cateagable'])->chunkMap(fn($values) => $values);
                    break;
            }
        }
        
        public function serviceShowSlughPublishCategory(string $publish){
            return $this->tagsCategory->getActionPublish($publish);
        }
    }
}