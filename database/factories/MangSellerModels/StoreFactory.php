<?php

namespace Database\Factories\MangSellerModels;
use Illuminate\Support\Str;

const Name_Stored = ['ALDO TOKO JAYA', 'MADO TOKO SEJAHTERA', 'TOKO MUSLIMAH ABADI'];

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MangSellerModels\Store>
 */

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomName = $this->faker->randomElement(Name_Stored);
        
        return [
             "name_store"   => $randomName,
             "slugh_store"  => Str::slug($randomName),
             "path_store"   => $this->faker->imageUrl(300, 300, 'dog', true, 'Hello World'),
             "store_status" => $this->faker->boolean(),
        ];
    }
}
