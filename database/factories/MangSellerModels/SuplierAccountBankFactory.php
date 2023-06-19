<?php

namespace Database\Factories\MangSellerModels;

use App\Models\AccountBank;
use App\Models\MangSellerModels\StorePaymentBank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MangSellerModels\SuplierAccountBank>
 */
class SuplierAccountBankFactory extends Factory
{
    public function definition()
    {
        return [    
            'account_name'          => $this->faker->name(),
            'account_number'        => $this->faker->bothify('#####-#####-#####-#####'),
            'id_store_account_bank' => $this->faker->randomElement(StorePaymentBank::all())['id'],
            'id_account_bank'       => $this->faker->randomElement(AccountBank::all())['id']
        ];
    }
}
