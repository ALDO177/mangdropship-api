<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorysFactory extends Factory
{
    public function definition()
    {
        return [
            'category_name' => $this->faker->words(random_int(3, 5), true),
            'category_description' => $this->faker->text(random_int(50, 200)),
            'icon'          => $this->faker->randomLetter(),
            'image_path'    => $this->faker->imageUrl(400, 400),
            'active'        => $this->faker->boolean(),
        ]; 
    }
}
