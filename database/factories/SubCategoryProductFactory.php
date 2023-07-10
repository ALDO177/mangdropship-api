<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategoryProduct>
 */
class SubCategoryProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_sub_category' => '092bd8cb-e030-41c5-9e13-e3db2802fcc2',
            'id_product'      => ''
        ];
    }
}
