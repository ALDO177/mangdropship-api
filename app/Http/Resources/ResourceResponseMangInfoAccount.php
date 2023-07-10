<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceResponseMangInfoAccount extends JsonResource
{
    public function toArray($request)
    {
        return[
            'code'                    => 201,
            'name'                    => $this->name,
            'email'                   => $this->email,
            'account_type_subs'       => $this->subscribtions,
            'offers_account'          => $this->when($this->offerKonditions($this->subscribtions), [
                'upgrade'   => [ 'price' => 20000 ]
            ])
        ];
    }

    private function offerKonditions($subs) : bool{
        $sub = $subs->filter(function($values){
            return $values->subscription_role_id === 1;
        });
        $bools  = $sub->count() > 0 ? true : false;
        return $bools;
    }

}
