<?php

namespace Database\Factories\MangSellerModels;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MangSellerModels\StoreShipingExpedition>
 */
class StoreShipingExpeditionFactory extends Factory
{
    
    public function definition()
    {
        return [
            'city'         => $this->faker->city(),
            'regency'      => $this->faker->city() . '-' . 'regency',
            'subdistrict'  => $this->faker->city() . '-' . 'subdistrict'
        ];
    }
}
