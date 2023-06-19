<?php

namespace App\Trait\Table\Mangseller\Store{

    use App\Models\MangSellerModels\StoreInformation;
    use Illuminate\Database\Eloquent\Relations\HasOne;

    trait useTableStore{

        public function storeInformation(): HasOne{
            return $this->hasOne(StoreInformation::class, 'id_store', 'id');
        }

        public function status() : HasOne{ 
            return $this->hasOne(StoreInformation::class, 'id_status', 'id');
        }
    }
}