<?php

namespace App\Http\Resources;

use App\Trait\MangAccountDiscount\MangDiscountAccount;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourceResponseMangAccount extends JsonResource
{
    use MangDiscountAccount;
    public function toArray($request)
    {
        return collect($this->resource)->map(function($values){
            $filter = $values->paidSelect->map(function($paid) use ($values){
                if(is_null($paid->discount))
                    unset($paid->discount);
                else
                    $paid->discount['test'] = 'alsmmkasfmka';
                return $paid;
            });
            return $filter;
        })->values();
    }
}
