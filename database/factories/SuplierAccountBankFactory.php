<?php

namespace Database\Factories;

use App\Models\AccountBank;
use App\Models\Supllier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuplierAccountBank>
 */
class SuplierAccountBankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'account_name'      => $this->faker->name(),
            'account_number'    => $this->faker->bothify('####-###-####-###'),
            'id_supliers'       => $this->faker->randomElement(Supllier::all())['id'],
            'id_account_bank'   => $this->faker->randomElement(AccountBank::all())['id']
        ];
    }
}
