<?php

namespace Database\Factories;

use App\Models\Categorys;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TagsCategory>
 */
class TagsCategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'tags_category_type' => Categorys::class,
            'tags_category_id'   => $this->faker->randomElement(Categorys::all())['id'],
            'publish'            => $this->faker->boolean(),
        ];
    }
}
