<?php

namespace App\Http\Resources\ResourceCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryApiResponse extends JsonResource
{
    public function toArray($request)
    {
        return[
            'category_name'         => $this->category_name,
            'category_description'  => $this->category_description,
            'category_slugh'        => $this->category_slugh,
            'icon'                  => $this->icon,
            'image_path'            => $this->image_path,
            'active'                => $this->active,
            'tags_category'         => $this->when(
                                        !is_null($request->get('tags')) && 
                                        $request->get('tags') === 'true',
                                        $this?->tagsCategory),
            'sub_category'          =>  $this->subCategory?->sortBy(['sub_category_name', 'desc', 'created_at', 'desc'])->values(),
        ];
    }
}
