<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ResourcesResponseSubscribtions extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {
        return
        [
            'meta' => '19248219u8r9idaishaf1820948901',
        ];
    }

    public function withResponse($request, $response) : void
    {
        
    }
}
