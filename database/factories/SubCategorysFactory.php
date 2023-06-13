<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategorys>
 */
class SubCategorysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title_sub'   => $this->faker->words(15, true),
            'slugh_sub'   => Str::slug($this->faker->text(50)),
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
