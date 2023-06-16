<?php

namespace App\Http\Resources\Mangseller;
use Illuminate\Http\Resources\Json\JsonResource;

class ResouresStoreInformation extends JsonResource
{
    public function toArray($request)
    {
        return[
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
            'thumbnail'                 =>  $this->configuration('storePayment')->thumbnail,
            'bank_account_name'         =>  $this->configuration('storePayment')->account_name,
            'bank_account_number'       =>  $this->configuration('storePayment')->account_number,
            'bank_code_access'          =>  $this->configuration('storePayment')->code_access,
            'shiping_city'              =>  $this->configuration('storeExpedition')->city,
            'shiping_regency'           =>  $this->configuration('storeExpedition')->regency,
            'shiping_subdistrict'       =>  $this->configuration('storeExpedition')->subdistrict,
        ];
    }

    protected function configuration(string $keys){
        return is_null($this->store->storeInformation->{$keys}) ? null : $this->store->storeInformation->{$keys};
    }
}
