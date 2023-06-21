<?php

namespace App\Http\Resources\Mangseller;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceJoinResponse extends JsonResource
{
    public function toArray($request)
    {
        return[
            'name'      => $this->name,
            'email'     => $this->email,
            'suplier'   => $this->supliers,
            'messages'  => $this->when(is_null($this->supliers), __('messages.messages_supliers', ['name' => $this->name]))
        ];
    }
}
