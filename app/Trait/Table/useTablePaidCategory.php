<?php

namespace App\Trait\Table{

    use App\Models\DiscountPaid;

    trait useTablePaidCategory{

        public function discount(){
            return $this->hasOne(DiscountPaid::class, 'offers_id', 'id');
        }
    }

}