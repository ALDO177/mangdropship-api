<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\SubCategorys;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategorys>
 */
class ProductCategorysFactory extends Factory
{
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement(SubCategorys::all())['id'],
            'produks_id'  => $this->faker->randomElement(Produk::all())['id'],
        ];
    }
    
}
