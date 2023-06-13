<?php

namespace Database\Factories;

use App\Models\MangSellerModels\MangSellers;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supllier>
 */
class SupllierFactory extends Factory
{
    
    public function definition()
    {
        return [
            'id_sellers' => $this->faker->randomElement(MangSellers::all())['id'],
            'id_product' => $this->faker->randomElement(Produk::all())['id']
        ];
    }
}
