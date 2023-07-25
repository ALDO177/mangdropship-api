<?php

namespace App\Http\Resources;

use App\Models\OptionsProductWarranty;
use App\Models\Supllier;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourcePublicApiListCategory extends JsonResource
{
    public function toArray($request)
    {
        return $this->when(is_null($request->wt), [
            'category'   => $this->resource,
        ],[
            'category'      => $this->resource,
            'option_wr'     => $this->when(!is_null($request->wt) && $request->wt === 'wr', OptionsProductWarranty::all()),
            'brand_produk'  => Supllier::getListBrandProduk($request->user()->id),
        ]);
    }
}
