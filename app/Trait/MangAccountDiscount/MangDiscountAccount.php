<?php

namespace App\Trait\MangAccountDiscount{

    trait MangDiscountAccount{

        public function discountAccountPaid(float $price, int $discount){
            $discountData = $discount / 100;
            $totalPrice = ($discount * $price);
            return $totalPrice;
        }
    }
}