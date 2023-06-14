<?php

namespace Database\Factories\MangSellerModels;

use App\Models\Produk;
use App\Models\Supllier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MangSellerModels\suplierProduks>
 */
class suplierProduksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'id_suplier' => $this->faker->randomElement(Supllier::all())['id'],
           'id_product' => $this->faker->randomElement(Produk::all())['id']
        ];
    }
}
