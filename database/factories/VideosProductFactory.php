<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VideosProduct>
 */
class VideosProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_product'   => $this->faker->randomElement(Produk::all())['id'],
            'video_name'   => $this->faker->words(random_int(5, 10), true),
            'video_description' => $this->faker->text(100),
            'video_path'   =>  'https://'. env('APP_URL') .'/'. Str::slug($this->faker->words(random_int(5, 10), true)) . '.mp4',
            'video_status' => $this->faker->boolean(),
        ];
    }
}
