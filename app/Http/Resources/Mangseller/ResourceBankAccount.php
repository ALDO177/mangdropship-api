<?php

namespace App\Http\Resources\Mangseller;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceBankAccount extends JsonResource
{
    public function toArray($request)
    {
        return[
            'name'         => $this->user->name,
            'email'        => $this->user->email,
            'tokens'       => $this->user->tokens_verified,
            'bank_account' => $this->bankAccount
        ];
    }
}
