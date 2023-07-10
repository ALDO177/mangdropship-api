<?php

namespace App\Http\Resources;

use App\Trait\MangAccountDiscount\MangDiscountAccount;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourceResponseMangAccount extends JsonResource
{
    use MangDiscountAccount;
    
    public function toArray($request)
    {
        return $this->resource;
    }
}
