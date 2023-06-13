<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorys>
 */
class CategorysFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->paragraph(2),
            'slugh' => $this->faker->words(5, true),
        ]; 
    }
}
