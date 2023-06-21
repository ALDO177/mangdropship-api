<?php

namespace App\Http\Resources\Mangseller;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourcesStoreSellers extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id'             => $this->store->id,
            'name_store'     => $this->store->name_store,
            'slugh_store'    => $this->store->slugh_store,
            'path_store'     => $this->store->path_store, 
            'store_status'   => $this->store->store_status,
            'created_at'     => $this->store->created_at,
            'updated_at'     => $this->store->updated_at
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(201);
    }
}
