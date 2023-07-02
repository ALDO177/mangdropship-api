<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GalleriesProduct>
 */
class GalleriesProductFactory extends Factory
{
    public function definition()
    {
        return [
            'id_product'    => $this->faker->randomElement(Produk::all())['id'],
            'image_path'    => $this->faker->imageUrl(300, 300, 'product', true, 'dogs', true),
            'image_active'  => $this->faker->boolean(),
        ];
    }
}
