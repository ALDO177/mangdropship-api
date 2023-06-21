<?php

namespace Database\Seeders;

use App\Models\TagsCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TagsCategorySeeder extends Seeder
{
    public function run()
    {
        TagsCategory::factory()->count(5)->create();
    }
}
