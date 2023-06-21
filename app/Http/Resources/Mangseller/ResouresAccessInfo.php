<?php

namespace App\Http\Resources\Mangseller;

use Illuminate\Http\Resources\Json\JsonResource;

class ResouresAccessInfo extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'           => $this->name,
            'email'          => $this->email,
            'tokens_verfied' => $this->tokens_verified,
            'supliers'       => $this->when(is_null($this->resource->supliers), null, ResouresStoreInformation::make($this->supliers)),
            'messages'       => $this->when(is_null($this->supliers), __('messages.messages_supliers'))
        ];
    }
    
    public function withResponse($request, $response)
    {
        if(is_null($this->supliers)){
            $response->header('x-suplier-mang', 'false');
        }
    }
}
