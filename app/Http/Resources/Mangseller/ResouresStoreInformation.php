<?php

namespace App\Http\Resources\Mangseller;
use Illuminate\Http\Resources\Json\JsonResource;

class ResouresStoreInformation extends JsonResource
{
    public function toArray($request)
    {
            return $this->when(!is_null($request?->type) && $request?->type === 'wreap', 
            $this->resApiForWreap(), $this->resApiNoWreap());
    }

    protected function resApiForWreap() : array{
        return
            [
                'id'                        =>  $this->store->id,
                'name_store'                =>  $this->store->name_store,
                'slugh_store'               =>  $this->store->slugh_store,
                'path_store'                =>  $this->store->path_store,
                'store_status'              =>  $this->store->store_status,
                'status'                    =>  $this->configuration('status')->status,
                'status_actived_at_start'   =>  $this->configuration('status')->actived_at_start,
                'status_actived_at_end'     =>  $this->configuration('status')->actived_at_end,
                'name_company'              =>  $this->configuration('account')->name_company,
                'sales_category_field'      =>  $this->configuration('account')->sales_category_field,
                'sales_scategorys_field'    =>  $this->configuration('account')->sales_scategorys_field,
                'company_info'              =>  $this->configuration('account')->company_info,
                'resi_company'              =>  $this->configuration('account')->resi_company,
                'shiping_city'              =>  $this->configuration('storeExpedition')->city,
                'shiping_regency'           =>  $this->configuration('storeExpedition')->regency,
                'shiping_subdistrict'       =>  $this->configuration('storeExpedition')->subdistrict,
                'account_bank'              =>  $this->bankAccount,
            ];
    }

    protected function resApiNoWreap() : array{
        $array = [];
        $array['store_information'] = $this->store->storeInformation;
        $array['account_bank']      = $this->bankAccount;
        return $array;
    }

    protected function configuration(string $keys){
        return is_null($this->store->storeInformation->{$keys}) ? null : $this->store->storeInformation->{$keys};
    }
}
