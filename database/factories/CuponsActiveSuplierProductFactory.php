<?php

namespace Database\Factories;

use App\Models\Supllier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CuponsActiveSuplierProduct>
 */
class CuponsActiveSuplierProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'id_suppliers' => $this->faker->randomElement(Supllier::all()),
            // 'id_cupons',
            // 'id_product',
            // 'time_publish',
            // 'max_usage_cupons'
        ];
    }
}
