<?php

namespace Database\Factories;

use App\Models\Categorys;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubCategorysFactory extends Factory
{
    public function definition()
    {
        return [
            'id_category'         => $this->faker->randomElement(Categorys::all())['id'],
            'sub_category_name'   => $this->faker->words(random_int(3, 5), true),
            'path'                => $this->faker->imageUrl(300, 300),
            'type_publish'        => $this->faker->boolean()
        ];
    }
}
