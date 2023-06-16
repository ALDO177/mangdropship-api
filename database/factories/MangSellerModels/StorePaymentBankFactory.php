<?php

namespace Database\Factories\MangSellerModels;

use App\Models\MangSellerModels\MangSellers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MangSellerModels\StorePaymentBank>
 */
class StorePaymentBankFactory extends Factory
{
    public function definition()
    {
        return [
            'thumbnail'      => $this->faker->imageUrl(300, 300, 'dog', true, "Iamges"),
            'account_name'   => $this->faker->name(),
            'account_number' => $this->faker->creditCardNumber('Visa', true),
            'code_access'    => md5(random_bytes(20)),
        ];
    }
}
