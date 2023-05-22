<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;

class SubscribtionResourcesResponse extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection;
    }

    public function withResponse($request, $response): void
    {
        $response->header('X-MANGDROPSHIP-API', Str::random(20));
    }
}
