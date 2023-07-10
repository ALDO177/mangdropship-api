<?php

namespace App\Http\Resources\Mangseller;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceStatusSellers extends JsonResource
{
    public function toArray($request)
    {
        return[
            'name_store'   => $this->name_store,
            'slugh_store'  => $this->slugh_store,
            'path_store'   => $this->path_store,
            'store_status' => $this->store_status,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
            'status'       => $this->storeInformation->status,
        ];
    }
}
