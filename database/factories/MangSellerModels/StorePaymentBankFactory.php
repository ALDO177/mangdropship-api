<?php

namespace Database\Factories\MangSellerModels;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Rfc4122\UuidV3;

class StorePaymentBankFactory extends Factory
{
    public function definition()
    {
        return [
            'altern_code' => UuidV3::uuid4()->toString(),
        ];
    }
}
